<?php $__env->startSection('title','File Upload'); ?>
<?php $__env->startSection('body'); ?>

<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="m-3">
                <div class="row">
                    <div class="card-header border-bottom justify-content-between">
                        <h3 class="card-title">All uploaded files</h3>
                        <?php if(auth()->user()->role == 'seller'): ?>
                        <a href="<?php echo e(route('seller.file.upload')); ?>" class="btn btn-primary my-1 text-center">Upload New
                            File</a>
                        <?php else: ?>
                        <a href="<?php echo e(route('admin.file.upload')); ?>" class="btn btn-primary my-1 text-center">Upload New
                            File</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="">
                        <label for="selectAll" class="btn btn-success">Select All</label>
                        <input type="checkbox" class="form-check-input mx-2" id="selectAll" hidden>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row p-3 ">
                            <div class="col-md-3">
                                <div class="dropdown mb-2 mb-md-0">
                                    <button class="btn border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        Bulk Action
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item confirm-alert" href="javascript:void(0)"
                                            id="bulk-delete-btn" data-target="#bulk-delete-modal"> Delete selection</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ml-auto mr-0 mb-2">
                                <select class="form-control form-control-xs filterUploadFile" name="sort">
                                    <option value="newest">Sort by newest</option>
                                    <option value="oldest">Sort by oldest</option>
                                    <option value="smallest">Sort by smallest</option>
                                    <option value="largest">Sort by largest</option>
                                </select>
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
</div>
<div id="info-modal" class="modal fade">
    <div class="modal-dialog modal-dialog-right">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6">File Info</h5>
                <button type="button" class="close" data-dismiss="modal">
                </button>
            </div>
            <div class="modal-body c-scrollbar-light position-relative" id="info-modal-content">
                <div class="c-preloader text-center absolute-center">
                    <i class="las la-spinner la-spin la-3x opacity-70"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL EFFECTS -->
<div class="modal fade" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Message Preview</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <h6>Why We Use Electoral College, Not Popular Vote</h6>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look like
                    readable English.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Save changes</button> <button class="btn btn-light"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function() {
    // load of all files
    getAllFiles();

    // Function to fetch all files
    function getAllFiles(page = 1) {
        $.ajax({
            type: 'GET',
            url: "<?php echo e(route('admin.file.items')); ?>",
            dataType: 'html',
            data: {
                page: page
            },
            success: function(data) {
                $('#ajax_data').html(data);
                updatePaginationLinks();
            }
        });
    }

    // Function to fetch filtered data
    function getFilteredData(sort = null, page = 1) {
        var sortItemUrl = "<?php echo e(route('admin.file.sort.item')); ?>";
        $.ajax({
            type: 'GET',
            url: sortItemUrl,
            dataType: "html",
            data: {
                sortValue: sort,
                page: page
            },
            success: function(data) {
                $('#ajax_data').html(data);
                updatePaginationLinks();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Function to update pagination links
    function updatePaginationLinks() {
        $('.pagination a').on('click', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var dataType = $(this).closest('[data-type]').data('type');
            var sort = "<?php echo e($sortValue); ?>";
            if (dataType == 'all') {
                getAllFiles(page);
            }
            if(dataType == 'filter'){
                getFilteredData(sort, page);
            }
        });
    }

    // Event listener for filter change
    $(document).on('change', '.filterUploadFile', function(event) {
        event.preventDefault();
        var sort = $(this).val();
        getFilteredData(sort);
    });

    // Event listener for keyup event
    $(document).on('keyup', '#searchValue', function(event) {
        event.preventDefault();
        var searchTerm = $(this).val().trim();
        console.log(searchTerm);
        if (searchTerm.length >= 1) {
            $.ajax({
                url: "<?php echo e(route('admin.file.search')); ?>",
                type: 'GET',
                data: {
                    search: searchTerm
                },
                success: function(response) {
                    $('.ajax_data').html(response);
                    updatePaginationLinks();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });

});

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Project\Seo Mutlivendor Home\seo_multivendor_ecommerce\resources\views/admin/file-upload/index.blade.php ENDPATH**/ ?>