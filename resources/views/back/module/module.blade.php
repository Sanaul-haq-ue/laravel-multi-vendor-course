@extends('back.master')

@section('content')
     
                <div class="app-content main-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                                
							<!-- PAGE-HEADER -->
							<div class="page-header">
								<div>
									<h1 class="page-title">Course Module</h1>
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
												<h3 class="col-md-6 card-title">Manage Course Module</h3>
                                                <a class="col-md-6 left login100-form-btn btn-primary" href="{{route('moduleFrom')}}">Add New</a>
											</div>

											<div class="card-body">
												{{-- Search / Filter Bar --}}
													<div class="mb-3">
														<form method="GET" action="{{ route('module') }}" class="row g-2">

															{{-- Subject Filter --}}
															<div class="col-md-3">
																<label>Select Subject</label>
																<select name="subject_id" class="form-control">
																	<option value="">-- Select Subject --</option>
																	@foreach($subjects as $subject)
																		<option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
																			{{ $subject->subject }}
																		</option>
																	@endforeach
																</select>
															</div>

															{{-- Course Filter --}}
															<div class="col-md-3">
																<label>Select Course</label>
																<select name="course_id" class="form-control">
																	<option value="">-- Select Course --</option>
																	@foreach($courses as $course)
																		<option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
																			{{ $course->course }}
																		</option>
																	@endforeach
																</select>
															</div>

															{{-- Status Filter --}}
															<div class="col-md-3">
																<label>Status</label>
																<select name="status" class="form-control">
																	<option value="">-- Select Status --</option>
																	<option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Active</option>
																	<option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Inactive</option>
																</select>
															</div>

															{{-- Search Button --}}
															<div class="col-md-3">
																
																<button type="submit" class="btn btn-primary w-100">Search</button>
															</div>

														</form>
													</div>

											</div>
											<div class="card-body">
												<div class="table-responsive">
													<table class="table editable-table table-nowrap table-bordered table-edit">
														<thead>
															<tr>
																<th>Sl.</th>
																<th>Subject</th>
                                                                <th>Course Title</th>
                                                                <th>Course Name</th>
																<th>Status</th>
																<th>Approved Status</th>
																@if (Auth::check() && Auth::user()->role === 'teacher')
																	<th>Action</th>
																@endif
															</tr>
														</thead>
														<tbody>
															@foreach ($modules as $module)
															<tr data-id="1">
																<td data-field="id">{{ $modules->firstItem() + $loop->index }}</td>
																<td data-field="name">{{ $module->subject->subject }}</td>
                                                                <td data-field="name">{{ $module->course->course }}</td>
                                                                <td data-field="name">{{ $module->course_name }}</td>
																<td data-field="name">{{ $module->status == 0 ? 'Active' : 'Inactive' }}</td>
																<td data-field="name">{{ $module->approved_status == 0 ? 'Pending' : ($module->approved_status == 1 ? 'Approved' : 'Reject' ) }}</td>
																@if (Auth::check() && Auth::user()->role === 'teacher')
                                                                    <form action="{{route('courseEdit')}}" method="POST">
																		@csrf
																		<td style="width: 100px">
																			<input type="hidden" name="id" value="{{ $module->id }}">
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
													<div class="mt-3 d-flex justify-content-center">
														{{ $modules->links() }}
													</div>
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