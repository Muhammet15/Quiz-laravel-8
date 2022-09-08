<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>


    <div class="card">
        <div class="card-body">
        <h5 class="card-subtitle mb-2 text-muted">Description</h5>
          <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                      @if($quiz->my_rank)
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Sıralama
                          <span class="badge alert-info">#{{$quiz->my_rank}}</span>
                      </li>
                      @endif
                    @if($quiz->my_result)
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Puan
                          <span class="badge alert-primary">{{$quiz->my_result->point}}</span>
                      </li>
                   
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Doğru / Yanlış Sayısı
                        <div class="float-right">
                          <span class="badge alert-success">  {{$quiz->my_result->correct}}  </span>
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
                        {{-- <pre>{{$quiz}}</pre> --}}
                        @if(count($quiz->topTen)>0)
                      <div class="card mt-3">
                        <div class="card-body">
                         
                          <h3 class="card-title ">Top 10</h3>
                          <ul class="list-group">
                            @foreach($quiz->topTen as $result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">  
                            <strong>{{$loop->iteration}}.</strong> <img class="w-8 h-8 rounded-full" src="{{$result->user->profile_photo_url}}">
                           <span @if(auth()->user()->id==$result->user->id) class="text-info bold" @endif>{{$result->user->name}}</span>
                            <span class="badge alert-warning float-right">{{$result->point}}</span></li>
                            @endforeach
                            
                          </ul>
                        </div>
                      </div>
                      @endif
                </div>
                <div class="col-md-8"> 
                    {{$quiz->description}}</p>
                    @if($quiz->my_result)
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-info btn-sm w-100 mt-3">View Quiz</a>
                    @elseif($quiz->finished_at==null||$quiz->finished_at>now())
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-sm w-100 mt-3">Enter the Quiz</a>
                    @endif
                  </div>
            </div>
           
        </div>
      </div>

</x-app-layout>
