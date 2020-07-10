<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'title' => ['required','max:10','unique:blogs'],
            'body'  => ['required','min:200'],
            'photo_id' => ['mimes:jpg,jpeg,png','max:1000'],
            'meta_desc' => ['required']
        ];
            if($this->is_edit == 1){
               $rules['title'] = 'required';
            }


        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Please Enter Title here',
            'body.required' => 'Please Enter Body here',
            'meta_desc.required' => 'Please Enter Meta Description here',
            'title.max' => 'Please Enter Title lower than 10 letters',
            'photo_id.mimes' => 'please Enter photo jpg,jpeg Or png ',
        ];
    }
}
