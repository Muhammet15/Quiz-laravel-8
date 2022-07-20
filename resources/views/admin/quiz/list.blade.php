<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-right"><a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"> <i style="color:white" class="fa fa-plus"></i> Quiz oluştur</a></h5>
            <form method="GET" action="">
                <div class="form-row mt-3 mb-15">
                    <div class="col-md-2 float-left " >
                        <input type="text" name="title" value="{{request()->get('title')}}" placeholder="Enter the Quiz Name" class="form-control">
                    </div>
                    <div class="col-md-2 float-left ml-10">
                        <select name="status" onchange="this.form.submit()" class="form-control"> 
                            <option value=""> Durum Seçiniz </option>
                            <option @if(request()->get('status')=='publish') @selected(true)  @endif value="publish"> Publish </option>
                            <option @if(request()->get('status')=='passive') @selected(true)  @endif value="passive"> Passive </option>
                            <option @if(request()->get('status')=='draft') @selected(true)  @endif value="draft"> Draft </option>
                        </select>
                    </div>
                </div>
                @if(request()->get('title') || request()->get('status'))
                <div class="col-md-2 float-left ml-10">
                    <a href="{{route('quizzes.index')}}" class="btn btn-secondary btn-sm">Clear</a>
                </div>
                @endif
            </form>
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
                                    @if(!$quiz->finished_at)
                                    <span class="badge alert-success">Publish</span>
                                    @elseif($quiz->finished_at>now())
                                    <span class="badge alert-success">Publish</span>
                                    @else
                                    <span class="badge alert-secondary text-danger">Tarihi dolmuş</span>
                                    @endif
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
                            <a href="{{route('quizzes.details',$quiz->id)}}" class="btn btn-sm btn-info"><i class=" fa fa-info"></i></a>
                            <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary"><i class=" fa fa-pen"></i></a>
                            <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger"><i class=" fa fa-times"></i></a>
                            <a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-warning"><i class=" fa fa-question"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              {{$quizzes->withQueryString()->links()}}
        </div>
   


    </div>

</x-app-layout>
