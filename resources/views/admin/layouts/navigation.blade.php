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
        <li class="c-sidebar-nav-title">Content</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown 
            @if(Request::routeIs(['banners.*', 'abouts.*'])) c-show @endif">
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
            </ul>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link @if(Request::routeIs('banners.*')) c-active @endif" href="{{ route('banners.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Banner
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>