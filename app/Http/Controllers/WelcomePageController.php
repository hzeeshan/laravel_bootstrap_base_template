<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }
}
