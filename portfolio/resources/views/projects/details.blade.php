@extends('layouts.app')
@section('content')
    <!-- start main -->
    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>{{ $data[0]['name'] }}</h2>
                    <p>{{ $data[0]['short_desc'] }}</p>
                </div>
                {{-- {{dd($data[0]['features'])}} --}}
                <div style="text-align:center">
                    <img src="{{ asset($data[0]['image']) }}" alt="{{ $data[0]['name'] }}" style="height:200px; width:300px;">
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="portfolio-info">
                            <h3>Project features:</h3>
                            <ul>
                                @foreach($data[0]['features'] as $feature)
                                <li>{{$feature}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>Project details:</h2>
                            <p>{{ $data[0]['long_desc'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section -->
    </main>
    <!-- End main -->
@endsection
