<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand">
        {{ config('app.name') }}
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::routeIs('dashboard')) c-active @endif" href="{{ route('dashboard') }}">
                <i class="c-sidebar-nav-icon fa fa-home"></i>
                Dashboard
            </a>
        </li>
        <li class="c-sidebar-nav-title">Manage</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::routeIs('reservations.*')) c-active @endif" href="{{ route('reservations.index') }}">
                <i class="c-sidebar-nav-icon fa fa-ticket"></i>
                Reservation
            </a>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown 
            @if(Request::routeIs(['banners.*', 'abouts.*', 'galleries.*'])) c-show @endif">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <i class="c-sidebar-nav-icon fa fa-picture-o"></i>
                Content
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link @if(Request::routeIs('abouts.*')) c-active @endif" href="{{ route('abouts.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        About
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link @if(Request::routeIs('banners.*')) c-active @endif" href="{{ route('banners.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Banner
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link @if(Request::routeIs('galleries.*')) c-active @endif" href="{{ route('galleries.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Gallery
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown 
            @if(Request::routeIs(['blogs.*', 'category_blogs.*', 'chefs.*', 'events.*', 'foods.*', 'menus.*'])) c-show @endif">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <i class="c-sidebar-nav-icon fa fa-th-list"></i>
                Master Data
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link @if(Request::routeIs('blogs.*')) c-active @endif" href="{{ route('blogs.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Blog
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link @if(Request::routeIs('category_blogs.*')) c-active @endif" href="{{ route('category_blogs.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Category Blog
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link @if(Request::routeIs('chefs.*')) c-active @endif" href="{{ route('chefs.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Chef
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link @if(Request::routeIs('events.*')) c-active @endif" href="{{ route('events.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Event
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link @if(Request::routeIs('foods.*')) c-active @endif" href="{{ route('foods.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Food
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link @if(Request::routeIs('menus.*')) c-active @endif" href="{{ route('menus.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Menu
                    </a>
                </li>
            </ul>
        </li>
        @can('is_admin')
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(Request::routeIs('users.*')) c-active @endif" href="{{ route('users.index') }}">
                <i class="c-sidebar-nav-icon fa fa-user"></i>
                User
            </a>
        </li>
        @endcan
    </ul>
</div>