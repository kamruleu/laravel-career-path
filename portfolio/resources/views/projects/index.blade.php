@extends('layouts.app')
@section('content')
    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>My Projects</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box {{ $item['icon_box_color'] }}">
                                <div class="icon">
                                    <svg width="100" height="100" viewBox="0 0 600 600"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="none" stroke-width="0" fill="#f5f5f5" d="{{ $item['icon_d_path'] }}">
                                        </path>
                                    </svg>
                                    <i class="{{ $item['icon'] }}"></i>
                                </div>
                                <h4><a href="{{ asset('/project_details/'.$item['id'])}}">{{ $item['name'] }}</a></h4>
                                <p>{{ $item['short_desc'] }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Services Section -->

    </main><!-- End #main -->
@endsection
