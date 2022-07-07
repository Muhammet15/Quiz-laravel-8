<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuestionCreateRequest;
use Illuminate\Support\Str;

use App\Http\Requests\QuestionUpdateRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $quiz = Quiz::whereId($id)->with('questions')->first() ??abort('404','Quiz bulunamadı');
        return view('admin.questions.list',compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz = Quiz::find($id);
        return view('admin.questions.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request,$id)
    {
        if($request->hasFile('image')){
            $fileName=Str::slug($request->question).'.'.$request->image->extension();
            $fileNameWithUpload='uploads/'.$fileName;
            $request->image->move(public_path('uploads'),$fileName);
            $request->merge([
                'image'=>$fileNameWithUpload
            ]); 
        }
        Quiz::find($id)->questions()->create($request->post()); // sql alanlar ile request adları aynı zaten  post yeerine all yazdığımızda merge yemiyor ve xampp dosya yolu ile kaydediyor
        return redirect()->route('questions.index',$id)->withSuccess('Başarıyla Kaydedildi.');//withten sonra yollanan success bir sessiondır.
        // return $request->post();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "sss";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$question_id)
    {
        $question = Quiz::find($id)->questions()->whereId($question_id)->first() ?? abort(404,'Quiz bulunamadı');
        return view('admin.questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $id,$question_id)
    {
        if($request->hasFile('image')){
            $fileName=Str::slug($request->question).'.'.$request->image->extension();
            $fileNameWithUpload='uploads/'.$fileName;
            $request->image->move(public_path('uploads'),$fileName);
            $request->merge([
                'image'=>$fileNameWithUpload
            ]); 
        }
       Quiz::find($id)->questions()->whereId($question_id)->first()->update($request->post()) ?? abort(404,'Quiz bulunamadı');
       // return $request->post();
       return redirect()->route('questions.index',$id)->withSuccess('Başarıyla Güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$question_id)
    {
        Quiz::find($id)->questions()->whereId($question_id)->first()->delete();
        return redirect()->route('questions.index',$id)->withSuccess('Başarıyla Silindi.');
    }
}
