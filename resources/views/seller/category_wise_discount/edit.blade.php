
@extends('seller.layout.master')
@section('title','Add Product Page')
@section('body')
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom justify-content-between">
                <h3 class="card-title text-bold">Add New Digital Product</h3>
                <a href="{{route('category-wise-discount.index')}}" class="btn btn-primary my-1 mx-2 text-center">All Category</a>
            </div>
            <div class="card-body">
                <form class="" action="{{ route('category-wise-discount.update',$discount) }}" method="post" >
                    @csrf
                    @method('put')

                    <div class="row mb-4">

                        <label for="category"  class="col-md-3 form-label">Category Name <span class="text-danger">*</span></label>
                        <div class="col-md-9 form-group">
                            <select name="category_id" class="form-control select2 select2-show-search" data-placeholder="Select Category" id="category" required>

                                <option value="" disabled selected> -- Select Category --</option>
                                @forelse($parent_categories as $parent_category)
                                        <?php
                                            $dashes = '';
                                        ?>

                                        @for ($i=1; $i<=$parent_category->level; $i++)

                                            <?php
                                                $dashes = str_repeat('-', $i);
                                            ?>
                                        @endfor
                                    <option value="{{$parent_category->id}}" {{ $parent_category->id == $parent_category->id ? 'selected' : '' }}>{{$dashes}} {{$parent_category->name}} </option>
                                @empty
                                <option class="text-center text-danger"> --No Category--</option>
                                @endforelse
                            </select>
                            <b><span class="text-danger">{{$errors->first('category_id')}}</span></b>
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for=""  class="col-md-3 form-label">Discount(%)<span class="text-danger">*</span></label>
                        <div class="col-md-9">

                            <input class="form-control" value="{{ $discount->discount }}" name="discount" id="" placeholder="Number" type="number" min="0" required/>

                            <b><span class="text-danger">{{$errors->first('discount')}}</span></b>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for=""  class="col-md-3 form-label">Discount Date Range<span class="text-danger">*</span></label>
                        <div class="col-md-9">

                            <input class="form-control" value="{{$discount->discount_date_range}}" name="datefilter" id=""type="text" placeholder="Select Date" required/>

                            <b><span class="text-danger">{{$errors->first('datefilter')}}</span></b>
                        </div>
                    </div>
                    <div class="row mb-4 d-flex form-group">
                        <div class="col-md-3">
                            <label class="form-label" for="type">Status</label>
                        </div>
                        <div class="col-md-9">
                            <div class="material-switch">
                                <input id="feature_product" value="1" name="status" {{ $discount->status == 1 ? 'checked' : '' }} type="checkbox"/>
                                <label for="feature_product" class="label-primary"></label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="submit">Submit</button>
                </form>
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
