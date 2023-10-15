<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Carbon;
class AboutController extends Controller
{
    public function AboutUs(){
        $aboutus = About::latest()->get();
        return view('admin.about.about' , compact('aboutus'));
    }

    public function AddAbout(){
        return view('admin.about.create');
    }

    public function StoreAbout(Request $request){
        $validated = $request->validate([
            'title' => 'required|unique:abouts|min:4',
            'short_description' => 'required|unique:abouts|min:4',
            'long_description' => 'required|unique:abouts|min:4',
            
        ], 
    [
        'title.required' => 'Please Input About Title',   
        'short_description.min' => 'Brand longer than 4 characters',
    ]);
    
     About::insert([
        'title'=>$request->title,
        'short_description'=>$request->short_description,
        'long_description'=>$request->long_description,
        'created_at'=>Carbon::now()
     ]);

     $notification = array(
        'message' => 'About Inserted Successfully', 
        'alert-type' => 'success'
    );
    
     return redirect()->route('about.us')->with($notification);
    
    
      }//end method


      public function EditAbout($id){
        $abouts = About::find($id);
        return view('admin.about.edit', compact('abouts'));
      }

      public function UpdateAbout(Request $request, $id){
  
     About::find($id)->update([
        'title'=>$request->title,
        'short_description'=>$request->short_description,
        'long_description'=>$request->long_description,
        'created_at'=>Carbon::now()
     ]);
     $notification = array(
        'message' => 'About updated Successfully', 
        'alert-type' => 'success'
    );
     return redirect()->route('about.us')->with($notification);
    
      }

      public function DeleteAbout($id){
    
        About::find($id)->delete();
        $notification = array(
            'message' => 'About Delete Successfully', 
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
