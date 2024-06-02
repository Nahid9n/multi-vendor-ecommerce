<script>
{{--slected item from file upload modal--}}
    $(document).ready(function(){

        $('.modal .close').click(function() {
            $(this).closest('.modal').hide();
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
