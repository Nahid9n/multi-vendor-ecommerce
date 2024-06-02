@extends('seller.Layout.master')
@section('title', 'Purchage')
@section('body')
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom justify-content-between">
                <h3 class="card-title text-bold">Purchase Package List</h3>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                        <tr>

                            <th class="border-bottom-0">SL No</th>
                            <th class="border-bottom-0">Package</th>
                            <th class="border-bottom-0">Package Price</th>
                            <th class="border-bottom-0">Package Type</th>
                        </tr>
                        </thead>
                        <tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

