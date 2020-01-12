<div id="fullpage" class="container">
    <h2 class="text-center shadow-sm p-3 mb-1 rounded bg_linear_theme text-white">เพิ่มรายการสินค้าใหม่</h2>
    <form id="form_insert_book" method="post" enctype='multipart/form-data'>
        <div class="bg-light p-5 rounded shadow-lg mb-5 bg-white">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-9">
                    <input type="text" autocomplete="off" required class="form-control" name="book_name" id="book_name" placeholder="Book title..">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-6">
                    <input type="text" autocomplete="off" required class="form-control" name="author" id="author" placeholder="Author..">
                </div>
            </div>

            <div class="form-group row">
                <label for="book_type" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-6 toggle_addcategory">
                    <select class="custom-select" id="book_type" name="book_type" required>
                        <option value="">Select..</option>
                        <?php foreach ($category_list as $category) { ?>
                            <option value="<?= $category["book_type"] ?>"><?= $category["book_type"] ?></option>
                        <?php } ?>

                    </select>
                    <a class="small pl-3" href="#" id="addCategory">Add category ?</a>
                </div>

            </div>

            <!-- <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">ราคา</label>
                <div class="col-sm-3">
                    <input type="number" required step=0.01 min="1" class="form-control" name="product_price" id="product_price" placeholder="ราคาขายปลีก">
                </div>
                <div class="col-sm-3">
                    <input type="number" required step=0.01 min="1" class="form-control" name="product_price_discount" id="product_price_discount" placeholder="ราคาขาย(ยอด 5,000 ขึ้น)">
                </div>
                <div class="col-sm-3">
                    <input type="number" required step=0.01 min="1" class="form-control" name="product_cost" id="product_cost" placeholder="ราคาทุน/หน่วย">
                </div>
            </div> -->

            <div class="form-group row">
                <label for="inputGroupFileAddon01" class="col-sm-2 col-form-label">Cover Image</label>
                <div class="col-sm-9 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">

                        <input type="file" class="custom-file-input" required id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="text-center" id="preview_upload_wrapper">
            </div>

            <div class="form-group row justify-content-center mt-5 mb-0">
                <div class="col-sm-auto ">
                    <button type="submit" class="btn btn-primary mx-auto btn-lg">Submit</button>
                </div>
            </div>
        </div>
    </form>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        var tmp_booktype;
        $(document).on('click', '.toggle_addcategory #addCategory', function() {
            tmp_booktype = $('#book_type').html();
            $('#book_type').remove();
            $('#addCategory').remove();
            $('.toggle_addcategory').append("<input type='text' autocomplete='off' required class='form-control' name='book_type' id='book_type2' placeholder='Category..'>");
            $('.toggle_addcategory').append("<a class='small pl-3' href='#' id='cancelAddCategory'>Cancel add category</a>")
        })

        $(document).on('click', '.toggle_addcategory #cancelAddCategory', function() {
            $('#book_type2').remove();
            $('#cancelAddCategory').remove();
            $('.toggle_addcategory').append("<select class='custom-select' id='book_type' name='book_type' required>" + tmp_booktype + "</select>")
            $('.toggle_addcategory').append("<a class='small pl-3' href='#' id='addCategory'>Add category ?</a>")
        })

        $('#inputGroupFile01').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
            readFile(this);
        })

        var upload_crop = $('#preview_upload_wrapper').croppie({
            viewport: {
                width: 312.5,
                height: 412.5
            },
            boundary: {
                width: 500,
                height: 500
            },
            url: '<?= base_url() ?>assets/img/loading.gif',
        });

        $('.crop_image').click(function(event) {
            upload_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {

                $.ajax({
                    url: "upload.php",
                    type: "POST",
                    data: {
                        "image": response
                    },
                    success: function(data) {}
                });
            })
        });

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview_upload_wrapper').croppie('bind', {
                        url: e.target.result
                    });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $("#form_insert_book").submit(function(e) {
            e.preventDefault();

            upload_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                var image = {
                    image: response
                };

                var booksArray = {
                    book_name: $('[name ="book_name"]').val(),
                    author: $('[name ="author"]').val(),
                    book_type: $('[name ="book_type"]').val(),
                };
                console.log($('[name ="book_type"]').val())

                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>api/book/insert',
                    data: booksArray,
                    success: function(data) {
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url() ?>api/book/cover_upload',
                            data: image,
                            success: function(data) {
                                Toast.fire({
                                    title: 'Success !',
                                    text: 'Book has been inserted',
                                    type: 'success',
                                })
                                document.getElementById("form_insert_book").reset();
                                $('#inputGroupFile01').next('.custom-file-label').html("Choose file");

                                upload_crop.croppie('bind', {
                                    url: '<?= base_url() ?>assets/img/loading.gif',
                                });
                            }
                        })
                    }
                })
            })
        });

    });
</script>