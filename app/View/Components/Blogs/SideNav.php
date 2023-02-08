<?php

namespace App\View\Components\Blogs;

use App\Models\Blog;
use App\Models\CategoryBlog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class SideNav extends Component
{

    public $categoryBlogs;
    public $popularBlogs;
    public $archiveBlogs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $today = Carbon::now();
        $last_year = Carbon::now()->subYear();
        $last_month = Carbon::now()->subMonth();
        $this->categoryBlogs = CategoryBlog::all();
        $this->popularBlogs = Blog::select('title', 'slug', 'published', 'bg_image')
            ->where('published', '<=', $today->format('Y-m-d'))
            ->inRandomOrder()
            ->limit(5)
            ->get();
        $this->archiveBlogs = Blog::select('published')
            ->selectRaw('COUNT(id) as count_blog')
            ->whereBetween('published', [$last_year->format('Y-m-01'), $last_month->format('Y-m-t')])
            ->groupBy(DB::raw("DATE_FORMAT(published, '%m-%Y')"))
            ->orderBy('published')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blogs.side-nav');
    }
}
