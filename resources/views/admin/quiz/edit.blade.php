<x-app-layout>
    <x-slot name="header">Quiz Güncelle</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('quizzes.update',$quiz->id)}}">
                @method('PUT')
                @csrf
                <div class=" form-group mt-3">
                    <label >Quiz başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{$quiz->title}}">
                    {{$quiz->title}}
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
