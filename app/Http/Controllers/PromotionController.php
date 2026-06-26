<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of promotions.
     */
    public function index()
    {
        $promotions = Promotion::active()->valid()->get();
        
        return view('promotions.index', compact('promotions'));
    }
}
