<x-app-layout>
    <x-slot name="header">{{$quiz->title}} . için yeni question oluştur</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-secondary"> <i style="color:white" class="fa fa-arrow-left"></i> Quizlere dön</a></h5>
            <form method="POST" action="{{route('questions.store',$quiz->id)}}" enctype="multipart/form-data">
                @csrf
                <div class=" form-group mt-3">
                    <label >Question</label>
                    <textarea name="question" class="form-control" rows="5">{{old('question')}}</textarea>
                </div>
                <div class=" form-group mt-3">
                    <label>Image</label>
                    <input name="image" type="file" class="form-control">
                </div>
        <div  class="row mt-3" >
            <div  class="col-md-6" > 
                    <label>Answer 1</label>
                    <textarea name="answer1" class="form-control" rows="3">{{old('answer1')}}</textarea>
                    <label>Answer 3</label>
                    <textarea name="answer3" class="form-control" rows="3">{{old('answer3')}}</textarea>
            </div>
            <div  class="col-md-6" > 
                    <label>Answer 2</label>
                    <textarea name="answer2" class="form-control" rows="3">{{old('answer2')}}</textarea>
                    <label>Answer 4</label>
                    <textarea name="answer4" class="form-control" rows="3">{{old('answer4')}}</textarea>
            </div>
        </div>
        <div class=" form-group mt-3">
            <label>Answer Correct</label>
            <select name="correct_answer" class="form-control">
                <option  @if(old('correct_answer')==='answer1') selected @endif  value="answer1">Answer 1</option>
                <option  @if(old('correct_answer')==='answer2') selected @endif  value="answer2">Answer 2</option>
                <option  @if(old('correct_answer')==='answer3') selected @endif  value="answer3">Answer 3</option>
                <option  @if(old('correct_answer')==='answer4') selected @endif  value="answer4">Answer 4</option>
            </select>
        </div>
                <div class=" form-group mt-3">
                    <button type="sumbit" class="btn btn-primary btn-lg w-100 mt-3">Question Create</button>
                </div>
            
            </form>
        </div>
    </div>

</x-app-layout>
