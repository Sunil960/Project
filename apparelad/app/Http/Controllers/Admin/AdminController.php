<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;

use App\User;

use App\Product;

use App\Category;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	 public function index()
    {
		$user = User::count();
		$product = Product::count();
		$category = Category::count();
		
        return view('admin.dashboard',['title' => 'Dashboard'])->with(array('users' => $user, 'products' => $product,'categories' => $category));
    }
	
}