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
								<div class="card box-shadow-0">
										<div class="card-header border-bottom">
											<h4 class="card-title">Add New Course Module Form</h4>
										</div>
                                        @if ($errors->any())
                                            <div style="color:red">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                       @if(session('success'))
                                            <p style="color:green">{{ session('success') }}</p>
                                        @endif
                                        <form action="{{route('moduleSubmit')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
										    <div class="row m-2">
                                                
                                                <div class="card-body col-md-8">
                                                    
                                                    <div class="form-group">
                                                        <label>Select Subject<span class="text-red">*</span></label>
                                                        <select name="subject_id" class="form-control" required>
                                                            <option value="">-- Select Subject --</option>
                                                            @foreach($subjects as $subject)
                                                                <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Select Course<span class="text-red">*</span></label>
                                                        <select name="course_id" class="form-control" required>
                                                            <option value="">-- Select Course --</option>
                                                            @foreach($courses as $course)
                                                                <option value="{{ $course->id }}">{{ $course->course }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail2">Enter Course Name<span class="text-red">*</span></label>
                                                        <input type="text" name="course_name" class="form-control" id="exampleInputEmail2" placeholder="Enter New Course Title">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Course Image<span class="text-red">*</span></label>
                                                        <input type="file" name="image" class="form-control" accept="image/*" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Main Description<span class="text-red">*</span></label>
                                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Modules<span class="text-red">*</span></label>

                                                        <button type="button" class="btn btn-success w-100 mb-3 add-module">
                                                            + Add Module
                                                        </button>

                                                        <div id="modules-container"></div>
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <label for="status">Status</label>
                                                        <select name="status" id="status" class="form-control" required>
                                                            <option value="0" selected>Active</option>
                                                            <option value="1">Inactive</option>
                                                            
                                                        </select>
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                                
                                                </div>
                                                <div class="card-body col-md-4">
                                                    
                                                    <div class="form-group">
                                                        <label for="regular_price">Course Price</label>
                                                        <input type="text" name="regular_price" class="form-control" id="regular_price" placeholder="Enter Course Price">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Main_price">Course Price After Discount<span class="text-red">*</span></label>
                                                        <input type="text" name="main_price" class="form-control" id="Main_price" placeholder="Enter Course After Discount price">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="seats">Available Seats<span class="text-red">*</span></label>
                                                        <input type="text" name="seats" class="form-control" id="seats" placeholder="Available Seats">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="schedule">Schedule<span class="text-red">*</span></label>
                                                        <input type="text" name="schedule" class="form-control" id="schedule" placeholder="Enter Shedule">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="timing">Course Timing<span class="text-red">*</span></label>
                                                        <input type="text" name="timing" class="form-control" id="timing" placeholder="Enter Timing">
                                                    </div>
                        
                                                </div>
                    
                                            </div>
                                        </form>
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


    {{-- <script>
    document.addEventListener('click', function (e) {

        // Add new row
        if (e.target.classList.contains('add-more')) {
            let container = document.getElementById('extra-fields');

            let row = document.createElement('div');
            row.classList.add('input-group', 'mb-2');

            let row2 = document.createElement('div');
            row2.classList.add('input-group', 'mb-2');

            row.innerHTML = `
                <input type="text" name="extras[name][]" class="form-control mr-2" placeholder="Enter Function Name">
                <input type="text" name="extras[value][]" class="form-control mr-2" placeholder="Enter Function Value">
                <button type="button" class="btn btn-success add-more2">+Add Lesson</button>
                
                <button type="button" class="btn btn-danger remove">−</button>
            `;

            row2.innerHTML = `
                <div class="card card-body module-box"> <h1>Lesson</h1>
                    <div class="extra-fieldss mb-4"></div>
                </div>
                
            `;

            container.appendChild(row);

            container.appendChild(row2);
        }

        // Remove row
        if (e.target.classList.contains('remove')) {
            e.target.parentElement.remove();
        }
    });
    </script>

    <script>
    document.addEventListener('click', function (e) {

    // Add lesson
    if (e.target.classList.contains('add-more2')) {

        // Find the closest module card
        let moduleCard = e.target.closest('.module-box');

        // Find the lesson container inside this module
        let container = moduleCard.querySelector('.extra-fieldss');

        let row = document.createElement('div');
        row.classList.add('input-group', 'mb-2');

        row.innerHTML = `
            <input type="text" name="lessons[name][]" class="form-control mr-2" placeholder="Lesson Name">
            <input type="text" name="lessons[value][]" class="form-control mr-2" placeholder="Lesson Value">
            <button type="button" class="btn btn-danger remove">−</button>
        `;

        container.appendChild(row);
    }

    // Remove row
    if (e.target.classList.contains('remove')) {
        e.target.closest('.input-group').remove();
    }
});

    </script> --}}





<script>
document.addEventListener('click', function (e) {

    /* =========================
       ADD MODULE
    ==========================*/
    if (e.target.classList.contains('add-module')) {

        const modulesContainer = document.getElementById('modules-container');
        const moduleIndex = document.querySelectorAll('.module-box').length;

        const moduleBox = document.createElement('div');
        moduleBox.classList.add('card', 'mb-4', 'module-box');

        moduleBox.innerHTML = `
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>Module</strong>
                <button type="button" class="btn btn-sm btn-danger remove-module">Remove</button>
            </div>

            <div class="card-body">

                <!-- Module Basic Info -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Module Name<span class="text-red">*</span></label>
                        <input type="text"
                               name="modules[${moduleIndex}][name]"
                               class="form-control"
                               placeholder="Module Name"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Module Image<span class="text-red">*</span></label>
                        <input type="file"
                               name="modules[${moduleIndex}][image]"
                               class="form-control"
                               accept="image/*">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tag Line</label>
                    <input type="text"
                            name="modules[${moduleIndex}][tag]"
                            class="form-control"
                            placeholder="Tag Line"
                            required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="modules[${moduleIndex}][description]"
                              class="form-control"
                              rows="3"
                              placeholder="Module description"></textarea>
                </div>

                <hr>

                <!-- Lessons Section -->
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong>Lessons</strong>
                    <button type="button"
                            class="btn btn-sm btn-primary add-lesson">
                        + Add Lesson
                    </button>
                </div>

                <div class="lessons-container"></div>

            </div>
        `;

        modulesContainer.appendChild(moduleBox);
    }

    /* =========================
       ADD LESSON
    ==========================*/
    if (e.target.classList.contains('add-lesson')) {

        const moduleBox = e.target.closest('.module-box');
        const lessonsContainer = moduleBox.querySelector('.lessons-container');

        const moduleIndex = [...document.querySelectorAll('.module-box')]
            .indexOf(moduleBox);

        const lessonIndex = lessonsContainer.children.length;

        const lessonRow = document.createElement('div');
        lessonRow.classList.add('card', 'card-body', 'mb-2');

        lessonRow.innerHTML = `
            <div class="row align-items-end">
                <div class="col-md-5">
                    <label class="form-label">Lesson Name</label>
                    <input type="text"
                           name="modules[${moduleIndex}][lessons][${lessonIndex}][name]"
                           class="form-control"
                           placeholder="Lesson name"
                           required>
                </div>

                <div class="col-md-5">
                    <label class="form-label">Lesson Value</label>
                    <input type="text"
                           name="modules[${moduleIndex}][lessons][${lessonIndex}][value]"
                           class="form-control"
                           placeholder="Lesson value"
                           required>
                </div>

                <div class="col-md-2 text-end">
                    <button type="button"
                            class="btn btn-sm btn-danger remove-lesson mt-4">
                        Remove
                    </button>
                </div>
            </div>
        `;

        lessonsContainer.appendChild(lessonRow);
    }

    /* =========================
       REMOVE MODULE
    ==========================*/
    if (e.target.classList.contains('remove-module')) {
        e.target.closest('.module-box').remove();
    }

    /* =========================
       REMOVE LESSON
    ==========================*/
    if (e.target.classList.contains('remove-lesson')) {
        e.target.closest('.card').remove();
    }

});
</script>



@endsection