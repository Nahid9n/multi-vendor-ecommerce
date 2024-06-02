@extends('admin.master')
@section('title','Seller page')
@section('body')

    <div class="row mt-5">
        <div class="col">
            <div class="card">

                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">All Seller Table</h3>
                    <a href="{{route('seller.create')}}" class="btn btn-primary my-1 text-center">+ADD</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Email </th>
                                <th class="border-bottom-0">Profile Varified</th>
                                <th class="border-bottom-0">Status</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $id => $user)
                                <tr>
                                    <td>{{ $id+1 }}</td>
                                    <td>{{  ucfirst($user->name) ?? "N/A"}}</td>
                                    <td>{{  $user->email ?? "N/A"}}</td>
                                    <td>
                                        @if ($user->profile_verified == 1)
                                            <span class="bg-primary badge">Verified</span>
                                        @elseif($user->profile_verified == 0)
                                            <span class="bg-warning badge">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="">
                                            <span class="bg-primary px-2 badge">{{$user->status == 1 ? 'Active': ''}}</span>
                                            <span class="bg-warning px-2 badge">{{$user->status == 0 ? 'Inactive': ''}}</span>
                                        </span>
                                    </td>
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


