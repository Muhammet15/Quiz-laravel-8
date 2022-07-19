<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>


    <div class="card">
        <div class="card-body">
        <h5 class="card-subtitle mb-2 text-muted">Description</h5>
          <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                    @if($quiz->my_result)
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Puan
                          <span class="badge alert-primary">{{$quiz->my_result->point}}</span>
                      </li>
                   
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Doğru / Yanlış Sayısı
                        <div class="float-right">
                        <span class="badge alert-success">{{$quiz->my_result->correct}} Doğru </span>
                        <span class="badge alert-danger">{{$quiz->my_result->wrong}} Yanlış</span>
                        </div>
                      </li>
                    @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru Sayısı
                              <span class="badge alert-dark">{{$quiz->questions_count}}</span>
                        </li>
                        @if($quiz->details)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                             Katılımcı Sayısı
                             {{-- burada obje olmadığı için kendimiz elle array oluşturdugumuzdan quiz php içerisinde ok ile gösteremedik. --}}
                          <span class="badge alert-info">{{$quiz->details['join_count']}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                             Ortalama Puan
                          <span class="badge alert-warning">{{$quiz->details['average']}}</span>
                        </li>
                        @endif
                       
                      </ul>
                </div>
                <div class="col-md-8"> 
                    {{$quiz->description}}</p>
                    @if($quiz->my_result)
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-info btn-sm w-100 mt-3">View Quiz</a>
                    @else
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-sm w-100 mt-3">Enter the Quiz</a>
                    @endif
                  </div>
            </div>
           
        </div>
      </div>

</x-app-layout>
