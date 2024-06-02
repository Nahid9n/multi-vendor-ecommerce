<div class="position-relative d-flex">
    @foreach($images as $key=>$image)
        <div class="imgs m-1">
            <span class="btn btn-danger btn-sm position-absolute rmMultipleImg" id="{{$image->id}}" style="float: left">&times;</span>
            <img width="100" height="100" class="img" src="{{asset($image->file)}}" alt="">
            <p><small>{{$image->file_name}}</small></p>
        </div>
    @endforeach
</div>
