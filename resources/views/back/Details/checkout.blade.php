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
                            <form action="{{route('checkoutSubmit',$course->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
							<div class="row">
								<div class="col-xl-8 col-md-12">
									<div class="card">
										<div class="card-header border-bottom">
											<h3 class="card-title">Billing Information</h3>
										</div>
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

                                                <div class="col-sm-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="payment" class="form-label">Payment Method</label>
                                                        <select name="payment" id="payment" class="form-control" required>
                                                            <option value="0" selected>BKash</option>
                                                            <option value="1">Card</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
											</div>
										</div>
									</div>
									{{-- <div class="card">
										<div class="card-header border-bottom">
											<h3 class="card-title">Payment Information</h3>
										</div>
										<div class="card-body">
											<div class="card-pay">
												<ul class="tabs-menu nav checkout">
													<li><a href="#tab20" class="active" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Credit Card</a></li>
													<li><a href="#tab21" data-bs-toggle="tab"><i class="fa fa-paypal"></i>  Paypal</a></li>
													<li><a href="#tab22" data-bs-toggle="tab"><i class="fa fa-university"></i>  Bank Transfer</a></li>
												</ul>
												<div class="tab-content">
													<div class="tab-pane active show" id="tab20">
														<div class="bg-danger-transparent-2 text-danger br-3 mb-4" role="alert">Please Enter Valid Details</div>
														<div class="form-group">
															<label class="form-label">Card Holder Name</label>
															<input type="text" class="form-control" placeholder="First Name">
														</div>
														<div class="form-group">
															<label class="form-label">Card number</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="Search for...">
																<span class="input-group-text btn btn-success shadow-none">
																	<i class="fa fa-cc-visa"></i> &nbsp; <i class="fa fa-cc-amex"></i> &nbsp;
																	<i class="fa fa-cc-mastercard"></i>
																</span>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-8">
																<div class="form-group">
																	<label class="form-label">Expiration</label>
																	<div class="input-group">
																		<input type="number" class="form-control" placeholder="MM" name="Month">
																		<input type="number" class="form-control" placeholder="YYYY" name="Year">
																	</div>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="form-label">CVV <i class="fa fa-question-circle"></i></label>
																	<input type="number" class="form-control" required="">
																</div>
															</div>
														</div>
														<a href="#" class="btn btn-primary">Confirm</a>
													</div>
													<div class="tab-pane" id="tab21">
														<p>Paypal is easiest way to pay online</p>
														<p><a href="#" class="btn btn-primary"><i class="fa fa-paypal"></i> Log in my Paypal</a></p>
														<p class="mb-0"><strong>Note:</strong> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
													</div>
													<div class="tab-pane" id="tab22">
														<p>Bank account details</p>
														<dl class="card-text">
														<dt>BANK: </dt>
														<dd> THE UNION BANK 0456</dd>
														</dl>
														<dl class="card-text">
														<dt>Account Number: </dt>
														<dd> 67542897653214</dd>
														</dl>
														<dl class="card-text">
														<dt>IBAN: </dt>
														<dd>543218769</dd>
														</dl>
														<p class="mb-0"><strong>Note:</strong> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
													</div>
												</div>
											</div>
										</div>
									</div> --}}
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
													<input type="hidden" name="price" value="{{ $course->main_price }}">
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