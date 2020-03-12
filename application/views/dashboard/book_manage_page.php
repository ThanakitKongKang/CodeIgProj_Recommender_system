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
                <th class="align-middle text-center">ID</th>
                <th class="align-middle text-center">Title</th>
                <th class="align-middle text-center">Author</th>
                <th class="align-middle text-center">Category</th>
                <th class="align-middle text-center">Rating</th>
                <th class="align-middle text-center">Rater</th>
            </tr>
        </thead>

        <tbody id="tbodyData_book">
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="book_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_book" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg_linear_theme">
                <h5 class="modal-title" id="exampleModalLabel_book">Edit book's info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-4">
                <button class="btn btn-danger delete_this_book_alert mb-3" title="Delete this book" style="position:absolute;right:1rem;top:1.5rem"><i class="far fa-trash-alt"></i></button>
                <table class="modal_book_info w-100 mt-5">
                    <div class="row">
                        <div class="col-lg-5 h-100 my-auto">

                            <div class="text-center mr-2">
                                <img src="" id="old_img" style="max-width:15rem" alt="">
                            </div>

                            <div class="text-center small text-muted">(current cover image)</div>
                        </div>

                        <div class="text-center ml-2 col-lg-6" id="preview_upload_wrapper">
                            <div class="mx-auto upload_msg">
                                Upload a new book cover to start cropping
                            </div>
                        </div>
                    </div>


                    <tr>
                        <td class="col-6">
                        </td>
                        <td class="col-6">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Book id</span>
                                </div>
                                <input type="text" class="form-control style_cursor_not_allowed" style="max-width: 8rem;" id="book_id" readonly title="Book's id can't be changed">
                                <div class="switch-box is-info comment_toggle position-relative ml-5" title="enable/disable comment" style="top: 0.9rem;left: 1rem;">

                                </div>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Book name</span>
                                </div>
                                <input type="text" class="form-control" autocomplete='off' id="book_name" name="book_name" pattern=".{1,}" title="Book title can't be null" required>

                            </div>
                            <span class=" ml-5 small pl-5 text-danger" style="display:none" id="name_exists_error">Book name already taken</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="input-group mb-3 mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Author</span>
                                </div>
                                <input type="text" class="form-control" id="author" name="author" pattern=".{1,}" title="Author field can't be null" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="input-group mb-3 toggle_addcategory">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Category</span>
                                </div>
                                <select class="custom-select" id="book_type" name="book_type">
                                    <?php foreach ($category_list as $category) { ?>
                                        <option value="<?= $category["book_type"] ?>"><?= $category["book_type"] ?></option>
                                    <?php } ?>
                                </select>
                                <a class="small pl-5 w-100 ml-5 font-arial pt-1" style="display:block" href="#" id="addCategory">Add category</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Book file</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" required id="inputGroupFile02" name="book_file" aria-describedby="inputGroupFileAddon02" accept="application/pdf">
                                    <label class="custom-file-label label_file" for="inputGroupFile02">Choose file</label>
                                </div>
                                <a class="small pl-5 ml-5 w-100 font-arial pt-1" id="current_book_file" href="" target="_blank">Current book file</a>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
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
        var tmp_booktype;
        var tmp_old_booktype;
        $(document).on('click', '.toggle_addcategory #addCategory', function() {
            tmp_booktype = $('#book_type').html();
            tmp_old_booktype = $('[name="book_type"]').val();
            $('#book_type').remove();
            $('#addCategory').remove();
            $('.toggle_addcategory').append("<input type='text' autocomplete='off' required class='form-control' name='book_type' id='book_type2' pattern='[a-zA-Z0-9\\s]+' placeholder='Category..'>");
            $('.toggle_addcategory').append("<a class='small pl-5 w-100 ml-5' style='display:block' href='#' id='cancelAddCategory'>Cancel add category</a>")
        })

        $(document).on('click', '.toggle_addcategory #cancelAddCategory', function() {
            $('#book_type2').remove();
            $('#cancelAddCategory').remove();
            $('.toggle_addcategory').append("<select class='custom-select' id='book_type' name='book_type' required>" + tmp_booktype + "</select>")
            $('.toggle_addcategory').append("<a class='small pl-5 w-100 ml-5' style='display:block' href='#' id='addCategory'>Add category ?</a>")
            $('[name="book_type"]').val(tmp_old_booktype);
        })

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
        $('#books tbody').on('click', 'tr:not(:has(.dataTables_empty))', function() {
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
                            data = table.rows('.selected').data()[i];

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
        $(document).on('change', '.comment_toggle #comment', function(each) {
            var isChecked = $(this).prop("checked");
            var post_data = {
                'book_id': Number($('#book_id').val()),
                'isChecked': isChecked,
            };
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>comment/toggle_function",
                data: post_data,
                success: function(data) {
                    let text;
                    if (post_data["isChecked"]) {
                        text = "enabled";
                    } else {
                        text = "disabled";
                    }
                    Toast.fire({
                        title: 'Success !',
                        text: post_data["book_id"] + '\'s comment function has been ' + text,
                        type: 'success',
                    })
                },

            });
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
            $('#exampleModalLabel_book').html("Edit book : " + data["book_name"]);
            $('.modal_book_info tbody tr:nth-child(2) td div input').val(data["book_id"]);
            $('.modal_book_info tbody tr:nth-child(3) td div input').val(data["book_name"]);
            $('.modal_book_info tbody tr:nth-child(4) td div input').val(data["author"]);
            $('.modal_book_info tbody tr:nth-child(5) td div input').val(data["book_type"]);

            $("#old_img").attr("src", "<?= base_url() ?>/assets/book_covers/" + data["book_id"] + ".PNG?" + new Date().getTime());
            $('#book_type').val(data["book_type"]);

            $('#current_book_file').attr("href", "<?= base_url() ?>assets/book_files/" + data["book_name"] + ".pdf");

            $('#inputGroupFile01').next('.label_cover').html("Choose file");
            $('#inputGroupFile01').val('');
            $('#inputGroupFile02').next('.label_file').html("Choose file");
            $('#inputGroupFile02').val('');

            var postData = {
                book_id: data["book_id"],
            };

            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/api/book/is_comment_enable',
                data: postData,
                beforeSend: function() {
                    $(document.body).css({
                        'cursor': 'wait'
                    });
                },
                success: function(data) {
                    if (data) {
                        $('.comment_toggle').append('<input id="comment" class="switch-box-input" type="checkbox" checked="checked"/><label for="comment" class="switch-box-slider mr-2"></label><label for="comment" class="switch-box-label small font-arial text-muted delete_toggle_label">Toggle comment function</label>')
                        // $('.comment_toggle #comment').attr('checked', true);

                    } else {
                        $('.comment_toggle').append('<input id="comment" class="switch-box-input" type="checkbox"/><label for="comment" class="switch-box-slider mr-2"></label><label for="comment" class="switch-box-label small font-arial text-muted delete_toggle_label">Toggle comment function</label>')
                        // $('.comment_toggle #comment').attr('checked', false);

                    }
                    $(document.body).css({
                        'cursor': 'default'
                    });
                    $('#book_edit_modal').modal('show');
                }
            })
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
            formCheckValid();
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
                            var booksArray = {
                                book_id: Number($('#book_id').val()),
                                book_name: $('#book_name').val(),
                                author: $('#author').val(),
                                book_type: $('[name="book_type"]').val(),
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
                                        isCoverChanged = false;
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
                    var book_name = document.querySelector("#book_name");
                    var author = document.querySelector("#author");
                    var addCategory = document.querySelector("#book_type2");

                    var html = "";
                    if (!book_name.checkValidity()) {
                        html += "<pre class='small text-muted font-apple'>Book name can't be empty</pre>";
                    }
                    if (!author.checkValidity()) {
                        html += "<pre class='small text-muted font-apple'>Author can't be empty</pre>";
                    }
                    if (addCategory != null) {
                        if (!addCategory.checkValidity()) {
                            html += "<pre class='small text-muted font-apple'>Category can't be empty and must be English characters</pre>";
                        }
                    }

                    $('#book_edit_modal').modal('show');
                    Swal.fire({
                        type: 'error',
                        title: 'Error',
                        text: 'Book name already taken!',
                        html: html,
                        onClose: () => {
                            $('#book_edit_modal').modal('show');
                            $('#book_name').focus();
                        }
                    })
                }
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'Book name already taken!',
                    onClose: () => {
                        $('#book_edit_modal').modal('show');
                        $('#book_name').focus();
                        checkNameExists();
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
                    $('#book_edit_modal').modal('show');
                }
            })
        }

        $('#book_edit_modal').on('hidden.bs.modal', function() {
            $('#tbodyData_book tr.selected').removeClass("selected");
            $('.comment_toggle').html("");

            $('#book_name').removeClass("bg-danger");
            $('#book_name').removeClass("text-white");
            $('#name_exists_error').hide();
            isNameExists = false;
            isValid = false;
            if (isCoverChanged) {
                isInit = false;
            }
        })

        var isNameExists = false;
        $('#book_name').on('keyup', function() {
            checkNameExists();
        });

        function checkNameExists() {
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
        }

        var isValid = false;

        function formCheckValid() {
            var book_name = document.querySelector("#book_name");
            var author = document.querySelector("#author");

            var addCategory = document.querySelector("#book_type2");
            if (addCategory != null) {
                if (addCategory.checkValidity() != null) {
                    isValid = book_name.checkValidity() & author.checkValidity() & addCategory.checkValidity();
                }
            } else {
                isValid = book_name.checkValidity() & author.checkValidity();
            }
        }

        $('#inputGroupFile01').on('change', function() {
            //get the file name
            var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
            //replace the "Choose a file" label
            $(this).next('.label_cover').html(fileName);
            readFile(this);
            isCoverChanged = true;
        })


        $('#inputGroupFile02').on('change', function() {
            var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
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
                            width: 250,
                            height: 330
                        },
                        boundary: {
                            width: 312,
                            height: 425
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