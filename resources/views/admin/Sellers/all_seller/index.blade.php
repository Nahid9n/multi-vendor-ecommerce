@extends('admin.master')
@section('title','Seller page')
@section('body')

    <div class="row mt-5">
        <div class="col">
            <div class="card">

                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Seller Verify Table</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Email </th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Profile Varified</th>
                                <th class="border-bottom-0">Status </th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $id => $user)
                                <tr>
                                    <td>{{ $id+1 }}</td>
                                    <td>{{  $user->email ?? "N/A"}}</td>
                                    <td>{{  $user->name ?? "N/A"}}</td>
                                    <td>
                                        @if ($user->profile_verified == 1)
                                            <span class="bg-primary badge">Verified</span>
                                        @elseif($user->profile_verified == 0)
                                            <span class="bg-warning badge">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('admin.seller.status.change',$user->id)}}" method="post">
                                            @csrf
                                            <select name="status" class="form-control d-flex {{$user->status == 1 ? 'bg-success-transparent':'bg-success text-white'}}" onchange="this.form.submit()" id="">
                                                <option value="" disabled >choose one</option>
                                                <option value="1" {{$user->status == 1 ? 'selected':''}}>Active</option>
                                                <option value="0" {{$user->status == 0 ? 'selected':''}}>Inactive</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="d-flex">

                                         <a class="btn btn-info me-1" href="{{ route('seller.verify.profile',$user->id) }}">Profile</a>

                                        <form action="{{route('seller.delete', $user->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" onclick="" class="btn btn-danger me-1">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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


