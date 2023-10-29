@extends('layouts.app')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="color: white">
        <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <h1>{{ $data['about']['name'] }}</h1>
            <h2>{{ $data['about']['profession'] }}</h2>
            <a href="{{ asset('/about') }}" class="btn-about">About Me</a>
        </div>
    </section><!-- End Hero -->

    <!-- ======= About Section ======= -->
    {{-- {{dd($data)}} --}}
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About Myself</h2>
                <p>{{ $data['about']['short_description'] }}</p>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ $data['about']['image'] }}" class="img-fluid" alt="" style="height: 80%">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content">
                    <h3>{{ $data['about']['name'] }}</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul>
                                <li><i class="bi bi-rounded-right"></i> <strong>Email:</strong> {{ $data['about']['email'] }}</li>
                                <li><i class="bi bi-rounded-right"></i> <strong>Mobile:</strong> {{ $data['about']['mobile'] }}</li>
                                <li><i class="bi bi-rounded-right"></i> <strong>Present Address:</strong> {{ $data['about']['present_address'] }}</li>
                                <li><i class="bi bi-rounded-right"></i> <strong>Parmanent Address:</strong> {{ $data['about']['parmanent_address'] }}</li>
                            </ul>
                        </div>
                    </div>
                    <p>{{ $data['about']['long_description'] }}</p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->
    <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Education Qualification</h2>
            </div>
            <div class="row">
                @foreach ($data['education'] as $item)
                <div class="col-lg-6">
                    <div class="resume-item">
                        <h4>{{ $item['degree'] }}</h4>
                        <h5>{{ $item['year'] }}</h5>
                        <p><em>{{ $item['institite'] }}</em></p>
                        <p>{{ $item['description'] }}</p>
                    </div>
                    <div class="resume-item">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Skills</h2>
                <p>{{$data['skills']['description']}}</p>
            </div>

            <div class="row skills-content">

                <div class="col-lg-6">
                    @foreach ($data['skills']['category'] as $key => $skill)
                    <div class="progress">
                        <span class="skill">{{$skill['skill_type']}} <i class="val">{{$skill['percent']}}%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill['percent']}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    @if ($skill['id']%3 == 0)
                </div>

                <div class="col-lg-6">
                    @endif
                    @endforeach

            </div>

        </div>
    </section><!-- End Skills Section -->
@endsection
