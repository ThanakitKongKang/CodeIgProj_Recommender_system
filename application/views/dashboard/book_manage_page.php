<div id="fullpage" class="container">
    <div class="switch-box is-info delete_toggle position-relative pl-3 py-3" title="enable/disable comment">
        <input id="info" class="switch-box-input" type="checkbox">
        <label for="info" class="switch-box-slider"></label>
        <label for="info" class="switch-box-label small font-arial delete_toggle_label text-muted">Multiple delete</label>
        <input id="multiple_delete_trigger" class="btn btn-secondary delete_toggle_label text-muted btn-sm" type="button" style="opacity:0;cursor:default" value="Multiple delete (0)">
    </div>
    <table class="table table-bordered table-compact table-hover font-apple" id="books">
        <thead class="">
            <tr>
                <th class="align-middle text-center">book_id</th>
                <th class="align-middle text-center">book_name</th>
                <th class="align-middle text-center">author</th>
                <th class="align-middle text-center">book_type</th>
                <th class="align-middle text-center">b_rate</th>
                <th class="align-middle text-center">count_rate</th>
            </tr>
        </thead>

        <tbody id="tbodyData_book">
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="book_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit book's info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <button class="btn btn-danger delete_this_book_alert" title="Delete this book" style="position:absolute;right:1rem;top:1.5rem"><i class="far fa-trash-alt"></i></button>
                <table class="modal_book_info w-100">
                    <tr>
                        <td>
                            <div class="input-group mb-3 w-25">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Book id</span>
                                </div>
                                <input type="text" class="form-control style_cursor_not_allowed" id="book_id" readonly title="Book'is can't be changed">
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Book name</span>
                                </div>
                                <input type="text" class="form-control" id="book_name" name="book_name">
                            </div>
                            <span class="ml-5 small pl-5 text-danger" style="display:none" id="name_exists_error">Book name already taken</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group mb-3 mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Author</span>
                                </div>
                                <input type="text" class="form-control" id="author">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Category</span>
                                </div>
                                <select class="custom-select" id="book_type">
                                    <?php foreach ($category_list as $category) { ?>
                                        <option value="<?= $category["book_type"] ?>"><?= $category["book_type"] ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Book file</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" required id="inputGroupFile02" name="book_file" aria-describedby="inputGroupFileAddon02" accept="application/pdf">
                                    <label class="custom-file-label label_file" for="inputGroupFile02">Choose file</label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Cover Image</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" required id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/jpeg, image/png">
                                    <label class="custom-file-label label_cover" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="text-center">
                                <img src="" id="old_img" style="max-width:10rem">
                            </div>
                            <div class="text-center small text-muted">(current cover image)</div>

                        </td>
                    </tr>
                    <div class="text-center" id="preview_upload_wrapper">
                        <div class="mx-auto upload_msg">
                            Upload a new book cover to start cropping
                        </div>
                    </div>
                </table>
            </div>
            <div class="edit_footer modal-footer">
                <button type="button" onclick="" id="footer-submit" class="edit_this_book_alert btn btn-primary text-white" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#books').DataTable({
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
                url: "<?= base_url() ?>api/book/get",
                dataSrc: ""
            },
            columns: [{
                    "data": "book_id"
                },
                {
                    "data": "book_name"
                },
                {
                    "data": "author"
                },
                {
                    "data": "book_type"
                },
                {
                    "data": "b_rate"
                },
                {
                    "data": "count_rate"
                }
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
                    "targets": [0, 4, 5],
                },
                {
                    "width": "15%",
                    "targets": [2, 3],
                },
                {
                    "width": "30%",
                    "targets": [1],
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
        $('#books tbody').on('click', 'tr', function() {
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
                var isMulti = "this item?";
                if (count_row > 1) {
                    isMulti = "these items?"
                }
                Swal.fire({
                    title: 'Are you sure you want to permanently remove ' + isMulti,
                    html: "<div class='font-apple'>Book's related data will be removed, including : bookmarking, rating, commenting etc and <span class='text-danger'>you won't be able to revert this!</span></div>",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#cf3b3b',
                    cancelButtonColor: '#a0a0a0',
                    confirmButtonText: 'Remove',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.value) {
                        var tmp_book_id;
                        for (var i = 0; i < count_row; i++) {
                            data = table.row('.selected').data();
                            // table.row('.selected').draw(false);

                            if (Number(data["book_id"]) > tmp_book_id) {
                                var book_id = {
                                    book_id: Number(data["book_id"]--),
                                };
                                tmp_book_id = Number(data["book_id"]--);
                            } else {
                                var book_id = {
                                    book_id: Number(data["book_id"]),
                                };
                                tmp_book_id = Number(data["book_id"]);
                            }

                            $.ajax({
                                type: 'POST',
                                url: '<?= base_url() ?>/api/book/delete',
                                data: book_id,
                                async: false,
                                success: function(data) {
                                    Toast.fire({
                                        title: 'Success !',
                                        text: 'Saved changes',
                                        type: 'success',
                                    })
                                    table.row('.selected').remove().draw(false);
                                    multiple_delete_trigger_refresh_count();
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
        var old_book_name;
        var isCoverChanged = false;
        var isFileChanged = false;

        function editModalCaller(elm) {

            var data = table.row(elm).data();
            if ($(elm).hasClass('selected')) {
                $(elm).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(elm).addClass('selected');
            }
            old_book_name = data["book_name"];

            $('.modal_book_info tbody tr:nth-child(1) td div input').val(data["book_id"]);
            $('.modal_book_info tbody tr:nth-child(2) td div input').val(data["book_name"]);
            $('.modal_book_info tbody tr:nth-child(3) td div input').val(data["author"]);
            $('.modal_book_info tbody tr:nth-child(4) td div input').val(data["book_type"]);

            $("#old_img").attr("src", "<?= base_url() ?>/assets/book_covers/" + data["book_id"] + ".PNG?" + new Date().getTime());
            $('#book_type').val(data["book_type"]);

            $('#inputGroupFile01').next('.label_cover').html("Choose file");
            $('#inputGroupFile01').val('');
            $('#inputGroupFile02').next('.label_file').html("Choose file");
            $('#inputGroupFile02').val('');



            $('#book_edit_modal').modal('show');
        }

        $('.edit_this_book_alert').on('click', function(e) {
            event.preventDefault();
            swalEditBookConfirm();
        })

        $('.delete_this_book_alert').on('click', function(e) {
            event.preventDefault();
            swalDeleteBookConfirm();
        })


        // table.row('.selected').remove().draw( false );
        // table.draw();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        function swalEditBookConfirm() {
            if (!isNameExists) {
                var image;
                if (isCoverChanged) {
                    upload_crop.croppie('result', {
                        type: 'canvas',
                        size: 'viewport'
                    }).then(function(response) {
                        image = {
                            image: response,
                            is_new: false,
                            book_id: Number($('#book_id').val()),
                        };
                    })
                }

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
                        var booksArray = {
                            book_id: Number($('#book_id').val()),
                            book_name: $('#book_name').val(),
                            author: $('#author').val(),
                            book_type: $('#book_type').val(),
                        };
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url() ?>/api/book/update',
                            data: booksArray,
                            success: function(data) {
                                $('#book_edit_modal').modal('hide');

                            }
                        })

                        if (isCoverChanged) {
                            // update cover


                            $.ajax({
                                type: 'POST',
                                url: '<?= base_url() ?>api/book/cover_upload',
                                data: image,
                                success: function(data) {

                                    $('#inputGroupFile01').next('.label_cover').html("Choose file");
                                    $('#inputGroupFile01').val('');
                                    $('.upload_msg').show();
                                    upload_crop.croppie('destroy')
                                    isInit = false;
                                    $('#book_edit_modal').modal('hide');

                                }
                            })

                        }

                        if (isFileChanged) {
                            // update file
                            var file_data = $('#inputGroupFile02').prop('files')[0];
                            var form_data = new FormData();
                            form_data.append('file', file_data);
                            form_data.append('name', $('#book_name').val());

                            $.ajax({
                                type: 'POST',
                                url: '<?= base_url() ?>api/book/file_upload',
                                data: form_data,
                                contentType: false,
                                cache: false,
                                processData: false,
                                dataType: 'text',
                                success: function(data) {
                                    $('#inputGroupFile02').next('.label_file').html("Choose file");
                                    $('#inputGroupFile02').val('');
                                    $('#book_edit_modal').modal('hide');

                                }
                            })
                        }

                        Toast.fire({
                            title: 'Success !',
                            text: 'Saved changes',
                            type: 'success',
                        })

                        table.ajax.reload();

                    } else {
                        $('#book_edit_modal').modal('show');
                    }
                })

            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'Book name already taken!',
                    onClose: () => {
                        $('#book_edit_modal').modal('show');
                        $('#book_name').focus();
                    }
                })
            }
        }

        function swalDeleteBookConfirm() {
            var book_id = {
                book_id: Number($('#book_id').val()),
            };
            $('#book_edit_modal').modal('hide');

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
                        url: '<?= base_url() ?>/api/book/delete',
                        data: formData,
                        success: function(data) {
                            Toast.fire({
                                title: 'Success !',
                                text: 'Saved changes',
                                type: 'success',
                            })
                            table.ajax.reload();

                        }
                    })

                } else {
                    $('#book_edit_modal').modal('show');
                }
            })
        }

        $('#book_edit_modal').on('hidden.bs.modal', function() {
            $('#tbodyData_book tr.selected').removeClass("selected");
            $('#preview_upload_wrapper').croppie('bind', {
                url: "<?= base_url() ?>assets/img/no_img.png",
                points: [77, 469, 280, 739]
            });
        })

        var isNameExists = false;
        $('#book_name').on('keyup', function() {
            var book_name = {
                book_name: $('[name ="book_name"]').val(),
            };
            if (old_book_name != $('[name ="book_name"]').val()) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>api/book/name_exists',
                    data: book_name,
                    success: function(data) {
                        if (data == "true") {
                            $('#book_name').addClass("bg-danger");
                            $('#book_name').addClass("text-white");
                            $('#name_exists_error').show();
                            isNameExists = true;
                        } else {
                            $('#book_name').removeClass("bg-danger");
                            $('#book_name').removeClass("text-white");
                            $('#name_exists_error').hide();
                            isNameExists = false;
                        }
                    }
                })
            }

        });

        $('#inputGroupFile01').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.label_cover').html(fileName);
            readFile(this);
            isCoverChanged = true;
        })


        $('#inputGroupFile02').on('change', function() {
            var fileName = $(this).val();
            $(this).next('.label_file').html(fileName);
            isFileChanged = true;
        })

        var upload_crop;
        var isInit = false;

        function readFile(input) {
            if (input.files && input.files[0]) {
                $('.upload_msg').hide();
                var reader = new FileReader();
                if (!isInit) {
                    upload_crop = $('#preview_upload_wrapper').croppie({
                        viewport: {
                            width: 312.5,
                            height: 412.5
                        },
                        boundary: {
                            width: 500,
                            height: 500
                        },
                    });
                    isInit = true;
                }
                reader.onload = function(e) {
                    $('#preview_upload_wrapper').croppie('bind', {
                        url: e.target.result
                    });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    });
</script>