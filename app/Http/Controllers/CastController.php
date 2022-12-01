<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function index()
    {
        return Inertia::render('Casts/Index');
    }
}
