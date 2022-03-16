<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function newss()
    {
        return view('newss', ['newss' => News::latest()->take(1)->get()], ['newss2' => News::latest()->skip(1)->take(3)->get()]);
    }

    public function news(News $news)
    {
        return view('news', ['news' => $news]);
    }
}
