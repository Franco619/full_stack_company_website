<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }
    public function AllCat(){
        $categories = Category::latest()->paginate(5);
        $trachCat = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index' , compact('categories', 'trachCat'));
    }// end method

    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ], 
    [
        'category_name.required' => 'Please Input Category Name',   
        'category_name.max' => 'Category less than 255 characters',
    ]);

    Category::insert([
        'category_name'=>$request->category_name,
        'user_id'=>Auth::user()->id,
        'created_at'=>Carbon::now(),
    ]);

    //$category = new Category;
    //$category-> category_name =$request->category_name;
    //$category->user_id = Auth::user()->id;
    //$category->save();

    return redirect()->back()->with('success', 'Category Inserted Successfully');
    }

    public function EditCategory($id){
      
        $categories = Category::find($id);
        return view('admin.category.edit' , compact('categories'));
    }

    public function Update(Request $request , $id){
      $update = Category::find($id)->update([
        'category_name'=>$request->category_name	,
        'user_id'=>Auth::user()->id
      ]);  
      
      return redirect()->route('all.category')->with('success' , 'Category Updated Successfully');
    }


    public function SoftdeleteCategory($id){
      $delete = Category::find($id)->delete();

      return redirect()->back()->with('success', 'Category Soft deleted succussfully');   

    }//end method

    public function RestoreCategory($id){
      $delete = Category::withTrashed()->find($id)->restore();
      return redirect()->back()->with('success', 'Category Restored succussfully');   
    }//end method

    public function PdeleteCategory($id){
      $delete = Category::onlyTrashed()->find($id)->ForceDelete();
      return redirect()->back()->with('success', 'Category Permanently Deleted  succussfully');   
    }


}
