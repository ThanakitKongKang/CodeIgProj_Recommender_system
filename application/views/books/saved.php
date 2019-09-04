<?php if ($showheader == true) { ?><div class="container">
        <h1 class="display-4">Saved Items <span class="badge badge-secondary count_all_saved_list"><?= $this->session->userdata('count_all_saved_list'); ?></span></h1>
        <hr class="mb-2 w-50 mr-auto ml-0" style="border: 0;border-top: 3px solid #007bff;"><?php } ?>

    <div id="saved_list">
        <?php if (($saved_list != FALSE)) {
            foreach ($saved_list as $saved) { ?>

                <div class="row bg-light py-3 book_detail_content mt-3" style="border-radius:1rem;border:1px solid #0000000d">
                    <div class="col pl-4" style="max-width:11rem;">
                        <a href="<?= base_url() ?>book/<?= $saved['book_id'] ?>">
                            <img id="" style="width:100%;box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.25);" src="<?= base_url() ?>assets/book_covers/<?= $saved['book_id'] ?>.png">
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
                        <div class="book_detail_text pt-1">Category : <a class="book_detail_text link" href="<?= base_url() ?>browse/<?= $saved['book_type'] ?>"><span><?= $saved['book_type'] ?></span></a></div>
                        <div class="book_detail_text pt-1">Author : <?= $saved['author'] ?></div>
                        <span class="removed_item position-absolute text-primary" style="top:9.5rem;left:23rem;"></span>
                        <!-- bookmark trigger -->
                        <div class="pr-4 w-100">
                            <hr>
                            <button class="btn btn-primary bookmark_trigger<?= $round_count ?>" data-book_id="<?= $saved['book_id'] ?>">
                                <i class="fas fa-bookmark bookmark_icon"></i>
                                <span class="bookmark_trigger_text"> unsave book</span>
                            </button>
                            <span class="text-secondary small pt-3" data-time-format="time-ago" data-time-value="<?= $saved['date'] ?>" style="float:right"><?= $saved['date'] ?></span>
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
                <h1 class="font-weight-lighter text-center">คุณไม่ได้บันทึก <i class="far fa-bookmark"></i> รายการใด ๆ</h1>
            </div>

        <?php } else if ($num_rows == 0) { ?>
            <div class="load-more pt-5" lastID="0">

            </div>
        <?php } ?>
    </div>
    <?php if ($showheader == true) { ?>
    </div> <?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        moment.locale('th');
        // time formatter
        $("[data-time-format]").each(function() {
            var el = $(this);
            switch (el.attr("data-time-format")) {
                case "time-ago":
                    var timeValue = el.attr("data-time-value")
                    var strTimeAgo = moment(timeValue).fromNow();
                    el.text("บันทึกเมื่อ " + strTimeAgo);
                    break;
            }
        });

        // bookmarker
        $('.bookmark_trigger<?= $round_count ?>').click(function(e) {
            var bookmark_data = {
                'book_id': ($(this).data('book_id'))
            };
            var this_elm = $(this);
            var parent = this_elm.parents('.book_detail_content ');
            var count_all_saved_list = $('#count_all_saved_list').html();


            // console.log($(this).data('book_id'));

            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/update_bookmark",
                data: bookmark_data,

                success: function(data) {

                    if (data == "inserted") {
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
                        $('.count_all_saved_list').html(count_all_saved_list)
                        parent.removeClass("opacity");
                        parent.find('.removed_item').html("");

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
                        $('.count_all_saved_list').html(count_all_saved_list)
                        parent.addClass("opacity");
                        parent.find('.removed_item').html("ลบออกจากรายการที่บันทึกแล้ว");
                    }
                }
            })
        });

        var num_rows = <?= $num_rows ?>;
        var call = 0

        $(window).scroll(function() {
            var lastID = $('.load-more').attr('lastID');
            var height = $(document).height() - $(window).height();
            var scroll_value = (numeral($(window).scrollTop()).value() + 250);
            // console.log(num_rows + " " + lastID + " " + call);
            console.log(scroll_value + " >= " + height + " AND lastID : " + lastID + " num_rows : " + num_rows + " call : " + call);

            if ((scroll_value >= height) && (lastID != 0) && num_rows == 5 && call == 0) {
                console.log("true");
                call = 1;
                var post_data = {
                    'start': lastID,
                    'i': <?= $i ?>,
                    'round_count': <?= $round_count ?>
                };

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
    });
</script>