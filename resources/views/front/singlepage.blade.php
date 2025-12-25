@extends('front.master')

@section('sss')

    {{-- !-- Page Title --> --}}
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Course Details</h1>
              <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Course Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Courses Course Details Section -->
    <section id="courses-course-details" class="courses-course-details section">

      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="{{asset($course->image)}}" class="img-fluid" alt="">
            <h3>{{$course->course_name}}</h3>
            <p>
                {{$course->description}}
            </p>
          </div>
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Trainer</h5>
              <p><a href="#">{{ $course->user?->name }}</a></p>
            </div>

            @if (!empty($course->regular_price))
                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Regular Course Fee</h5>
                    <p class="text-muted">
                        <del>{{ $course->regular_price }}</del> TK
                    </p>
                </div>
            @endif

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Course Fee</h5>
              <p>{{ $course->main_price }} TK</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Available Seats</h5>
              <p>{{ $course->seats }}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Schedule</h5>
              <p>{{ $course->schedule }}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Timing</h5>
              <p>{{ $course->timing }}</p>
            </div>
            @if (Auth()->check())
              <div class="course-info d-flex justify-content-between align-items-center">
                {{-- <button class="btn btn-success" >Buy Now</button> --}}
                <a href="{{ route('checkOut',$course->id)}}" class="btn btn-success">Buy Now</a>
              </div>
            @else
              <div class="course-info d-flex justify-content-between align-items-center">
                {{-- <button class="btn btn-success" >Buy Now</button> --}}
                <a href="{{ route('register')}}" class="btn btn-success">Buy Now</a>
              </div>
            @endif



          </div>
        </div>

      </div>

    </section><!-- /Courses Course Details Section -->

    <!-- Tabs Section -->
    <section id="tabs" class="tabs section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-3">
              <ul class="nav nav-tabs flex-column" role="tablist">
                  @foreach ($course->sections as $key => $section)
                      <li class="nav-item" role="presentation">
                          <a
                              class="nav-link {{ $key == 0 ? 'active' : '' }}"
                              data-bs-toggle="tab"
                              href="#tab-{{ $section->id }}"
                              role="tab"
                          >
                              {{ $section->name }}
                          </a>
                      </li>
                  @endforeach
              </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">

                @foreach ($course->sections as $key => $section)
                    <div
                        class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                        id="tab-{{ $section->id }}"
                        role="tabpanel"
                    >
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>{{ $section->tag }}</h3>
                                <p class="fst-italic">{{ $section->description }}</p>

                                <div class="row">
                                    @foreach($section->lessons as $lesson)
                                        <div class="col-lg-6">
                                            <p>• {{ $lesson->name }}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>• {{ $lesson->value }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="{{ asset($section->image) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        </div>

      </div>

    </section><!-- /Tabs Section -->

@endsection