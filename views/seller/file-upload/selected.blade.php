
    <div class="position-relative d-flex" id="imageContainer">
        @foreach($images as $key=>$image)
                <div class="imgs m-1">
                    <span class="btn btn-danger btn-sm position-absolute" id="{{$image->id}}" onclick="rmimg(this)" style="float: left">&times;</span>
                    <img width="100" height="100" class="img" src="{{asset($image->file)}}" alt="">
                </div>
        @endforeach
    </div>


