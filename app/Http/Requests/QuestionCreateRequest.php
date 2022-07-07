<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'question'=>'required|min:3',
            'image'=>'image|nullable|max:1024|mimes:jpg,jpeg,png,jfif|min:3', 
            'answer1'=>'required|min:1', 
            'answer2'=>'required|min:1', 
            'answer3'=>'required|min:1', 
            'answer4'=>'required|min:1', 
            'correct_answer'=>'required', 

        ];
    }
    public function attributes(){
        return[
            'question'=>'Question',
            'image'=>'Image', 
            'answer1'=>'Answer 1', 
            'answer2'=> 'Answer 2', 
            'answer3'=>'Answer 3', 
            'answer4'=>'Answer 4', 
            'correct_answer'=>' Correct Answer ', 

        ];
    }
}
