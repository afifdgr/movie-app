<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;


class TagController extends Controller
{
    public function index()
    {
        return Inertia::render('Tags/Index', [
            'tags' => Tag::paginate(1)
        ]);
    }

    public function create()
    {
        return Inertia::render('Tags/Create');
    }

    public function store()
    {
        Tag::create([
            'tag_name' => Request::input('tagName'),
            'slug' => Str::slug(Request::input('tagName'))
        ]);

        return Redirect::route('admin.tags.index')->with('flash.banner', 'Tag Created');
    }
}
