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
								<div class="col-lg-12">
										<div class="card">
											<div class="row card-header border-bottom">
												<h3 class="col-md-6 card-title">Manage Course</h3>
                                                <a class="col-md-6 left login100-form-btn btn-primary" href="{{route('courseFrom')}}">Add New</a>
											</div>
											<div class="card-body">
												<div class="table-responsive">
													<table class="table editable-table table-nowrap table-bordered table-edit">
														<thead>
															<tr>
																<th>Sl.</th>
																<th>Course Title</th>
																<th>Status</th>
																<th>Edit</th>
															</tr>
														</thead>
														<tbody>
															@foreach ($courses as $course)
															<tr data-id="1">
																<td data-field="id">{{ $loop->iteration }}</td>
																<td data-field="name">{{ $course->course }}</td>
																<td data-field="name">{{ $course->status == 0 ? 'Active' : 'Inactive' }}</td>
																@if (Auth::check() && Auth::user()->role === 'teacher')
                                                                    <form action="{{route('courseEdit')}}" method="POST">
																		@csrf
																		<td style="width: 100px">
																			<input type="hidden" name="id" value="{{ $course->id }}">
																			{{-- <a class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
																				<i class="fe fe-edit"></i>
																			</a> --}}
																			<button class="btn btn-primary fs-14 text-white edit-icn">
																				<i class="fe fe-edit"></i>
																			</button>
																		</td>
																	</form>
                                                                @endif
															</tr>
															@endforeach
														</tbody>
													</table>
												</div>
											</div>
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