<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
       // $this->middleware('instructor');
    }
	public function index()
    {
    	$categories = Category::all('id', 'name');
		return view("category", array('categories'=>$categories));
    }

    public function addCategory()
    {
    	$category = new Category();
    	$category->name = request('name');
    	$category->save();
    	return redirect('category')->with('status', 'Category Sucessfully Created!');
    	// return "Categrory Sucessfylly Created!";
    }
}
