<?php

namespace App\Http\Controllers;

//use App\Models\EmailTemplate;
//use App\Models\Order;
//use App\Models\Product;
//use App\Models\ProductCategory;
//use App\Models\NewsletterSubscription;
//use App\Models\StaticPage;
//use App\Models\SystemSettings;
//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
    	return view('home');
    	//return view('home')->with(['withBanner' => true, 'categories' => $categories,'default_trending_category' => $default_trending_category, 'categoryProducts' => $categoryProducts, 'pickupProducts' => $pickupProducts, 'about_kitco' => $about_kitco, 'first_time_enter' => $first_time_enter]);
    }
}