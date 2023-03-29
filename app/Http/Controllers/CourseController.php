<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Models\Registration;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest('id')->paginate(5);
        return view('admin.courses.index',compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id','name'])->get();
        return view('admin.courses.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courses,name',
            'price' => 'required',
            'content'=> 'required',
            'category_id' => 'required',
            'image' => 'required|image'
        ]);

        $ex =$request->file('image')->getClientOriginalExtension();
        $new_img_name = 'Education_courses'.'.'.time().'.'.$ex;
        $request->file('image')->move(public_path('uplods'),$new_img_name);

        Course::create([
           'name' => $request->name ,
           'price' => $request->price ,
           'category_id' => $request->category_id ,
           'image' => $new_img_name ,
           'content'=>$request->content,
           'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('courses.index')->with('success','Course Added Successfully')
        ->with('type' , 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::select(['id','name'])->get();
        $course = Course::findOrFail($id);
        return view('admin.courses.edit',compact('categories','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required |unique:courses,name',
            'price' => 'required',
            'image' => 'nullble|image',
            'content'=>'required',
            'category_id'=> 'required'
        ]);
        $course = Course::findOrFail($id);
        $new_img_name = $course->image ;
        if($request->has('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_img_name = 'Course_'.'.'.time().'.'.$ex;
            $request->file('image')->move(public_path('uplods'),$new_img_name);
        }
        Course::findOrFail($id)->update([
            'name' => $request->name ,
            'price' => $request->price ,
            'category_id' => $request->category_id ,
            'image' => $new_img_name ,
            'content'=>$request->content,
        ]);
            return redirect()->route('courses.index')->with('success','Course Updated Successfully')
            ->with('type' , 'success');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->route('courses.index')->with('success','Course Deleted Successfully')
        ->with('type' , 'danger');;
    }
    public function registration(){
        $data = Registration::paginate(5);
        return view('admin.courses.registration',compact('data'));
    }
    public function registrationDelete($id){
        Registration::findOrFail($id)->delete();
        return redirect()->route('registration')->with('success','Course Deleted Successfully')
        ->with('type' , 'danger');
    }
}
