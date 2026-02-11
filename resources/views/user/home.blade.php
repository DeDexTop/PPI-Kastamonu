@extends('layout.main')

@section('containers')
<div class="container-fluid p-0 wow fadeIn bg-beige" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel py-5">
            <div class="container py-5">
                <div class="card border-0">
                    <div class="card-body bg-beige">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6">
                                <div class="carousel-text px-4">
                                    <p class="fs-5 text-red">Motto Kami</p>
                                    <h1 class="display-1 text-uppercase mb-3 text-red">"Berpadu Menuju Satu"</h1>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="carousel-img">
                                    <img class="w-100" src="{{ asset('img/home_page.JPG') }}" alt="Image" style="border-radius: 20px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class="card border-0">
                    <div class="card-body bg-beige">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6">
                                <div class="carousel-text px-4">
                                    <p class="fs-5 text-red">Jargon Kami</p>
                                    <h2 class="display-2 text-uppercase mb-3 text-red">"Bismillah Kastamonu Kuat"</h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="carousel-img">
                                    <img class="w-100" src="{{ asset('img/home_page2.JPG') }}" alt="Image" style="border-radius: 20px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

