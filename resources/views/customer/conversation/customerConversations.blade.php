@extends('customer.layout')
@section('title', 'Customer Order')
@section('content')


<div class="col-md-8">
    <div class="tab-content dashboard-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h5>Conversations</h5>
                    <small>Select a conversation to view all messages</small>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @foreach($conversation as $con)
                            <tr>
                                <td>
                                    <a href="{{ route('converstation.details', $con->id) }}">{{ $con->user->name }}</a>
                                    <br>
                                    <small class="text-sm">{{date_format($con->created_at,'d M, Y h:m a')}}</small>
                                </td>
                                <td><a href="{{ route('converstation.details', $con->id) }}">{{ $con->header }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
