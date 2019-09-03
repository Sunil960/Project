<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;

use Validator;

use App\Testimonial;

use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	 public function index()
    {
		$testimonial = Testimonial::all();
        return view('admin.testimonial.testimonial',['title' => 'Testimonial Management'])->with(array('testimonials' => $testimonial));
    }
	
	public function create()
    {
        return view('admin.testimonial.create',['title' => 'Create Testimonial']);
    }
	
	public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'position' => 'required',
            'testimonial_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
		if ($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		$testimonialImageName = 'front'.str_random(32).'.'.request()->testimonial_image->getClientOriginalExtension();
        request()->testimonial_image->move(public_path('images'), $testimonialImageName);
		
		$formData = array(
            'title' => $request->title,
            'description' => $request->description,
            'position' => $request->position,
            'testimonial_image' => $testimonialImageName
        );
		Testimonial::create($formData);
		return redirect('admin/testimonial')->with('status', 'Testimonial Created Successfully!');
    }
	
	public function edit($id)
    {
        $data = Testimonial::where('id', $id)->first();
        return view('admin.testimonial.edit',['title' => 'Edit Testimonial'])->with(array('testimonial' => $data));
    }
	
	public function update(Request $request, $id)
    {   
		
		if($request->has('testimonial_image')) {
			$validator['testimonial_image'] = 'required|image|jpeg,png,jpg,gif,svg|max:2048';
		}
         $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',         
            'position' => 'required'         
			]);
		if ($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		if($request->has('testimonial_image')) {
			$testimonialImageName = 'front'.str_random(32).'.'.request()->testimonial_image->getClientOriginalExtension();
			request()->testimonial_image->move(public_path('images'), $testimonialImageName);
		} 
		
		$Image = [];
		if($request->has('testimonial_image')) {
			$Image['testimonial_image'] = $testimonialImageName;
		}
			
		$update = array(
		    'title' => $request->title,
            'description' => $request->description,	
            'position' => $request->position	
        );
        $updateForm = array_merge($update,$Image);
		Testimonial::where('id',$id)->update($updateForm);
		return redirect('admin/testimonial')->with('status', 'Testimonial Updated Successfully!');
    }
	
	public function destroy($id)
    {
         Testimonial::where('id',$id)->delete();
		 return redirect('admin/testimonial')->with('status', 'Testimonial Deleted Successfully!');
    }
}