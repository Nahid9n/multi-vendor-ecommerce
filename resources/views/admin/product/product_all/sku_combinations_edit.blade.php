@if(count($combinations) > 0)
<table class="table table-bordered aiz-table">
    <thead>
        <tr>
            <td class="text-center">
            Variant
            </td>
            <td class="text-center">
            Variant Price
            </td>
            <td class="text-center" data-breakpoints="lg">
            SKU
            </td>
            <td class="text-center" data-breakpoints="lg">
            Quantity
            </td>
            <td class="text-center" data-breakpoints="lg">
            Photo
            </td>
        </tr>
    </thead>
    <tbody>

        @foreach ($combinations as $key => $combination)
            @php
                $variation_available = false;
                $sku = '';
                foreach (explode(' ', $product_name) as $key => $value) {
                    $sku .= substr($value, 0, 1);
                }

                $str = '';
                $rand = rand(1,1000);
                foreach ($combination as $key => $item){
                    if($key > 0 ) {
                        $str .= '-'.str_replace(' ', '', $item);
                        $sku .='-'.str_replace(' ', '', $item);
                    }
                    else {
                        if($colors_active == 1) {
                            $color_name = \App\Models\Color::where('code', $item)->first()->name;
                            $str .= $color_name;
                            $sku .='-'.$color_name;
                        }
                        else {
                            $str .= str_replace(' ', '', $item);
                            $sku .='-'.str_replace(' ', '', $item);
                        }
                    }
                    $stock = $product->stocks->where('variant', $str)->first();

                }
            @endphp
            @if(strlen($str) > 0)
            <tr class="variant">
                <td>
                    <label for="" class="control-label">{{ $str }}</label>
                </td>
                <td>
                    <input type="number" lang="en" name="price_{{ $str }}" value="@php
                            if ($product->unit_price == $unit_price) {
                                if($stock != null){
                                    echo $stock->price;
                                }
                                else {
                                    echo $unit_price;
                                }
                            }
                            else{
                                echo $unit_price;
                            }
                           @endphp" min="1" step="1" class="form-control" placeholder="1" required>
                </td>
                <td>
                    <input type="text" name="sku_{{ $str }}" value="@php
                            if($stock != null) {
                                echo $stock->sku;
                            }
                            else {
                                echo $str;
                            }
                           @endphp" class="form-control">
                </td>
                <td>
                    <input type="number" lang="en" name="qty_{{ $str }}" value="@php
                            if($stock != null){
                                echo $stock->qty;
                            }
                            else{
                                echo '10';
                            }
                           @endphp" min="1" step="1" class="form-control" required>
                </td>

                <td>
					<div class="row mb-4">
						<div class="col-md-9 test_class">
							<div class="input-group openImageModal" data-multiple="false" data-inputname="img_{{ $str }}">
								<div class="input-group-prepend">
									<div class="input-group-text bg-soft-secondary font-weight-medium">Browse File </div>
								</div>
							</div>

							<div class="row d-flex" id="img_{{ $str }}"> </div>
							<div class="position-relative d-flex">
                                    <div class="imgs m-1">
                                        @if(isset($product->product_image))
                                            <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset($stock->image)}}" alt="">
                                        @endif
                                    </div>
                                </div>
						</div>
					</div>
				</td>
            @endif
        @endforeach

    </tbody>
</table>
@endif
