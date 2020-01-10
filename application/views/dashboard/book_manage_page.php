<div id="fullpage" class="container">
    <?php if (($books != FALSE)) { ?>
        <table class="table table-light table-striped table-responsive table-bordered table-hover" id="books">
            <thead class="table-primary">
                <tr>
                    <th class="align-middle text-center">book_id</th>
                    <th class="align-middle text-center">book_name</th>
                    <th class="align-middle text-center">author</th>
                    <th class="align-middle text-center">book_type</th>
                    <th class="align-middle text-center">content</th>
                    <th class="align-middle text-center">b_rate</th>
                    <th class="align-middle text-center">count_rate</th>
                </tr>
            </thead>

            <tbody id="tbodyData">
                <?php
                foreach ($books as $key => $content) { ?>
                    <tr class="show-edit-modal" title="Edit this book's detail">
                        <td class="text-center"><?= $content['book_id'] ?></td>
                        <td><?= $content['book_name'] ?></td>
                        <td><?= $content['author'] ?></td>
                        <td class="text-center"><?= $content['book_type'] ?></td>
                        <td><?= $content['content'] ?></td>
                        <td class="text-center"><?= $content['b_rate'] ?></td>
                        <td class="text-center"><?= $content['count_rate'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    <?php } ?>
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
                <button class="btn btn-danger" id="delete_this_book_alert" style="position:absolute;right:1rem;top:1.5rem"><i class="far fa-trash-alt"></i></button>
                <table class="modal_book_info table">
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>


            </div>
            <div class="edit_footer modal-footer">
                <button type="button" onclick="" id="footer-submit" class="edit_this_book_alert btn btn-primary text-white" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>


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
            "order": [0, 'asc'],
            "deferRender": true,


            "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,
                },
                {
                    "targets": [1, 2, 3, 4, 5, 6],
                    "searchable": true,
                }
            ],

            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search"
            }


        });

        // edit modal popup caller
        $('#books tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            // alert('You clicked on ' + data[0] + '\'s row');
            var booksArray = {
                book_id: data[0],
                book_name: data[1],
                author: data[2],
                book_type: data[3],
                content: data[4],
                b_rate: data[5],
                count_rate: data[6],
            };
            var i;
            for (i = 1; i <= 7; i++) {
                $('.modal_book_info tbody tr:nth-child(' + Number(i) + ') td').html(data[i - 1]);
                console.log(data[i])
            }

            $('#book_edit_modal').modal('show');
        });

        $('.edit_this_book_alert').on('click', function(e) {
            event.preventDefault();
            swalConfirmShow(e);
        })
    });

    function swalEditBookConfirm() {
        Swal.fire({
            title: 'Confirm ?',
            html: "<pre class='" + text[0] + "'>" + old_product_name + " --> " + product_name + "</pre>" +
                "<pre class='" + text[1] + "'>" + old_product_type + " --> " + product_type + "</pre>" +
                "<pre class='" + text[2] + "'>" + old_product_potent + " --> " + product_potent + "</pre>" +
                "<pre class='" + text[3] + "'>" + old_product_amount + " --> " + product_amount + "</pre>" +
                "<pre class='" + text[4] + "'>" + old_product_cost + " --> " + product_cost + "</pre>" +
                "<pre class='" + text[5] + "'>" + old_product_price + " --> " + product_price + "</pre>" +
                "<pre class='" + text[6] + "'>" + old_product_price_discount + " --> " + product_price_discount + "</pre>" +
                "<pre class='" + text[7] + "'>" + old_product_stock + " --> " + product_stock + "</pre>" +
                "<pre class='" + text[8] + "'>" + old_product_status + " --> " + product_status + "</pre>",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                var formData = {
                    'product_id': product_id,
                    'product_name': product_name,
                    'product_type': product_type,
                    'product_potent': product_potent,
                    'product_amount': product_amount,
                    'product_cost': product_cost,
                    'product_price': product_price,
                    'product_price_discount': product_price_discount,
                    'product_stock': product_stock,
                    'product_status': product_status
                };

                $.ajax({
                    type: 'POST',
                    url: './model/model_product_edit.php', // the url where we want to POST
                    data: formData, // our data object
                })

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    title: 'สำเร็จ !',
                    text: 'ท่านได้ทำรายการแก้ไขสินค้า ' + product_id,
                    type: 'success',
                    confirmButtonText: 'ตกลง',
                })
                getListProductTable();
            } else {
                $('#book_edit_modal').modal('show');
            }
        })
    }
</script>