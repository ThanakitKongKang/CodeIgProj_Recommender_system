<div class="container">
    <div class="row">
        <div class="d-inline-block col" style="height: 90vh!important;width:40vw!important">
            <object data="<?= base_url() ?>assets/book_files/Certified-Management-Accountant-CMA-Part-1.pdf" type="application/pdf" width="100%" height="100%">
            </object>
        </div>
        <div class="pl-5 col">
            <div class="row">
                <div class="col">
                    <img id="" style="width:100%;box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.25);" src="<?= base_url() ?>assets/book_covers/<?= $book_detail['book_id'] ?>.png">
                </div>

                <div class="col bg-light pt-3" style="border-radius:1rem">
                <!-- RATE section -->
                    <div class="" style="top:1rem;">
                        <input value="<?= $user_rate['rate'] ?>" class="rater_star" title="">
                        <div style="padding-left:2.5rem">
                            <?php if ($book_detail['count_rate'] != 0) { ?>
                                <span class="badge badge-warning" style="font-size: 1rem;"><span class="font-arial">
                                        <span style="letter-spacing: 1px;" class="font-weight-bold" id="rate_avg">
                                            <?= number_format($book_detail['b_rate'], 1); ?>
                                        </span>
                                        <span class="small" style="color: #6b6b6b;">/5</span></span>
                                </span>
                                <span class="small text-secondary">based on <?= $book_detail['count_rate'] ?> user<?php if ($book_detail['count_rate'] != 1) echo "s";  ?> </span>

                            <?php } else { ?>
                                <span class="badge badge-secondary" style="font-size: 1rem;" id="span_rating"><span class="font-arial">
                                        <span style="letter-spacing: 1px;" class="font-weight-bold" id="rate_avg">
                                            0
                                        </span>
                                        <span class="small">/5</span></span>
                                </span>
                                <span class="small text-secondary" id="span_rating_text">No ratings</span>
                            <?php } ?>
                        </div>

                    </div>
                    <!-- BOOK detail section -->
                    <div class="position-absolute pr-3" style="top:5rem">
                        <hr>
                        <input id="book_id" type="hidden" value="<?= $book_detail['book_id'] ?>">
                        <div class="pb-2 font-arial font-weight-bolder"> <?= $book_detail['book_name'] ?></div>
                        <div class="text-col-2-author pt-1">Category : <a class="text-col-2-author" href="<?= base_url() ?>browse/<?= $book_detail['book_type'] ?>"><span><?= $book_detail['book_type'] ?></span></a></div>
                        <div class="text-col-2-author pt-1">Author : <?= $book_detail['author'] ?></div>
                    </div>

                    <!-- bookmark trigger -->
                    <div class="position-absolute pr-4 w-100" style="bottom:1rem">
                        <hr class="mb-2">
                        <button class="btn btn-primary bookmark_trigger"><?php if ($bookmark == TRUE) { ?><i class="fas fa-bookmark" id="bookmark_icon"></i><?php echo "<span class='save_text'> unsave book</span>";} else { ?><i class="far fa-bookmark" id="bookmark_icon"></i> <?php echo "<span class='save_text'> save book</span>"; } ?> </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var is_logged_in = true;
        <?php if ($this->session->userdata('logged_in')) { ?>
            var is_logged_in = false;
        <?php } ?>
        $('.rater_star').rating({
            'stars': '5',
            'min': '0',
            'max': '5',
            'step': '0.5',
            'size': 'sm',
            containerClass: 'text-center',
            displayOnly: is_logged_in,
            showCaption: false,
            showClear: false,
        });
        // rater
        $('.rating-input').change(function(e) {
            // call bookscontroller to call model
            var rating = {
                'rating': $('.rating-input').val(),
                'book_id': $('#book_id').val(),
            };

            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/rateBook",
                data: rating,
                success: function(data) {
                    $('#rate_avg').html(data);
                    $('#span_rating').removeClass("badge-secondary");
                    $('#span_rating').addClass("badge-warning");
                    $('#span_rating_text').html("based on 1 user");
                }
            })
        });
        // bookmarker
        $('.bookmark_trigger').click(function(e) {
            var bookmark_data = {
                'book_id': $('#book_id').val(),
            };

            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/update_bookmark",
                data: bookmark_data,
                success: function(data) {
                    if (data == "login") {
                        Swal.fire({
                            title: 'ไม่สามารถทำรายการได้ กรุณาเข้าสู่ระบบ!',
                            type: 'error',
                            confirmButtonText: 'เข้าสู่ระบบ',
                            // timer: 1500
                        }).then((result) => {
                            if (result.value) {
                                window.location = "<?= base_url() ?>login";
                            }
                        })
                    } else if (data == "inserted") {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            title: 'บุ๊กมาร์กสำเร็จ !',
                            type: 'success',
                        });
                        $('#bookmark_icon').removeClass("far");
                        $('#bookmark_icon').addClass("fas");
                        $('.save_text').html(" unsave book");
                        

                    } else if (data == "removed") {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            title: 'นำออกจากรายการบุ๊กมาร์กสำเร็จ !',
                            type: 'success',
                        });
                        $('#bookmark_icon').removeClass("fas");
                        $('#bookmark_icon').addClass("far");
                        $('.save_text').html(" save book");

                    }
                }
            })
        });


    });
</script>