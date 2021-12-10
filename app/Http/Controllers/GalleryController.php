<?php

namespace App\Http\Controllers;

//use App\Models\EmailTemplate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index(){
		$data = Gallery::get();
    	return view('gallery.index')->with(['data'=>$data]);
    }
}