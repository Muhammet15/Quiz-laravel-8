<x-app-layout>
    <x-slot name="header"> {{$quiz->title}} Quizine ait sorular</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary"> <i style="color:white" class="fa fa-arrow-left"></i> Quizlere dön</a></h5>
            <h5 class="card-title float-right">
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-sm btn-primary"> <i style="color:white" class="fa fa-plus"></i> Question oluştur</a></h5>
            <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">Question</th>
                    <th scope="col">Image</th>
                    <th scope="col">Answer 1</th>
                    <th scope="col">Answer 2</th>
                    <th scope="col">Answer 3</th>
                    <th scope="col">Answer 4</th>
                    <th scope="col">Answer correct</th>
                    <th scope="col">Process</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach( $quiz->questions as $questions )
                    <tr>
                        <td scope="row">{{$questions->question}}</td>
                        <td>
                            @if($questions->image) 
                            <a href="{{asset($questions->image)}}" class="btn btn-sm btn-light" target="_blank">Görüntüle</a>
                            @endif
                        </td>
                        <td>{{$questions->answer1}}</td>
                        <td>{{$questions->answer2}}</td>
                        <td>{{$questions->answer3}}</td>
                        <td>{{$questions->answer4}}</td>
                        <td class="text-success" >{{substr($questions->correct_answer,-1)}}. Answer</td>
                        <td style="width: 100px">
                            <a href="{{route('questions.edit',[$quiz->id,$questions->id])}}" class="btn btn-sm btn-primary"><i class=" fa fa-pen"></i></a>
                            <a href="{{route('questions.destroy',[$quiz->id,$questions->id])}}" class="btn btn-sm btn-danger"><i class=" fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

</x-app-layout>
