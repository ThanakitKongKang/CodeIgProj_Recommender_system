<?php if ($showheader == true) { ?>
    <div class="container">
        <nav class="nav nav-pills justify-content-end font-arial">
            <a class="nav-item nav-link <?php if (isset($yourcourse)) echo $yourcourse; ?>" href="<?= base_url() ?>course">Your Course</a>
            <a class="nav-item nav-link <?php if (isset($saveditem)) echo $saveditem; ?>" href="<?= base_url() ?>saved">Saved Item</a>
            <a class="nav-item nav-link <?php if (isset($ratinghistory)) echo $ratinghistory; ?>" href="<?= base_url() ?>ratinghistory">Rating History</a>
        </nav>

        <h1 class="display-4 page_title_header page_title_header_no_after">Saved Item <span class="badge badge-secondary count_saved_list"><?= $all_num_rows ?></span></h1>
        <div class="nav nav-pills font-arial">
            <a class="nav-item nav-link <?php if (isset($all_saved)) echo $all_saved; ?>" href="<?= base_url() ?>saved">All saved</a>
            <?php if (($collection_name != FALSE)) {
                    foreach ($collection_name as $cl) { ?>
                    <a class="nav-item nav-link <?= strtolower(ucwords(str_replace(" ", "-", $cl["collection_name"]))) ?>" href="<?= base_url() ?>saved?collection=<?= $cl["collection_name"] ?>"><?= $cl["collection_name"] ?></a>

            <?php }
                } ?>
        </div>
        <div id="saved_list">
        <?php } ?>


        <?php if (($saved_list != FALSE)) {
            foreach ($saved_list as $saved) { ?>
                <div class="row bg-light py-3 book_detail_content animated_book_detail_content mt-3" style="border-radius:1rem;border:1px solid #0000000d">
                    <div class="col pl-4" style="max-width:11rem;">
                        <a href="<?= base_url() ?>book/<?= $saved['book_id'] ?>">
                            <img id="" style="width:100%;box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.25);" src="<?= base_url() ?>assets/book_covers/<?= $saved['book_id'] ?>.PNG">
                        </a>
                    </div>
                    <!-- RATE section -->
                    <div class="col">
                        <div>
                            <?php if ($saved['count_rate'] != 0) { ?>
                                <span class="badge badge-warning" style="font-size: 1rem;"><span class="font-arial">
                                        <span style="letter-spacing: 1px;" class="font-weight-bold" id="rate_avg">
                                            <?= number_format($saved['b_rate'], 1); ?>
                                        </span>
                                        <span class="small" style="color: #6b6b6b;">/5</span></span>
                                </span>
                                <span class="small text-secondary">based on <?= $saved['count_rate'] ?> user<?php if ($saved['count_rate'] != 1) echo "s";  ?> </span>

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
                        <!-- BOOK detail section -->
                        <div class="pb-2 font-arial font-weight-bolder"> <a href="<?= base_url() ?>book/<?= $saved['book_id'] ?>" class="link"><?= $saved['book_name'] ?></a></div>
                        <div class="book_detail_text pt-1">Category : <a class="book_detail_text link" href="<?= base_url() ?>browse/<?= strtolower(ucwords(str_replace(" ", "-", $saved["book_type"]))) ?>"><span><?= $saved['book_type'] ?></span></a></div>
                        <div class="book_detail_text pt-1">Author : <?= $saved['author'] ?></div>
                        <span class="removed_item position-absolute text-primary" style="top:9.5rem;left:23rem;"></span>
                        <!-- bookmark trigger -->
                        <div class="pr-4 w-100">
                            <hr>
                            <button class="btn btn-primary bookmark_trigger<?= $round_count ?>" data-book_id="<?= $saved['book_id'] ?>">
                                <i class="fas fa-bookmark bookmark_icon"></i>
                                <span class="bookmark_trigger_text"> unsave book</span>
                            </button>
                            <span class="text-secondary small pt-3" data-time-format="time-ago" data-time-value="<?= $saved['date'] ?>" title="<?= $saved['date'] ?>" style="float:right;cursor:default;"><?= $saved['date'] ?></span>
                        </div>
                    </div>
                </div>
            <?php $i++;
                }
                if ($num_rows == 5 &&  $this->session->userdata('count_all_saved_list') != $i) { ?>
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

        <?php } else if ($this->session->userdata('count_all_saved_list') == 0) { ?>

            <div class="load-more pt-5" lastID="0">
                <h1 class="font-weight-lighter text-center font-arial">You haven't saved <i class="far fa-bookmark"></i> any item</h1>
                <div class="text-muted text-center">Save a book to get started!</div>
                <div class="position:relative text-center">
                    <img src="<?= base_url() ?>assets/img/fogg-list-is-empty.png" style="max-width:65rem" alt="">
                </div>
            </div>

        <?php } else if ($num_rows == 0) { ?>
            <div class="load-more pt-5" lastID="0">

            </div>
        <?php } ?>

        <?php if ($showheader == true) { ?>
        </div>
    </div> <?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        var bookmark_trigger_count = 0;
        // moment.locale('th');
        // time formatter
        $("[data-time-format]").each(function() {
            var el = $(this);
            switch (el.attr("data-time-format")) {
                case "time-ago":
                    var timeValue = el.attr("data-time-value")
                    var strTimeAgo = moment(timeValue).fromNow();
                    el.text("saved " + strTimeAgo);
                    break;
            }
        });

        // bookmarker
        $('.bookmark_trigger<?= $round_count ?>').on("click", bookmark_triggered);

        function bookmark_triggered() {
            var this_elm = $(this);
            var book_id = ($(this).data('book_id'));
            var bookmark_data = {
                'book_id': book_id,
            };
            var parent = this_elm.parents('.book_detail_content ');
            var count_all_saved_list = $('#count_all_saved_list').html();
            var count_saved_list = $('.count_saved_list').html();

            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/update_bookmark",
                data: bookmark_data,
                async: true,
                beforeSend: function() {
                    $(this_elm).off('click');
                    $(this_elm).addClass("disabled");
                },
                success: function(data) {
                    $(this_elm).on('click', bookmark_triggered);
                    $(this_elm).removeClass("disabled");

                    if (data == "inserted") {
                        toastBookmarkSaved(book_id);

                        parent.removeClass("opacity");
                        parent.find('.removed_item').html("");
                        bookmark_trigger_count--;

                        this_elm.find('i').removeClass("far");
                        this_elm.find('i').addClass("fas");
                        this_elm.find('span').html(" unsave book");
                        count_saved_list++;
                        count_all_saved_list++;
                        $('.count_saved_list').html(count_saved_list);
                        $('#count_all_saved_list').html(count_all_saved_list);

                    } else if (data == "removed") {
                        toastBookmarkUnsaved();

                        parent.addClass("opacity");
                        parent.find('.removed_item').html("ลบออกจากรายการที่บันทึกแล้ว");
                        bookmark_trigger_count++;

                        this_elm.find('i').removeClass("fas");
                        this_elm.find('i').addClass("far");
                        this_elm.find('span').html(" save book");
                        count_saved_list--;
                        count_all_saved_list--;

                        $('.count_saved_list').html(count_saved_list);
                        $('#count_all_saved_list').html(count_all_saved_list);
                    }
                }
            })
        }

        var num_rows = <?= $num_rows ?>;
        var call = 0

        $(window).scroll(function() {
            var lastID = $('.load-more').attr('lastID');
            var height = $(document).height() - $(window).height();
            var scroll_value = (numeral($(window).scrollTop()).value() + 250);
            // console.log(num_rows + " " + lastID + " " + call);
            // console.log(scroll_value + " >= " + height + " AND lastID : " + lastID + " num_rows : " + num_rows + " call : " + call);

            if ((scroll_value >= height) && (lastID != 0) && num_rows == 5 && call == 0) {
                // console.log("true");
                call = 1;
                <?php
                if (isset($collection_get)) { ?>
                    var post_data = {
                        'start': lastID,
                        'i': <?= $i ?>,
                        'round_count': <?= $round_count ?>,
                        'bookmark_trigger_count': bookmark_trigger_count,
                        'collection_get': "<?= $collection_get ?>",
                    };

                <?php } else { ?>
                    var post_data = {
                        'start': lastID,
                        'i': <?= $i ?>,
                        'round_count': <?= $round_count ?>,
                        'bookmark_trigger_count': bookmark_trigger_count,
                    };
                <?php } ?>




                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('books/loadMoreData'); ?>',
                    data: post_data,
                    async: true,
                    beforeSend: function() {
                        $('.load-more').show();
                    },
                    success: function(html) {
                        setTimeout(() => {
                            $('.load-more').remove();
                            $('#saved_list').append(html);

                        }, 500);

                    }
                });
            }
        });
        //active nav save collection name
        var url_string = window.location.href;
        var url = new URL(url_string);
        var collection_name_param = url.searchParams.get("collection") ? url.searchParams.get("collection") : " ";
        var regex = new RegExp(" ", "g");
        var collection_name_param2 = collection_name_param.replace(regex, "-")
        if (collection_name_param2 != "-") {
            $('.' + collection_name_param2).addClass("active");
        }


    });
</script>