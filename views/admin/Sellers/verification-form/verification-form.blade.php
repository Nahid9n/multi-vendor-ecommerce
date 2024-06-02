@extends('admin.master')
@section('title','Seller Verification Form')
@section('body')
    <div class="col-sm-12 my-2">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Seller Verification Form</h5>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 form-horizontal" >
                            <div class="">
                                <form class="" action="{{route('seller.verification.form.fields')}}" method="post">
                                    @csrf
                                    <div class="bg-success-transparent" id="form">

                                    </div>
                                </form>
                            </div>
                            @foreach($fields as $field)
                                <div class="row my-1" style="background:rgba(0,0,0,0.1);padding:10px 0;">
                                    <form action="{{route('seller.verification.form.fields.update',$field->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="type" value="{{$field->type}}">
                                        <div class="col-lg-2">
                                            <label class="col-from-label">{{$field->type}}</label>
                                        </div>
                                        <div class="col-lg-7">
                                            <p>
                                                <input class="form-control" type="text" name="label" value="{{$field->label}}" placeholder="Label">
                                            </p>
                                            <div class="">
                                                <div class="my-2">
                                                    @if($field->value != 'null')
                                                        @foreach(json_decode($field->value) as $key=>$value)
                                                            @if($value != null)
                                                                <label for="value">Option {{$loop->iteration}}</label>
                                                                <input class="form-control w-75" id="value{{$key}}" type="text" name="value[]" value="{{$value}}" placeholder="">
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="customer_choice_options_types_wrap_child">

                                                </div>
                                                @if($field->type == 'select')
                                                    <button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>
                                                @elseif($field->type == 'multi_select')
                                                    <button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>
                                                @elseif($field->type == 'radio')
                                                    <button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" onclick="return confirm('are you sure to update ?')" class="btn mx-1 btn-sm btn-success"><i class="fa fa-check-circle-o"></i></button>
                                    </form>
                                    <div class="col-lg-3 d-flex">
                                        <form action="{{route('seller.verification.form.fields.delete',$field->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('are you sure to update ?')" class="btn mx-1 btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="col-lg-4">
                            <ul class="list-group " id="buttons">
                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('text')">Text Input</li>
                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('select')">Select</li>
                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('multi-select')">Multiple Select</li>
                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('radio')">Radio</li>
                                <li class="list-group-item btn" style="text-align: left;" onclick="appenddToForm('file')">File</li>
                            </ul>

                        </div>
                    </div>


            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">

    var i = 0;

    function add_customer_choice_options(em){
        var j = $(em).closest('.form-group.row').find('.option').val();

        var str = '<div class="form-group row">'
            +'<div class="col-sm-6 col-sm-offset-4">'
            +'<input class="form-control" type="text" name="value[]" value="" placeholder="enter option name" required>'
            +'</div>'
            +'<div class="col-sm-2"><span class="btn btn-icon text-danger btn-circle icon-lg" onclick="delete_choice_clearfix(this)"><i class="fa fa-trash-o"></i></span>'
            +'</div>'
            +'</div>'
        $(em).parent().find('.customer_choice_options_types_wrap_child').append(str);
    }
    function delete_choice_clearfix(em){
        $(em).parent().parent().remove();
        $("#buttons .list-group-item").each(function(){
            $('.list-group-item').removeClass('disabled');
        });
    }
    function delete_choice_clearfix_single(em){
        $(em).parent().remove();
    }
    function appenddToForm(type){
        //$('#form').removeClass('seller_form_border');
        $("#buttons .list-group-item").each(function(){
            $('.list-group-item').addClass('disabled');
        });
        if(type == 'text'){
            var str = '<div class="form-group p-3 row" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                +'<input type="hidden" name="type" value="text">'
                +'<div class="col-lg-3">'
                +'<label class="col-from-label">Text</label>'
                +'</div>'
                +'<div class="col-lg-7">'
                +'<input class="form-control" type="text" name="label" placeholder="Label" required>'
                +'</div>'
                +'<div class="col-lg-2">'
                +'<span class="btn my-1 btn-danger btn-sm" onclick="delete_choice_clearfix(this)"><i class="fa fa-trash-o"></i></span>'
                +'</div>'
                +'<div class="form-group mb-0 text-right">'
                +'<button type="submit" class="btn btn-primary">Save</button>'
                +'</div>'
                +'</div>';
            $('#form').append(str);
        }
        else if (type == 'select') {
            var str = '<div class="form-group p-3 row" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                +'<input type="hidden" name="type" value="select">'
                +'<div class="col-lg-3">'
                +'<label class="col-from-label">Select</label>'
                +'</div>'
                +'<div class="col-lg-7">'
                +'<input class="form-control" type="text" name="label" placeholder="Select Label" style="margin-bottom:10px" required>'
                +'<div class="customer_choice_options_types_wrap_child">'

                +'</div>'
                +'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
                +'</div>'
                +'<div class="col-lg-2">'
                +'<span class="btn my-1 btn-danger btn-sm" onclick="delete_choice_clearfix(this)"><i class="fa fa-trash-o"></i></span>'
                +'</div>'
                +'<div class="form-group mb-0 text-right">'
                +'<button type="submit" class="btn btn-primary">Save</button>'
                +'</div>'
                +'</div>';
            $('#form').append(str);
        }
        else if (type == 'multi-select') {

            var str = '<div class="form-group p-3 row" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                +'<input type="hidden" name="type" value="multi_select">'
                +'<div class="col-lg-3">'
                +'<label class="col-from-label">Multiple select</label>'
                +'</div>'
                +'<div class="col-lg-7">'
                +'<input class="form-control" type="text" name="label" placeholder="Multiple Select Label" style="margin-bottom:10px" required>'
                +'<div class="customer_choice_options_types_wrap_child">'

                +'</div>'
                +'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
                +'</div>'
                +'<div class="col-lg-2">'
                +'<span class="btn my-1 btn-danger btn-sm" onclick="delete_choice_clearfix(this)"><i class="fa fa-trash-o"></i></span>'
                +'</div>'
                +'<div class="form-group mb-0 text-right">'
                +'<button type="submit" class="btn btn-primary">Save</button>'
                +'</div>'
                +'</div>';
            $('#form').append(str);
        }
        else if (type == 'radio') {

            var str = '<div class="form-group p-3 row" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                +'<input type="hidden" name="type" value="radio">'
                +'<div class="col-lg-3">'
                +'<label class="col-from-label">Radio</label>'
                +'</div>'
                +'<div class="col-lg-7">'
                +'<div class="customer_choice_options_types_wrap_child">'
                +'<input class="form-control" type="text" name="label" placeholder="Radio Label" style="margin-bottom:10px" required>'

                +'</div>'
                +'<button class="btn btn-success pull-right" type="button" onclick="add_customer_choice_options(this)"><i class="glyphicon glyphicon-plus"></i> Add option</button>'
                +'</div>'
                +'<div class="col-lg-2">'
                +'<span class="btn my-1 btn-danger btn-sm" onclick="delete_choice_clearfix(this)"><i class="fa fa-trash-o"></i></span>'
                +'</div>'
                +'<div class="form-group mb-0 text-right">'
                +'<button type="submit" class="btn btn-primary">Save</button>'
                +'</div>'
                +'</div>';
            $('#form').append(str);
        }
        else if (type == 'file') {
            var str = '<div class="form-group p-3 row" style="background:rgba(0,0,0,0.1);padding:10px 0;">'
                +'<input type="hidden" name="type" value="file">'
                +'<div class="col-lg-3">'
                +'<label class="col-from-label">File</label>'
                +'</div>'
                +'<div class="col-lg-7">'
                +'<input class="form-control" type="text" name="label" placeholder="Label" required>'
                +'</div>'
                +'<div class="col-lg-2">'
                +'<span class="btn my-1 btn-danger btn-sm" onclick="delete_choice_clearfix(this)"><i class="fa fa-trash-o"></i></span>'
                +'</div>'
                +'<div class="form-group mb-0 text-right">'
                +'<button type="submit" class="btn btn-primary">Save</button>'
                +'</div>'
                +'</div>';
            $('#form').append(str);
        }
    }
</script>
