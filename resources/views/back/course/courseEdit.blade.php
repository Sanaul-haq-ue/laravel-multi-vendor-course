@extends('back.master')

@section('content')
     
                <div class="app-content main-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                                
							<!-- PAGE-HEADER -->
							<div class="page-header">
								<div>
									<h1 class="page-title">Course</h1>
								</div>
								<div class="ms-auto pageheader-btn">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
										<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
									</ol>
								</div>
							</div>
							<!-- PAGE-HEADER END -->

							<!-- Row -->
							<div class="row">
								<div class="card box-shadow-0">
										<div class="card-header border-bottom">
											<h4 class="card-title">Course Form</h4>
										</div>
										<div class="card-body">
											<form action="{{route('courseUpdate',$course->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
												<div class="form-group">
													<label for="exampleInputEmail2">New Subject Create</label>
													<input type="text" name="course" value="{{ $course->course }}" class="form-control" id="exampleInputEmail2" placeholder="Enter New Course">
												</div>
                                                <div class="form-group mt-2">
													<label for="status">Status</label>
													<select name="status" id="status" class="form-control" required>
														<option value="0" {{ $course->status == 0 ? 'selected' : '' }}>Active</option>
														<option value="1" {{ $course->status == 1 ? 'selected' : '' }}>Inactive</option>
													</select>
												</div>
												
												<button type="submit" class="btn btn-primary mt-3">Submit</button>
											</form>
										</div>
									</div>
							</div>
							<!-- End Row -->

                        </div>
                    </div>
                </div>   
            
    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright © 2022 <a href="#">Noa</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="#"> Spruko </a> All rights reserved
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER CLOSED -->

@endsection