<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;

class SliderController extends Controller
{
  public function HomeSlider(){
    $sliders = Slider::all();
    return view('admin.slider.home_slider' , compact('sliders'));
  }//end method


  public function AddSlider(){
    return view('admin.slider.create');
  }//end method

  public function StoreSlider(Request $request){
    $validated = $request->validate([
        'title' => 'required|unique:sliders|min:4',
        'description' => 'required|unique:sliders|min:4',
        'image' => 'required|mimes:jpg,jpeg,png',
        
    ], 
[
    'title.required' => 'Please Input Slider Title',   
    'description.min' => 'Brand longer than 4 characters',
]);

$images = $request->file('image');
 
$gen_name = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
Image::make($images)->resize(1920, 1088)->save('image/slider/'.$gen_name);
  
$last_img = 'image/slider/'.$gen_name;
 Slider::insert([
    'title'=>$request->title,
    'description'=>$request->description,
    'image'=>$last_img,
    'created_at'=>Carbon::now()
 ]);
 $notification = array(
  'message' => 'Slider Inserted Successfully', 
  'alert-type' => 'success'
);

 return redirect()->route('home.slider')->with( $notification);


  }//end method

  public function EditSlider($id){
    $sliders = Slider::find($id);
    return view('admin.slider.edit', compact('sliders'));
  }

  public function UpdateSlider(Request $request, $id){
$slide_id = $request->id;
if($request->file('image')){
  $image = $request->file('image');
  $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//34343443.jpg

  Image::make($image)->resize(300, 200)->save('upload/slider/'.$name_gen);

  $save_url = 'upload/slider/'.$name_gen;


  Slider::findorFail($slide_id)->update([
    'title'=>$request->title,
    'description'=>$request->description,
    'image'=>$save_url,
    'created_at'=>Carbon::now()
  ]);

    $notification = array(
      'message' => 'Slider  Updated with Image Successfully', 
      'alert-type' => 'success'
  );

  return redirect()->back()->with($notification);
} else{
  Slider::findorFail($slide_id)->update([
    'title'=>$request->title,
    'description'=>$request->description,
    'created_at'=>Carbon::now()
  ]);

    $notification = array(
      'message' => ' slider  Updated without Image Successfully', 
      'alert-type' => 'info'
  );

  return redirect()->back()->with($notification);
 }







  }

  public function DeleteSlider($id){
          
    $image = Slider::find($id);
    $old_image = $image->brand_image;
    @unlink($old_image);

    Slider::find($id)->delete();
    $notification = array(
      'message' => 'Slider Delete Successfully', 
      'alert-type' => 'success'
    );
    return Redirect()->back()->with($notification);
}
}
