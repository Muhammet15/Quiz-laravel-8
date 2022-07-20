<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>


    <div class="card">
        <div class="card-body">
          <h5 class="card-title"><a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary"> <i style="color:white" class="fa fa-arrow-left"></i> Quizlere dön</a></h5>
          <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
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
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Ad Soyad</th>
                          <th scope="col">Mail</th>
                          <th scope="col">Quiz Puanı</th>
                          <th scope="col">Doğru</th>
                          <th scope="col">Yanlış</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($quiz->results as $result)
                          <tr>
                            <td>{{$result->user->name}}</td>
                            <td>{{$result->user->email}}</td>
                            <td>{{$result->point}}</td>
                            <td>{{$result->correct}}</td>
                            <td>{{$result->wrong}}</td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
           
        </div>
      </div>

</x-app-layout>
