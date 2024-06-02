@extends('seller.Layout.master')
@section('title','Profile Verfiy')
@section('body')
<div class="row mt-5">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header border-bottom justify-content-between">
                <h3 class="card-title text-bold"> Seller Shop Verify Form</h3>
                <a href="{{route('seller.dashboard')}}" class="btn btn-primary my-1 mx-2 text-center  text-bold">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.verify') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @foreach ($verify_fields as $field)
                    <div class="row mb-4" id="">
                        <label for="" class="col-md-3 form-label  text-bold">{{ ucfirst($field->label) }} <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" value="" name="{{ Str::lower($field->label) }}" id="" placeholder="{{ $field->label }}" type="{{$field->type}}" required/>
                            <b><span>{{$errors->first(Str::lower($field->label))}}</span></b>
                        </div>
                    </div>
                    @endforeach

                    @foreach ($radios as $radio)
                    <div class="row mb-4" id="">
                        <label for="" class="col-md-3 form-label  text-bold">{{ ucfirst($radio->label) }} <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            @php
                                $values = json_decode($radio->value)
                            @endphp
                                @foreach ($values as $value)
                            <input type="{{ $radio->type }}" name="{{ Str::lower($radio->label) }}" value="{{ Str::lower($value) }}">{{ Str::upper($value) }}
                                @endforeach
                         <b><span>{{$errors->first(Str::lower($field->label))}}</span></b>
                        </div>
                    </div>

                    @endforeach

                    @foreach ($multi_selects as $select)
                    <div class="row mb-4" id="">
                        <label for="" class="col-md-3 form-label text-bold">{{ $select->label }} <span class="text-danger">*</span></label>
                        <div class="col-md-9 form-group">
                            <select name="{{  Str::lower($select->label) }}[]" class="form-control select2 select2-show-search" id="" multiple="multiple" data-placeholder="Nothing Selected" required>
                                @php
                                    $values = json_decode($select->value)
                                @endphp
                                @foreach ($values as $value)
                                   <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                                @endforeach
                            </select>
                            <b><span>{{$errors->first(Str::lower($select->label))}}</span></b>
                        </div>
                    </div>
                    @endforeach
                    @foreach ($selects as $select)
                    <div class="row mb-4" id="">
                        <label for="" class="col-md-3 form-label text-bold">{{ $select->label }} <span class="text-danger">*</span></label>
                        <div class="col-md-9 form-group">
                            <select name="{{  Str::lower($select->label) }}" class="form-control select2 select2-show-search" data-placeholder="Nothing Selected" id="" required>
                                @php
                                    $values = json_decode($select->value)
                                @endphp
                                @foreach ($values as $value)
                                   <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                                @endforeach
                            </select>
                            <b><span>{{$errors->first(Str::lower($select->label))}}</span></b>
                        </div>
                    </div>
                    @endforeach

                    @foreach ($files as $field)
                    <div class="row mb-4" id="">
                        <label for="" class="col-md-3 form-label  text-bold">{{ ucfirst($field->label) }} <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input class="form-control" value="" name="{{ Str::lower($field->label) }}" id="" type="{{$field->type}}" required/>
                            <b><span class="text-danger">{{$errors->first(Str::lower($field->label))}}</span></b>
                        </div>
                    </div>
                    @endforeach

                    <button class="btn btn-primary float-end" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
