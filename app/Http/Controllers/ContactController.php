<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;
class ContactController extends Controller
{
    public function AdminContact(){
        $contacts =Contact::all(); 
        return view('admin.contact.index' , compact('contacts'));
    }

    public function AddContact(){
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request){
        $validated = $request->validate([
            'address' => 'required|unique:contacts|min:4',
            'email' => 'required|unique:contacts|min:4',
            'phone' => 'required|unique:contacts|min:4',
            
        ], 
    [
        'address.required' => 'Please Input Addresss ',   
        'email.min' => 'Brand longer than 4 characters',
    ]);
    
     Contact::insert([
        'address'=>$request->address,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'created_at'=>Carbon::now()
     ]);
    
     return redirect()->route('admin.contact')->with('success', 'Contact Inserted Successfully');
    
    
     
    }

    public function EditContact($id){
        $contacts = Contact::find($id);
        return view('admin.contact.edit', compact('contacts'));
      }

      public function UpdateContact(Request $request, $id){
  
        Contact::find($id)->update([
           'address'=>$request->address,
           'email'=>$request->email,
           'phone'=>$request->phone,
           'created_at'=>Carbon::now()
        ]);
       
        return redirect()->route('admin.contact')->with('success', 'Contact updated  Successfully');
       
         }

         public function DeleteContact($id){
    
            Contact::find($id)->delete();
            return Redirect()->back()->with('success', 'Contact Delete Successfully');
        }
}
