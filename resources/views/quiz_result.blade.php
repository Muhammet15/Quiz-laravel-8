<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>


    <div class="card">
        <div class="card-body">
            <div class="alert alert-info">
                <h5 class="card-title float-right"><a href="{{route('dashboard')}}" class="btn btn-sm btn-info text-gray"> <i style="color:white" class="fa fa-arrow-left"></i> Anasayfaya dön</a></h5>
                <h3 class="text-success">  Puan: {{$quiz->my_result['point']}}</h3>
                <i class="fa fa-circle text-gray"></i> Yanlış işaretlediğin şık <br>
                <i class="fa fa-check text-success"></i> Doğru Cevap  <br>
                <i class="fa fa-times text-danger"> </i> Yanlış Cevap<br>
            </div>
            @foreach($quiz->questions as $question )
            <p> @if($question->correct_answer == $question->my_answer['answer']) 
                <i class="fa fa-check text-success"> </i>
                    @else
                    <i class="fa fa-times text-danger"> </i>
                    @endif
            <strong>#{{$loop->iteration}} </strong>
                  {{$question->question}}</p>
                @if($question->image) <img src="{{asset($question->image)}}"  style="width:40%" class="img-responsive"> @endif
                <small>Bu soruya <strong>%{{$question->true_percent}}</strong>  oranında doğru cevap verildi</small>
            <br>
                <div class="form-check mt-2">
                    @if('answer1'==$question->correct_answer)
                    <i class="fa fa-check text-success"> </i>
                    @elseif( $question->my_answer['answer']=='answer1')
                    <i class="fa fa-circle text-gray"> </i>
                    @endif
                    <label class="form-check-label" for="quiz{{$question->id}}1">
                     {{$question->answer1}}

                    </label>
                </div>
                <div class="form-check">
                 @if('answer2'==$question->correct_answer)
                 <i class="fa fa-check text-success"> </i>
                 @elseif( $question->my_answer['answer']=='answer2')
                 <i class="fa fa-circle text-gray"> </i>
                 @endif
                    <label class="form-check-label" for="quiz{{$question->id}}2">
                     {{$question->answer2}}
                    </label>
                </div>
                <div class="form-check">
                    @if('answer3'==$question->correct_answer)
                    <i class="fa fa-check text-success"> </i>
                    @elseif( $question->my_answer['answer']=='answer3')
                    <i class="fa fa-circle text-gray"> </i>
                    @endif
                    <label class="form-check-label" for="quiz{{$question->id}}3">
                     {{$question->answer3}}
                    </label>
                </div>
                <div class="form-check">
                   @if('answer4'==$question->correct_answer)
                   <i class="fa fa-check text-success"> </i>
                   @elseif( $question->my_answer['answer']=='answer4')
                   <i class="fa fa-circle text-gray"> </i>
                   @endif
                    <label class="form-check-label" for="quiz{{$question->id}}4">
                     {{$question->answer4}}
                    </label>
                </div>
                
                @if(!$loop->last) 
                <hr>
                <br>
                @endif
            @endforeach

        </div>
      </div>

</x-app-layout>
