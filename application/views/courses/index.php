<div class="container">
    <nav class="nav nav-pills justify-content-end font-arial nav_user">
        <a class="nav-item nav-link <?php if (isset($yourcourse)) echo $yourcourse; ?>" href="<?= base_url() ?>course">My Course</a>
        <a class="nav-item nav-link <?php if (isset($saveditem)) echo $saveditem; ?>" href="<?= base_url() ?>saved">Saved Item</a>
        <a class="nav-item nav-link <?php if (isset($ratinghistory)) echo $ratinghistory; ?>" href="<?= base_url() ?>ratinghistory">Rating History</a>
    </nav>

    <h1 class="display-4 page_title_header page_title_header_no_after">My Course</h1>
    <div id="course_content" class="mt-4">

        <!-- content header -->
        <div class="row justify-content-end mx-0 w-100" style="height:5rem;position: relative;background: linear-gradient(to left, #0062E6, #33AEFF);">
            <div class="col-6"></div>
            <div class="col-6 align-self-center text-right font-arial">
                <button class="btn btn-danger font-weight-bold text-white" style="display:none" id="delete_course"><i class="fas fa-trash pr-3 fa-xs"></i>Remove</button>
                <button class="btn btn-light font-weight-bold text-primary" data-toggle="modal" data-target="#course_registeration" id="add_course_modal_trigger"><i class="fas fa-plus pr-3 fa-xs"></i>Add a course</button>
            </div>
        </div>
        <!-- content -->
        <div class="row mx-0 font-arial course_content_wrapper" style="min-height:40rem;border-bottom-left-radius: 7.5px;border-bottom-right-radius: 7.5px;border:1px solid #4c5a673d;background:#d0e8ff3d">
            <div class="col-12" id="content_to_append">
                <?php if ($course_registered != FALSE) { ?>
                    <div class="row py-3 font-weight-bold font-arial content_header" style="color:#004480b5;border-bottom:1px solid #4c5a673d;">
                        <div class="col-1"></div>
                        <div class="col-2">ID</div>
                        <div class="col-6">Name</div>
                        <div class="col-3">Date added</div>
                    </div>
                    <?php foreach ($course_registered as $course) : ?>
                        <div class="row bg-white py-3 course_row">
                            <div class="col-1 align-self-center text-center checkbox_div">
                                <input type="checkbox" class="checkbox" style="transform: scale(1.5);z-index:0">
                            </div>
                            <div class="col-2 align-self-center content_course_id" data-course_id="<?= $course['course_id'] ?>"><?= $course['course_id'] ?></div>
                            <div class="col-6">
                                <div> <?= $course['course_name_en'] ?></div>
                                <div class="font-kanit"><?= $course['course_name_th'] ?></div>
                            </div>
                            <!-- monment js -->
                            <div class="col-3 small align-self-center time_moment" style="cursor:default" data-time-format="time-ago" data-time-value="<?= $course['date'] ?>" title="<?= $course['date'] ?>"><?= $course['date'] ?></div>

                        </div>
                    <?php endforeach;
                } else { ?>
                    <!-- zero course added -->
                    <div class="text-center font-arial bg-light pb-5 mb-5 zero_course" style="border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;">
                        <img src="<?= base_url() ?>assets/img/clip-list-is-empty.png" style="max-width:45rem" alt="">
                        <div class="font-weight-bold" style="color:#164d96">You haven't added any course </div>
                        <div class="text-muted">Add a course to get started!</div>
                    </div>
                <?php } ?>

            </div>
        </div>



    </div>
</div>

<!-- Modal -->
<div class="modal fade slide-bottom" id="course_registeration" tabindex="-1" role="dialog" aria-labelledby="course_registeration" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg_linear_theme">
                <h5 class="modal-title" id="modal_label">Add a course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body  text-center px-5">
                <select class="js-select-course form-control" multiple="multiple">

                </select>

            </div>

            <div class="modal-footer">
                <button type="button" style="display:none;" data-book_id="0" class="btn btn-primary course_submit">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // moment.locale('th');
        // time formatter
        refreshTime();

        function refreshTime() {
            $("[data-time-format]").each(function() {
                var el = $(this);
                switch (el.attr("data-time-format")) {
                    case "time-ago":
                        var timeValue = el.attr("data-time-value")
                        var strTimeAgo = moment(timeValue).fromNow();
                        el.text(strTimeAgo);
                        break;
                }
            });
        }


        $('.js-select-course').select2({
            ajax: {
                // url: "https://api.github.com/search/repositories",
                url: '<?php echo base_url('course/select_search'); ?>',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                    };
                },
                processResults: function(data) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    return {
                        results: data.items,
                    };
                },
                cache: true
            },
            templateResult: formatResult,
            templateSelection: formatResultSelection,

            placeholder: 'course id, course name',
            allowClear: true,
            minimumInputLength: 1,
            maximumSelectionLength: 10,
        });

        function formatResult(result) {
            if (result.loading) {
                return result.course_name_th;
            }
            var $container = $(
                "<div class='select2-result clearfix'>" +
                "<div class='select2-result__result_id small' style='color:#6c757d'></div>" +
                "<div class='select2-result__result_name_th pl-3' style='color:#007bff'></div>" +
                "<div class='select2-result__result_name_en font-arial pl-3'></div>" +
                "</div>"
            );

            $container.find(".select2-result__result_id").text(result.course_id);
            $container.find(".select2-result__result_name_th").text(result.course_name_th);
            $container.find(".select2-result__result_name_en").text(result.course_name_en);

            return $container;
        }

        function formatResultSelection(result) {
            if (!result.course_id) {
                return result.course_name_en;
            }
            var $state = $(
                '<span class="selected_course" id="' + result.course_id + '">' + result.course_name_en + '</span>'
            );
            return $state;

            // return result.course_name_en;
        }

        // input search value change
        $('.js-select-course').on('change', function(e) {
            var data = $('.js-select-course').select2('data');

            if (data === undefined || data.length == 0) {
                $('.course_submit').hide();
            } else {
                $('.course_submit').show();
            }
        });

        // modal trigger
        $("#add_course_modal_trigger").on("click", function(event) {
            if ($(this).hasClass("style_disabled")) {
                event.stopPropagation();
            } else {
                $('#course_registeration').modal("show");
            }
        });

        // add course submit
        $('.course_submit').on('click', function(e) {
            $('#course_registeration').modal('hide');
            var data = $('.js-select-course').select2('data');
            var string_html = "";
            data.forEach(function(entry) {
                string_html += "<pre class='swal_alert_add_course text-left mx-5 font-arial text-primary'><span class='text-secondary'>" + entry["id"] + "</span> " + entry["course_name_en"] + "</pre>";
            });

            Swal.fire({
                title: 'Add course?',
                html: string_html,
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Add',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    var dateTime = moment().format();

                    data.forEach(function(entry) {
                        var formData = {
                            'course_id': entry["id"],
                        };

                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url('course/add_course'); ?>',
                            data: formData,

                            beforeSend: function() {
                                $('#add_course_modal_trigger').addClass("style_disabled");
                            },
                            success: function(data) {
                                add_content_count_check();
                                $('#add_course_modal_trigger').removeClass("style_disabled");
                                // show added course
                                var string_html = '<div class="row bg-white py-3 course_row">' +
                                    '<div class="col-1 align-self-center text-center checkbox_div">' +
                                    ' <input type="checkbox" class="checkbox" style="transform: scale(1.5);z-index:0;">' +
                                    '</div>' +
                                    '<div class="col-2 align-self-center content_course_id" data-course_id="' + entry["id"] + '">' + entry["id"] + '</div>' +
                                    '<div class="col-6">' +
                                    '<div>' + entry["course_name_en"] + '</div>' +
                                    '<div class="font-kanit">' + entry["course_name_th"] + '</div>' +
                                    '</div>' +
                                    '<div class="col-3 small align-self-center time_moment" style="cursor:default" data-time-format="time-ago" data-time-value="' + dateTime + '" title="' + dateTime + '">' + dateTime + '</div>' +
                                    '</div>';
                                $("#content_to_append > div").first().after(string_html);
                                refreshTime();
                            }

                        })
                    });
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        title: 'Add course success !',
                        type: 'success',
                    })

                    // if($('.content_header').)

                    $('.js-select-course').val(null).trigger("change");
                } else {
                    $('#course_registeration').modal('show');
                }
            })
        });

        $('#delete_course').on("click", function(e) {
            var string_html = "";
            selected_course.forEach(function(entry) {
                string_html += "<pre class='swal_alert_add_course text-center mx-5 font-arial text-primary'><span class='text-danger'>" + entry + "</span></pre>";
            });

            Swal.fire({
                title: 'Delete course?',
                type: 'warning',
                html: string_html,

                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    selected_course.forEach(function(entry) {
                        var formData = {
                            'course_id': entry,
                        };
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url('course/delete_course'); ?>',
                            data: formData,

                            beforeSend: function() {
                                $('#delete_course').addClass("style_disabled");
                            },
                            success: function(data) {
                                remove_content_count_check();

                                var elem = $('[data-course_id=' + entry + ']');
                                elem.parent().remove();

                                $('#delete_course').removeClass("style_disabled");
                            }
                        })
                    });
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        title: 'Remove course success !',
                        type: 'success',
                    })
                    // empty the array and uncheck all box
                    $('input:checkbox').removeAttr('checked');
                    selected_course = [];
                    isArrayEmpty();
                }
            })
        });

        // content count checker
        function add_content_count_check() {
            var count_course = $("#content_to_append .course_row").length;
            if (count_course == 0) {
                // append header 
                $("#content_to_append").append(' <div class="row py-3 font-weight-bold font-arial content_header" style="color:#004480b5;border-bottom:1px solid #4c5a673d;">' +
                    '<div class="col-1"></div>' +
                    '<div class="col-2">ID</div>' +
                    '<div class="col-6">Name</div>' +
                    '<div class="col-3">Date added</div>' +
                    '</div>');

                // remove zero course png
                $(".zero_course").remove();
            }
        }

        function remove_content_count_check() {
            var count_course = $("#content_to_append .course_row").length;
            if (count_course == 1) {
                //remove header
                $(".content_header").remove();

                //append zero course png
                $("#content_to_append").append('<div class="text-center font-arial bg-light pb-5 mb-5 zero_course" style="border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;">' +
                    '<img src="<?= base_url() ?>assets/img/clip-list-is-empty.png" style="max-width:45rem" alt="">' +
                    '<div class="font-weight-bold" style="color:#164d96">You haven\'t added any course </div>' +
                    '<div class="text-muted">Add a course to get started!</div>' +
                    '</div>');
            }
        }

        // checkbox things
        // $('.course_row').on("click", checkbox_trigger);
        $(document).on('click', '.course_row', checkbox_trigger);

        $(".checkbox").hover(function() {
            $(this).addClass("hovered");
        }, function() {
            $(this).removeClass("hovered");
        });

        var selected_course = [];

        function isArrayEmpty() {
            // check if array empty
            if (selected_course === undefined || selected_course.length == 0) {
                // REMOVE BUTTON - HIDDEN
                $('#delete_course').fadeOut(100, function() {});
            } else {
                $('#delete_course').fadeIn(100, function() {});
            }
        }

        function checkbox_trigger() {
            // when check outside a checkbox
            if (!$(".checkbox").hasClass("hovered")) {
                var this_elm = $(this);
                var course_id = this_elm.find(".content_course_id").html();

                // toggle checkbox
                this_elm.find(".checkbox").prop("checked", !(this_elm.find(".checkbox").prop("checked")));

                is_check = this_elm.find(".checkbox").prop("checked");
                if (is_check) {
                    selected_course.push(course_id);
                } else {
                    // remove from array by value
                    var index = selected_course.indexOf(course_id);
                    if (index !== -1) selected_course.splice(index, 1);
                }
            }
            // directly check at a checkbox
            else {
                var this_elm = $(this);
                is_check = this_elm.find(".checkbox").prop("checked");
                var course_id = this_elm.find(".content_course_id").html();
                if (is_check) {
                    selected_course.push(course_id);
                } else {
                    var index = selected_course.indexOf(course_id);
                    if (index !== -1) selected_course.splice(index, 1);
                }

            }
            isArrayEmpty();
        }

    });
</script>