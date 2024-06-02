@extends('website.layout.app')
@section('title','Home Page')

@section('body')

@if(\Request::route()->getName() == 'home')

<!--slider-section start-->
@include('website.layout.slider')
<!--slider-section end-->

<!--banner section start-->
@include('website.layout.banner')
<!--banner section end-->

@endif

@endsection
