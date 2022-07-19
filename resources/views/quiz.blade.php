<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>


    <div class="card">
        <div class="card-body">
            <p class="card-text"></p>
            <form method="POST" action="{{route('quiz.result',$quiz->slug)}}">
            @csrf
            @foreach($quiz->questions as $question )
            <p><strong>#{{$loop->iteration}} </strong>  {{$question->question}}</p>
                @if($question->image) <img src="{{asset($question->image)}}"  style="width:40%" class="img-responsive"> @endif
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}1" value="answer1" required>
                    <label class="form-check-label" for="quiz{{$question->id}}1">
                     {{$question->answer1}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}2" value="answer2" required>
                    <label class="form-check-label" for="quiz{{$question->id}}2">
                     {{$question->answer1}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}3" value="answer3" required>
                    <label class="form-check-label" for="quiz{{$question->id}}3">
                     {{$question->answer1}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}4" value="answer4" required >
                    <label class="form-check-label" for="quiz{{$question->id}}4">
                     {{$question->answer1}}
                    </label>
                </div>
                
                @if(!$loop->last) 
                <hr>
                <br>
                @endif
            @endforeach
            <button type="submit" class="btn btn-success btn-sm w-100 mt-10">Quiz bitir</button>
            </form>

        </div>
      </div>

</x-app-layout>
