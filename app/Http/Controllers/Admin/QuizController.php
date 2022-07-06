<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::paginate(5);
        return view('admin.quiz.list',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
        // Eski yöntem
        // $quiz =new Quiz;
        // $quiz->title=$request->title;
        // $quiz->save();
        Quiz::create($request->post()); // sql alanlar ile request adları aynı zaten
        return redirect()->route('quizzes.index')->withSuccess('Başarıyla Kaydedildi.');//withten sonra yollanan success bir sessiondır.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id) ?? abort(404,'Quiz bulunamadı');
        //dd($quiz);
        return view('admin.quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {
       $quiz = Quiz::find($id) ?? abort(404,'Quiz bulunamadı');
       Quiz::where('id',$id)->update($request->except(['_method','_token'])); //hariç
       
       // return $request->post();
       return redirect()->route('quizzes.index')->withSuccess('Başarıyla Güncellendi.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id) ?? abort(404,'Quiz bulunamadı');
        $quiz->delete();
        return redirect()->route('quizzes.index')->withSuccess('Başarıyla Silindi.');
    }
}
