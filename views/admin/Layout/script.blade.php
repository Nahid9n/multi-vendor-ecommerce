<script src="{{asset('/')}}admin/assets/plugins/jquery/jquery.min.js"></script>

{{-- date  picker --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- BOOTSTRAP JS -->
<script src="{{asset('/')}}admin/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>


<!-- SIDE-MENU JS -->
<script src="{{asset('/')}}admin/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{asset('/')}}admin/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/p-scroll/pscroll.js"></script>

<!-- STICKY JS -->
<script src="{{asset('/')}}admin/assets/js/sticky.js"></script>

<!-- APEXCHART JS -->
<script src="{{asset('/')}}admin/assets/js/apexcharts.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{asset('/')}}admin/assets/plugins/circle-progress/circle-progress.min.js"></script>

<!-- INTERNAL DATA-TABLES JS-->
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>

<!-- INDEX JS -->
<script src="{{asset('/')}}admin/assets/js/index1.js"></script>
<script src="{{asset('/')}}admin/assets/js/index.js"></script>

<!-- Reply JS-->
<script src="{{asset('/')}}admin/assets/js/reply.js"></script>

<!-- COLOR THEME JS -->
<script src="{{asset('/')}}admin/assets/js/themeColors.js"></script>


<!-- CUSTOM JS -->
<script src="{{asset('/')}}admin/assets/js/custom.js"></script>

<!--Internal Fileuploads js-->
<script src="{{asset('/')}}admin/assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/fileuploads/js/file-upload.js"></script>

<!--Internal Fancy uploader js-->
<script src="{{asset('/')}}admin/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/fancyuploder/fancy-uploader.js"></script>

<!-- SWITCHER JS -->
<script src="{{asset('/')}}admin/assets/switcher/js/switcher.js"></script>

{{-- Success or fail message--}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
{{-- toastr js  --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}


@stack('js')


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#categoryImage').attr('src', e.target.result);
                $('#categoryImage').attr('height', '100');
                $('#categoryImage').attr('width', '120');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>



<!-- DATA TABLE JS-->
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}admin/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/table-data.js"></script>

<!-- TABLE EDITS JS-->
<script src="{{ asset('/') }}admin/assets/plugins/jQuery-table-edits/table-edits.min.js"></script>
<script src="{{ asset('/') }}admin/assets/plugins/jQuery-table-edits/table-edits.js"></script>

<!-- INTERNAL DATATABLES JS -->
<script src="{{ asset('/') }}admin/assets/js/table-editable.js"></script>

<!-- Internal Input tags js-->
<script src="{{ asset('/') }}admin/assets/plugins/inputtags/inputtags.js"></script>

<!-- Bootstrap-Date Range Picker js-->
<script src="{{ asset('/') }}admin/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<!-- jQuery UI Date Picker js -->
<script src="{{ asset('/') }}admin/assets/plugins/date-picker/jquery-ui.js"></script>

<!-- bootstrap-datepicker js (Date picker Style-01) -->
<script src="{{ asset('/') }}admin/assets/plugins/bootstrap-datepicker/js/datepicker.js"></script>

<!-- Amaze UI Date Picker js-->
<script src="{{ asset('/') }}admin/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

<!-- Simple Date Time Picker js-->
<script src="{{ asset('/') }}admin/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
<!-- INTERNAL SELECT2 JS -->
<script src="{{asset('/')}}admin/assets/plugins/select2/select2.full.min.js"></script>

<!-- FORM ELEMENTS JS -->
<script src="{{asset('/')}}admin/assets/js/formelementadvnced.js"></script>

<!-- INTERNAL Summernote Editor js -->
<script src="{{asset('/')}}admin/assets/plugins/summernote-editor/summernote1.js"></script>
<script src="{{asset('/')}}admin/assets/js/summernote.js"></script>
<script src="{{asset('/')}}admin/assets/file-upload/fileupload.js"></script>

<script type="text/javascript">
    function myChangeFunction(input1) {
        var input2 = document.getElementById('myInput2');
        let newValue = input1.value;
        let result = newValue.replace(" ", "-");
        input2.value = result;
    }
</script>



<script type="text/javascript">

    $(document).ready(function() {
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img class="mx-1 my-1" style="height: 100px; width: 100px;" multiple>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });
    });
</script>
{{--Select All --}}
<script>
    $(function() {
        $('#selectAll').click(function() {
            if ($(this).prop('checked')) {
                $('.btn-checkbox').prop('checked', true);
            } else {
                $('.btn-checkbox').prop('checked', false);
            }
        });
        $('#selectAllmul').click(function() {
            if ($(this).prop('checked')) {
                $('.btn-checkbox').prop('checked', true);
            } else {
                $('.btn-checkbox').prop('checked', false);
            }
        });

    });
</script>



{{--Delete Selected images from file upload section--}}
<script>
    $(document).ready(function() {
        $('#bulk-delete-btn').click(function() {
            var ids = [];

            $('.item-checkbox:checked').each(function() {
                ids.push($(this).val());
            });
            if (ids.length > 0) {
                if (confirm('Are you sure you want to delete selected items?')) {
                    $.ajax({
                        url: '{{route('admin.file.delete.selected.item')}}',
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "ids": ids,
                        },
                        success: function(response) {
                            console.log(response);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            } else {
                alert('Please select items to delete.');
            }
        });
    });
</script>

{{--copy image url link from file upload section--}}
<script>
    function copyUrl(e) {
        var url = $(e).data('url');
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(url).select();
        try {
            document.execCommand("copy");
            AIZ.plugins.notify('success', 'Link copied to clipboard');
        } catch (err) {
            AIZ.plugins.notify('danger', 'Oops, unable to copy');
        }
        $temp.remove();
    }
</script>


<script>
// start image select modal
$(document).on('click','.openImageModal', function(e) {
    e.preventDefault();
    var multiple = $(this).data('multiple');
    var inputName = $(this).data('inputname');

    if(multiple === true){
        var url ="{{ route('multipleSection') }}";
    }else{
        var url ="{{ route('singleSelection') }}";
    }
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            inputName: inputName
        },
        dataType: 'html',
        success: function(response) {
            $("div#common_modal").html(response).modal("show");
        },
        error: function(xhr, status, error) {
        console.error(error);
        }
    });
});
// end image select modal

$(document).on('submit', '#singleFileForm', function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    var actionValue = $('#singleFileForm').attr('action');
    var inputValue = $("input[name=input_name]").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: actionValue,
        dataType: "html",
        data: formData,
        success: function(data) {
            $('div#common_modal').modal('hide');
            $('#'+inputValue).html(data);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});

$(document).on('submit', '#multiFileForm', function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    var actionValue = $('#multiFileForm').attr('action');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: actionValue,
        dataType: "html",
        data: formData,
        success: function(data) {
            $('div#common_modal').modal('hide');
            $('#multipleImgData').html(data);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});


$(document).on('click', '.rmSingleimg', function(e) {
    e.preventDefault();
    $(this).closest('.imgs').remove();
});

$(document).on('click', '.rmMultipleImg', function(e) {
    e.preventDefault();
    $(this).closest('.imgs').remove();
});

</script>




