<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>


    <div class="card">
        <div class="card-body">
        <h5 class="card-subtitle mb-2 text-muted">Description</h5>
          <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if($quiz->finished_at) 
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Son Katılım Tarihi
                              <span title="{{$quiz->finished_at}}" class="badge alert-info">{{$quiz->finished_at->diffForHumans()}}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru Sayısı
                              <span class="badge alert-info">{{$quiz->questions_count}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                             Katılımcı Sayısı
                          <span class="badge alert-info">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                             Ortalama Puan
                          <span class="badge alert-info">2</span>
                        </li>
                       
                      </ul>
                </div>
                <div class="col-md-8"> 
                    {{$quiz->description}}</p>
                    <a href="#" class="btn btn-primary btn-sm w-100 mt-3">Enter the Quiz</a>
                </div>
            </div>
           
        </div>
      </div>

</x-app-layout>
