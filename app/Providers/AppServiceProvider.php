<?php

namespace App\Providers;

use App\Models\AuctionProductType;
use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Color;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Seller;
use App\Models\Size;
use App\Models\Upload;
use App\Models\User;
use App\Models\WebsiteSetting;
use App\Models\WebsiteSlider;
use App\Models\WholeSaleProductType;
use App\Models\Wishlist;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    public function boot(): void
    {
        View::composer(['admin.master'],function ($view){
            $view->with([
                'productTypes'=>ProductType::where('status',1)->latest()->take(3)->get(),
                'files'=> Upload::latest()->where('user_id',auth()->user()->id)->paginate(24),
            ]);
        });
        View::composer(['seller.Layout.master'],function ($view){
            $view->with([
                'files'=> Upload::latest()->where('user_id',auth()->user()->id)->paginate(24),
            ]);
        });

        View::composer(['*'],function ($view){
                    $view->with([
                        'website_setting'=> WebsiteSetting::first(),
                        'customer_info'=> auth()->check()?Customer::where('user_id', auth()->user()->id)->first() : [],
                        'cartItems'=> auth()->check() ? CartItem::where('user_id', auth()->user()->id)->get() : [],
                        'cartCount'=> auth()->check() ? count(CartItem::where('user_id', auth()->user()->id)->get()) : [],
                        'banners' => WebsiteSlider::where('status',1)->latest()->take(3)->get(),
                        'slider1' => WebsiteSlider::where('status',1)->latest()->take(1)->get(),
                        'sliders' => WebsiteSlider::where('status',1)->latest()->skip(1)->take(4)->get(),
                        'allPrducts' => Product::where('status', 1)->latest()->take(8)->get(),
                        'sortValue' => null,
                        'currency' => Currency::where('status',1)->orderBy('updated_at','desc')->first(),
                        'currencies' => Currency::orderBy('updated_at','desc')->get(),
                        'websiteInfos' => WebsiteSetting::where('status',1)->first(),
                    ]);
                });

        View::composer(['website.layout.header'],function ($view){
                    $view->with([
                        'cartItems'=> auth()->check() ? CartItem::where('user_id', auth()->user()->id)->get() : [],
                    ]);
                });

        View::composer(['website.layout.app'],function ($view){
            $view->with([
                'websiteInfos' => WebsiteSetting::where('status',1)->first(),
            ]);
        });
        View::composer(['deliveryBoy.layout.app'],function ($view){
            $view->with([
                'websiteInfos' => WebsiteSetting::where('status',1)->first(),
                'deliveryBoy' => User::where('id',auth()->user()->id)->first(),
                'slider1' => WebsiteSlider::where('status',1)->latest()->take(1)->get(),
                'sliders' => WebsiteSlider::where('status',1)->latest()->skip(1)->take(4)->get(),
                'banners' => WebsiteSlider::where('status',1)->latest()->take(3)->get(),
            ]);
        });
        if (Schema::hasTable('wishlists')){
            View::composer(['website.layout.app'],function ($view){
                $view->with([
                    'wishlist' => count(Wishlist::where('user_id',  (auth()->user())? auth()->user()->id : 0 )->get()),
                ]);
            });
        }
        Paginator::useBootstrap();
        if(Schema::hasTable('categories') && Schema::hasTable('brands')){
            $categories = Category::where('status',1)->latest()->get();
            $brands = Brand::where('status',1)->get();
            View::share([
                'categories'=> $categories,
                'brands'=> $brands,
            ]);
        }

    }
}
