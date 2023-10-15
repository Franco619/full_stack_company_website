<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Carbon;
class MessageController extends Controller
{
    public function Message(Request $request){
     Message::insert([
        'name'=>$request->name,
        'email'=>$request->email,
        'subject'=>$request->subject,
        'message'=>$request->message,
        'created_at'=>Carbon::now()
     ]);
     $notification = array(
      'message' => 'Message Sent Successfully', 
      'alert-type' => 'success'
  );
    
     return redirect()->back()->with($notification);
    
    
      }//end method

      public function ContactMessage(){
        $messages = Message::all();
        return view('admin.message.message' , compact('messages'));
      }

      public function MessageDeleted($id){
    
        Message::find($id)->delete();
        $notification = array(
          'message' => 'Message Deleted Successfully', 
          'alert-type' => 'success'
      );
        return Redirect()->back()->with( $notification);
    }

    public function Pricing(){
      return view('layouts.body.pricing');
  }

  public function Services(){
    return view('layouts.body.service');
}

public function Blog(){
  return view('layouts.body.blog');
}

public function HomeAbout(){
  return view('layouts.body.home_about');
}

}
