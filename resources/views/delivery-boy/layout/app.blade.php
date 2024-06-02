<!doctype html>
<html lang="en">

<head>

    <title>Ecommerce @yield('title')</title>

    @include('website.layout.style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> -->

    <style>

        .modal-pop-product h2{
            font-size: 20px;
            padding-top: 10px;
        }
        .modal-pop-product {
            display: none;
            position: fixed;
            z-index: 9999;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-pop-producth2 {
            font-size: 22px;
            padding: 10px 0;
        }

        .modal-pop-product .modal-body {
            margin-top: initial;
        }

        .modal-pop-product .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            max-width: 670px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        .modal-pop-product .modal-body a {
            color: #fff;
        }

        .modal-pop-product .modal-body button {
            width: initial;
        }

        .modal-pop-product .modal_close {
            color: black;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            right: 5px;
            position: relative;
        }

        .modal-pop-product .modal_close:hover,
        .modal-pop-product .modal_close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-pop-product .modal-header {
            padding: 2px 16px;
            color: white;
            display: flex;
            align-items: center;
        }

        .modal-pop-product.modal-body {
            padding: 2px 16px;
        }

        .modal-pop-product .modal-footer {
            padding: 2px 16px;
            color: white;
        }

        .modal-pop-product .modal-body input {
            width: 62px;
            border-right: none;
            border-left: none;
            border-radius: inherit;
            border-color: #0000004D;
        }

        .modal-pop-product .color_part,
        .modal-pop-product .size_part {
            align-items: center;
        }

        .modal-pop-product .price_div{
            text-align: left;
            padding-top: 14px;
        }

        .modal-pop-product .price_div p{
            font-size: 20px;
            line-height: 25px;
        }
    </style>
</head>

<body class="container-fluid">

{{--@if(\Request::route()->getName() == 'customer.login.page')--}}
@include('delivery-boy.layout.header')

@yield('body')

<!--footer-area start-->
@include('website.layout.footer')
<!--footer-area end-->

@include('website.layout.script')
<!-- Modal -->
<div class="modal fade" id="returnsProducts" tabindex="-1" aria-labelledby="returnsProductsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="returnsProductslLabel">Returns Reason</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">

                <form id="returnsProducts" method="post" action="">
                    <div class="form-group text-left">
                        <label for="exampleInputEmail1">Reason</label>
                        <textarea id="reason"></textarea>
                    </div>
                    <p id="error_msg" class="text-danger"></p>

                    <input type="hidden" name="seller_name" value="">
                    <input type="hidden" name="order_code" value="">
                    <input type="hidden" name="product" value="">
                    <input type="hidden" name="price" value="">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>

        </div>
    </div>
</div>

<div id="productPopzUpModal" class="modal-pop-product">

    <div class="modal-content" id="productPopUpModalBody"></div>

</div>

<script>


    $(document).ready(function(){
        $('.returnsProductsBtn').on("click", function(){

            let seller_name = 'test seller name';
            let order_code = "{{ (isset($total->order_number )? $total->order_number : '') }}";
            let product = $(this).closest('tr').find('td.product_id').text();
            let price = $(this).closest('tr').find('td.product_price').text();
            let seller_approval = '';
            let refund_status = '';


            $("input[name='order_code']").val(order_code);
            $("input[name='product']").val(product);
            $("input[name='price']").val(price);



        });

        let openAccountForm = document.getElementById('returnsProducts');

        openAccountForm.addEventListener('submit', function(e){
            e.preventDefault();
            $("#error_msg").hide();
            var reason = $("#reason").val();

            if(reason == null || reason == ''){
                $("#error_msg").text("This field is required");
                $("#error_msg").show();
                return false
            }

            $.ajax({
                url : "{{ route('order-return-submit') }}",
                type : 'post',
                data : {
                    "_token": "{{ csrf_token() }}",
                    'seller_name' : "",
                    'customer_id' : "{{ isset(auth()->user()->id) }}",
                    'order_code' : $("input[name='order_code']").val(),
                    'product' : $("input[name='product']").val(),
                    'price' : $("input[name='price']").val(),
                    'seller_approval' : '',
                    'refund_status' : '',
                    'reason' : $("#reason").val()
                },
                dataType : 'json',
                success : function(res){

                    if(res){
                        toastr.success('Requires sent successfully');
                    } else{
                        toastr.error('Requires sent failed');
                    }

                    setTimeout(function() {
                        window.location.href= "{{ route('customer.dashboard') }}";
                    }, 2000);



                }
            });
        });
    });



    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('success') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>

<script>
    $(document).ready(function(){
        $('.status_change').on('change', function(){
            var url = this.value;
            window.location.href= "/customer-dashboard/"+url;
        });
    });
</script>


<!-- see more click end -->
<script>

    $(document).ready(function(){
        $('#see_more').on('click', function(){
            $('#see_more').hide()
            $("#loader").show();

            var last_item = $('.itemss').find('.cart_item').last().attr('title');

            $.ajax({
                url : "{{ route('see-more-pagination') }}",
                type : 'get',
                data : {
                    "_token": "{{ csrf_token() }}",
                    "last_item" : last_item
                },
                dataType : 'html',
                success : function(res){

                    if(res){
                        $('.itemss').append(res);
                        $("#loader").hide();
                        $('#see_more').show();
                    }else{
                        $("#loader").hide();
                    }


                }
            });

        });
    });

</script>
<!-- see more click end -->
<!-- Product modal ajax -->
<script>

    $(document).ready(function(){
        var modal = document.getElementById("productPopzUpModal");
        window.onclick = function(e) {
            if (e.target == modal) {
                closeModal();
            }
        }
    });

    function productModal(id){
        $.ajax({
            url : "{{ route('product-modal-get') }}",
            type : 'get',
            data : {
                "_token": "{{ csrf_token() }}",
                "product_id" : id,
            },
            dataType : 'html',
            success : function(res){
                if(res){
                    $("#productPopUpModalBody").empty();
                    $("#productPopUpModalBody").append(res);
                    $("#productPopzUpModal").show();
                }
            }
        });

    }

    function closeModal(){
        $("#productPopzUpModal").hide();
    }

    $(document).on("click", ".addToWish", function (e) {
        e.preventDefault();

        var url = $(this).attr('href');

        $.ajax({
            url : url,
            type : "get",
            success: function(res){
                if(res.status === true){
                    $("#wishcount").text(res.message);
                    toastr.success('Item is Added in the wishlist');
                }else if(res.status === false){
                    toastr.error(res[0]);
                }else{
                    toastr.error('Please login first');
                }

            },
            error: function () {
                toastr.error('An error occurred. Please try again later.');
            }
        });
    });


    function increCount(a, b) {

        var input = b.previousElementSibling;
        var value = parseInt(input.value, 10);
        value = isNaN(value)? 0 : value;
        value ++;
        input.value = value;
    }

    function decreCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10);
        if (value > 1) {
            value = isNaN(value)? 0 : value;
            value --;
            input.value = value;
        }

    }

    function increaseCount(a, b) {

        var input = b.previousElementSibling;
        var value = parseInt(input.value, 10);
        value = isNaN(value)? 0 : value;
        value ++;
        input.value = value;
        QtyChange(b.id, value);
    }

    function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10);
        if (value > 1) {
            value = isNaN(value)? 0 : value;
            value --;
            input.value = value;
            QtyChange(b.id, value);
        }

    }


    //all checked
    $('.all_select').on('click', function(){
        if ($('.all_select').is(':checked')){
            $(".cart_input").each(function(){
                $('.cart_input').prop('checked', true);
            });
        }else{
            $(".cart_input").each(function(){
                $('.cart_input').prop('checked', false);
            });
        }
    });

</script>
<!-- Product modal ajax end -->

<!-- chat ajax -->

<script>

    function openChat(data){
        $('#chatModal').modal('show');
    }


    function closeChatBox(){
        $('#chatModal').modal('hide');
    }

    $(".chatbox").scrollTop($(".chatbox")[0].scrollHeight);


    function seeMoreFilter(){

        var offset = $('.itemss').find('.cart_item').last().attr('title');

        var category = [];
        var brand = [];
        var size = [];
        var color = [];
        var maxPriceRange = [];

        $('.categoryCheckBox').each(function () {
            if (this.checked){
                category.push($(this).attr('id'));
            }
        });

        $('.brandCheckBox').each(function () {
            if (this.checked){
                brand.push($(this).attr('id'));
            }
        });

        $('.sizeCheckBox').each(function () {
            if (this.checked){
                size.push($(this).val());
            }
        });

        $('.colorCheckBox').each(function () {
            if (this.checked){
                color.push($(this).val());
            }
        });

        maxPriceRange.push($('#maxRange').text());

        var jsonData = {
            "category": category,
            "brand": brand,
            "size": size,
            "color": color,
            "maxPriceRange": maxPriceRange,
            "offset": offset,
        };

        var jsonString = JSON.stringify(jsonData);

        $.ajax({
            url : "{{ route('search.filter') }}",
            type : 'get',
            data : {
                'jsonString' : jsonString,
            },
            dataType : 'html',
            success : function(res){
                if(res == '0'){
                    $("#seeMoreBtn").hide();
                }else{
                }else{
                    $("#seeMoreBtn").show();
                }else{
                    $("#seeMoreBtn").show();
                    $('.itemss').append(res);
                    $("#seeMoreBtn").show();
                    $("#loader").hide();
                }

            }
        });



    }

    function filter(){

        var category = [];
        var brand = [];
        var size = [];
        var color = [];
        var maxPriceRange = [];

        $('.categoryCheckBox').each(function () {
            if (this.checked){
                category.push($(this).attr('id'));
            }
        });

        $('.brandCheckBox').each(function () {
            if (this.checked){
                brand.push($(this).attr('id'));
            }
        });

        $('.sizeCheckBox').each(function () {
            if (this.checked){
                size.push($(this).val());
            }
        });

        $('.colorCheckBox').each(function () {
            if (this.checked){
                color.push($(this).val());
            }
        });

        maxPriceRange.push($('#maxRange').text());

        var jsonData = {
            "category": category,
            "brand": brand,
            "size": size,
            "color": color,
            "maxPriceRange": maxPriceRange,
        };

        var jsonString = JSON.stringify(jsonData);

        $.ajax({
            url : "{{ route('search.filter') }}",
            type : 'get',
            data : {
                'jsonString' : jsonString,
            },
            dataType : 'html',
            success : function(res){
                if(res == '0'){
                    $("#seeMoreBtn").hide();
                    $('.itemss').text("Product not found");
                }else{
                    $('.itemss').html(res);
                    $("#seeMoreBtn").show();
                }
            }
        });

    }

</script>
<!-- chat ajax end -->

<script>
    $('input[type=range]').on('input', function () {
        var val = $("input[type=range]").val();
        $("#maxRange").text(val);
    });
</script>

<!--search on keyup -->
<script>

    function searchOnKeyUp(e){

        let length = e.value.length;

        if(length >= 3){
            $.ajax({
                url : "{{ route('search.onkey.up') }}",
                type : 'get',
                data : {

                },
                dataType : 'html',
                success : function(res){
                    alert("alert res");
                }
            });
        }
    }

</script>
<!--search on keyup end -->
<script src="https://kit.fontawesome.com/3970bded75.js" crossorigin="anonymous"></script>
</body>
</html>

