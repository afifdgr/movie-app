<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return Inertia::render('Tags/Index');
    }
}
