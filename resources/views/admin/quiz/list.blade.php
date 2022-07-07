<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"> <i style="color:white" class="fa fa-plus"></i> Quiz oluştur</a></h5>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Soru sayısı</th>
                    <th scope="col">Status</th>
                    <th scope="col">Finished_at</th>
                    <th scope="col">Process</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $quiz)
                    <tr>
                        <td scope="row">{{$quiz->title}}</td>
                        <td>{{$quiz->questions_count}}</td>
                        <td> 
                            @switch($quiz->status) 
                                @case('publish')
                                    <span class="badge alert-success">Publish</span>
                                @break
                                @case('passive')
                                    <span class="badge alert-danger">Passive</span>
                                @break
                                @case('draft')
                                    <span class="badge alert-warning">Draft</span>
                                @break   
                            @endswitch
                        </td>
                        <td>
                            <span title="{{$quiz->finished_at}}">
                                {{$quiz->finished_at ? $quiz->finished_at->diffForHumans(): '-'}}
                            </span>
                            </td>
                        <td>
                            <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary"><i class=" fa fa-pen"></i></a>
                            <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger"><i class=" fa fa-times"></i></a>
                            <a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-warning"><i class=" fa fa-question"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              {{$quizzes->links()}}
        </div>
   


    </div>

</x-app-layout>
