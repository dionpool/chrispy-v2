<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home', [
//            'projects' => Project::all()->sortByDesc('created_at')
            'projects' => Project::where('status', 'published')
                ->orderBy('created_at', 'desc')
                ->get()
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function shop()
    {
        return view('shop');
    }
}
