<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('Front.index',compact('courses'));
    }
    public function course ($slug){
        $course = Course::where('slug',$slug)->first();
        return view('Front.course',compact('course'));
    }
    public function register($slug){
        $course = Course::where('slug',$slug)->first();
        return view('Front.register',compact('course'));
    }
    public function registerSubmit(Request $request , $slug){
        $request->validate([
            'name'=> 'required',
            'email' => 'required',
            'mobile'=> 'required'
        ]);
        $courses = Course::where('slug',$slug)->select('id')->first();
        $user = User::where('email',$request->email)->first();
        if(is_null($user)){
            $user = User::create ([
                'name' => $request->name ,
                'email' => $request->email,
                'mobile'=> $request->mobile,
                'gender' => $request->gender
            ]);
        }
        $register = Registration::create([
            'user_id'=>$user->id,
            'course_id'=>$courses->id
        ]);
        return redirect()->route('pay',$register->id);
    }

    public function pay($id){
        $registr = Registration::find($id);
        return view('Front.pay',compact('registr'));
    }
    public function thanks($id){
        Registration::find($id)->updated([
            'stutas'=> 1
        ]);
        return redirect()->route('homePagee');
    }

    public function search(Request $request){

        $courses = Course::where('name','like','%'. $request->search . '%')
        ->orWhere('content','like','%' .$request->search . '%')->get();
        return view('Front.index',compact('courses'));
    }
    public function contact(){
        return view('Front.contact');
    }



}
