<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Http\Requests\BlogsRequest;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('both',['only'=>['create','store','edit','update']]);

        $this->middleware('admin',['only'=>['publish','destroy']]);
    }

    public function index(){

        $blogs = Blog::where('status',1)->latest()->get();

        return view('blog.index',compact('blogs'));
    }

    public function create(){
        $categories = Category::pluck('name','id');
        return view('blog.create',compact('categories'));
    }

    public function store(BlogsRequest $request)
    {

        $inputs = $request->all();

        $inputs['slug'] = Str::slug($request->title);
        $inputs['meta_title'] = $request->title;
        $inputs['user_id'] = Auth::user()->id;
        $inputs['email']  = Auth::user()->email;

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name, 'title' => $name]);
            $inputs['photo_id'] = $photo->id;
        }


        $blog = Blog::create($inputs);


        $users = User::where('get_email',1)->get();

            foreach ($users as $user) {
                $user->email = $inputs['email'];
                Mail::send('email.newblog', ['blog' => $blog, 'user' => $user],
                    function ($message) use ($user) {
                        $message->to($user->email)->from('mousashawa1@gmail.com', 'Mousa')->subject('WoW Your Created New Blog With email');
//                        dd($user->email);
                    });
            }

       if ($categoriesId = $request->category_id){
           $blog->category()->sync($categoriesId);
       }

//       Session::flash('success','Your Created Blog Successfully Now !');
        Alert::success( 'Your Created Blog Successfully Now !');
        return redirect('blog');
    }

    public function show($slug){

        $blog = Blog::whereSlug($slug)->first();

        return view('blog.show',compact('blog'));
    }

    public function edit($id){

        $categories = Category::pluck('name','id');
        $blog = Blog::findOrFail($id);
        return view('blog.edit',compact('blog','categories'));
    }

    public function update(BlogsRequest $request,$id){

//        $rules = [
//            'title' => 'required',
//            'body'  => 'required',
//            'meta_desc' =>'required'
//        ];
//        $messages = [
//            'title.required' => 'This Title is required Please',
//            'body.required' => 'This Body is required Please',
//            'meta_desc.required' => 'This Description is required Please'
//        ];
//        $this->validate($request,$rules,$messages);

        $input = $request->all();

        $blog = Blog::findOrFail($id);

        if ($file = $request->file('photo_id')){

            if ($blog->photo){
                unlink('images/'.$blog->photo->file);
                $blog->photo->delete('photo');
            }

            $name = $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name ,'title'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $blog->update($input);
        if ($categoriesId = $request->category_id){
            $blog->category()->sync($categoriesId);
        }

//        Session::flash('update','Your Updated Blog Posts Successfully ! ');
        Alert::success('Update Blog', 'Your Updated Blog Posts Successfully ! ');
        return redirect('blog');
    }

    public function delete($id){
        $blog = Blog::findOrFail($id);

        $categoriesId = \request()->category_id;
        $blog->category()->detach($categoriesId);
        $blog->delete();

        if ($blog->photo){
            unlink('images/'.$blog->photo->file);
            $blog->photo->delete('photo');
        }

//        Session::flash('delete','Your Deleted Blog Posts Successfully !');
        Alert::success('Delete Blog', 'Your Deleted Blog Posts Successfully !');
        return redirect('blog');
    }

    public function trash(){

        $Trashes = Blog::onlyTrashed()->get();
        return view('blog.trash',compact('Trashes'));
    }

    public function restore($id){
        $blogrestore = Blog::onlyTrashed()->findOrFail($id);

        $blogrestore->restore($blogrestore);

        return redirect('blog');
    }
    public function publish(Request $request , $id){
        $blog = Blog::findOrFail($id)->update($request->all());
        Alert::success( 'Your Updated Blog Successfully Now !');
        return redirect()->back();
    }
    //
}
