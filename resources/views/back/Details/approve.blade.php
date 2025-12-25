@extends('back.master')

@section('content')
  
        <!--app-content open-->
        <div class="app-content main-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">


                    <!-- ROW-4 -->
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="card product-sales-main">
                                        <div class="card-header border-bottom">
                                            <h3 class="card-title mb-0">Task List</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="data-table" class="table text-nowrap mb-0 table-bordered">
                                                    <thead class="table-head">
                                                        <tr>
                                                            <th class="bg-transparent border-bottom-0">Sl</th>
                                                            <th class="bg-transparent border-bottom-0 wp-15">Student Details</th>
                                                            <th class="bg-transparent border-bottom-0">Course Name</th>
                                                            <th class="bg-transparent border-bottom-0">Payment Mode</th>
                                                            <th class="bg-transparent border-bottom-0">Purchesh Date</th>
                                                            <th class="bg-transparent border-bottom-0">Status</th>
                                                            <th class="bg-transparent border-bottom-0 no-btn">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-body">
                                                        @foreach ($approves as $approve)
                                                        <tr>
                                                            <td class="text-muted fs-14 fw-semibold">{{ $loop->iteration}}</td>

                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="data-image avatar avatar-md rounded-circle" style="background-image: url(assets/images/users/11.jpg)"></span>
                                                                    <div class="user-details ms-2">
                                                                        <h6 class="mb-0">Skyler Hilda</h6>
                                                                        <span class="text-muted fs-12">member@spruko.com</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-muted fs-14 fw-semibold"><a href="#" class="text-dark" data-bs-target="#Vertically" data-bs-toggle="modal" >
                                                                {{$approve->courseModule->course_name}}
                                                            </a></td>
                                                            {{-- <td class="text-muted fs-13"><a href="project-details.html" class="text-dark">Noa Dashboard UI</a></td> --}}
                                                            <td class="text-muted fs-13">{{ $approve->payment == 0 ? 'Bkash' : 'Card' }}</td>
                                                            <td class="text-danger fs-14 fw-semibold">{{$approve->created_at}}</td>
                                                            <td class="text-muted fs-13">
                                                                {{ $approve->payment == 0 ? 'Pending' : ($approve->payment == 1 ? 'Approved' : 'Unapproved') }}
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-stretch">
                                                                    
                                                                    <form action="{{route('approvedSubmit',$approve->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="status" value='1'>
                                                                    <button type="submit" class="btn btn-sm btn-outline-primary border me-2" data-bs-toggle="tooltip" data-bs-original-title="Mark As Completed">
                                                                        <svg  xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20" width="16" viewBox="0 0 24 24"><path d="M15.8085327,8.6464844l-5.6464233,5.6464844l-2.4707031-2.4697266c-0.0023804-0.0023804-0.0047607-0.0047607-0.0072021-0.0071411c-0.1972046-0.1932373-0.5137329-0.1900635-0.7069702,0.0071411c-0.1932983,0.1972656-0.1900635,0.5137939,0.0071411,0.7070312l2.8242188,2.8232422C9.9022217,15.4474487,10.02948,15.5001831,10.1621094,15.5c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l6-6c0.0023804-0.0023804,0.0047607-0.0046997,0.0071411-0.0071411c0.1932373-0.1972046,0.1900635-0.5137329-0.0071411-0.7069702C16.3183594,8.446106,16.0018311,8.4493408,15.8085327,8.6464844z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>

                                                                    </button>
                                                                    </form>
                                                                    <form action="{{route('rejectSubmit',$approve->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="status" value='2'>
                                                                    <button type="submit" class="btn btn-sm btn-outline-secondary border me-2" data-bs-toggle="tooltip" data-bs-original-title="Reject">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 24 24" width="16"><path d="M0 0h24v24H0V0z" fill="none" /><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4h-3.5z" /></svg>

                                                                    </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- COL END -->
                            </div>
                            <!-- ROW-4 END -->

                



                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->

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