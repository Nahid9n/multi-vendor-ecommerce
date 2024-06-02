<?php
use App\Http\Controllers\Admin\AuctionProductController;
use App\Http\Controllers\Admin\AuctionProductTypeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Seller\CategoryWiseDiscountController;
use App\Http\Controllers\Seller\CouponController;
use App\Http\Controllers\Seller\PackageController;
use App\Http\Controllers\Seller\SellerDigitalProductController;
use App\Http\Controllers\Seller\SellerPackage;
use App\Http\Controllers\Seller\PackagePurchageController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Admin\WholeSaleProductController;
use App\Http\Controllers\Admin\WholeSaleProductTypeController;
use App\Http\Controllers\Seller\SellerDashboard;
use App\Http\Controllers\Seller\SellerProductQueriesController;
use App\Http\Controllers\Seller\SellerTicketController;
use App\Http\Controllers\Seller\SellerWholeSaleProductController;
use App\Http\Controllers\Seller\ShopSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\DeliveryBoyController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\website\WebsiteController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Admin\AdminSalesController;
use App\Http\Controllers\Admin\WebsiteSliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\FeatureActivationController;
use App\Http\Controllers\Admin\RefundController;
use App\Http\Controllers\Admin\SellerFormVerificationController;
use App\Http\Controllers\Admin\DigitalCategoryController;
use App\Http\Controllers\Admin\PhysicalCategoryController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\CustomerClassifiedPackageController;
use App\Http\Controllers\Admin\SellerPackageController;
use App\Http\Controllers\Admin\SellerCommissionController;
use App\Http\Controllers\FileUploadSelectionController;
use App\Http\Controllers\Wishlist;
use App\Http\Controllers\Admin\ProductQueriesController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DeliveryBoy\DeliveryBoyDashboardController;
use App\Http\Controllers\DeliveryBoy\DeliveryBoyAccountController;
use App\Http\Controllers\Seller\SellerOrderController;
use App\Http\Controllers\DeliveryBoy\DeliveryBoyOrderController;
use App\Http\Controllers\DeliveryBoy\DeliveryBoyPaymentController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\SellerPaymentController;
use App\Http\Controllers\VendorWalletController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\CouponManageController;
use App\Http\Controllers\BlogCommentController;
use Illuminate\Support\Facades\Auth;

Route::get('/customer-login', [CustomerAuthController::class, 'index'])->name('customer.login.page');
Route::post('/customer-login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::get('/customer-register', [CustomerAuthController::class, 'indexRegister'])->name('customer.register.page');

Route::post('/customer-register-store',[CustomerAuthController::class,'CustomerRegister'])->name('customer.register.store');
Route::get('customer/otp-form',[CustomerAuthController::class,'CustomerOtpForm'])->name('customer.otpForm');
Route::post('customer/otp-verified',[CustomerAuthController::class,'CustomerOtpVerified'])->name('customer.otp.verified');

Route::post('/customer-register', [CustomerAuthController::class, 'register'])->name('customer.register');

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/category', [WebsiteController::class, 'category'])->name('category');
Route::get('/brands', [WebsiteController::class, 'brand'])->name('brand');
Route::get('/coupons', [WebsiteController::class, 'coupons'])->name('coupons');
Route::get('/blog', [WebsiteController::class, 'blog'])->name('blog');
Route::get('/blog-details/{slug}', [WebsiteController::class, 'blogDetails'])->name('blog-details');
Route::get('/product-by-brands/{name}', [WebsiteController::class, 'productByBrand'])->name('product.by.brand');
Route::get('/product', [WebsiteController::class, 'product'])->name('product');
Route::get('/product-by-category/{slug}', [WebsiteController::class, 'productByCategory'])->name('product.by.category');
Route::get('/product-details/{slug}', [WebsiteController::class, 'productDetails'])->name('product.details');
Route::get('/product-rules/{slug}',[WebsiteController::class,'rules'])->name('product.rules');
Route::get('/get-variant-product-price', [WebsiteController::class, 'variantProductPrice'])->name('get-variant-product-price');

Route::get('all-product', [WebsiteController::class, 'getAllProduct'])->name('all-product');

Route::get('all-categories', [WebsiteController::class, 'getAllCategories'])->name('all-categories');
Route::get('see-more-pagination', [ProductController::class, 'seeMorePagination'])->name('see-more-pagination');

Route::get('product-modal-get', [ProductController::class, 'productModalGet'])->name('product-modal-get');
Route::post('subscribe-store', [WebsiteController::class, 'subscribe'])->name('subscribe.store');
Route::get('/search', [WebsiteController::class, 'searchData'])->name('search.data');
Route::get('/search-filter', [WebsiteController::class, 'searchFilter'])->name('search.filter');
Route::get('/search-onkey-up', [WebsiteController::class, 'searchOnKeyUp'])->name('search.onkey.up');
Route::get('/get-variants-size', [ProductController::class, 'getVariantsSize'])->name('get.variants.size');
Route::get('/get-variants-color', [ProductController::class, 'getVariantsColor'])->name('get.variants.color');
Route::get('/get-variants-price', [ProductController::class, 'getVariantsPrice'])->name('get.variants.price');

/************************************************* Customer panel *****************************************************************************/

Route::middleware('customers')->prefix('')->group(function () {
    Route::get('/customer-dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
    Route::get('/customer-wallet', [CustomerController::class, 'wallet'])->name('customer.wallet');
    Route::get('/customer-orders', [CustomerController::class, 'order'])->name('customer.orders');
    Route::get('/customer-order-details/{code}', [CustomerController::class, 'orderDetails'])->name('customer-order-details');
    Route::get('/customer-cancel', [CustomerController::class, 'cancel'])->name('customer.cancel');
    Route::get('/customer-address', [CustomerController::class, 'address'])->name('customer.address');
    Route::get('/customer-account-details', [CustomerController::class, 'accountDetail'])->name('customer.account.details');
    Route::get('/customer-change-password', [CustomerController::class, 'customerChangePassword'])->name('customer.change.password');
    Route::get('/customer-support-ticket', [CustomerController::class, 'customerSupportTicket'])->name('customer.support.ticket');
    Route::get('/customer-ticket-view/{id}', [CustomerController::class, 'ticketView'])->name('support.ticket.view');
    Route::get('/customer-conversations', [CustomerController::class, 'customerConversations'])->name('customer.conversations');
    Route::get('/customer-order', [CustomerController::class, 'customerOrderFilter'])->name('customer.order.filter');
    Route::get('/customer-order-invoice/{code}', [CustomerController::class, 'invoiceOrder'])->name('customer.order.invoice');

    Route::post('/customer-logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('cart.checkout');
    Route::post('/order', [CheckoutController::class, 'newOrder'])->name('order');
    Route::post('/order-coupon-apply', [CheckoutController::class, 'couponCodeApply'])->name('coupon.apply');

    Route::put('/billings-store/{id}', [CheckoutController::class, 'billingsStore'])->name('billings-store');
    Route::put('/shipping-store/{id}', [CheckoutController::class, 'shippingStore'])->name('shipping-store');
    Route::put('/update-customer-info/{id}', [CheckoutController::class, 'updateCustomerInfo'])->name('update-customer-info');
    Route::put('/user-password-change/{id}', [CheckoutController::class, 'userPasswordChange'])->name('user-password-change');
    Route::get('/customer-dashboard/{id}', [CheckoutController::class, 'orderFilter'])->name('order-filter');
    Route::post('/order-return-submit', [CheckoutController::class, 'orderReturnSubmit'])->name('order-return-submit');
    Route::post('/customer-order-cancel', [CheckoutController::class, 'customerOrderCancel'])->name('customer-order-cancel');
    Route::get('/add-to-wishlist/{id}', [Wishlist::class, 'addToWishlist'])->name('add-to-wishlist');
    Route::post('/add-to-wishlist-variant', [Wishlist::class, 'addToWishlistVariant'])->name('add-to-wishlist-variant');
    Route::get('/wishList-view', [Wishlist::class, 'wishListView'])->name('wishList-view');
    Route::get('/wishlist-couter', [Wishlist::class, 'wishlistCouter'])->name('wishlist-couter');
    Route::get('/add-wishlist-product-to-cart', [Wishlist::class, 'addWishToCart'])->name('add-wishlist-product-to-cart');

    Route::get('/wishlist/destroy/{id}',[Wishlist::class,'wishlistdestroy'])->name('wishlist.destroy');
    Route::post('/converstation-data-post',[CustomerController::class,'converstationDataPost'])->name('converstation.data.post');
    Route::get('/converstation-details/{id}',[CustomerController::class,'converstationDetails'])->name('converstation.details');
    Route::post('/send-message',[CustomerController::class,'sendMessage'])->name('send.message');
    Route::controller(TicketController::class)->group(function () {
        Route::post('/ticket-create', 'createTicket')->name('customer.store.ticket');
        Route::get('/ticket-view/{id}', 'viewTicket')->name('customer.view.ticket');
        Route::post('/ticket-reply-customer', 'replyTicket')->name('customer.ticket.reply');
    });
    Route::controller(ProductReviewController::class)->group(function () {
        Route::post('/review-store', 'review')->name('customer.store.review');
        Route::post('/review-update/{id}', 'reviewUpdate')->name('customer.update.review');
        Route::delete('/review-delete/{id}', 'reviewDelete')->name('customer.delete.review');
    });

    Route::controller(ProductQueriesController::class)->group(function () {
        Route::post('/customer-queries', 'newQuery')->name('customer.store.queries');
        Route::post('/customer-queries-update/{id}', 'updateQuery')->name('customer.update.queries');
        Route::post('/customer-queries-reply-update/{id}', 'updateQueryReply')->name('customer.update.reply');
        Route::post('/customer-queries-reply', 'replyQuery')->name('customer.reply.queries');
        Route::delete('/customer-queries-delete/{id}', 'deleteQueries')->name('customer.delete.queries');
        Route::delete('/customer-product-queries-delete/{id}', 'deleteQuery')->name('customer.product.queries.delete');
    });

    Route::resource('cart', CartController::class);
    Route::post('/cart/update-Product/', [CartController::class, 'updateProduct'])->name('cart.update');
    Route::post('/cart/ajax-update-Product/', [CartController::class, 'ajaxUpdateProduct'])->name('ajax-update-Product');
    Route::delete('/cart/delete-Product/{rowId}', [CartController::class, 'deleteProduct'])->name('cart.delete');
    Route::post('/cart/delete-product-ajax/', [CartController::class, 'deleteProductAjax'])->name('delete-cart-item-ajax');

    Route::get('get-cart-details', [CartController::class, 'getCartDetails'])->name('get-cart-details');
    Route::get('get-cart-count', [CartController::class, 'getCartCount'])->name('get-cart-count');

    Route::post('/product/buy-now/', [CartController::class, 'buyNow'])->name('buy.now');
    //wallet-online-rechate
    Route::post('wallet-online-recharge', [CustomerController::class, 'walletOnlineRecharge'])->name('wallet-online-recharge');

});
Route::post('add-to-cart', [CartController::class, 'addToCartProduct'])->name('product.add.cart');

Route::post('add-to-cart-variant-product/', [CartController::class, 'variant_product_add_to_cart'])->name('cart.variant.product');
Route::post('add-to-cart-variant-product', [CartController::class, 'variantProductAdd'])->name('cart.variant.product.add');

Route::post('/collect-coupon', [CouponManageController::class, 'collect'])->name('collect.coupon');
Route::get('/customer-coupons', [CouponManageController::class, 'customerCoupons'])->name('customer.coupons');
Route::get('/customer-coupon-details/{code}', [CouponManageController::class, 'customerCouponView'])->name('customer.coupon.view');
Route::get('/customer-refund', [RefundController::class, 'customerRefund'])->name('customer.refund');
Route::get('/customer-refund-order-details/{id}', [RefundController::class, 'refundOrderDetails'])->name('customer.order.refund.details');
Route::post('/customer-refund-request', [RefundController::class, 'refundRequest'])->name('customer.order.refund.request');
Route::get('/customer-refund-requests', [RefundController::class, 'refundCustomerRequest'])->name('customer.refund.requests');
Route::get('/customer-refund-requests-view/{id}', [RefundController::class, 'refundCustomerView'])->name('customer.refund.view');

Route::controller(BlogCommentController::class)->group(function () {
    Route::post('/comment-store', 'comment')->name('customer.store.comment');
    Route::post('/comment-edit/{id}', 'commentEdit')->name('customer.edit.comment');
    Route::delete('/comment-delete', 'commentDelete')->name('customer.delete.comment');
    Route::post('/comment-reply', 'reply')->name('customer.reply.comment');
    Route::post('/comment-reply-edit/{id}', 'editReply')->name('customer.reply.edit.comment');
    Route::delete('/reply-delete', 'replyDelete')->name('customer.delete.reply');
});


/************************************************* Delivery Boy Panel *****************************************************************************/

//    Route::get('deliveryBoy/register',[DeliveryBoyDashboardController::class,'register'])->name('delivery-boy.register');
//    Route::post('deliveryBoy-registration-store',[DeliveryBoyDashboardController::class,'registerStore'])->name('delivery-boy.register.store');
    Route::get('deliveryBoy/login',[DeliveryBoyDashboardController::class,'login'])->name('delivery-boy.login');
    Route::post('deliveryBoy-login-done',[DeliveryBoyDashboardController::class,'loginConfirm'])->name('delivery-boy.login.done');

Route::middleware('auth:deliveryBoy')->prefix('deliveryBoy')->group(function () {
    Route::controller(DeliveryBoyDashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('delivery-boy.dashboard');
        Route::get('/assigned-delivery', 'assignedDelivery')->name('delivery-boy.assignedDelivery');
        Route::get('/pickup-delivery', 'pickupOrders')->name('delivery-boy.pickupDelivery');
        Route::get('/on-the-way-delivery', 'onWayOrders')->name('delivery-boy.on.the.way.Delivery');
        Route::get('/pending-delivery', 'PendingDeliveries')->name('delivery-boy.pending.Delivery');
        Route::get('/completed-delivery', 'completedDeliveries')->name('delivery-boy.completed.Delivery');
        Route::get('/cancel-delivery', 'cancelDeliveries')->name('delivery-boy.cancel.Delivery');
        Route::get('/total-collection', 'totalCollection')->name('delivery-boy.total.collection');
        Route::get('/earning', 'earning')->name('delivery-boy.earning');
        Route::get('/wallet', 'wallet')->name('delivery-boy.wallet');
        Route::post('/logout', 'logout')->name('delivery-boy.logout');
        Route::get('/order-details/{id}','deliveryBoyOrderDetails')->name('deliveryBoy.order.details');
    });
    Route::controller(DeliveryBoyAccountController::class)->group(function () {
        Route::get('/account-manage', 'manageDeliveryBoy')->name('delivery-boy.account.manage');
        Route::put('/account-update/{id}', 'updateDeliveryBoy')->name('delivery-boy.account.update');
        Route::get('/account-password', 'passwordChange')->name('delivery-boy.account.update.password.page');
        Route::put('/account-update-password/{id}', 'updatePassword')->name('delivery-boy.account.update.password');
    });
    Route::controller(DeliveryBoyOrderController::class)->group(function (){
        Route::post('/confirm-pickup/{id}','confirmPickup')->name('deliveryBoy.confirm.pickup');
        Route::post('/status-change/{id}','deliveryBoyDeliverStatus')->name('deliveryBoy.delivery.status.change');
        Route::post('/cancel-request-pickup/{id}','cancelRequestPickup')->name('deliveryBoy.cancel.request.pickup');
    });
    Route::controller(DeliveryBoyPaymentController::class)->group(function (){
        Route::get('/payment-info','paymentInfoPage')->name('deliveryBoy.payment.info.page');
        Route::post('/payment-info/{id}','paymentInfo')->name('deliveryBoy.payment.info');
        Route::put('/update-payment-info/{id}','paymentInfoUpdate')->name('deliveryBoy.payment.info.update');
        Route::post('/withdrawal-request','withdrawalRequest')->name('deliveryBoy.withdrawal.request');
        Route::get('/withdraw-details/{id}','withdrawalDetails')->name('deliveryBoy.withdraw.details');
    });

});
    /*==========================
        start seller panel
    =============================*/
Route::middleware(['seller.auth'])->group(function () {
    Route::controller(SellerDashboard::class)->group(function(){
        Route::get('seller-dashboard','sellerDashboard')->name('seller.dashboard');
        Route::get('seller/profile','SellerProfile')->name('seller.profile');
        Route::put('seller/update-profile','SellerUpdateProfile')->name('seller.update.profile');
        Route::put('seller/change-password','SellerChangePassword')->name('seller.change.password');
        Route::get('seller-profile-verify-form','profileVerifyForm')->name('profile.verifyForm');
        Route::put('seller-profile-verify','profileVerify')->name('profile.verify');
    });
    Route::controller(SellerController::class)->group(function () {
        Route::get('seller/registration-form','sellerRegistrationForm')->name('seller.registrationForm');
        Route::post('seller-registration','sellerRegistration')->name('seller.registration');
        Route::get('seller/registration-verify{token}','sellerRegistrationVerify')->name('seller.registrationVerify');
        Route::get('seller/login-form','SellerLoginForm')->name('seller.loginForm');
        Route::post('seller/login','SellerLogin')->name('seller.login');
        Route::post('seller/logout','SellerLogout')->name('seller.logout');
        Route::get('seller/Forgot-password-form','SellerForgotPasswordForm')->name('seller.ForgotPasswordForm');
        Route::post('seller/send/reset-password-link','SellerSendResetPasswordLink')->name('seller.SendResetPasswordLink');
        Route::get('seller/click-reset-link/{token}','clickResetLink')->name('click.reset.link');
        Route::post('seller/reset-password/{token}','SellerResetPassword')->name('seller.ResetPassword');
    });
    Route::controller(SellerProductController::class)->group(function () {
        Route::get('product/index','index')->name('product.index');
        Route::get('product/create','create')->name('product.create');
        Route::post('product/store','store')->name('product.store');
        Route::get('product/show/{id}','show')->name('product.show');
        Route::get('product/edit/{id}','edit')->name('product.edit');
        Route::post('product/update','update')->name('product.update');
        Route::delete('product/delete{id}','delete')->name('product.delete');
        Route::get('seller-product/order','sellerProductOrder')->name('seller-product.order');
        Route::post('seller-product/confirm/{id}','sellerProductOrderConfirm')->name('seller-product-order.confirm');
        Route::post('seller-product/reject/{id}','sellerProductOrderReject')->name('seller-product-order.reject');
        Route::get('seller-product/view/{id}','sellerProductView')->name('seller-product.view');
        Route::get('seller-product/order-details/{id}','sellerProductOrderDetail')->name('seller-product.orderDetail');
        Route::post('seller-product-sku-combination','sku_combination')->name('seller.products.sku_combination');
        Route::post('/products/add-more-choice-option', 'add_more_choice_option')->name('products.add-more-choice-option');
        Route::post('/products-sku_combination_edit', 'sku_combination_edit')->name('products-sku-combination-edit');
        Route::get('get-single-file-modal', 'getSingleFileModal')->name('get-single-file-modal');
    });
    Route::controller(CategoryWiseDiscountController::class)->group(function () {
        Route::get('category-wise-discount/index','index')->name('category-wise-discount.index');
        Route::get('category-wise-discount/create','create')->name('category-wise-discount.create');
        Route::post('category-wise-discount/store','store')->name('category-wise-discount.store');
        Route::get('category-wise-discount/edit/{id}','edit')->name('category-wise-discount.edit');
        Route::put('category-wise-discount/update/{id}','update')->name('category-wise-discount.update');
        Route::delete('category-wise-discount/delete/{id}','delete')->name('category-wise-discount.delete');
    });

    Route::controller(ShopSettingController::class)->group(function () {
        Route::get('seller-shop-setting/index','index')->name('seller.shop-setting.index');
        Route::get('seller-shop-setting/edit/{id}','edit')->name('seller.shop-setting.edit');
        Route::put('seller-shop-setting/update/{id}','update')->name('seller.shop-setting.update');
    });
    Route::controller(CouponController::class)->group(function(){
        Route::get('seller-coupon','index')->name('seller-coupon.index');
        Route::get('seller-coupon/create','create')->name('seller-coupon.create');
        Route::post('seller-coupon/store','store')->name('seller-coupon.store');
        Route::get('seller-coupon/edit{id}','edit')->name('seller-coupon.edit');
        Route::put('seller-coupon/update{id}','update')->name('seller-coupon.update');
        Route::delete('seller-coupon/delete{id}','delete')->name('seller-coupon.delete');
    });

    Route::controller(SellerOrderController::class)->group(function(){
        Route::get('seller-order-manage','order')->name('seller.order.manage');
        Route::get('seller-order-complete','completeOrder')->name('seller.order.complete');
    });

    Route::get('seller-sales-order-invoice/{id}', [AdminSalesController::class, 'invoiceSeller'])->name('seller.order.invoice');
    Route::get('seller-order-show/{id}', [OrderController::class, 'showOrderDetails'])->name('seller.order.show');

    Route::controller(SellerPaymentController::class)->group(function () {
        Route::get('payment-info','paymentInfo')->name('seller.payment.info');
        Route::post('payment-info-store','paymentInfoStore')->name('seller.payment.info.store');
        Route::put('payment-info-update/{id}','paymentInfoUpdate')->name('seller.payment.info.update');
    });

    Route::controller(VendorWalletController::class)->group(function () {
        Route::get('wallet','wallet')->name('seller.wallet');
        Route::post('withdraw-request','withdrawalRequest')->name('seller.withdraw.request');
        Route::get('withdraw-details/{id}','withdrawalDetails')->name('seller.withdraw.details');
    });

    Route::controller(SellerProductQueriesController::class)->group(function () {
        Route::get('/product-queries', 'index')->name('seller.product.queries');
        Route::get('/product-queries-view/{id}', 'viewQuery')->name('seller.product.queries.view');
        Route::post('/product-queries-reply', 'replyQuery')->name('seller.product.queries.reply');
        Route::delete('/product-queries-delete/{id}', 'deleteQuery')->name('seller.product.queries.delete');
    });

    Route::controller(SellerDigitalProductController::class)->group(function () {
        Route::get('digital-product/index','index')->name('digital-product.index');
        Route::get('digital-product/create','create')->name('digital-product.create');
        Route::post('digital-product/store','store')->name('digital-product.store');
        Route::get('digital-product/show/{id}','show')->name('digital-product.show');
        Route::get('digital-product/edit{id}','edit')->name('digital-product.edit');
        Route::put('digital-product/update{id}','update')->name('digital-product.update');
        Route::delete('digital-product/delete{id}','delete')->name('digital-product.delete');
    });

    Route::controller(UploadController::class)->group(function () {
        Route::get('seller/file/manager', 'index')->name('seller.file.manage');
        Route::get('seller/file/upload', 'create')->name('seller.file.upload');
        Route::post('seller/file/store', 'store')->name('seller.file.store');
        Route::delete('seller/file/delete/{id}', 'destroy')->name('seller.file.delete');
        Route::delete('seller/file/delete', 'deleteSelectedItems')->name('seller.file.delete.selected.item');
        Route::get('seller/file/sort', 'sortFile')->name('seller.file.sort.item');
        Route::get('seller/file/search', 'search')->name('seller.file.search');
        Route::get('/paginate', 'paginate')->name('paginate');
    });

    Route::controller(UploadController::class)->group(function () {
        Route::get('file/manager', 'index')->name('seller.file.manage');
        Route::get('file/upload', 'create')->name('seller.file.upload');
        Route::post('file/store', 'store')->name('seller.file.store');
        Route::delete('file/delete/{id}', 'destroy')->name('seller.file.delete');
        Route::delete('file/delete', 'deleteSelectedItems')->name('seller.file.delete.selected.item');
        Route::get('file/sort', 'sortFile')->name('seller.file.sort.item');
        Route::get('get/all/files', 'allFiles')->name('seller.file.items');
        Route::get('get/single/files', 'singleFile')->name('seller.single.file.items');
        Route::get('file/search', 'search')->name('seller.file.search');
        Route::get('/paginate', 'paginate')->name('paginate');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::post('product-sku-combination','sku_combination')->name('seller-products-sku_combination');
        Route::post('products/add-more-choice-option', 'add_more_choice_option')->name('products-add-more-choice-option');
        Route::post('products-sku_combination_edit', 'sku_combination_edit')->name('products-sku-combination-edit');
    });
    Route::controller(FileUploadSelectionController::class)->group(function () {

        Route::post('/seller-save-selection-single', 'saveSingleSelection')->name('seller.file.save.selection.single');
        Route::post('/seller-save-selection-multiple', 'saveMultipleSelection')->name('seller.file.save.selection.multiple');

        Route::get('/seller-open-single-image-modal', 'getSingleSelection')->name('sellerSingleSelection');
        Route::get('/seller-open-multiple-image-modal', 'getMultipleSelection')->name('sellerMultipleSection');
    });
});
    /* ===========================
        end seller panel
    ============================ */

/******************************************************************** Admin Panel ****************************************************************************/

 Route::middleware(['UserCheckPermission'])->group(function () {
     Route::group(['prefix' => 'admin'], function () {
         Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // Product Route start
         Route::resource('digitals', DigitalCategoryController::class);
         Route::post('/category-featured-status-update/{id}', [DigitalCategoryController::class,'featuredStatusUpdate'])->name('admin.category.featured.status.update');
         Route::resource('physicals', PhysicalCategoryController::class);
         Route::post('categories-physical', [CategoryController::class, 'physical'])->name('categories.physical');
         Route::resource('sub-category', SubCategoryController::class);
         Route::resource('brands', BrandController::class);
         Route::post('/brand-featured-status-update/{id}', [BrandController::class,'featuredStatusUpdate'])->name('admin.brand.featured.status.update');
         Route::resource('units', UnitController::class);
         Route::resource('colors', ColorController::class);
         Route::resource('sizes', SizeController::class);

         Route::resource('products', ProductController::class);
         Route::controller(ProductController::class)->group(function(){
             Route::post('products/update','update')->name('products.update');

             Route::post('product-sku-combination','sku_combination')->name('seller.products.sku_combination');
             Route::post('products/add-more-choice-option', 'add_more_choice_option')->name('products.add-more-choice-option');
             Route::post('products-sku_combination_edit', 'sku_combination_edit')->name('products-sku-combination-edit');

             Route::get('digital-product', 'digitalProduct')->name('admin.digital.product');
             Route::get('digital-product-create', 'createDigitalProduct')->name('admin.digital.product.create');
             Route::post('digital-product-store', 'storeDigitalProduct')->name('admin.digital.product.store');
             Route::get('digital-product-show/{id}', 'showDigitalProduct')->name('admin.digital.product.show');
             Route::get('digital-product-edit/{id}', 'editDigitalProduct')->name('admin.digital.product.edit');
             Route::put('digital-product-update/{id}', 'updateDigitalProduct')->name('admin.digital.product.update');
             Route::delete('digital-product-destroy/{id}', 'destroyDigitalProduct')->name('admin.digital.product.destroy');
             Route::get('seller-product', 'sellerProduct')->name('admin.seller.products');
             Route::get('admin-inhouse-product', 'inhouseProduct')->name('admin.inhouse.products');
             Route::post('product-status-change/{id}', 'productStatusChange')->name('admin.products.status.change');
             Route::post('product-status-change-bulk', 'productStatusChangeBulk')->name('admin.products.bulk.status.change');
             Route::post('seller-product-show/{id}', 'sellerProductShow')->name('admin.seller.products.show');
             Route::post('inhouse-product-show/{id}', 'inhouseProductShow')->name('admin.inhouse.products.show');
         });
         Route::resource('country', CountryController::class);
         Route::post('country-status/{id}', [CountryController::class, 'statusUpdate'])->name('country.status');
         Route::resource('currency', CurrencyController::class);
         Route::post('currency-status/{id}', [CurrencyController::class, 'statusUpdate'])->name('currency.status');
         Route::resource('feature', FeatureActivationController::class);
         Route::post('feature-status/{id}', [FeatureActivationController::class, 'statusUpdate'])->name('feature.status');
         Route::get('/product-by-type/{id}', [ProductController::class, 'productByType'])->name('product-by-type');
         Route::resource('product-type', ProductTypeController::class);
         Route::resource('product_attribute',ProductAttributeController::class);
         Route::post('/product-attribute-value-store', [ProductAttributeController::class, 'storeAttributeValue'])->name('product.attribute.value');
         Route::get('/product-attribute-value-edit/{id}', [ProductAttributeController::class, 'editValue'])->name('product.attribute.value.edit');
         Route::put('/product-attribute-value-update/{id}', [ProductAttributeController::class, 'updateValue'])->name('product.attribute.value.update');
         Route::delete('/product-attribute-value-destroy/{id}', [ProductAttributeController::class, 'destroyValue'])->name('product.attribute.value.destroy');

         Route::get('/subscribers', [AdminController::class, 'subscriber'])->name('admin.subscriber');
        //  Route::get('/get-sub-category-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('get-sub-category-by-category');

         Route::get('/product-reviews', [ProductController::class, 'productReview'])->name('product.reviews');
         Route::get('/product-conversations', [ProductController::class, 'productConversation'])->name('product.conversation');
         Route::get('/product-reviews-show/{id}', [ProductController::class, 'productReviewShow'])->name('product.review.show');
         Route::get('/product-conversation-show/{id}', [ProductController::class, 'productConversationShow'])->name('product.conversation.show');
         Route::get('/product-reviews-show-images/{id}', [ProductController::class, 'productReviewShowImages'])->name('product.review.show.images');
         Route::get('/product-conversation-show-details/{id}', [ProductController::class, 'productConversationShowDetails'])->name('product.conversation.show.details');
         Route::post('/product-conversation-reply', [ProductController::class, 'productConversationReply'])->name('product.conversation.reply');
         Route::delete('/product-start-conversation-delete/{id}', [ProductController::class, 'productStartConversationDelete'])->name('product.start.conversation.delete');
         Route::delete('/product-conversation-delete/{id}', [ProductController::class, 'productConversationDelete'])->name('product.conversation.delete');
         Route::delete('/product-review-delete/{id}', [ProductController::class, 'productReviewDelete'])->name('product.review.delete');
         //        Product Route End

         //        Blog Route Start
         Route::resource('blogs', BlogController::class);
         Route::resource('blog_categories', BlogCategoryController::class);
         //        Blog Route End

         //        Delivery Boy
         Route::resource('delivery-boy', DeliveryBoyController::class);
         Route::post('/delivery-boy-ban/{id}', [DeliveryBoyController::class, 'banDeliveryBoy'])->name('deliveryBoy.ban');
         Route::post('/delivery-boy-profile/{id}', [DeliveryBoyController::class, 'updateProfile'])->name('deliveryBoy.updateProfile');
         Route::get('/delivery-boy-edit-info/{id}', [DeliveryBoyController::class, 'editInfo'])->name('delivery-boy.edit.info');
         Route::post('/delivery-boy-update-info/{id}', [DeliveryBoyController::class, 'updateInfo'])->name('delivery-boy.update.info');
         Route::get('/delivery-boy-payment', [DeliveryBoyController::class, 'allPayment'])->name('deliveryBoy.allPayment');
         Route::get('/delivery-boy-pending-payment', [DeliveryBoyController::class, 'pendingPayment'])->name('deliveryBoy.pendingPayment');
         Route::get('/delivery-boy-complete-payment', [DeliveryBoyController::class, 'completePayment'])->name('deliveryBoy.completePayment');
         Route::get('/delivery-boy-collected', [DeliveryBoyController::class, 'collectedHistory'])->name('deliveryBoy.collectedHistory');
         Route::get('/delivery-boy-cancel-requests', [DeliveryBoyController::class, 'cancel'])->name('deliveryBoy.cancelRequests');
         //        Blog Route customer
         Route::resource('customers', AdminCustomerController::class);
         Route::post('/customer-status/{id}', [AdminCustomerController::class, 'banCustomer'])->name('admin.customer.status');
         Route::resource('classifiedPackage', CustomerClassifiedPackageController::class);
         //        Website Setting Route customer
         Route::resource('website-settings', WebsiteSettingController::class);
         Route::resource('slider', WebsiteSliderController::class);
         Route::resource('pages', PagesController::class);

        // Sales Route Start
         Route::get('/sales-orders', [AdminSalesController::class, 'order'])->name('sales.order');
         Route::delete('sales-order-delete/{id}', [AdminSalesController::class, 'order_delete'])->name('sales.order.delete');
         Route::post('sales-order-update-payment-status/{id}', [AdminSalesController::class, 'updatePaymentStatus'])->name('admin.order.update.payment.status');
         Route::post('sales-order-update-status/{id}', [AdminSalesController::class, 'updateStatus'])->name('admin.order.update.delivery.status');
         Route::post('sales-order-update-order-status/{id}', [AdminSalesController::class, 'updateOrderStatus'])->name('admin.order.update.order.status');
         Route::get('sales-order-invoice/{id}', [AdminSalesController::class, 'invoice'])->name('admin.order.invoice');
         Route::get('sales-order-invoice-in-house/{id}', [AdminSalesController::class, 'invoiceInHouseOrders'])->name('admin.order.invoice.in.house');
         Route::get('sales-seller-order-invoice/{id}', [AdminSalesController::class, 'invoiceSellerOrders'])->name('admin.seller.order.invoice');
         Route::resource('orders', OrderController::class);
         Route::get('/sales-in-house-orders', [AdminSalesController::class, 'inHouseOrder'])->name('sales.in-house-orders');
         Route::get('/sales-in-house-order-show/{id}', [OrderController::class, 'showInhouseOrderDetails'])->name('sales.in.house.orders.show');
         Route::get('/sales-seller-orders', [AdminSalesController::class, 'sellerOrder'])->name('sales.seller-orders');
         Route::get('/sales-seller-order-show/{id}', [OrderController::class, 'showSellerOrderDetails'])->name('sales.seller.orders.show');
         Route::get('/sales-pickup-point-orders', [AdminSalesController::class, 'pickUpPointOrder'])->name('sales.pickup-point-orders');
         Route::post('/delivery-boy-assign/{id}', [AdminSalesController::class, 'deliveryBoyAssign'])->name('delivery.boy.assign');

         Route::controller(RoleController::class)->group(function () {
             Route::get('role/index', 'index')->name('role.index');
             Route::get('role/create', 'create')->name('role.create');
             Route::post('role/store', 'store')->name('role.store');
             Route::get('assign/role/{roleId}', 'assignRole')->name('assign.role');
             Route::post('assign/role-permission/{roleId}', 'rolePermission')->name('role.permission');
             Route::post('assign/role-permission/{roleId}', 'rolePermission')->name('role.permission');
         });
         Route::controller(PermissionController::class)->group(function () {
             Route::get('permission/index', 'index')->name('permission.index');
         });
         Route::controller(AuctionProductController::class)->group(function () {
             Route::get('auction-product/index','index')->name('auction.product.index');
             Route::get('auction-product/create','create')->name('auction.product.create');
             Route::post('auction-product/store','store')->name('auction.product.store');
             Route::get('auction-product/view/{auctionProductId}', 'show')->name('auction.product.show');
             Route::get('auction-product/edit/{auctionProductId}', 'edit')->name('auction.product.edit');
             Route::post('auction-product/update/{auctionProductId}', 'update')->name('auction.product.update');
             Route::delete('auction-product/delete/{auctionProductId}', 'delete')->name('auction.product.delete');
         });
         Route::controller(WholeSaleProductController::class)->group(function () {
             Route::get('whole-sale-product/index','index')->name('whole-sale-product.index');
             Route::get('whole-sale-product/create','create')->name('whole-sale-product.create');
             Route::post('whole-sale-product/store','store')->name('whole-sale-product.store');
             Route::get('whole-sale-product/show/{id}','show')->name('whole-sale-product.show');
             Route::get('whole-sale-product/edit{id}','edit')->name('whole-sale-product.edit');
             Route::post('whole-sale-product/update','update')->name('whole-sale-product.update');
             Route::delete('whole-sale-product/delete{id}','delete')->name('whole-sale-product.delete');
             Route::post('product-sku-combination','sku_combination')->name('seller.products.sku_combination');
             Route::post('products/add-more-choice-option', 'add_more_choice_option')->name('products.add-more-choice-option');
             Route::post('products-sku_combination_edit', 'sku_combination_edit')->name('products-sku-combination-edit');
         });
         //SellerController
         Route::controller(SellerController::class)->group(function () {
             Route::get('seller/index','index')->name('seller.index');
             Route::get('seller/list','list')->name('seller.list');
             Route::get('seller/create','create')->name('seller.create');
             Route::post('seller/store','store')->name('seller.store');
             Route::get('seller/show/{id}','show')->name('seller.show');
             Route::get('seller/edit/{id}','edit')->name('seller.edit');
             Route::put('seller/update/{id}', 'update')->name('seller.update');
             Route::delete('seller/delete/{id}', 'delete')->name('seller.delete');
             Route::post('/seller-status-change/{id}', 'statusChange')->name('admin.seller.status.change');
             Route::get('seller/verify-profile/{id}','sellerVerifyProfile')->name('seller.verify.profile');
         });
         Route::resource('sellerPackage', SellerPackageController::class);
         Route::get('seller/payment',[SellerPackageController::class, 'sellerPayment'])->name('seller.payment');
         Route::post('seller/payment/status/{id}',[SellerPackageController::class,'sellerPaymentStatus'])->name('seller.payment.status');
         Route::controller(SellerCommissionController::class)->group(function () {
             Route::get('seller/commission', 'index')->name('admin.seller.commission');
             Route::post('seller/commission/{id}', 'commissionUpdate')->name('admin.seller.commission.update');
             Route::post('seller/commission-status/{id}', 'commissionStatusUpdate')->name('admin.seller.commission.status.update');
             Route::post('seller/withdraw-amount/{id}', 'withdrawAmountUpdate')->name('admin.seller.withdraw.amount.update');
             Route::post('seller/category-commission/{id}', 'categoryBaseCommission')->name('admin.seller.category.commission.update');
         });

         Route::controller(SellerFormVerificationController::class)->group(function () {
             Route::get('seller/verification-form', 'sellerVerificationForm')->name('seller.verification.form');
             Route::post('seller/verification-form-fields', 'sellerVerificationFormField')->name('seller.verification.form.fields');
             Route::put('seller/verification-form-fields-update/{id}', 'sellerVerificationFormFieldUpdate')->name('seller.verification.form.fields.update');
             Route::delete('seller/verification-form-fields-delete/{id}', 'sellerVerificationFormFieldDelete')->name('seller.verification.form.fields.delete');
         });

         Route::controller(RefundController::class)->group(function () {
             Route::get('product-refund/request', 'request')->name('product.refund.request');
             Route::get('product-refund/approve', 'approve')->name('product.refund.approve');
             Route::get('product-refund/rejected', 'rejected')->name('product.refund.rejected');
             Route::get('product-refund/view/{id}', 'refundView')->name('admin.refund.view');
             Route::put('refund-status-change/{id}', 'refundStatusChange')->name('refund.status.change');
             Route::put('refund-seller-status-change/{id}', 'refundSellerStatusChange')->name('refund.seller.status.change');
         });

         Route::controller(PermissionController::class)->group(function () {
             Route::get('permission/index', 'index')->name('permission.index');
         });

         //AuctionProductController
         Route::controller(AuctionProductController::class)->group(function () {
             Route::get('auction-product/index', 'index')->name('auction.product.index');
             Route::get('auction-product/create', 'create')->name('auction.product.create');
             Route::post('auction-product/store', 'store')->name('auction.product.store');
             Route::get('auction-product/view/{auctionProductId}', 'show')->name('auction.product.show');
             Route::get('auction-product/edit/{auctionProductId}', 'edit')->name('auction.product.edit');
             Route::put('auction-product/update/{auctionProductId}', 'update')->name('auction.product.update');
             Route::delete('auction-product/delete/{auctionProductId}', 'delete')->name('auction.product.delete');
             /*  Route::get('/inHouse-product/{id}','inHouseAuctionProduct')->name('inHouse.auction.product'); */
         });
         //AuctionProductTypeController
         Route::controller(AuctionProductTypeController::class)->group(function () {
             Route::get('auction-product-type/index', 'index')->name('auction.product.type.index');
             Route::get('auction-product-type/create', 'create')->name('auction.product.type.create');
             Route::post('auction-product-type/store', 'store')->name('auction.product.type.store');
             Route::get('auction-product-type/show/{id}', 'show')->name('auction.product.type.show');
             Route::get('auction-product-type/edit{id}', 'edit')->name('auction.product.type.edit');
             Route::put('auction-product-type/update{id}', 'update')->name('auction.product.type.update');
             Route::patch('/auction-product-type/update-status/{id}', 'updateStatus')->name('auction.product.type.updateStatus');
             Route::delete('auction-product-type/delete{id}', 'delete')->name('auction.product.type.delete');
             Route::get('auction-product-type/{id}', 'typeOfAuctionProductType')->name('auction-product-type');
         });

         //WholeSaleProductTypeController
         Route::controller(WholeSaleProductTypeController::class)->group(function () {
             Route::get('whole-sale-product-type/index', 'index')->name('whole-sale-product-type.index');
             Route::get('whole-sale-product-type/create', 'create')->name('whole-sale-product-type.create');
             Route::post('whole-sale-product-type/store', 'store')->name('whole-sale-product-type.store');
             Route::get('whole-sale-product-type/show/{id}', 'show')->name('whole-sale-product-type.show');
             Route::get('whole-sale-product-type/edit{id}', 'edit')->name('whole-sale-product-type.edit');
             Route::put('whole-sale-product-type/update{id}', 'update')->name('whole-sale-product-type.update');
             Route::post('whole-sale-product-type/update_status', 'update_status')->name('whole-sale-product-type.update_status');
             Route::delete('whole-sale-product-type/delete{id}', 'delete')->name('whole-sale-product-type.delete');
             Route::get('whole-sale-product-type/{id}', 'typeOfWholesaleProduct')->name('whole-sale-product-type');
         });
         //WholeSaleProductController
         Route::controller(WholeSaleProductController::class)->group(function () {
             Route::get('whole-sale-product/index', 'index')->name('whole-sale-product.index');
             Route::get('whole-sale-product/create', 'create')->name('whole-sale-product.create');
             Route::post('whole-sale-product/store', 'store')->name('whole-sale-product.store');
             Route::get('whole-sale-product/show/{id}', 'show')->name('whole-sale-product.show');
             Route::get('whole-sale-product/edit{id}', 'edit')->name('whole-sale-product.edit');
             Route::put('whole-sale-product/update{id}', 'update')->name('whole-sale-product.update');
             Route::delete('whole-sale-product/delete{id}', 'delete')->name('whole-sale-product.delete');
         });
         //SellerController
         Route::controller(UploadController::class)->group(function () {
             Route::get('file/manager', 'index')->name('admin.file.manage');
             Route::get('file/upload', 'create')->name('admin.file.upload');
             Route::post('file/store', 'store')->name('admin.file.store');
             Route::delete('file/delete/{id}', 'destroy')->name('admin.file.delete');
             Route::delete('file/delete', 'deleteSelectedItems')->name('admin.file.delete.selected.item');
             Route::get('file/sort', 'sortFile')->name('admin.file.sort.item');
             Route::get('get/all/files', 'allFiles')->name('admin.file.items');
             Route::get('get/single/files', 'singleFile')->name('admin.single.file.items');
             Route::get('file/search', 'search')->name('admin.file.search');
             Route::get('/paginate', 'paginate')->name('paginate');
         });
         Route::controller(FileUploadSelectionController::class)->group(function () {
             Route::post('/save-selection-single', 'saveSingleSelection')->name('admin.file.save.selection.single');
             Route::post('/save-selection-multiple', 'saveMultipleSelection')->name('admin.file.save.selection.multiple');

             Route::get('/open-single-image-modal', 'getSingleSelection')->name('singleSelection');
             Route::get('/open-multiple-image-modal', 'getMultipleSelection')->name('multipleSection');
         });

         Route::controller(ProductQueriesController::class)->group(function () {
             Route::get('/product-queries', 'index')->name('admin.product.queries');
             Route::get('/product-queries-view/{id}', 'viewQuery')->name('admin.product.queries.view');
             Route::post('/admin-queries-reply-update/{id}', 'updateQueryReply')->name('admin.update.reply');
             Route::post('/product-queries-reply', 'replyQuery')->name('admin.product.queries.reply');
             Route::delete('/product-queries-delete/{id}', 'deleteQuery')->name('admin.product.queries.delete');
         });
         Route::controller(TicketController::class)->group(function () {
             Route::get('/ticket-manage', 'adminTicketManage')->name('admin.ticket.manage');
             Route::get('/ticket-manage/{id}', 'ticketStatusUpdate')->name('admin.ticket.status.update');
             Route::get('/ticket-view-admin/{id}', 'adminViewTicket')->name('admin.ticket.view');
             Route::post('/ticket-reply-admin', 'replyTicket')->name('admin.ticket.reply');
         });
         Route::controller(CouponController::class)->group(function(){
             Route::get('coupon','adminIndex')->name('admin-coupon.index');
             Route::get('coupon/create','adminCreate')->name('admin-coupon.create');
             Route::post('product-coupon/store','ProductStore')->name('admin-coupon.product.store');
             Route::post('orders-coupon/store','OrderStore')->name('admin-coupon.orders.store');
             Route::get('coupon/edit/{id}','adminEdit')->name('admin-coupon.edit');
             Route::put('coupon-product/update/{id}','adminProductUpdate')->name('admin-coupon.product.update');
             Route::put('coupon-orders/update/{id}','adminOrderUpdate')->name('admin-coupon.orders.update');
             Route::delete('coupon/delete/{id}','adminDelete')->name('admin-coupon.delete');
         });
         Route::controller(DeliveryBoyOrderController::class)->group(function (){
             Route::post('/confirm-request-pickup/{id}','adminConfirmAssignCancelRequest')->name('admin.deliveryBoy.confirm.pickup');
             Route::post('/cancel-request-pickup/{id}','adminCancelAssignRequest')->name('admin.deliveryBoy.cancel.request.pickup');
         });
         Route::controller(DeliveryBoyPaymentController::class)->group(function (){
             Route::post('/payment-status-change/{id}','statusChangePayment')->name('admin.deliveryBoy.payment.status.change');
             Route::post('/payment-attachment-add/{id}','attachmentPayment')->name('admin.deliveryBoy.payment.add.attachment');
             Route::get('/deliveryBoy-withdraw-details/{id}','deliveryBoyWithdrawalDetails')->name('admin.deliveryBoy.withdraw.details');
         });
         Route::controller(SellerPaymentController::class)->group(function (){
             Route::get('/seller-all-payment','allPayment')->name('admin.seller.payment.all');
             Route::get('/seller-pending-payment','pendingPayment')->name('admin.seller.payment.pending');
             Route::get('/seller-cancel-payment','cancel')->name('admin.seller.payment.cancel');
             Route::get('/seller-complete-payment','completePayment')->name('admin.seller.payment.complete');
             Route::post('/seller-payment-status-change/{id}','statusChangePayment')->name('admin.seller.payment.status.change');
             Route::post('/seller-payment-attachment-add/{id}','attachmentPayment')->name('admin.seller.payment.add.attachment');
             Route::get('/seller-withdraw-details/{id}','sellerWithdrawalDetails')->name('admin.seller.withdraw.details');
         });

     });
 });



