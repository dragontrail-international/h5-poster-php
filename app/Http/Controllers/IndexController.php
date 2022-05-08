<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index()
    {
        $html = Str::markdown(file_get_contents(base_path('README.md')));
        return view('index', ['html' => $html]);
    }
}
