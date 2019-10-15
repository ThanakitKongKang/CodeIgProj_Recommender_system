<div class="container">
    <h1 class="display-4">Your Course</h1>
    <hr class="mb-2 w-50 mr-auto ml-0" style="border: 0;border-top: 3px solid #007bff;">
    <div id="course_content">
        <!-- content header -->
        <div class="row justify-content-end mx-0 w-100" style="height:5rem;box-shadow:0 0.1rem 0.1rem rgba(0,0,0,0.5)!important;;position: relative;    background: linear-gradient(to left, #0062E6, #33AEFF);">
            <div class="col-8"></div>
            <div class="col-4 align-self-center text-right font-arial">
                <button class="btn btn-light font-weight-bold text-primary"><i class="fas fa-plus pr-3 fa-xs"></i>Add a course</button>
            </div>
        </div>

        <!-- content -->
        <!-- <div class="row bg-light mx-0" style="min-height:25rem;">
            <div class="col"> test </div>
        </div> -->

        <!-- zero course added -->
        <div class="position:relative text-center font-arial">
            <img src="<?= base_url() ?>assets/img/clip-list-is-empty.png" style="max-width:45rem" alt="">
            <div class="font-weight-bold">You haven't added any course </div>
            <div class="text-muted">Add a course to get started!</div>
        </div>

    </div>
</div>