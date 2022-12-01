<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return Inertia::render('Movies/Index');
    }
}
