<?php if(count($combinations) > 0): ?>
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
	<?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php
			$sku = '';
			foreach (explode(' ', $product_name) as $key => $value) {
				$sku .= substr($value, 0, 1);
			}

			$str = '';
			$rand = rand(1,1000);
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
		?>
		<?php if(strlen($str) > 0): ?>
			<tr class="variant">
				<td>
					<label for="" class="control-label"><?php echo e($str); ?></label>
				</td>
				<td>
					<input type="number" lang="en" name="price_<?php echo e($str); ?>" value="1" min="1" step="1" class="form-control" placeholder="1" required>
				</td>
				<td>
					<input type="text" name="sku_<?php echo e($str); ?>" value="<?php echo e($str); ?>" class="form-control">
				</td>
				<td>
					<input type="number" lang="en" name="qty_<?php echo e($str); ?>" value="10" min="1" step="1" class="form-control" required>
				</td>
				<td>
					<div class="row mb-4">
						<div class="col-md-9 test_class">
							<div class="input-group openImageModal" data-multiple="false" data-inputname="img_<?php echo e($str); ?>">
								<div class="input-group-prepend">
									<div class="input-group-text bg-soft-secondary font-weight-medium">Browse File </div>
								</div>
							</div>

							<div class="row d-flex" id="img_<?php echo e($str); ?>"> </div>
							<b><span class="text-danger"><?php echo e($errors->first('product_image')); ?></span></b>
						</div>
					</div>
				</td>
			</tr>
		<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
<?php endif; ?>
<?php /**PATH D:\NAHID\seo_multivendor_ecommerce\resources\views/admin/product/product_all/sku_combinations.blade.php ENDPATH**/ ?>