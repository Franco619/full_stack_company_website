<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class MultiImageController extends Controller
{
    public function MultiImage(){
        $img = Multipic::all();
        return view('admin.Multi_image.multi_image' , compact('img'));
    }// end method

    public function StoreImage(Request $request){
   
       $image = $request->file('image');
       foreach($image as $images){

       
        $gen_name = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
        Image::make($images)->resize(300, 300)->save('image/multiImages/'.$gen_name);
          
        $last_img = 'image/multiImages/'.$gen_name;
        Multipic::insert([
            'image'=>$last_img,
            'created_at'=>Carbon::now()
         ]);
         $notification = array(
            'message' => 'Multi image Inserted Successfully with image',
            'alert-type'=>'success' 
         );
        }//end foreach
    
         return redirect()->back()->with( $notification);
    
   

    }

   // public function UserLogout(){
      //  Auth::logout();
       // $notification = array(
          //  'message' => 'Multi image Inserted Successfully with image',
           // 'alert-type'=>'success' 
       //  );
       // return redirect()->route('login')->with($notification);
   // }
    public function UserLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

           $notification = array(
            'message' => 'User Logout  Successfully', 
            'alert-type' => 'success'
        );

       // return redirect('/login')->with($notification);
        return redirect()->route('login')->with($notification);
    }//end method
}
