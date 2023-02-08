<div class="col-md-4 col-lg-3">
    <div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
        <!-- Search -->
        <form method="get" action="{{ route('members.blogs.index') }}">
            <div class="search-sidebar2 size12 bo2 pos-relative">
                <input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search" placeholder="Search">
                <button type="submit" class="btn-search-sidebar2 flex-c-m fa fa-search trans-0-4"></button>
            </div>
        </form>

        <!-- Categories -->
        <div class="categories">
            <h4 class="txt33 bo5-b p-b-35 p-t-58">
                Categories
            </h4>

            <ul>
                @foreach ($categoryBlogs as $categoryBlog)
                <li class="bo5-b p-t-8 p-b-8">
                    <a href="{{ route('members.blogs.index', ['category' => $categoryBlog->id]) }}" class="txt27">
                        {{ $categoryBlog->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Most Popular -->
        <div class="popular">
            <h4 class="txt33 p-b-35 p-t-58">
                Most popular
            </h4>

            <ul>
                @foreach ($popularBlogs as $popularBlog)
                <li class="flex-w m-b-25">
                    <div class="size16 bo-rad-10 wrap-pic-w of-hidden m-r-18">
                        <a href="{{ route('members.blogs.show', $popularBlog->slug) }}">
                            <img data-original="{{ Storage::disk('public')->url($popularBlog->bg_image) }}" class="lazyload" alt="IMG-BLOG">
                        </a>
                    </div>

                    <div class="size28">
                        <a href="{{ route('members.blogs.show', $popularBlog->slug) }}" class="dis-block txt28 m-b-8">
                            {{ $popularBlog->title }}
                        </a>

                        <span class="txt14">
                            {{ Carbon::parse($popularBlog->published)->diffForHumans() }}
                        </span>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>


        <!-- Archive -->
        <div class="archive">
            <h4 class="txt33 p-b-20 p-t-43">
                Archive
            </h4>

            <ul>
                @foreach ($archiveBlogs as $archiveBlog)
                    <li class="flex-sb-m p-t-8 p-b-8">
                        <a href="{{ route('members.blogs.index', ['month' => date('Y-m', strtotime($archiveBlog->published))]) }}" class="txt27">
                            {{ date('F Y', strtotime($archiveBlog->published)) }}
                        </a>

                        <span class="txt29">
                            ({{ $archiveBlog->count_blog }})
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>