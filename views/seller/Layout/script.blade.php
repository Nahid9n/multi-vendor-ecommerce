
<!-- JQUERY JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{-- select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- date piker --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- BOOTSTRAP JS -->
<script src="{{asset('/')}}seller/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- SIDE-MENU JS -->
<script src="{{asset('/')}}seller/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{asset('/')}}seller/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/p-scroll/pscroll.js"></script>

<!-- STICKY JS -->
<script src="{{asset('/')}}seller/assets/js/sticky.js"></script>

<!-- APEXCHART JS -->
<script src="{{asset('/')}}seller/assets/js/apexcharts.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{asset('/')}}seller/assets/plugins/circle-progress/circle-progress.min.js"></script>

<!-- INTERNAL DATA-TABLES JS-->
<script src="{{asset('/')}}seller/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/dataTables.responsive.min.js"></script>

<!-- INDEX JS -->
<script src="{{asset('/')}}seller/assets/js/index1.js"></script>
<script src="{{asset('/')}}seller/assets/js/index.js"></script>

<!-- Reply JS-->
<script src="{{asset('/')}}seller/assets/js/reply.js"></script>

<!-- COLOR THEME JS -->
<script src="{{asset('/')}}seller/assets/js/themeColors.js"></script>


<!-- FORM ELEMENTS JS -->
<script src="{{asset('/')}}seller/assets/js/formelementadvnced.js"></script>

<!-- CUSTOM JS -->
<script src="{{asset('/')}}seller/assets/js/custom.js"></script>

<!--Internal Fileuploads js-->
<script src="{{asset('/')}}seller/assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/fileuploads/js/file-upload.js"></script>

<!--Internal Fancy uploader js-->
<script src="{{asset('/')}}seller/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/fancyuploder/fancy-uploader.js"></script>
<script src="{{asset('/')}}admin/assets/file-upload/fileupload.js"></script>

<!-- SWITCHER JS -->
<script src="{{asset('/')}}seller/assets/switcher/js/switcher.js"></script>

{{-- Success or fail message--}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>


{{-- toastr js  --}}

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}


@stack('js')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>


{{-- <script>
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

<script>
    function setSubCategory(id) {
        $.ajax({
            type: "GET",
            url: "{{route('get-sub-category-by-category')}}",
            data:{id: id},
            dataType: "JSON",
            success: function (response) {
                var option = '';
                option += '<option value="" disabled selected> -- Select Sub Category -- </option>';
                $.each(response, function (key, value) {
                    option += '<option value="'+value.id+'"> '+value.name+' </option>';
                });
                $('#subCategoryId').empty();
                $('#subCategoryId').append(option);
            }
        });
    }
</script> --}}

<!-- DATA TABLE JS-->
<script src="{{asset('/')}}seller/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}seller/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script src="{{asset('/')}}seller/assets/js/table-data.js"></script>

<!-- TABLE EDITS JS-->
<script src="{{ asset('/') }}seller/assets/plugins/jQuery-table-edits/table-edits.min.js"></script>
<script src="{{ asset('/') }}seller/assets/plugins/jQuery-table-edits/table-edits.js"></script>

<!-- INTERNAL DATATABLES JS -->
<script src="{{ asset('/') }}seller/assets/js/table-editable.js"></script>
<!-- SELECT2 JS -->
{{-- <script src="{{asset('/')}}seller/assets/plugins/select2/select2.full.min.js"></script>

<!-- SELECT2 JS -->
<script src="{{ asset('/') }}seller/assets/plugins/select2/select2.full.min.js"></script> --}}

<!-- Internal Input tags js-->
<script src="{{ asset('/') }}seller/assets/plugins/inputtags/inputtags.js"></script>

<!-- Bootstrap-Date Range Picker js-->
<script src="{{ asset('/') }}seller/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<!-- jQuery UI Date Picker js -->
<script src="{{ asset('/') }}seller/assets/plugins/date-picker/jquery-ui.js"></script>

<!-- bootstrap-datepicker js (Date picker Style-01) -->
<script src="{{ asset('/') }}seller/assets/plugins/bootstrap-datepicker/js/datepicker.js"></script>

<!-- Amaze UI Date Picker js-->
<script src="{{ asset('/') }}seller/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

<!-- Simple Date Time Picker js-->
<script src="{{ asset('/') }}seller/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

<!-- INTERNAL Summernote Editor js -->
<script src="{{asset('/')}}seller/assets/plugins/summernote-editor/summernote1.js"></script>
<script src="{{asset('/')}}seller/assets/js/summernote.js"></script>

<script src="{{asset('/')}}admin/assets/file-upload/fileupload.js"></script>
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
    });
</script>
