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
			$sku = '';
			foreach (explode(' ', $product_name) as $key => $value) {
				$sku .= substr($value, 0, 1);
			}

			$rand = rand(1,1000);
			$str = '';
			foreach ($combination as $key => $item){
				if($key > 0 ){
					$str .= '-'.str_replace(' ', '', $item);
					$sku .='-'.str_replace(' ', '', $item);
				}
				else{
					if($colors_active == 1){
						$color_name = \App\Models\Color::where('code', $item)->first()->name;
						$str .= $color_name;
						$sku .='-'.$color_name;
					}
					else{
						$str .= str_replace(' ', '', $item);
						$sku .='-'.str_replace(' ', '', $item);
					}
				}
			}
		@endphp
		@if(strlen($str) > 0)
			<tr class="variant">
				<td>
					<label for="" class="control-label">{{ $str }}</label>
				</td>
				<td>
					<input type="number" lang="en" name="price_{{ $str }}" value="1" min="1" step="1" class="form-control" placeholder="1" required>
				</td>
				<td>
					<input type="text" name="sku_{{ $str }}" value="{{ $str }}" class="form-control">
				</td>
				<td>
					<input type="number" lang="en" name="qty_{{ $str }}" value="10" min="1" step="1" class="form-control" required>
				</td>
				<td>
                    <div class="row mb-4">
                        <label for="" class="col-md-3 form-label">Image</label>
                        <div class="col-md-9 test_class">
                            <div class="input-group variantImg" data-bs-toggle="modal" id="image{{$rand}}" data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                </div>
                                <div class="form-control bannerFile-amount" id="image{{$rand}}FileAmount">Choose file</div>
                            </div>
                            <input type="hidden" id="image{{$rand}}ItemId" name="img_{{ $str }}">
                            <div class="row d-flex" id="image{{$rand}}Data">

                            </div>
                        </div>
                    </div>
				</td>
			</tr>
		@endif
	@endforeach
	</tbody>
</table>
@endif
