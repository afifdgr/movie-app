<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;


class CastController extends Controller
{
    public function index()
    {
        return Inertia::render('Casts/Index', [
            'casts' => Cast::paginate(5),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }
}
