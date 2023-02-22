@extends('layouts.app')
@section('content')
<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15 lazyload" data-original="{{ Storage::disk('public')->url('images/bg-title-page-02.jpg') }}">
    <h2 class="tit6 t-center">
        Reservation
    </h2>
</section>


<!-- Reservation -->
<section class="section-reservation bg1-pattern p-t-100 p-b-113">
    <div class="container">
        <div class="tit2 t-center p-b-30">
            Thank You for Your Reservation
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="t-center">
                            <span class="tit2 t-center">
                                Reservation
                            </span>
        
                            <h3 class="tit3 t-center m-b-35 m-t-2">
                                {{ $reservation->code }}
                            </h3>
                        </div>
        
                        <div class="wrap-form-reservation size22 m-l-r-auto t-center">
                            <h4>
                                {{ date('d F Y', strtotime($reservation->date)) }} {{ date('h:i A', strtotime($reservation->time)) }}
                            </h4>
                            <h6>
                                {{ $reservation->name }} ({{ $reservation->people }} person)
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="info-reservation flex-w p-t-80">
            <div class="size23 w-full-md p-t-40 p-r-30 p-r-0-md">
                <h4 class="txt5 m-b-18">
                    Reserve by Phone
                </h4>

                <p class="size25">
                    Donec quis euismod purus. Donec feugiat ligula rhoncus, varius nisl sed, tincidunt lectus.
                    <span class="txt25">Nulla vulputate</span>
                    , lectus vel volutpat efficitur, orci
                    <span class="txt25">lacus sodales</span>
                    sem, sit amet quam:
                    <span class="txt24">(001) 345 6889</span>
                </p>
            </div>

            <div class="size24 w-full-md p-t-40">
                <h4 class="txt5 m-b-18">
                    For Event Booking
                </h4>

                <p class="size26">
                    Donec feugiat ligula rhoncus:
                    <span class="txt24">(001) 345 6889</span>
                    , varius nisl sed, tinci-dunt lectus sodales sem.
                </p>
            </div>

        </div>
    </div>
</section>
@endsection