<x-app-layout>
    <x-slot name="header">Anasayfa</x-slot>
    <div class="row"> 
        <div class="col-md-8">
            <div class="list-group">
                @foreach($quizzes as $quiz )
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$quiz->title}}</h5>
                    <small>{{$quiz->finished_at ? $quiz->finished_at->diffForHumans().' finished.': '-'}}</small>
                  </div>
                  <p class="mb-1">{{Str::limit($quiz->description,120)}}</p>
                  <small>{{$quiz->questions_count}} Soru</small>
                  <small class="btn-success float-right">{{$quiz->status}}</small>
                </a>
                @endforeach
                <div class="mt-2">{{$quizzes->links()}}</div>
              </div>
        </div>
        <div class="col-md-4">
detay
        </div>
    </div>

</x-app-layout>
