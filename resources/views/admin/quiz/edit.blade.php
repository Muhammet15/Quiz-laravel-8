<x-app-layout>
    <x-slot name="header">Quiz Güncelle</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary"> <i style="color:white" class="fa fa-arrow-left"></i> Quizlere dön</a></h5>
            <h5 class="card-title float-right"><a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"> <i style="color:white" class="fa fa-plus"></i> Quiz oluştur</a></h5>
            <form method="POST" action="{{route('quizzes.update',$quiz->id)}}">
                @method('PUT')
                @csrf
                <div class=" form-group mt-3">
                    <label >Quiz başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{$quiz->title}}">
                </div>
                <div class=" form-group mt-3">
                    <label>Quiz Status</label>
                    <select name="status" class="form-control">
                        <option 
                            @if($quiz->questions_count>3)
                                @if($quiz->status==='publish') selected @endif  value="publish">Publish 
                            @endif 
                        </option>
                        <option  @if($quiz->status==='passive') selected @endif  value="passive">Passive</option>
                        <option  @if($quiz->status==='draft') selected @endif  value="draft">Draft</option>
                    </select>
                </div>
                <div class=" form-group mt-3">
                    <label>Quiz Açıklama</label>
                    <textarea name="description" class="form-control" rows="8">{{$quiz->description}}</textarea>
                </div>
                <div  class=" form-group mt-3" > 
                    <label>Tarih belirle </label>
                    <input id="isFinished" @if($quiz->finished_at) checked @endif type="checkbox">
                </div>
                <div id="finishedInput"  @if(!$quiz->finished_at) style="display: none" @endif  class=" form-group mt-3">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local"name="finished_at" class="form-control" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at))}}@endif">
                </div>
                <div class=" form-group">
                    <button type="sumbit" class="btn btn-primary btn-lg w-100 mt-3">Quiz update</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $("#isFinished").change(function(){ 
                if($(this).is(":checked")) {
                    $("#finishedInput").show(300);
                } else {
                    $("#finishedInput").hide(200);
                }
            });
        </script>
        </x-slot>
</x-app-layout>
