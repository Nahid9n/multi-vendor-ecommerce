{{--// SIngle Image Field 1--}}
<div class="row mb-4">
    <label for="" class="col-md-3 form-label">Single Image</label>
    <div class="col-md-9 test_class">
        <div class="input-group singleFile" data-bs-toggle="modal" id="dynamicid" data-bs-target="#singleImg" data-type="image" data-multiple="false">
            <div class="input-group-prepend">
                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
            </div>
            <div class="form-control bannerFile-amount" id="dynamicidFileAmount">Choose file</div>
        </div>
        <input type="hidden" id="dynamicidItemId" name="banner">
        <div class="row d-flex" id="dynamicidData">
        </div>
    </div>
</div>

{{-- When Editing--}}
<div class="row mb-4">
    <label for="" class="col-md-3 form-label" >Single Image </label>
    <div class="col-md-9 test_class">
        <div class="input-group singleFile" data-bs-toggle="modal" id="dynamicid" data-bs-target="#singleImg" data-type="image" data-multiple="false">
            <div class="input-group-prepend">
                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
            </div>
            <div class="form-control" id="dynamicidFileAmount" >Choose file</div>
        </div>
        <input type="hidden" id="dynamicidItemId" name="name">
        <div class="row d-flex" id="dynamicidData">
            <div class="position-relative d-flex" id="imageContainer">
                <div class="imgs m-1">
                    <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{$image->id}}" style="float: left">&times;</span>
                    <img width="100" height="100" class="img" src="{{asset($image->file)}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

//Multiple Image Filed 1
<div class="row mb-4">
    <label for="" class="col-md-3 form-label" >Multiple Images</label>
    <div class="col-md-9 test_class">
        <div class="input-group multipleFile" data-bs-toggle="modal" id="dynamicid" data-bs-target="#multipleImg" data-type="image" data-multiple="true">
            <div class="input-group-prepend">
                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
            </div>
            <div class="form-control" id="dynamicidFileAmount" >Choose file</div>
        </div>
        <input type="hidden" id="dynamicidItemId" name="names">
        <div class="row d-flex" id="dynamicidData">

        </div>
    </div>
</div>
{{--When Editing Multiple Image Filed 1--}}
<div class="row mb-4">
    <label for="" class="col-md-3 form-label" >Multiple Images</label>
    <div class="col-md-9 test_class">
        <div class="input-group multipleFile" data-bs-toggle="modal" id="dynamicid" data-bs-target="#multipleImg" data-type="image" data-multiple="true">
            <div class="input-group-prepend">
                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
            </div>
            <div class="form-control multiplefile-amount" id="dynamicidFileAmount">Choose file</div>
        </div>
        <input type="hidden" id="dynamicidItemId" name="names">
        <div class="row d-flex" id="dynamicidData">
            <div class="position-relative d-flex" id="imageContainer">
                @foreach($images as $key=>$image)
                    <div class="imgs m-1">
                        <span class="btn btn-danger btn-sm position-absolute rmMultipleImg" id="{{$image->id}}" style="float: left">&times;</span>
                        <img width="100" height="100" class="img" src="{{asset($image->file)}}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
