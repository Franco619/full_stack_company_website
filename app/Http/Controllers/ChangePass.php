<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
class ChangePass extends Controller
{
    public function ChangePassword(){
        return view('admin.body.change_password');
    }

    public function PasswordUpdate(Request $request){
        $validatedData = $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed'
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->current_password, $hashedPassword )){
            $user =User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'password change successfully', 
                'alert-type' => 'success'
            );
            return Redirect()->route('login')->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Current password is invalid', 
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function ProfileUpdate(){
       // if(Auth::user()){
          //  $user = User::find(Auth::user()->id);
           // if($user){
              //  return view('admin.body.update_profile' , compact('user'));
          //  }
        //}
        
            $id = Auth::user()->id;
            $user = User::find($id);
            
            return view('admin.body.update_profile',compact('user'));
    
        }// End Method 
    

    public function UpdateUser(Request $request){
        // $user = User::find(Auth::user()->id);
       //  if($user){
            //$user->name = $request['name'];
           // $user->email = $request['email'];
           // $user->profile_photo_path = $request['profile_photo_path'];

           // $user->save();
           // $notification = array(
             //   'message' => 'User profile updated successfully', 
              //  'alert-type' => 'success'
          //  );
            
          //  return Redirect()->back()->with( $notification);
        // }else{
          //  $notification = array(
             //   'message' => 'something went wrong', 
             //   'alert-type' => 'success'
           // );
           // return Redirect()->back()->with( $notification);
       //  }

       $id = Auth::user()->id;
       $data = User::find($id);
       $data->name = $request->name;
       $data->email = $request->email;
       

       if ($request->file('profile_photo_path')) {
          $file = $request->file('profile_photo_path');

          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/admin_images'),$filename);
          $data['profile_photo_path'] = $filename;
       }
       $data->save();

       $notification = array(
        'message' => 'Admin Profile Updated Successfully', 
        'alert-type' => 'success'
    );


       return redirect()->back()->with($notification);
    }

    
}
