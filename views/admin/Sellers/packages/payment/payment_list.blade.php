@extends('admin.master')
@section('title','Product page')
@section('body')

    <div class="row mt-5">
        <div class="col">
            <div class="card">

                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Seller Order Package Lists</h3>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Transition ID</th>
                                <th class="border-bottom-0">Photo</th>
                                <th class="border-bottom-0">User Name </th>
                                <th class="border-bottom-0">Package </th>
                                <th class="border-bottom-0">Order Status</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($payments as $id => $payment)
                                <tr>
                                    <td>{{ $id+1 }}</td>
                                    <td>{{$payment->transition_id  ?? "N/A"}}</td>
                                    <td>
                                        <img width="100" height="100" src="{{ url('uploads/sellers/offline_payment/',$payment->photo)}}" alt="image">
                                    </td>
                                    <td>{{$payment->user->name ?? "N/A"}}</td>
                                    <td>{{$payment->name ?? "N/A"}}</td>
                                    <td>
                                        <form action="{{route('seller.payment.status',$payment->id)}}" method="post">
                                            @csrf
                                            <select name="status" class="form-control d-flex {{$payment->status == 1 ? 'bg-success-transparent':'bg-primary text-white'}}" onchange="this.form.submit()" id="">
                                                <option disabled >choose one</option>
                                                <option value="1" {{$payment->status == 1 ? 'selected':''}}>Approved</option>
                                                <option value="0" {{$payment->status == 0 ? 'selected':''}}>Pending</option>
                                            </select>
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
{{ $payments->links() }}
@endsection


