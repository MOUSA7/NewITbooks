<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin',['only'=>['userlist','destroy']]);
    }


    public function index()
    {
        $users = User::all();
        $roles = Role::pluck('name','id');

        return view('users.index',compact('users','roles'));
        //
    }

    public function UserList()
    {
        $users = User::all();
        $roles = Role::pluck('name','id')->all();
        return view('users.userslist',compact('users','roles'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::whereUsername($username)->first();

        return view('users.show',['user'=>$user]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::whereUsername($username)->first();


        if (Auth::check() && Auth::user()->id == $user->id){

            return view('users.edit',['user'=>$user]);

        }
        return 'Users Does Not Permission';        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $roles = [
          'name' =>['max:15','min:4']  ,
          'photo_id' =>['mimes:jpg,jpeg,png','max:5000']  ,
            'about' =>['max:20000']  ,
        ];
        $messages = [
            'name'=>'Name must be between 6 to 30',
            'photo_id'=>'Image must be jpg ,png Or jpeg'
        ];
        $this->validate($request,$roles,$messages);


        $user = User::findOrFail($id);
        //

        if (Auth::user()->id = $user->id){
            if ($file = $request->file('photo_id')) {
                if ($user->photo){
                    unlink('images/' . $user->photo->file);
                $user->photo->delete('file');
            }
                $name = time().$file->getClientOriginalName();
                $file->move('images',$name);
                $photo = Photo::create(['file'=>$name,'title'=>$name]);
                $inputs['photo_id'] = $photo->id;
            }
        }
        $user->update($inputs);

        Alert::success( 'Your Updated Users Successfully Now !');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success( 'Your Deleted Users Successfully Now !');
        return redirect()->back();
        //
    }
}
