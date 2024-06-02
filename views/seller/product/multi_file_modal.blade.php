<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Multiple File Selection </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.file.save.selection.multiple') }}" method="POST" id="multiFileForm">
            @csrf
            <div class="modal-body">
                <div class="row">
                @forelse($files as $file)
                <div class="card col-md-2">
                    <div class="card-header my-2">
                        <input class="form-check-input item-checkbox btn-checkbox" name="image_id[]" value="{{$file->id}}"
                            type="checkbox">
                        <div class="dropdown-file btn-lg">
                            <a class="dropdown-link" data-bs-toggle="dropdown">
                                <i class="fa fa-solid fa-bars"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="http://127.0.0.1:8000/{{$file->file}}" target="_blank"
                                    download="{{$file->file_name}}" class="dropdown-item">
                                    <i class="fa fa-download mr-2"></i>
                                    <span>Download</span>
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item" onclick="copyUrl(this)"
                                    data-url="http://127.0.0.1:8000/{{$file->file}}">
                                    <i class="fa fa-clipboard mr-2"></i>
                                    <span>Copy Link</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 m-0">
                        <a class="fileCheck" href="#" id="{{$file->id}}">
                            <img class="p-0 m-0" src="{{asset($file->file)}}" alt="" width="250">
                        </a>
                    </div>
                    <div class="card-footer ps-0 text-start">
                        <p class="py-0 my-0">{{$file->file_name}}</p>
                        <small>{{round($file->file_size, 2)}} KB</small>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No Files Found</p>
                </div>
                @endforelse

                <div class="col-12 text-center">
                    <div class="pagination-links">
                        {{ $files->links() }}
                    </div>
                </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>
</div>