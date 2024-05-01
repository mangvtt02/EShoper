<?php

namespace App\Providers;
use App\Type_product;
use App\Product;
use App\Blog;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Cart;
use App\contact_info;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('*', function($view)
        {
            $menu = Type_product::where('status','=','Hiện')->get();
            $products_new = Product::orderBy('created_at','DESC')->limit(3)->get();
            $blog_new = Blog::orderBy('id','DESC')->limit(5)->get();
            $view->with('cart', new Cart());
            $view->with('blog_new', $blog_new);
            $view->with('menu', $menu);
            $view->with('products_new', $products_new);
            $user = Auth::guard('emp')->user();
            $view->with('user', $user);
            $contact_info = contact_info::paginate(6);
            $view->with('contact_info', $contact_info);

            
        });
    }
}
