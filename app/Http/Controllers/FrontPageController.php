<?php

namespace App\Http\Controllers;

use App\Models\Guitar;
use App\Models\Types;

class FrontPageController extends Controller
{
    public function index()
    {
        $guitars = Guitar::paginate(8);
        return view('frontpage.landingpage', compact('guitars'));
    }

    public function about($id)
    {
        $guitar = Guitar::where('id_list', $id)->firstOrFail();
    
        $guitarTypes = Types::where('id_type', $id)->get();
    
        return view('frontpage.about', compact('guitar', 'guitarTypes'));
    }
    
    public function contact()
    {
        return view('frontpage.contact');
    }
}
