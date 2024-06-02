
@extends('seller.Layout.master')
@section('title','Digital Product page')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold"> Category Wise Discount </h3>
                    <a href="{{route('category-wise-discount.create')}}" class="btn btn-primary my-1 text-center">+ADD</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Discount(%)</th>
                                <th class="border-bottom-0">Discount Date Range</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($discounts as $key =>$discount)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$discount->category->name ?? ''}}</td>
                                        <td>{{$discount->discount}}</td>
                                        <td>{{$discount->discount_date_range}}</td>
                                        <td class="d-flex">

                                            <a href="{{route('category-wise-discount.edit', $discount->id)}}" class="btn btn-success btn-sm me-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{route('category-wise-discount.delete', $discount->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?');">
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
@push('js')
<script type="text/javascript">
    $(function() {

      $('input[name="datefilter"]').daterangepicker({
          autoUpdateInput: false,
          locale: {
              cancelLabel: 'Clear'
          }
      });

      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      });

      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

    });
    </script>

@endpush





