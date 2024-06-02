<script>
{{--slected item from file upload modal--}}
    $(document).ready(function(){

        $('.modal .close').click(function() {
            $(this).closest('.modal').hide();
        });

        $('#singleSaveSelection').click(function() {
            var selectedIds = [];
            $('.singleChecked:checked').each(function() {
                selectedIds.push($(this).val());
            });
            var fileSelected = selectedIds.length;
            var dynamicId = $('#singleImg').data('dynamicId');

            if(dynamicId == dynamicId){
                $('#' + dynamicId + 'Data').html('');
            }

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.file.save.selection.single') }}',
                dataType: "html",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "selectedIds": selectedIds,
                },
                success: function (data) {
                    $('#' + dynamicId + 'Data').html(data);
                    $('#' + dynamicId + 'ItemId').val(selectedIds);
                    $('#singleImg').modal('hide');
                    $('#' + dynamicId + 'FileAmount').html(fileSelected + " <span class='text-center'>files Selected</span>");
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('#mulitpleSaveSelection').click(function() {
            var selectedIds = [];
            $('.singleChecked:checked').each(function() {
                selectedIds.push($(this).val());
            });
            var fileSelected = selectedIds.length;
            var dynamicId = $('#multipleImg').data('dynamicId');
            if(dynamicId == dynamicId){
                $('#' + dynamicId + 'Data').html('');
            }

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.file.save.selection.multiple') }}',
                dataType: "html",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "selectedIds": selectedIds,
                },
                success: function (data) {
                    console.log(dynamicId);
                    $('#' + dynamicId + 'Data').html(data);
                    $('#' + dynamicId + 'ItemId').val(selectedIds);
                    $('#' + dynamicId + 'FileAmount').html(fileSelected + " <span class='text-center'>files Selected</span>");
                    $('#multipleImg').modal('hide');
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $(document).on('click', '.rmSingleimg', function(e) {
            e.preventDefault();
            var dynamicId = $(this).closest('.test_class').find('.singleFile').attr('id');
            var originalString = $('#' + dynamicId + 'ItemId').val('');
            var fileSelected = 0;
            $('#' + dynamicId + 'FileAmount').html(fileSelected + " <span class='text-center'>files Selected</span> ");
            $(this).closest('.imgs').remove();
        });

        $(document).on('click', '.rmMultipleImg', function(e) {
            e.preventDefault();
            var dynamicId = $(this).closest('.test_class').find('.multipleFile').attr('id');
            var id = $(this).id;
            var originalString = $('#' + dynamicId + 'ItemId').val();
            var idss = originalString.split(",");
            let index = idss.indexOf(id);
            idss.splice(index, 1);
            $('#' + dynamicId + 'ItemId').val(idss);
            var fileSelected = idss.length;
            $('#' + dynamicId + 'FileAmount').html(fileSelected+" <span class='text-center'>files Selected</span> ");
            $(this).closest('.imgs').remove();
        });

        // load of all files
        getAllFiles();

        // Function to fetch all files
        function getAllFiles(page = 1) {
            $.ajax({
                type: 'GET',
                url: "{{ route('admin.file.items') }}",
                dataType: 'html',
                data: {
                    page: page
                },
                success: function(data) {
                    $('#ajax_data').html(data);
                    $('#ajax_datamul').html(data);
                    updatePaginationLinks();
                }
            });
        }

        // Function to fetch filtered data
        function getFilteredData(sort = null, page = 1) {
            var sortItemUrl = "{{ route('admin.file.sort.item') }}";
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
                    $('#ajax_datamul').html(data);
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
                var sort = "{{ $sortValue }}";
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
                    url: "{{route('admin.file.search')}}",
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
