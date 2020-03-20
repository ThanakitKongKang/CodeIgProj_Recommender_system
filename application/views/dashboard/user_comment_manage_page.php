<div id="fullpage" class="container">
    <div class="switch-box is-info delete_toggle position-relative pl-3 py-3" title="enable/disable comment">
        <input id="info" class="switch-box-input" type="checkbox">
        <label for="info" class="switch-box-slider"></label>
        <label for="info" class="switch-box-label small font-arial delete_toggle_label text-muted">Multiple delete</label>
        <input id="multiple_delete_trigger" class="btn btn-secondary delete_toggle_label text-muted btn-sm" type="button" style="opacity:0;cursor:default" value="Multiple delete (0)">
    </div>
    <button class="btn btn-danger delete_this_book_alert btn-sm" style="display:none;position: absolute;left: 16rem;top: 0.5rem;" title="Delete selected comment"><i class="far fa-trash-alt pr-2"></i>Delete</button>

    <table class="table table-bordered table-compact table-hover font-apple" id="comments">
        <thead class="">
            <tr>
                <th class="align-middle text-center">ID</th>
                <th class="align-middle text-center">BOOK ID</th>
                <th class="align-middle text-center">Content</th>
                <th class="align-middle text-center">Creator</th>
                <th class="align-middle text-center">Created</th>
                <th class="align-middle text-center">Modified</th>
                <th class="align-middle text-center">Upvote</th>
            </tr>
        </thead>

        <tbody id="tbodyData_comment">
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#comments').DataTable({
            scrollY: false,
            scrollX: false,
            scrollCollapse: true,
            paging: true,
            info: true,
            pageLength: 10,
            processing: true,
            order: [5, 'desc'],
            deferRender: true,
            ajax: {
                url: "<?= base_url() ?>api/comment/get",
                dataSrc: ""
            },
            columns: [{
                    "data": "id"
                },
                {
                    "data": "book_id"
                },
                {
                    "data": "content"
                },
                {
                    "data": "fullname"
                },
                {
                    "data": "created"
                },
                {
                    "data": "modified"
                },
                {
                    "data": "upvote_count"
                },
            ],
            columnDefs: [{
                    "targets": 'no-sort',
                    "orderable": false,
                },
                {
                    "targets": [0, 1, 2, 3, 4, 5],
                    "searchable": true,
                },
                {
                    "width": "5%",
                    "targets": [0, 1, 3, 6],
                },
                {
                    "width": "10%",
                    "targets": [4, 5],
                },
                {
                    "width": "30%",
                    "targets": [2],
                }
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
        $('#comments tbody').on('click', 'tr:not(:has(.dataTables_empty))', function() {
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
                var isMulti = "this comment?";
                if (count_row > 1) {
                    isMulti = "these comments?"
                }
                Swal.fire({
                    title: 'Are you sure you want to permanently remove ' + isMulti,
                    html: "<div class='font-apple'>you won't be able to revert this!</div>",
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

                            table.row('.selected').draw(false);
                            var dataArray = {
                                id: Number(data["id"]),
                                book_id: Number(data["book_id"]),
                            };


                            $.ajax({
                                type: 'POST',
                                url: '<?= base_url() ?>/api/comment/delete',
                                data: dataArray,
                                async: false,
                                beforeSend: function() {
                                    $(document.body).css({
                                        'cursor': 'wait'
                                    });
                                },
                                success: function(data) {
                                    Toast.fire({
                                        title: 'Success !',
                                        text: 'Comment deleted',
                                        type: 'success',
                                    })
                                    // table.row('.selected').remove().draw(false);
                                    var interval = setInterval(function() {
                                        multiple_delete_trigger_refresh_count();
                                    }, 100);
                                    $(document.body).css({
                                        'cursor': 'default'
                                    });
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

        $('.delete_this_book_alert').on('click', function(e) {
            event.preventDefault();
            swalDeleteCommentConfirm();
        })


        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });


        function swalDeleteCommentConfirm() {
            var row = table.rows('.selected').data()[0];

            Swal.fire({
                title: 'Are you sure you want to permanently remove this comment?',
                html: "<div class='font-apple'>you won't be able to revert this!</div>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#cf3b3b',
                cancelButtonColor: '#a0a0a0',
                confirmButtonText: 'Remove',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {

                    var dataArray = {
                        id: Number(row["id"]),
                        book_id: Number(row["book_id"]),
                    };

                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url() ?>/api/comment/delete',
                        data: dataArray,
                        beforeSend: function() {
                            $(document.body).css({
                                'cursor': 'wait'
                            });
                        },
                        success: function(data) {
                            Toast.fire({
                                title: 'Success !',
                                text: 'Comment deleted',
                                type: 'success',
                            })
                            table.ajax.reload();
                            $('.delete_this_book_alert').hide();
                            $(document.body).css({
                                'cursor': 'default'
                            });
                        }
                    })

                } else {
                    // $('#comment_edit_modal').modal('show');
                }
            })
        }
    });
</script>