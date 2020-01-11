<div id="fullpage" class="container">
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
                <table class="modal_book_info w-75 mx-4">
                    <tr>
                        <td>
                            <div class="input-group mb-3 w-25">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Book id</span>
                                </div>
                                <input type="text" class="form-control" id="book_id" readonly>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Book name</span>
                                </div>
                                <input type="text" class="form-control" id="book_name">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group mb-3">
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
            order: [0, 'asc'],
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

        // edit modal popup caller
        $('#books tbody').on('click', 'tr', function() {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
            var data = table.row(this).data();

            $('.modal_book_info tbody tr:nth-child(1) td div input').val(data["book_id"]);
            $('.modal_book_info tbody tr:nth-child(2) td div input').val(data["book_name"]);
            $('.modal_book_info tbody tr:nth-child(3) td div input').val(data["author"]);
            $('.modal_book_info tbody tr:nth-child(4) td div input').val(data["book_type"]);
            $('.modal_book_info tbody tr:nth-child(5) td div input').val(data["content"]);
            $('.modal_book_info tbody tr:nth-child(6) td div input').val(data["b_rate"]);
            $('.modal_book_info tbody tr:nth-child(7) td div input').val(data["count_rate"]);


            $('#book_type').val(data["book_type"]);

            $('#book_edit_modal').modal('show');
        });

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
            var booksArray = {
                book_id: Number($('#book_id').val()),
                book_name: $('#book_name').val(),
                author: $('#author').val(),
                book_type: $('#book_type').val(),
            };

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
                    var formData = booksArray

                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url() ?>/api/book/update',
                        data: formData,
                        success: function(data) {
                            Toast.fire({
                                title: 'Success !',
                                text: 'Saved changes',
                                type: 'success',
                            })
                            table.ajax.reload();
                            $('#book_edit_modal').modal('hide');
                        }
                    })

                } else {
                    $('#book_edit_modal').modal('show');
                }
            })
        }

        function swalDeleteBookConfirm() {
            var book_id = {
                book_id: Number($('#book_id').val()),
            };

            Swal.fire({
                title: 'Confirm ?',
                html: "Book's related data will be removed, including : bookmarking, rating, commenting etc.",
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
                            $('#book_edit_modal').modal('hide');

                        }
                    })

                } else {
                    $('#book_edit_modal').modal('show');
                }
            })
        }
    });
</script>