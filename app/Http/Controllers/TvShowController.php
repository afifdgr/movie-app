<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class TvShowController extends Controller
{
    public function index()
    {
        return Inertia::render('TvShows/Index');
    }
}
