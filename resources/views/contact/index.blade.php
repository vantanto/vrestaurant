@extends('layouts.app')
@push('scriptsvendor')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>    
@endpush
@section('content')
<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15 lazyload" data-original="{{ Storage::disk('public')->url('images/bg-title-page-02.jpg') }}">
    <h2 class="tit6 t-center">
        Contact
    </h2>
</section>


<!-- Contact form -->
<section class="section-contact bg1-pattern p-t-90 p-b-113">
    <!-- Map -->
    <div class="container">
        <div class="map bo8 bo-rad-10 of-hidden">
            <div class="contact-map size37" id="google_map" data-map-x="40.704644" data-map-y="-74.011987" data-pin="{{ asset('assets/images/icons/icon-position-map.png') }}" data-scrollwhell="0" data-draggable="1"></div>
        </div>
    </div>

    <div class="container">
        <h3 class="tit7 t-center p-b-62 p-t-105">
            Send us a Message
        </h3>

        @if ($errors->contacts->any())
            <div class="wrap-form-reservation size22 m-l-r-auto">
                <ul class="text-danger">
                    @foreach ($errors->contacts->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('members.contacts.send_message') }}" class="wrap-form-reservation size22 m-l-r-auto">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <!-- Name -->
                    <span class="txt9">
                        Name
                    </span>

                    <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Email -->
                    <span class="txt9">
                        Email
                    </span>

                    <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="email" placeholder="Email" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Phone -->
                    <span class="txt9">
                        Phone
                    </span>

                    <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                        <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" placeholder="Phone" required>
                    </div>
                </div>

                <div class="col-12">
                    <!-- Message -->
                    <span class="txt9">
                        Message
                    </span>
                    <textarea class="bo-rad-10 size35 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-3" name="message" placeholder="Message" required></textarea>
                </div>
            </div>

            <div class="wrap-btn-booking flex-c-m m-t-13">
                <!-- Button3 -->
                <button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
                    Submit
                </button>
            </div>
        </form>

        <div class="row p-t-135">
            <div class="col-sm-8 col-md-4 col-lg-4 m-l-r-auto p-t-30">
                <div class="dis-flex m-l-23">
                    <div class="p-r-40 p-t-6">
                        <img src="{{ asset('assets/images/icons/map-icon.png') }}" alt="IMG-ICON">
                    </div>

                    <div class="flex-col-l">
                        <span class="txt5 p-b-10">
                            Location
                        </span>

                        <span class="txt23 size38">
                            Surabaya, Jawa Timur Indonesia
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 col-md-3 col-lg-4 m-l-r-auto p-t-30">
                <div class="dis-flex m-l-23">
                    <div class="p-r-40 p-t-6">
                        <img src="{{ asset('assets/images/icons/phone-icon.png') }}" alt="IMG-ICON">
                    </div>


                    <div class="flex-col-l">
                        <span class="txt5 p-b-10">
                            Call Us
                        </span>

                        <span class="txt23 size38">
                            (+1) 23 456 7890
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 col-md-5 col-lg-4 m-l-r-auto p-t-30">
                <div class="dis-flex m-l-23">
                    <div class="p-r-40 p-t-6">
                        <img src="{{ asset('assets/images/icons/clock-icon.png') }}" alt="IMG-ICON">
                    </div>


                    <div class="flex-col-l">
                        <span class="txt5 p-b-10">
                            Opening Hours
                        </span>

                        <span class="txt23 size38">
                            09:30 AM ??? 11:00 PM <br />Every Day
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="{{ asset('assets/js/pato/map-custom.js') }}"></script>
@endpush