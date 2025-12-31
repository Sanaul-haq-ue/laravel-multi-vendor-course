@extends('back.master')

@section('content')
<div class="app-content main-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">

                                
							<!-- PAGE-HEADER -->
							<div class="page-header center">
								<div>
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (isset($success))
                                        <div class="alert alert-success">
                                            {{ $success }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
								</div>
							</div>
							<!-- PAGE-HEADER END -->        
                        </div>
                    </div>
                </div>
@endsection