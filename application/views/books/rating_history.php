<?php if ($showheader == true) { ?>
    <div class="container">
        <nav class="nav nav-pills justify-content-end font-arial nav_user">
            <a class="nav-item nav-link <?php if (isset($yourcourse)) echo $yourcourse; ?>" href="<?= base_url() ?>course">My Module</a>
            <a class="nav-item nav-link <?php if (isset($saveditem)) echo $saveditem; ?>" href="<?= base_url() ?>saved">Saved Item</a>
            <a class="nav-item nav-link <?php if (isset($ratinghistory)) echo $ratinghistory; ?>" href="<?= base_url() ?>ratinghistory">Rating History</a>
        </nav>

        <h1 class="display-4 page_title_header">Rating history</h1>
        <div id="rating_history_content" class="mt-4">
        <?php } ?>

        

        <?php if (($rating_history_list != FALSE)) {
            foreach ($rating_history_list as $rating_history) { ?>
                <div class="row bg-light py-3 book_detail_content animated_book_detail_content book_detail_content_rating_history mt-3" style="border-radius:1rem;border:1px solid #0000000d" data-aos="fade-up">

                    <div class="col pl-3" style="max-width: 9rem;">
                        <a href="<?= base_url() ?>book/<?= $rating_history['book_id'] ?>">
                            <img id="" style="width:100%;box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.25);" src="<?= base_url() ?>assets/book_covers/<?= $rating_history['book_id'] ?>.PNG" alt="">
                        </a>
                    </div>
                    <!-- BOOK detail section -->
                    <div class="col-5">
                        <div class="mb-2 font-arial font-weight-bolder book_detail_content_rating_history_name"> <a href="<?= base_url() ?>book/<?= $rating_history['book_id'] ?>" class="link"><?= $rating_history['book_name'] ?></a></div>
                        <div class="book_detail_text pt-1"><a class="book_detail_text author_text_rating_history link" style="color:#6c757d" href="<?= base_url() ?>browse/<?= strtolower(ucwords(str_replace(" ", "-", $rating_history["book_type"]))) ?>"><span><i class="fas fa-tag"></i> <?= $rating_history['book_type'] ?></span></a></div>
                    </div>

                    <!-- RATE section -->
                    <div class="col-2 text-center">
                        <div>
                            <input value="<?= $rating_history['rate'] ?>" class="rater_star" title="">
                        </div>
                    </div>

                    <!-- DATE section -->
                    <div class="col-3 text-right">
                        <!-- monment js -->
                        <div class="small text-secondary" style="cursor:default" data-time-format="time-ago" data-time-value="<?= $rating_history['date'] ?>" title="<?= $rating_history['date'] ?>"><?= $rating_history['date'] ?></div>
                    </div>

                </div>
            <?php $i++;
                }
                if ($num_rows == 5 &&  $all_num_rows != $i) { ?>
                <div class="load-more text-center justify-content-center my-5" lastID="<?php echo $i; ?>" style="display: none;">
                    <!-- <img src="<?php echo base_url('assets/img/loading.gif'); ?>" /> -->

                    <div class="spinner-border text-primary mr-3" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Loading...
                </div>
            <?php } else { ?>
                <div class="load-more pt-5" lastID="0">
                </div>
            <?php } ?>

        <?php } else if ($all_num_rows == 0) { ?>

            <div class="load-more pt-5" lastID="0">
                <h1 class="font-weight-lighter text-center font-arial">You haven't rated <i class="far fa-star"></i> any item</h1>
                <div class="text-muted text-center">Rate a book to get started!</div>

                <div class="position:relative text-center">
                    <img src="<?= base_url() ?>assets/img/fogg-no-comments.png" style="max-width:65rem" alt="">
                </div>
            </div>

        <?php } else if ($num_rows == 0) { ?>
            <div class="load-more pt-5" lastID="0">

            </div>
        <?php } ?>



        <?php if ($showheader == true) { ?>
        </div>
    </div>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        // moment.locale('th');
        // time formatter
        $("[data-time-format]").each(function() {
            var el = $(this);
            switch (el.attr("data-time-format")) {
                case "time-ago":
                    var timeValue = el.attr("data-time-value")
                    var strTimeAgo = moment(timeValue).fromNow();
                    el.text(strTimeAgo);
                    break;
            }
        });

        var num_rows = <?= $num_rows ?>;
        var call = 0
        var all_num_rows = <?= $all_num_rows ?>;

        // console.log(all_num_rows);
        // console.log(num_rows);

        $(window).scroll(function() {
            var lastID = $('.load-more').attr('lastID');
            var height = $(document).height() - $(window).height();
            var scroll_value = (numeral($(window).scrollTop()).value() + 250);
            // console.log(num_rows + " " + lastID + " " + call);
            // console.log(scroll_value + " >= " + height + " AND lastID : " + lastID + " num_rows : " + num_rows + " call : " + call);

            if ((scroll_value >= height) && (lastID != 0) && num_rows == 5 && call == 0) {
                // console.log("true");
                call = 1;
                var post_data = {
                    'start': lastID,
                    'i': <?= $i ?>,
                    'all_num_rows': all_num_rows,
                };

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('books/loadMoreData_rating_history'); ?>',
                    data: post_data,
                    async: true,
                    beforeSend: function() {
                        $('.load-more').show();
                    },
                    success: function(html) {
                        setTimeout(() => {
                            $('.load-more').remove();
                            $('#rating_history_content').append(html);
                        }, 500);

                    }
                });
            }
        });
    });

    $('.rater_star').rating({
        'showCaption': false,
        'stars': '5',
        'min': '0',
        'max': '5',
        'step': '0.5',
        'size': 'xs',
        displayOnly: true,

    });
</script>