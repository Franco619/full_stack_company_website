<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }

    public function AllBrand(){
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index' , compact('brands'));
    }//end method

    public function BrandStore(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
            
        ], 
    [
        'brand_name.required' => 'Please Input Brand Name',   
        'category_name.min' => 'Brand longer than 4 characters',
    ]);

    $brand_image = $request->file('brand_image');
    $gen_name = hexdec(uniqid());
    $img_ext = strtolower($brand_image->getClientOriginalExtension());
     $img_name = $gen_name.'.'.$img_ext;   //1213243.png

     $up_location = 'image/brand/';
     $last_img = $up_location.$img_name;

     $brand_image->move($up_location, $img_name);

     Brand::insert([
        'brand_name'=>$request->brand_name,
        'brand_image'=>$last_img,
        'created_at'=>Carbon::now()
     ]);
         
     $notification = array(
        'message' => 'Brand Inserted Successfully',
        'alert-type'=>'success' 
     );
     return redirect()->back()->with($notification);
    }


    public function EditBrand($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function BrandUpdate(Request $request, $id){
     $image = Brand::find($id);
     $old_image = $image->brand_image;
     @unlink($old_image);

     if ($request->file('brand_image')) {
    $brand_image = $request->file('brand_image');
        $gen_name = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300, 200)->save('image/brand/'.$gen_name);
          
        $last_img = 'image/brand/'.$gen_name;
         Brand::find($id)->update([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now()
         ]);
         $notification = array(
            'message' => 'Brand Updated   Successfully with image',
            'alert-type'=>'success' 
         );
    
         return redirect()->back()->with($notification);
    
        }else{

            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'created_at'=>Carbon::now()


            ]); 
            $notification = array(
            'message' => 'Brand Updated without Image Successfully', 
            'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);
        }

   
    }

    public function DeleteBrand($id){
          
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        @unlink($old_image);

        Brand::find($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted  Successfully',
            'alert-type'=>'success' 
         );
        return Redirect()->back()->with($notification);
    }
}
