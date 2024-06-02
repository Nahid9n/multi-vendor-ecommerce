@extends('website.layout.app')
@section('title','Dashboard')
@section('body')

<style>
    .status_change {
        border: 1px solid #dee2e6;
        padding: 10px 6px;
        margin-bottom: 13px;
    }

    .form-group select {
        background: #fff;
        border: 1px solid #e2e9e1;
        height: 45px;
        -webkit-box-shadow: none;
        box-shadow: none;
        padding-left: 20px;
        font-size: 13px;
        color: #1a1a1a;
        width: 100%;
    }

    .btn-sm {
        padding: 2px 6px !important;
    }
    
    .table tr td a{
        color: #1a1a1a;
        font-weight: bold;
    }
    .table tr:hover{
        background: #0000000d;
        transition: 0.2s;
        color: ;
    }
    .table tr td a:hover{
        background: #0000000d;
        transition: 0.2s;
        color: red;
        text-decoration: none;
        background: transparent;
    }
    .table td, .table th{
        border-color: transparent;
        border-bottom: 1px solid #00000024;
    }

    .message_text{
        padding: 0;
        margin: 0;
        font-size: 15px;
    }

    .message_time{
        padding: 0;
        margin: 0;
        font-size: 10px;
        margin-bottom: 15px;
        font-style: italic;
    }

    .chatbox{
        height: 500px;
        overflow: auto;
    }
</style>

<div class="page-header breadcrumb-wrap mt-5">
    <div class="container">
        <div class="breadcrumb">
            <a href="" rel="nofollow">Home</a>
            <span class="mx-2"> Customer</span>
            <span> Dashboard</span>
        </div>
    </div>
</div>

<section class="pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="dashboard-menu">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('customer.dashboard') }}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="con-tab" data-bs-toggle="tab" href="#con" role="tab" aria-controls="con"><i class="fi-rs-settings-sliders mr-10"></i>Conversations</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content dashboard-content">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Conversations With {{ $conversation[0]->receiver->name }}</h5>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            <div class="col-lg-12 chatbox">
                                                
                                                @foreach($conversation as $con)
                                                <p class="message_text {{ (auth()->user()->id == $con->sender_id)? "text-right" : "text-left" }}">{{ $con->message }}</p>
                                                <p class="message_time {{ (auth()->user()->id == $con->sender_id)? "text-right" : "text-left" }}">{{ $con->created_at }}</p>
                                                @endforeach

                                               <form action="{{ route('send.message') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="conversation_id" value="{{ $conversation_id }}">
                                                    <input type="hidden" name="sender_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="receiver_id" value="{{ $conversation[0]->receiver->id }}">
                                                    <textarea name="message"></textarea>
                                                    <button class="btn float-right" type="submit">Send</button>
                                               </form>

                                               
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection