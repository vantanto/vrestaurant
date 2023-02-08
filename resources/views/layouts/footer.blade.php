<!-- Footer -->
<footer class="bg1">
    <div class="container p-t-40 p-b-70">
        <div class="row">
            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-33">
                    Contact Us
                </h4>

                <ul class="m-b-70">
                    <li class="txt14 m-b-14">
                        <i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
                        Surabaya, Jawa Timur Indonesia
                    </li>

                    <li class="txt14 m-b-14">
                        <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
                        (+1) 23 456 7890
                    </li>

                    <li class="txt14 m-b-14">
                        <i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
                        kristanto.margojoyo99@gmail.com
                    </li>
                </ul>

                <!-- - -->
                <h4 class="txt13 m-b-32">
                    Opening Times
                </h4>

                <ul>
                    <li class="txt14">
                        09:30 AM – 11:00 PM
                    </li>

                    <li class="txt14">
                        Every Day
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-33">
                    About
                </h4>

                <div class="m-b-25">
                    <ul class="m-b-70">
                        <li class="txt14 m-b-14">
                            <a href="{{ route('members.abouts.index') }}">Menu</a>
                        </li>

                        <li class="txt14 m-b-14">
                            <a href="{{ route('members.reservations.create') }}">Reservation</a>
                        </li>

                        <li class="txt14 m-b-14">
                            <a href="{{ route('members.reservations.create') }}">Gallery</a>
                        </li>

                        <li class="txt14 m-b-14">
                            <a href="{{ route('members.abouts.index') }}">About Us</a>
                        </li>
    
                        <li class="txt14 m-b-14">
                            <a href="{{ route('members.contacts.index') }}">Contact Us</a>
                        </li>

                        <li class="txt14 m-b-14">
                            <a href="{{ route('members.blogs.index') }}">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-38">
                    Gallery
                </h4>

                <!-- Gallery footer -->
                <div class="wrap-gallery-footer flex-w">
                    @foreach ($galleries as $gallery)
                    <a class="item-gallery-footer wrap-pic-w" href="{{ Storage::disk('public')->url($gallery->image) }}" data-lightbox="gallery-footer">
                        <img data-original="{{ Storage::disk('public')->url($gallery->image) }}" class="lazyload" alt="GALLERY">
                    </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="end-footer bg2">
        <div class="container">
            <div class="flex-sb-m flex-w p-t-22 p-b-22">
                <div class="p-t-5 p-b-5">
                    <a href="https://github.com/vantanto" class="fs-15 c-white"><i class="fa fa-github" aria-hidden="true"></i></a>
                    <a href="https://facebook.com/vantanto.99" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
                </div>

                <div class="txt17 p-r-20 p-t-5 p-b-5">
                    Copyright &copy; 2023 <a href="https://github.com/vrestaurant" target="_blank">vrestaurant</a> | 
                    Build with <i class="fa fa-heart"></i> by <a href="https://github.com/vantanto" target="_blank">vantanto</a>
                </div>
            </div>
        </div>
    </div>
</footer>