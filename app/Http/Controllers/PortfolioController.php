<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multipic;
use App\Models\Contact;
class PortfolioController extends Controller
{
    public function Portfolio(){
        $images = Multipic::all();
        return view('pages.portfolio' , compact('images'));
    }

    public function Contact(){
        $contact = Contact::first();
        return view('pages.contact' , compact('contact'));
    }
}
