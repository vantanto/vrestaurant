<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Menu;
use App\Models\Review;
use App\Models\Time;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::where('active', true)
            ->limit(3)
            ->get();
        $about_main = About::select('title', 'description_short', 'image')
            ->where('is_main', true)
            ->first();
        $abouts = About::select('title', 'description_short', 'image')
            ->where('active', true)
            ->where('is_main', false)
            ->limit(3)
            ->get();
        $menus = Menu::where('active', true)
            ->limit(6)
            ->get();
        $events_upcomings = Event::where('active', true)
            ->where('date_start', '>', now())
            ->orderBy('date_start', 'asc')
            ->limit(3)
            ->get();
        $times = Time::where('active', true)
            ->orderBy('time')
            ->get();
        $reviews = Review::orderBy('id', 'desc')
            ->limit(3)
            ->get();
        $last_blogs = Blog::select('title', 'slug', 'published', 'description_short', 'bg_image')
            ->where('published', '<=', date('Y-m-d'))
            ->orderBy('published', 'desc')
            ->limit(3)
            ->get();
        return view('index', compact(
            'banners', 
            'about_main', 
            'abouts', 
            'menus',
            'events_upcomings',
            'times',
            'reviews',
            'last_blogs'
        ));
    }
}
