<div id="fullpage" class="container">
    <h2 class="text-center shadow-sm p-3 mb-1 rounded bg_linear_theme text-white">Add Book</h2>
    <form id="form_insert_book" method="post" enctype='multipart/form-data'>
        <div class="bg-light p-5 rounded shadow-lg mb-5 bg-white">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-9">
                    <input type="text" autocomplete="off" required class="form-control" name="book_name" id="book_name" placeholder="Book title..">
                    <span class="small pl-3 text-danger" style="display:none" id="name_exists_error">Book name already taken</span>
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
                <label for="inputGroupFileAddon02" class="col-sm-2 col-form-label">Book file</label>
                <div class="col-sm-9 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                    </div>
                    <div class="custom-file">

                        <input type="file" class="custom-file-input" required id="inputGroupFile02" name="book_file" aria-describedby="inputGroupFileAddon02" accept="application/pdf">
                        <label class="custom-file-label label_file" for="inputGroupFile02">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputGroupFileAddon01" class="col-sm-2 col-form-label">Cover Image</label>
                <div class="col-sm-9 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">

                        <input type="file" class="custom-file-input" required id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/jpeg, image/png">
                        <label class="custom-file-label label_cover" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="text-center" id="preview_upload_wrapper">
                <div class="mx-auto upload_msg">
                    Upload a file to start cropping
                </div>
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
            $(this).next('.label_cover').html(fileName);
            readFile(this);
        })


        $('#inputGroupFile02').on('change', function() {
            var fileName = $(this).val();
            $(this).next('.label_file').html(fileName);
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

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        var isNameExists = false;
        $('#book_name').on('keyup', function() {
            var book_name = {
                book_name: $('[name ="book_name"]').val(),
            };
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
        });

        $("#form_insert_book").submit(function(e) {
            e.preventDefault();
            if (!isNameExists) {
                upload_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    var booksArray = {
                        book_name: $('[name ="book_name"]').val(),
                        author: $('[name ="author"]').val(),
                        book_type: $('[name ="book_type"]').val(),
                    };

                    var image = {
                        image: response,
                        is_new : true,
                    };

                    var file_data = $('#inputGroupFile02').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    form_data.append('name', $('[name ="book_name"]').val());

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
                                    $.ajax({
                                        type: 'POST',
                                        url: '<?= base_url() ?>api/book/file_upload',
                                        data: form_data,
                                        contentType: false,
                                        cache: false,
                                        processData: false,
                                        dataType: 'text',
                                        success: function(data) {
                                            Toast.fire({
                                                title: 'Success !',
                                                text: 'Book has been inserted',
                                                type: 'success',
                                            })
                                            document.getElementById("form_insert_book").reset();
                                            $('#inputGroupFile01').next('.label_cover').html("Choose file");
                                            $('#inputGroupFile02').next('.label_file').html("Choose file");
                                            $('.upload_msg').show();
                                            upload_crop.croppie('destroy')
                                        }
                                    })
                                }
                            })
                        }
                    })
                })
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: 'Book name already taken!',
                    footer: '<a href="<?= base_url() ?>dashboard/book/manage">Edit the book instead</a>'
                })
                $('#book_name').focus();
            }
        });
    });
</script>