<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $Count_Course = Course::count();
        $Count_Category = Category::count();
        return view('admin.index',compact('Count_Course','Count_Category'));
    }
}
