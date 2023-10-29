@extends('layouts.app')
@section('content')
    <main id="main">

        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Work Experience</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                        fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($data as $experience)
                            <div class="resume-item">
                                <h4>{{ $experience['designation'] }}</h4>
                                <h5>{{ $experience['work_period'] }}</h5>
                                <p><em>{{ $experience['company'] }}</em></p>
                                <p>
                                <ul>
                                    @for ($i = 0; $i < count($experience['work_list']); $i++)
                                        <li>{{ $experience['work_list'][$i]['description'] }}</li>
                                    @endfor
                                </ul>
                                </p>
                            </div>
                        @endforeach
                        <div class="resume-item">
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Resume Section -->

    </main><!-- End #main -->
@endsection
