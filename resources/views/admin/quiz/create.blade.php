<x-app-layout>
    <x-slot name="header">Quiz oluştur</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('quizzes.store')}}">
                @csrf
                <div class=" form-group mt-3">
                    <label >Quiz başlığı</label>
                    <input type="text" name="title" class="form-control" value={{old('title')}} >
                </div>
                <div class=" form-group mt-3">
                    <label>Quiz Açıklama</label>
                    <textarea name="description" class="form-control" rows="8">{{old('description')}}</textarea>
                </div>
                <div  class=" form-group mt-3" > 
                    <label>Tarih belirle </label>
                    <input id="isFinished" @if(old('finished_at')) checked @endif type="checkbox">
                </div>
                <div id="finishedInput"  @if(!old('finished_at')) style="display: none" @endif  class=" form-group mt-3">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local"name="finished_at" class="form-control" value={{old('finished_at')}}>
                </div>
                <div class=" form-group">
                    <button type="sumbit" class="btn btn-primary btn-lg w-100 mt-3">Create</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            // $("#finishedInput").hide();
            // $("#isFinished").on("click",function(){ 
            //     if($(this).is(":checked")) {
            //         $("#finishedInput").show(300);
            //         // alert("show")
            //     } else {
            //         $("#finishedInput").hide(200);
            //         // alert("hide")
            //     }
            // });
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
