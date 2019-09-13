<div class="container">
    <div class="row">
        <div class="d-inline-block col" style="height: 90vh!important;width:40vw!important">
            <object data="<?= base_url() ?>assets/book_files/<?= str_replace("#", "sharp", $book_detail['book_name']) ?>.pdf#view=Fit&pagemode=bookmarks" type="application/pdf" width="100%" height="100%">
            </object>

        </div>
        <div class="pl-5 col">
            <div class="row" style="height:22rem">
                <div class="col pt-3">
                    <img id="" style="width:100%;box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.25);" src="<?= base_url() ?>assets/book_covers/<?= $book_detail['book_id'] ?>.png">
                </div>

                <div class="col bg-light pt-3 book_detail_content" style="border-radius:1rem;">
                    <!-- RATE section -->
                    <div>
                        <div style="padding-left:2.5rem">
                            <?php if ($book_detail['count_rate'] != 0) { ?>
                                <span class="badge badge-warning" style="font-size: 1rem;"><span class="font-arial">
                                        <span style="letter-spacing: 1px;" class="font-weight-bold" id="rate_avg">
                                            <?= number_format($book_detail['b_rate'], 1); ?>
                                        </span>
                                        <span class="small" style="color: #6b6b6b;">/5</span></span>
                                </span>
                                <span class="small text-secondary">based on <span id="rate_avg_user"><?= $book_detail['count_rate'] ?></span> user<?php if ($book_detail['count_rate'] != 1) echo "s";  ?> </span>

                            <?php } else { ?>
                                <span class="badge badge-secondary" style="font-size: 1rem;" id="span_rating"><span class="font-arial">
                                        <span style="letter-spacing: 1px;" class="font-weight-bold" id="rate_avg">
                                            0
                                        </span>
                                        <span class="small">/5</span></span>
                                </span>
                                <span class="small text-secondary" id="span_rating_text">Be the first who rate this!</span>
                            <?php } ?>
                        </div>
                        <hr>
                        <div class="font-arial text-center font-italic text-secondary small">You rated this : <span id="your_rate"><?= $user_rate['rate'] ?></span></div>
                        <input value="<?= $user_rate['rate'] ?>" class="rater_star" title="">
                    </div>
                    <!-- BOOK detail section -->
                    <div class="position-absolute w-100" style="top:8rem;padding-right:1.75rem;">
                        <hr>
                        <input id="book_id" type="hidden" value="<?= $book_detail['book_id'] ?>">
                        <div class="pb-2 font-arial font-weight-bolder"> <?= $book_detail['book_name'] ?></div>
                        <div class="book_detail_text pt-1">Category : <a class="link" href="<?= base_url() ?>browse/<?= strtolower(ucwords(str_replace(" ", "-", $book_detail["book_type"]))) ?>"><span><?= $book_detail['book_type'] ?></span></a></div>
                        <div class="book_detail_text pt-1">Author : <?= $book_detail['author'] ?></div>
                    </div>

                    <!-- bookmark trigger -->
                    <div class="position-absolute w-100 text-center" style="bottom:1rem;padding-right:1.75rem;">
                        <hr class="mb-2">
                        <button class="btn btn-primary bookmark_trigger mt-2">
                            <?php if ($bookmark == TRUE) { ?>
                                <i class="fas fa-bookmark" id="bookmark_icon"></i>
                            <?php echo "<span class='save_text'> unsave book</span>";
                            } else {
                                ?><i class="far fa-bookmark" id="bookmark_icon"></i>
                            <?php echo "<span class='save_text'> save book</span>";
                            } ?></button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var not_login = true;
        <?php if ($this->session->userdata('logged_in')) { ?>
            var not_login = false;
        <?php } ?>
        $('.rater_star').rating({
            'stars': '5',
            'min': '0',
            'max': '5',
            'step': '0.5',
            'size': 'sm',
            containerClass: 'text-center',
            displayOnly: not_login,
            showCaption: false,
            showClear: false,
        });
        if (not_login) {
            // rater
            $('.rating-stars').click(function(e) {
                please_login();
            });
        } else {
            // rater
            var default_rating = $('.rating-input').val();
            

            $('.rating-input').change(function(e) {
                console.log(default_rating)
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
                        if (default_rating == "") {
                            $('#span_rating_text').html("based on 1 user");
                            $('#rate_avg_user').html(Number($('#rate_avg_user').html()) + 1);
                            default_rating = 1;
                        }

                        $('#rate_avg').html(data);


                        $('#your_rate').html($('.rating-input').val());

                        $('#span_rating').removeClass("badge-secondary");
                        $('#span_rating').addClass("badge-warning");



                    }
                })
            });
        }

        // bookmarker
        $('.bookmark_trigger').click(function(e) {
            var this_elm = $(this);
            var bookmark_data = {
                'book_id': $('#book_id').val(),
            };
            var count_all_saved_list = $('#count_all_saved_list').html();
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/update_bookmark",
                data: bookmark_data,
                success: function(data) {
                    if (data == "login") {
                        please_login();
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
                        this_elm.find('i').removeClass("far");
                        this_elm.find('i').addClass("fas");
                        this_elm.find('span').html(" unsave book");

                        count_all_saved_list++;
                        $('#count_all_saved_list').html(count_all_saved_list)

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
                        this_elm.find('i').removeClass("fas");
                        this_elm.find('i').addClass("far");
                        this_elm.find('span').html(" save book");
                        count_all_saved_list--;
                        $('#count_all_saved_list').html(count_all_saved_list)
                    }
                }
            })
        });

        function please_login() {
            Swal.fire({
                title: 'ไม่สามารถทำรายการได้!',
                html: '<div>กรุณา<a href="<?= base_url() ?>login">เข้าสู่ระบบ</a></div>',
                type: 'error',
                confirmButtonText: 'เข้าสู่ระบบ',
                // timer: 1500
            }).then((result) => {
                if (result.value) {
                    window.location = "<?= base_url() ?>login";
                }
            })
        }

    });
</script>