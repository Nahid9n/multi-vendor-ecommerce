<div class="modal fade bd-example-modal-xl single" id="singleImg" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog modal-xl" role="document">
        <div class="modal-content modal-dialog-scrollable">
            <div class="modal-body">
                <div class="modal-content">
                    <div class="row mt-5 justify-content-center">
                        <div class="card p-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="selectAll" class="btn btn-success" id="selectAllbutton">Select All</label>
                                        <label for="" class="btn btn-success resetButton" id="resetButton">Reset</label>
                                        <input type="checkbox" class="form-check-input mx-2" id="selectAll" hidden>
                                    </div>
                                    <div class="col-6 d-grid justify-content-end">
                                        <button data-bs-dismiss="modal" class="close btn btn-sm btn-danger" aria-label="Close"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <div class="row p-3 ">
                                    <div class="col-md-3">
                                        <div class="dropdown mb-2 mb-md-0">
                                            <button class="btn border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                Bulk Action
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item confirm-alert" href="javascript:void(0)" id="bulk-delete-btn"  data-target="#bulk-delete-modal"> Delete selection</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 ml-auto mr-0 mb-2">
                                        <form>
                                            <select class="form-control form-control-xs filterUploadFile" name="sort">
                                                <option value="newest">Sort by newest</option>
                                                <option value="oldest">Sort by oldest</option>
                                                <option value="smallest">Sort by smallest</option>
                                                <option value="largest">Sort by largest</option>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-2">
                                            <form>
                                                <input type="text" class="form-control searchTerm form-control-xs" name="search"
                                                       id="searchValue" placeholder="Search your files" value="">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ajax_data" id="ajax_data">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer fixed-bottom ">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="singleSaveSelection" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

