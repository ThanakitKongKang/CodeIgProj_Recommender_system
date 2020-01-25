<div id="fullpage" class="container">
    <div class="switch-box is-info delete_toggle position-relative pl-3 py-3" title="enable/disable comment">
        <input id="info" class="switch-box-input" type="checkbox">
        <label for="info" class="switch-box-slider"></label>
        <label for="info" class="switch-box-label small font-arial delete_toggle_label text-muted">Multiple delete</label>
        <input id="multiple_delete_trigger" class="btn btn-secondary delete_toggle_label text-muted btn-sm" type="button" style="opacity:0;cursor:default" value="Multiple delete (0)">
    </div>
    <button class="btn btn-danger delete_this_book_alert btn-sm" style="display:none;position: absolute;left: 16rem;top: 0.5rem;" title="Delete selected comment"><i class="far fa-trash-alt pr-2"></i>Delete</button>

    <table class="table table-bordered table-compact table-hover font-apple" id="users">
        <thead class="">
            <tr>
                <th class="align-middle text-center">Username</th>
                <th class="align-middle text-center">Firstname</th>
                <th class="align-middle text-center">Lastname</th>
            </tr>
        </thead>

        <tbody id="tbodyData_user">
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="user_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit user's info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="old_username" id="old_username">
                <button class="btn btn-danger delete_this_book_alert" title="Delete this user" style="position:absolute;right:1rem;top:1.5rem"><i class="far fa-trash-alt"></i></button>
                <table class="modal_user_info w-100 m-5">
                    <tr>
                        <td>
                            <div class="input-group w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Username</span>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" title="Must be English charaters or numbers" pattern='[a-zA-Z0-9\s]{3,24}$' required>
                            </div>
                            <span class="ml-5 small pl-5 text-danger" style="display:none" id="name_exists_error">Username already taken</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group mb-3 mt-3 w-75">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Firstname</span>
                                </div>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group mb-3 w-75">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Lastname</span>
                                </div>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </td>
                    </tr>

                </table>
            </div>
            <div class="edit_footer modal-footer">
                <button type="button" onclick="" id="footer-submit" class="edit_this_user_alert btn btn-primary text-white" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#users').DataTable({
            scrollY: false,
            scrollX: false,
            scrollCollapse: true,
            paging: true,
            info: true,
            pageLength: 10,
            processing: true,
            order: [0, 'desc'],
            deferRender: true,
            ajax: {
                url: "<?= base_url() ?>api/user/get",
                dataSrc: ""
            },
            columns: [{
                    "data": "username"
                },
                {
                    "data": "first_name"
                },
                {
                    "data": "last_name"
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
            // toggle opacity
            if ($('#multiple_delete_trigger').css('opacity') === '0') {
                $('#multiple_delete_trigger').css('opacity', '1', );
                if (count_row == 0)
                    $('#multiple_delete_trigger').addClass("style_cursor_not_allowed");
            } else {
                $('#multiple_delete_trigger').css('opacity', '0', );
                $('#multiple_delete_trigger').removeClass("style_cursor_not_allowed");
            }
            $('.delete_this_book_alert').hide();

            if (count_row > 0) {
                table.$('tr.selected').removeClass('selected');
            } else {
                $('#multiple_delete_trigger').addClass("btn-secondary");
                $('#multiple_delete_trigger').removeClass("btn-danger");
            }
            multiple_delete_trigger_refresh_count();

            flag_multi_delete = false;
        });

        // edit modal popup caller
        var flag_multi_delete = false;
        $('#users tbody').on('click', 'tr:not(:has(.dataTables_empty))', function() {
            var isChecked = $('.delete_toggle #info').prop("checked");
            if (isChecked) {
                $(this).toggleClass('selected');
                multiple_delete_trigger_refresh_count();

            } else {
                var elm = this;
                var data = table.row(elm).data();
                if ($(elm).hasClass('selected')) {
                    $(elm).removeClass('selected');
                    $('.delete_this_book_alert').hide();

                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(elm).addClass('selected');
                    $('.delete_this_book_alert').show();
                }
            }
        });

        $('#multiple_delete_trigger').on('click', function() {
            if (flag_multi_delete) {
                var count_row = table.rows('.selected').data().length;
                var data;
                var isMulti = "this user?";
                if (count_row > 1) {
                    isMulti = "these users?"
                }
                Swal.fire({
                    title: 'Are you sure you want to permanently remove ' + isMulti,
                    html: "<div class='font-apple'>User's related data will be removed, including : bookmarking, rating, commenting etc and <span class='text-danger'>you won't be able to revert this!</span></div>",
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
                            // table.row('.selected').draw(false);

                            var username = {
                                username: data["username"],
                            };

                            $.ajax({
                                type: 'POST',
                                url: '<?= base_url() ?>/api/user/delete',
                                data: username,
                                async: false,
                                success: function(data) {
                                    Toast.fire({
                                        title: 'Success !',
                                        text: 'Saved changes',
                                        type: 'success',
                                    })
                                    table.row('.selected').remove().draw(false);
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
        var old_username;

        function editModalCaller(elm) {

            var data = table.row(elm).data();
            if ($(elm).hasClass('selected')) {
                $(elm).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(elm).addClass('selected');
            }
            old_username = data["username"];
            $('input#old_username').val(data["username"]);
            $('.modal_user_info tbody tr:nth-child(1) td div input').val(data["username"]);
            $('.modal_user_info tbody tr:nth-child(2) td div input').val(data["first_name"]);
            $('.modal_user_info tbody tr:nth-child(3) td div input').val(data["last_name"]);


            $('#user_edit_modal').modal('show');
        }

        $('.edit_this_user_alert').on('click', function(e) {
            event.preventDefault();
            swalEditUserConfirm();
        })

        $('.delete_this_book_alert').on('click', function(e) {
            event.preventDefault();
            swalDeleteUserConfirm();
        })


        // table.row('.selected').remove().draw( false );
        // table.draw();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        function swalEditUserConfirm() {
            formCheckValid();
            if (!isNameExists) {
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
                            var userArray = {
                                old_username: old_username,
                                username: $('#username').val(),
                                first_name: $('#first_name').val(),
                                last_name: $('[name="last_name"]').val(),
                            };

                            $.ajax({
                                type: 'POST',
                                url: '<?= base_url() ?>/api/user/update',
                                data: userArray,
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
                                    $('#user_edit_modal').modal('hide');
                                    $(document.body).css({
                                        'cursor': 'default'
                                    });
                                }
                            })

                            table.ajax.reload();

                        } else {
                            $('#user_edit_modal').modal('show');
                        }
                    })
                } else {
                    var username = document.querySelector("#username");
                    var first_name = document.querySelector("#first_name");
                    var last_name = document.querySelector("#last_name");
                    var html = "";
                    if (!username.checkValidity()) {
                        html += "<pre class='small text-muted font-apple'>Username must contains 3 to 24 english characters or numbers</pre>";
                    }
                    if (!first_name.checkValidity()) {
                        html += "<pre class='small text-muted font-apple'>First name can't be empty</pre>";
                    }
                    if (!last_name.checkValidity()) {
                        html += "<pre class='small text-muted font-apple'>Last name can't be empty</pre>";
                    }
                    $('#user_edit_modal').modal('show');

                    Swal.fire({
                        type: 'error',
                        title: 'Error',
                        html: html,
                        onClose: () => {
                            $('#user_edit_modal').modal('show');
                            $('#username').focus();
                        }
                    })
                }
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'Username already taken!',
                    onClose: () => {
                        $('#user_edit_modal').modal('show');
                        $('#username').focus();
                        usernameCheck();

                    }
                })
            }
        }

        function swalDeleteUserConfirm() {
            var book_id = {
                book_id: Number($('#book_id').val()),
            };
            $('#user_edit_modal').modal('hide');

            Swal.fire({
                title: 'Are you sure you want to permanently remove this item?',
                html: "<div class='font-apple'>Book's related data will be removed, including : bookmarking, rating, commenting etc and <span class='text-danger'>you won't be able to revert this!</span></div>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#cf3b3b',
                cancelButtonColor: '#a0a0a0',
                confirmButtonText: 'Remove',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    var formData = book_id
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url() ?>/api/user/delete',
                        data: formData,
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
                            table.ajax.reload();
                            $(document.body).css({
                                'cursor': 'default'
                            });
                        }
                    })

                } else {
                    $('#user_edit_modal').modal('show');
                }
            })
        }

        $('#user_edit_modal').on('hidden.bs.modal', function() {
            $('#tbodyData_user tr.selected').removeClass("selected");
            $('#username').removeClass("bg-danger");
            $('#username').removeClass("text-white");
            $('#name_exists_error').hide();
            isNameExists = false;

        })
        var isValid = false;

        function formCheckValid() {
            var username = document.querySelector("#username");
            var first_name = document.querySelector("#first_name");
            var last_name = document.querySelector("#last_name");

            isValid = username.checkValidity() & first_name.checkValidity() & last_name.checkValidity();
        }


        var isNameExists = false;

        function usernameCheck() {
            var username = {
                username: $('[name ="username"]').val(),
            };
            if (old_username != $('[name ="username"]').val()) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>api/user/name_exists',
                    data: username,
                    success: function(data) {
                        if (data == "true") {
                            $('#username').addClass("bg-danger");
                            $('#username').addClass("text-white");
                            $('#name_exists_error').show();
                            isNameExists = true;
                        } else {
                            $('#username').removeClass("bg-danger");
                            $('#username').removeClass("text-white");
                            $('#name_exists_error').hide();
                            isNameExists = false;
                        }
                    }
                })
            }
        }
        $('#username').on('keyup', function() {
            usernameCheck();
        });

    });
</script>