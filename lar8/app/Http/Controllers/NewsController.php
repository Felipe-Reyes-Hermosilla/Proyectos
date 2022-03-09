<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function newss()
    {
        return view('newss', [
            'newss' => News::latest()->paginate()
        ]);
    }

    public function news(News $news)
    {
        return view('news', ['news' => $news]);
    }
}
