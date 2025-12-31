@extends('back.master')

@section('content')
<div class="app-content main-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                                
							<!-- PAGE-HEADER -->
							<div class="page-header">
								<div>
									<h1 class="page-title">Checkout</h1>
								</div>
								<div class="ms-auto pageheader-btn">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">Apps</li>
										<li class="breadcrumb-item"><a href="javascript:void(0);">E-Commerce</a></li>
										<li class="breadcrumb-item active" aria-current="page">Checkout</li>
									</ol>
								</div>
							</div>
							<!-- PAGE-HEADER END -->

							<!-- ROW-1 OPEN -->
                            <form action="{{ url('/pay') }}" class="needs-validation" method="POST" enctype="multipart/form-data">
                            @csrf
							<div class="row">
								<div class="col-xl-8 col-md-12">
									<div class="card">
										<div class="card-header border-bottom">
											<h3 class="card-title">Billing Information</h3>
										</div>
										<input type="hidden" value="{{$course->id}}" name="courseModule_id" />
										<div class="card-body">
											<div class="row">
												<div class="col-sm-12 col-md-12">
													<div class="row">
														<div class="col-sm-6 col-md-6">
															
															<div class="form-group">
																<label class="form-label">Name <span class="text-red">*</span></label>
																<input type="text" name="name" value="{{Auth()->user()->name}}" class="form-control" placeholder="First name">
															</div>

															<div class="form-group">
																<label class="form-label">Email address <span class="text-red">*</span></label>
																<input type="email" name="email" value="{{Auth()->user()->email}}" class="form-control" placeholder="Email">
															</div>

															<div class="form-group">
																<label class="form-label">Date Of Birth <span class="text-red">*</span></label>
																<input type="date" name="date_of_birth" value="{{ optional(Auth::user()->profile)->date_of_birth }}"  class="form-control" placeholder="Home Address">
															</div>

															<div class="form-group">
																<label class="form-label">Mobile Number<span class="text-red">*</span></label>
																<input type="Number" name="phone" value="{{ optional(Auth::user()->profile)->phone }}"  class="form-control" placeholder="Mobile Number">
															</div>
														</div>
														<div class="col-sm-6 col-md-6">
															
															<div class="form-group">
																<label class="form-label">Image<span class="text-red">*</span></label>
																<input type="file" name="image" class="form-control" accept="image/*" required>
															</div>
														</div>

													</div>
												</div>
												

                                                <div class="card-header border-bottom col-md-12">
                                                    <h3 class="card-title">Last education Certification</h3>
                                                </div>

                                                <div class="col-sm-2 col-md-2">
													<div class="form-group">
                                                        <label for="certification" class="form-label">Certification</label>
                                                        <select name="certification" id="certification" class="form-control" required>
                                                            <option value="0" {{optional(Auth::user()->profile)->certification == 0 ? 'select': ''}}" >SSC</option>
                                                            <option value="1" {{optional(Auth::user()->profile)->certification == 1 ? 'select': ''}}>HSC</option>
                                                            <option value="2" {{optional(Auth::user()->profile)->certification == 2 ? 'select': ''}}>BSC/MBA/Honours</option>
                                                            <option value="3" {{optional(Auth::user()->profile)->certification == 3 ? 'select': ''}}>Masters</option>
                                                        </select>
													</div>
												</div>
                                                <div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Institute Name<span class="text-red">*</span></label>
														<input type="text" name="instituteName" value="{{optional(Auth::user()->profile)->instituteName}}" class="form-control" placeholder="Institute Name">
													</div>
												</div>
                                                <div class="col-sm-4 col-md-4">
													<div class="form-group">
														<label class="form-label">Passing Year<span class="text-red">*</span></label>
														<input type="number" name="passingYear" value="{{optional(Auth::user()->profile)->passingYear}}" class="form-control" placeholder="Passing Year">
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group">
														<label class="form-label">Address <span class="text-red">*</span></label>
														<input type="text" name="address" value="{{optional(Auth::user()->profile)->address}}" class="form-control" placeholder="Home Address">
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">City <span class="text-red">*</span></label>
														<input type="text" name="city" value="{{optional(Auth::user()->profile)->city}}" class="form-control" placeholder="City">
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Postal Code <span class="text-red">*</span></label>
														<input type="number" name="postalCode" value="{{optional(Auth::user()->profile)->postalCode}}" class="form-control" placeholder="ZIP Code">
													</div>
												</div>

                                                {{-- <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="payment" class="form-label">Payment Method</label>
                                                        <select name="payment" id="payment" class="form-control" required>
                                                            <option value="0" selected>BKash</option>
                                                            <option value="1">Card</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div> --}}
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-12">
									<div class="card cart">
										<div class="card-header border-bottom">
											<h3 class="card-title">Your Order</h3>
										</div>
										<div class="card-body">
											<div class="d-md-flex">
												<div class="d-flex">
													<img class="img-fluid avatar-xl border p-0 br-7" src="{{asset($course->image)}}" alt="img">
													<div class="ms-3 mt-2">
														<h4 class="mb-1 fw-semibold fs-14"><a href="#">{{$course->course_name}}</a></h4>
													</div>
												</div>
												<div class="ms-auto my-auto">
													<span class="me-4 my-auto fs-16 fw-semibold">{{$course->regular_price}}</span>
												</div>
											</div>
											<table class="table mt-5">
												<tr>
													<td class="border-top-0">Discount</td>
													<td class="text-end border-top-0">5%</td>
												</tr>
												<tr>
													<td class="fs-20 border-top-0">Total</td>
													<td class="text-end fs-20 border-top-0">{{$course->main_price}}</td>
													<input type="hidden" name="total_amount" value="{{ $course->main_price }}">
													<input type="hidden" name="teacher_created_by_id" value="{{ $course->created_by }}">
												</tr>
											</table>
										</div>
										<div class="card-footer text-end">
											{{-- <a href="#" class="btn btn-primary">Place Order</a> --}}
											<Button type="submit" class="btn btn-primary">Place Order</Button>
										</div>
									</div>
								</div>
                                
							</div><!-- COL-END -->
                            </form>
							<!-- ROW-1 CLOSED -->

                            
                        </div>
                    </div>
                </div>
@endsection