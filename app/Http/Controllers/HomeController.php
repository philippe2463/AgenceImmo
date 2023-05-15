<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        
        return view('home', [
            'properties' => Property::orderBy('created_at', 'desc')->limit(4)->get()
        ]);
    }
}
