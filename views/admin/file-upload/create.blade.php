@extends('admin.master')
@section('title','Upload File')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Drag & drop your files</h3>
                    <a href="{{route('admin.file.manage')}}" class="btn btn-primary my-1 mx-2 text-center">All Uploads</a>
                </div>
                <div class="card-body text-center">
                    <form action="{{ route('admin.file.store') }}" class="dropzone" id="myDropzone" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="gallery mt-2">
                                    <input type="hidden" name="uploaded_by" value="{{auth()->user()->name}}" readonly>
                                    <input type="file" name="files[]" id="gallery-photo-add" class="dropify form-control" multiple required>
{{--                                    <input id="demo" type="file" name="files[]" accept="image/jpeg, image/png, text/html, application/zip, text/css, text/js" multiple />--}}
                                </div>
                                <div class="my-2">
                                    <button class="btn btn-success btn-lg" type="submit">Upload</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    $(document).ready(function() {
        Dropzone.autoDiscover = false;

        $("#myDropzone").dropzone({
            url: "{{ route('admin.file.store') }}",
            maxFilesize: 2, // MB
            maxFiles: 5,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            init: function() {
                this.on("addedfile", function(file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').append('<img src="' + e.target.result + '">');
                    };
                    reader.readAsDataURL(file);
                });

                this.on("removedfile", function(file) {
                    $('#preview img[src="' + file.dataURL + '"]').remove();
                });
            }
        });
    });
</script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>--}}
