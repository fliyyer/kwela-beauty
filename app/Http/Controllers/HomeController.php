<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $activePromotions = Promotion::active()->valid()->get();
        $featuredServices = Service::active()->limit(3)->get();
        
        return view('home.index', compact('activePromotions', 'featuredServices'));
    }
}
