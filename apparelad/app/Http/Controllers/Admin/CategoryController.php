<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;

use Validator;

use App\Category;

use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function index()
    {
		 $categoriesAll = DB::select('SELECT *, (SELECT name FROM categories WHERE id = T1.parent_id) AS parentCatName FROM categories AS T1');
        return view('admin.category.show',['title' => 'Category Management'])->with(array('allcategory' => $categoriesAll));
    }
	
	public function create()
    {
		$parentIds = Category::where('parent_id', '=', 0)->get();
        return view('admin.category.category',['title' => 'Add Category'])->with(array('parent_ids' => $parentIds));
    }
	
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent_id' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
		
		if ($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		
		$imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
		
		$formData = array(
            'name'      => $request->name,
            'parent_id' => $request->parent_id,
			'image'     => $imageName
        );
		Category::create($formData);
		return redirect('admin/category')->with('status', 'Category Created Successfully!');
    }
	
	public function edit($id)
    {
		$parentIds = Category::where('parent_id', '0')->get();
        $data = Category::where('id', $id)->first();
        return view('admin.category.edit',['title' => 'Edit Category'])->with(array('categories' => $data,'parent_ids' => $parentIds));
    }
	
	public function update(Request $request, $id)
    {
		
        $imageName = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent_id' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
		if ($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		$imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
		} 
		else
        {
            $request->validate([
                'name' => 'required',
                'parent_id' => 'required',
            ]);
        }
		$update = array(
            'name' => $request->name,
            'parent_id' => $request->parent_id,
			'image' => $imageName
        );
        Category::where('id',$id)->update($update);
        return redirect('admin/category')->with('status', 'Category Updated Successfully!');
    }
	public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect('admin/category')->with('status', 'Category Deleted Successfully!');
    }
}
