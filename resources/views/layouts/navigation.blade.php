<div>
    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="wrap-menu-header gradient1 trans-0-4">
            <div class="container h-full">
                <div class="wrap_header trans-0-3">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/images/icons/logo.png') }}" alt="IMG-LOGO" data-logofixed="{{ asset('assets/images/icons/logo2.png') }}">
                        </a>
                    </div>

                    <!-- Menu -->
                    <div class="wrap_menu p-l-45 p-l-0-xl">
                        <nav class="menu">
                            <ul class="main_menu">
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>

                                <li>
                                    <a href="{{ route('members.menus.index') }}">Menu</a>
                                </li>

                                <li>
                                    <a href="{{ route('members.reservations.create') }}">Reservation</a>
                                </li>

                                <li>
                                    <a href="{{ route('members.reservations.create') }}">Gallery</a>
                                </li>

                                <li>
                                    <a href="{{ route('members.abouts.index') }}">About</a>
                                </li>

                                <li>
                                    <a href="{{ route('members.blogs.index') }}">Blog</a>
                                </li>

                                <li>
                                    <a href="{{ route('members.contacts.index') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Social -->
                    <div class="social flex-w flex-l-m p-r-20">
                        <a href="https://github.com/vantanto"><i class="fa fa-github" aria-hidden="true"></i></a>
                        <a href="https://facebook.com/vantanto.99"><i class="fa fa-facebook m-l-21" aria-hidden="true"></i></a>

                        <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar trans-0-4">
        <!-- Button Hide sidebar -->
        <button class="btn-hide-sidebar fa fa-times color0-hov trans-0-4"></button>

        <!-- - -->
        <ul class="menu-sidebar p-t-95 p-b-70">
            <li class="t-center m-b-13">
                <a href="{{ url('/') }}" class="txt19">Home</a>
            </li>

            <li class="t-center m-b-13">
                <a href="{{ route('members.menus.index') }}" class="txt19">Menu</a>
            </li>

            <li class="t-center m-b-13">
                <a href="{{ route('members.galleries.index') }}" class="txt19">Gallery</a>
            </li>

            <li class="t-center m-b-13">
                <a href="{{ route('members.abouts.index') }}" class="txt19">About</a>
            </li>

            <li class="t-center m-b-13">
                <a href="{{ route('members.blogs.index') }}" class="txt19">Blog</a>
            </li>

            <li class="t-center m-b-33">
                <a href="{{ route('members.contacts.index') }}" class="txt19">Contact</a>
            </li>

            <li class="t-center">
                <!-- Button3 -->
                <a href="{{ route('members.reservations.create') }}" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
                    Reservation
                </a>
            </li>
        </ul>

        <!-- - -->
        {{-- <div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
            <!-- - -->
            <h4 class="txt20 m-b-33">
                Gallery
            </h4>

            <!-- Gallery -->
            <div class="wrap-gallery-sidebar flex-w">
                @foreach ($galleries as $gallery)
                <a class="item-gallery-sidebar wrap-pic-w" href="{{ Storage::disk('public')->url($gallery->image) }}" data-lightbox="gallery-footer">
                    <img data-original="{{ Storage::disk('public')->url($gallery->image) }}" class="lazyload" alt="GALLERY">
                </a>
                @endforeach
            </div>
        </div> --}}
    </aside>
</div>