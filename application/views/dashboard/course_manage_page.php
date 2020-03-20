<div id="fullpage" class="container">
    <div class="switch-box is-info delete_toggle position-relative pl-3 py-3" title="enable/disable comment">
        <input id="info" class="switch-box-input" type="checkbox">
        <label for="info" class="switch-box-slider"></label>
        <label for="info" class="switch-box-label small font-arial delete_toggle_label text-muted">Multiple delete</label>
        <input id="multiple_delete_trigger" class="btn btn-secondary delete_toggle_label text-muted btn-sm" type="button" style="opacity:0;cursor:default" value="Multiple delete (0)">
    </div>
    <table class="table table-bordered table-compact table-hover font-apple" id="courses">
        <thead class="">
            <tr>
                <th rowspan="2" class="align-middle text-center">Course ID</th>
                <th colspan="2" class="align-middle text-center">Course Title</th>
            </tr>
            <tr>
                <th class="align-middle text-center">THAI</th>
                <th class="align-middle text-center">ENGLISH</th>
            </tr>
        </thead>

        <tbody id="tbodyData_course">
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="course_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg_linear_theme">
                <h5 class="modal-title" id="exampleModalLabel">Edit course's info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="the_form">
                <div class="modal-body">
                    <button class="btn btn-danger delete_this_book_alert" title="Delete this course" style="position:absolute;right:1rem;top:1.5rem"><i class="far fa-trash-alt"></i></button>
                    <table class="modal_course_info w-100 m-lg-3 mt-5" id="dynamic_field">
                        <tr>
                            <td>
                                <div class="input-group mb-3 col-9 col-sm-4 col-md-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Course ID</span>
                                    </div>
                                    <input type="text" class="form-control style_cursor_not_allowed" id="course_id" readonly title="Course's id can't be changed">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group mb-3 col-sm-11">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Course Title(TH)</span>
                                    </div>
                                    <input type="text" class="form-control" id="course_name_th" name="course_name_th" pattern='[ก-๏\s0-9]+' required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group mb-4 col-sm-11">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Course Title(EN)</span>
                                    </div>
                                    <input type="text" class="form-control" id="course_name_en" name="course_name_en" pattern='[a-zA-Z0-9\s]+' required>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="col-md-3 input-group-text text-center d-inline-block mb-1">
                                    Keywords
                                </div>
                            </td>
                        </tr>

                        <tr id="start_dynamic">
                            <td>
                                <div class="input-group mb-1 ml-2 col-md-6 col-10">
                                    <input type="text" name="addmore[]" placeholder="Enter course keyword" class="form-control w-75 addmore first_addmore" required="" style="display:inline-block" />
                                    <div class="input-group-append">
                                        <span class="input-group-text px-2 py-0"> <button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>



                    </table>
                </div>
            </form>
            <div class="edit_footer modal-footer">
                <button type="button" onclick="" id="footer-submit" class="edit_this_course_alert btn btn-primary text-white" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#courses').DataTable({
            scrollY: false,
            scrollX: false,
            scrollCollapse: true,
            paging: true,
            info: true,
            pageLength: 10,
            processing: true,
            order: [1, 'asc'],
            deferRender: true,
            ajax: {
                url: "<?= base_url() ?>api/course/get",
                dataSrc: ""
            },
            columns: [{
                    "data": "course_id"
                },
                {
                    "data": "course_name_th"
                },
                {
                    "data": "course_name_en"
                },
            ],
            columnDefs: [{
                    "targets": 'no-sort',
                    "orderable": false,
                },
                {
                    "targets": [0, 1, 2],
                    "searchable": true,
                },
            ],

            search: {
                "smart": true
            },
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search"
            }
        });

        $('.delete_toggle #info').on("change", function(e) {
            $('.delete_toggle_label').toggleClass("text-muted");
            // update row cont
            var count_row = table.rows('.selected').data().length;
            multiple_delete_trigger_refresh_count();
            // toggle opacity
            if ($('#multiple_delete_trigger').css('opacity') === '0') {
                $('#multiple_delete_trigger').css('opacity', '1', );
                if (count_row == 0)
                    $('#multiple_delete_trigger').addClass("style_cursor_not_allowed");
            } else {
                $('#multiple_delete_trigger').css('opacity', '0', );
                $('#multiple_delete_trigger').removeClass("style_cursor_not_allowed");
            }

            if (count_row > 0) {
                table.$('tr.selected').removeClass('selected');
            } else {
                $('#multiple_delete_trigger').addClass("btn-secondary");
                $('#multiple_delete_trigger').removeClass("btn-danger");
            }
            flag_multi_delete = false;
        });

        // edit modal popup caller
        var flag_multi_delete = false;
        $('#courses tbody').on('click', 'tr:not(:has(.dataTables_empty))', function() {
            var isChecked = $('.delete_toggle #info').prop("checked");
            if (isChecked) {
                $(this).toggleClass('selected');
                multiple_delete_trigger_refresh_count();

            } else {
                var elm = this;
                editModalCaller(elm);
            }
        });

        $('#multiple_delete_trigger').on('click', function() {
            if (flag_multi_delete) {
                var count_row = table.rows('.selected').data().length;
                var data;
                var isMulti = "this course?";
                if (count_row > 1) {
                    isMulti = "these courses?"
                }
                Swal.fire({
                    title: 'Are you sure you want to permanently remove ' + isMulti,
                    html: "<div class='font-apple'>Course's related data will be removed, including : course keywords. <span class='text-danger'>you won't be able to revert this!</span></div>",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#cf3b3b',
                    cancelButtonColor: '#a0a0a0',
                    confirmButtonText: 'Remove',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.value) {
                        for (var i = 0; i < count_row; i++) {
                            data = table.rows('.selected').data()[i];

                            var course_id = {
                                course_id: data["course_id"],
                            };

                            $.ajax({
                                type: 'POST',
                                url: '<?= base_url() ?>/api/course/delete',
                                data: course_id,
                                async: false,
                                success: function(data) {
                                    Toast.fire({
                                        title: 'Success !',
                                        text: 'Saved changes',
                                        type: 'success',
                                    })

                                    var interval = setInterval(function() {
                                        multiple_delete_trigger_refresh_count();
                                    }, 100);
                                }
                            })
                        }
                        table.ajax.reload();
                    }
                })
            }
        });

        function multiple_delete_trigger_refresh_count() {
            var count_row = table.rows('.selected').data().length;
            $('#multiple_delete_trigger').val("Multiple delete (" + count_row + ")");
            if (count_row > 0) {
                $('#multiple_delete_trigger').removeClass("style_cursor_not_allowed");
                $('#multiple_delete_trigger').removeClass("btn-secondary");
                $('#multiple_delete_trigger').addClass("btn-danger");
                flag_multi_delete = true;
            } else {
                $('#multiple_delete_trigger').addClass("style_cursor_not_allowed");
                $('#multiple_delete_trigger').removeClass("btn-danger");
                $('#multiple_delete_trigger').addClass("btn-secondary");
                flag_multi_delete = false;
            }

        }

        function editModalCaller(elm) {
            resetDynamicInput();
            var data = table.row(elm).data();
            if ($(elm).hasClass('selected')) {
                $(elm).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(elm).addClass('selected');
            }
            $('.modal_course_info tbody tr:nth-child(1) td div input').val(data["course_id"]);
            $('.modal_course_info tbody tr:nth-child(2) td div input#course_name_th').val(data["course_name_th"]);
            $('.modal_course_info tbody tr:nth-child(3) td div input#course_name_en').val(data["course_name_en"]);

            $('[name="addmore[]"]').val("");
            $('#course_id_2').val(data["course_id"]);

            var postData = {
                course_id: data["course_id"],
            };
            // get keyword from api
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/api/course/get_one',
                data: postData,
                beforeSend: function() {
                    $(document.body).css({
                        'cursor': 'wait'
                    });
                },
                success: function(data) {
                    var response = JSON.parse(data);
                    var html;
                    var count;
                    response.forEach(function(keyword, i) {
                        for (var key in keyword) {
                            html = '<tr class="dynamic-added"><td><div class="input-group mb-1 ml-2 col-md-6 col-10"><input type="text" name="addmore[]" placeholder="Enter course keyword" class="form-control w-75 addmore" required="" style="display:inline-block" value="' + key + '"/><div class="input-group-append"><span class="input-group-text px-2 py-0"> <button type="button" name="remove" class="btn btn-danger btn_remove btn-sm"><i class="fas fa-minus"></i></button></span></div></div></td></tr>';
                            $(html).insertBefore('#start_dynamic');
                            // $('#dynamic_field').append(html);
                            i++;
                        }
                    });
                    $(document.body).css({
                        'cursor': 'default'
                    });
                    $('#course_edit_modal').modal('show');
                }
            })
        }

        $('.edit_this_course_alert').on('click', function(e) {
            event.preventDefault();
            swalEditCourseConfirm();
        })

        $('.delete_this_book_alert').on('click', function(e) {
            event.preventDefault();
            swalDeleteCourseConfirm();
        })

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        function swalEditCourseConfirm() {
            formCheckValid();
            if (isValid) {
                Swal.fire({
                    title: 'Confirm ?',
                    html: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#a0a0a0',
                    confirmButtonText: 'Save',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.value) {
                        // update info
                        var courseArray = {
                            course_id: $('#course_id').val(),
                            course_name_th: $('#course_name_th').val(),
                            course_name_en: $('#course_name_en').val(),
                        };

                        var formData = new FormData($('#the_form')[0]);
                        formData.append('course_id', $('#course_id').val());
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url() ?>/api/course/update',
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
                                        $('#course_edit_modal').modal('hide');
                                        Toast.fire({
                                            title: 'Success !',
                                            text: 'Saved changes',
                                            type: 'success',
                                        })
                                        document.getElementById("the_form").reset();
                                        $('[name="addmore[]"]').val("");
                                        table.ajax.reload();
                                        $(document.body).css({
                                            'cursor': 'default'
                                        });
                                    }
                                })
                            }
                        })

                    } else {
                        $('#course_edit_modal').modal('show');
                    }
                })
            } else {
                var course_name_th = document.querySelector("#course_name_th");
                var course_name_en = document.querySelector("#course_name_en");
                var html = "";
                if (!course_name_th.checkValidity()) {
                    html += "<pre class='small text-muted font-apple'>Thai course title must be thai characters.</pre>";
                }
                if (!course_name_en.checkValidity()) {
                    html += "<pre class='small text-muted font-apple'>English course title must be english characters</pre>";
                }

                $('#course_edit_modal').modal('show');

                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    html: html,
                    onClose: () => {
                        $('#course_edit_modal').modal('show');
                        $('#course_name_th').focus();
                    }
                })
            }
        }

        function swalDeleteCourseConfirm() {
            var course_id = {
                course_id: Number($('#course_id').val()),
            };

            $('#course_edit_modal').modal('hide');

            Swal.fire({
                title: 'Are you sure you want to permanently remove this course?',
                html: "<div class='font-apple'>Course's related data will be removed, including : course keywords. <span class='text-danger'>you won't be able to revert this!</span></div>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#cf3b3b',
                cancelButtonColor: '#a0a0a0',
                confirmButtonText: 'Remove',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url() ?>/api/course/delete',
                        data: course_id,
                        beforeSend: function() {
                            $(document.body).css({
                                'cursor': 'wait'
                            });
                        },
                        success: function(data) {
                            Toast.fire({
                                title: 'Success !',
                                text: 'Saved changes',
                                type: 'success',
                            })
                            $(document.body).css({
                                'cursor': 'default'
                            });
                            table.ajax.reload();
                        }
                    })

                } else {
                    $('#course_edit_modal').modal('show');
                }
            })
        }

        $('#course_edit_modal').on('hidden.bs.modal', function() {
            $('#tbodyData_course tr.selected').removeClass("selected");
        })

        var isValid = false;

        function formCheckValid() {
            var course_name_th = document.querySelector("#course_name_th");
            var course_name_en = document.querySelector("#course_name_en");

            isValid = course_name_th.checkValidity() & course_name_en.checkValidity();
        }

        function resetDynamicInput() {
            $('.dynamic-added').remove();
        }

        var i = 1;
        $('#add').click(function() {
            i++;
            var html = '<tr class="dynamic-added"><td><div class="input-group mb-1 ml-2 col-md-6 col-10"><input type="text" name="addmore[]" placeholder="Enter course keyword" class="form-control w-75 addmore" required="" style="display:inline-block" /><div class="input-group-append"><span class="input-group-text px-2 py-0"> <button type="button" name="remove" class="btn btn-danger btn_remove btn-sm"><i class="fas fa-minus"></i></button></span></div></div></td></tr>';

            $('#dynamic_field').append(html);
        });

        $(document).on('click', '.btn_remove', function() {
            $(this).parentsUntil("tr.dynamic-added").remove()
        });

    });
</script>