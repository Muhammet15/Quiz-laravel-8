<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"> <i style="color:white" class="fa fa-plus"></i> Quiz oluştur</a></h5>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Status</th>
                    <th scope="col">Finished_at</th>
                    <th scope="col">Process</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $quiz)
                    <tr>
                        <td scope="row">{{$quiz->title}}</td>
                        <td>{{$quiz->status}}</td>
                        <td>{{$quiz->finished_at}}</td>
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
