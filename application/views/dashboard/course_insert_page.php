<div id="fullpage" class="container">
    <h2 class="text-center shadow-sm p-3 mb-1 rounded bg_linear_theme text-white">Add Course</h2>
    <form id="the_form">
        <div class="p-md-5 p-3 rounded shadow-lg mb-5 bg-white">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-lg-2 col-form-label">Course ID</label>
                <div class="col-sm-4 col-lg-2">
                    <input type="text" autocomplete="off" required class="form-control" name="course_id" id="course_id" placeholder="Course ID.." pattern='^[a-zA-Z]+[0-9]{6}|[0-9]{6}' title="6 letters of numbers. Starts with english letter is optional">
                </div>
                <div class="col-sm-4 mt-2">
                    <span class="small px-0 text-danger font-arial" style="display:none" id="course_id_exists_error">Course ID already exists</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-lg-2 col-form-label">Thai Title</label>
                <div class="col-sm-9">
                    <input type="text" autocomplete="off" required class="form-control" name="course_name_th" id="course_name_th" placeholder="Thai course title.." pattern='[ก-๏\s0-9]+' title="Must be thai characters.">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-lg-2 col-form-label">English Title</label>
                <div class="col-sm-9">
                    <input type="text" autocomplete="off" required class="form-control" name="course_name_en" id="course_name_en" placeholder="English course title.." pattern='[a-zA-Z0-9\s]+' title="Must be english characters.">
                </div>
            </div>
            <div class="col-md-3 input-group-text text-center d-inline-block mb-1">
                Keywords
            </div>
            <div id="addmore_wrapper">
                <div class="input-group mb-1 col-sm-10 col-lg-5">
                    <input type="text" name="addmore[]" placeholder="Enter course keyword" class="form-control w-50 addmore first_addmore" style="display:inline-block" pattern="[^\s]+" title="Keyword must not contains spaces" />
                    <div class="input-group-append">
                        <span class="input-group-text px-2 py-0"> <button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-center mt-5 mb-0">
                <div class="col-sm-auto ">
                    <button type="submit" class="btn btn-primary mx-auto btn-lg" id="form_insert_course">Submit</button>
                </div>
            </div>
        </div>
    </form>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        var isIdExists = false;
        $('#course_id').on('keyup', function() {
            var course_id = {
                course_id: $('[name ="course_id"]').val(),
            };
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>api/course/id_exists',
                data: course_id,
                success: function(data) {
                    if (data == "true") {
                        $('#course_id').addClass("bg-danger");
                        $('#course_id').addClass("text-white");
                        $('#course_id_exists_error').show();
                        isIdExists = true;
                    } else {
                        resetExists();

                    }
                }
            })
        });

        $("#the_form").submit(function(e) {
            e.preventDefault();
            if (!isIdExists) {
                var courseArray = {
                    course_id: $('[name ="course_id"]').val(),
                    course_name_th: $('[name ="course_name_th"]').val(),
                    course_name_en: $('[name ="course_name_en"]').val(),
                };

                var formData = new FormData($('#the_form')[0]);
                formData.append('course_id', $('#course_id').val());

                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>api/course/insert',
                    data: courseArray,
                    beforeSend: function() {
                        $(document.body).css({
                            'cursor': 'wait'
                        });
                    },
                    success: function(data) {
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url() ?>/api/course/update_json',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(data) {
                                Toast.fire({
                                    title: 'Success !',
                                    text: 'Saved changes',
                                    type: 'success',
                                })
                                document.getElementById("the_form").reset();
                                $('[name="addmore[]"]').val("");
                                resetDynamicInput();
                                $(document.body).css({
                                    'cursor': 'default'
                                });
                            }
                        })
                    }
                })

            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'Course ID already exists!',
                    footer: '<a href="<?= base_url() ?>dashboard/course/manage">Edit the course instead</a>',
                    onClose: () => {
                        var interval = setInterval(function() {
                            clearInterval(interval);
                            $('#course_id').focus();
                        }, 300);

                    }
                })
            }
        });

        function resetDynamicInput() {
            $('.dynamic-added').remove();
        }

        function resetExists() {
            $('#course_id').removeClass("bg-danger");
            $('#course_id').removeClass("text-white");
            $('#course_id_exists_error').hide();
            isIdExists = false;
        }

        function triggerRequired() {
            if (i > 1) {
                $(".first_addmore").prop('required', true);
            } else {
                $(".first_addmore").prop('required', false);
            }
            console.log(i)
        }

        var i = 1;
        $('#add').click(function(e) {
            i++;
            var html = '<div class="dynamic-added"><div class="input-group mb-1 col-sm-10 col-lg-5"><input type="text" name="addmore[]" placeholder="Enter course keyword" class="form-control w-50 addmore" required="" style="display:inline-block" /><div class="input-group-append"><span class="input-group-text px-2 py-0"> <button type="button" name="remove" class="btn btn-danger btn_remove btn-sm"><i class="fas fa-minus"></i></button></span></div></div></div>';

            $('#addmore_wrapper').append(html);
            triggerRequired();
        });

        $(document).on('click', '.btn_remove', function(e) {
            $(this).parentsUntil(".dynamic-added").remove()
            i--;
            triggerRequired();
        });
    });
</script>