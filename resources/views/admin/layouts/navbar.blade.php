<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
        <i class="fa fa-bars"></i>
    </button>
    <a class="c-header-brand d-lg-none" href="#">
        {{ config('app.name') }}
    </a>
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="c-header-nav d-md-down-none">
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="c-header-nav-item px-3">
            <a class="c-header-nav-link" href="{{ route('reservations.index', [
                    'status' => \App\Models\Reservation::$Status['1'],
                    'date_start' => date('Y-m-01'),
                    'date_end' => date('Y-m-t'),
                    'sort' => 'date_desc'
                ]) }}">
                {{ ucwords(\App\Models\Reservation::$Status['1']) }} Reservation
            </a>
        </li>
    </ul>
    <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item d-md-down-none mx-2 @if(Auth::user()->is_admin === 1) text-danger @endif">
            {{ Auth::user()->name }}
        </li>
        <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar"><img class="c-avatar-img" src="{{ asset('assets/images/avatar.png') }}"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="p-2 text-center d-lg-none @if(Auth::user()->is_admin === 1) text-danger @endif">
                    {{ Auth::user()->name }}
                </div>
                <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
                <a class="dropdown-item" href="{{ route('profiles.edit') }}">
                    <i class="c-icon mr-2 fa fa-user-o"></i> Profile
                </a>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="c-icon mr-2 fa fa-sign-out"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</header>