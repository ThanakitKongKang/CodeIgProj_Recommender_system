<div class="row no-gutters animation_enter_softly">
    <?php if (($content_list != FALSE)) {
        foreach ($content_list as $content) { ?>
            <div class="col-4">
                <div class="py-3" style="width:21.5rem;">
                    <div class="card card_hover_img" style="width: 21.5rem;">
                        <a href="<?= base_url() ?>book/<?= $content['book_id'] ?>" title="<?= $content['book_name'] ?>">
                            <img class="card_img" src="<?= base_url() ?>assets/book_covers/<?= $content['book_id'] ?>.PNG" style="height:28rem"></a>
                        <div class="overlay_card"><a href="<?= base_url() ?>book/<?= $content['book_id'] ?>" class="stretched-link"></a></div>
                        <div class="card-body pb-0 pt-2" style="height:8rem;">
                            <a class="card_body_type ctg" href="<?= base_url() ?>browse/<?= strtolower(ucwords(str_replace(" ", "-", $content["book_type"]))) ?>"><span><?= $content['book_type'] ?></span></a>
                            <?php if ($this->session->userdata('logged_in')) { ?>
                                <a class="ellipsis_menu ellipsis_menu_trigger" data-book_id="<?= $content["book_id"] ?>" data-book_name="<?= $content["book_name"] ?>"><i class="fas fa-chevron-down fa-xs"></i></a>
                            <?php } ?>
                            <div class="card-title text-col-2-name pt-1"><a href="<?= base_url() ?>book/<?= $content['book_id'] ?>" title="<?= $content['book_name'] ?>"><?= $content['book_name'] ?></a></div>
                            <div class="rater_star_grid">
                                <input value="<?= $content['b_rate'] ?>" class="rater_star" title="">
                            </div>
                            <?php if ($content['count_rate'] != 0) { ?>
                                <span class="position-absolute small font-arial text-info" style="bottom:1.1rem;left:8.5rem;width:2rem;">(<?= $content['count_rate'] ?> <i class="fas fa-user fa-xs"></i>)</span>
                            <?php } ?>
                            <div class="text-card-author font-italic text-secondary" title="<?= $content['author'] ?>"><?= $content['author'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php $i++;
            }
            echo "</div>";
            if ($num_rows == 9 &&  $all_num_rows != $i) { ?>
            <div class="load-more text-center justify-content-center my-5" lastID="<?php echo $i; ?>" style="display: none;">
                <!-- <img src="<?php echo base_url('assets/img/loading.gif'); ?>" /> -->

                <div class="spinner-border text-primary mr-3" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                Loading...
            </div>
        <?php } else { ?>
            <div class="load-more pt-5 load-more1" lastID="0">
            </div>
        <?php } ?>
        <!-- fix this -->
    <?php } else if ($all_num_rows == 0) { ?>

        <div class="load-more pt-5" lastID="0">
            <h1 class="font-weight-lighter text-center">คุณไม่ได้บันทึก <i class="far fa-bookmark"></i> รายการใด ๆ</h1>
            <div class="position:relative text-center">
                <img src="<?= base_url() ?>assets/img/fogg-list-is-empty.png" style="max-width:40rem" alt="">
            </div>
        </div>

    <?php } else if ($num_rows == 0) { ?>
        <div class="load-more pt-5 load-more2" lastID="0">
            <?= $category . " :" . $num_rows . " start at : " . $start ?>
        </div>
    <?php } ?>

    <script type="text/javascript">
        $(document).ready(function() {
            // console.log("i: " + <?= $i ?>);
            // console.log("num_rows: " + <?= $num_rows ?>);
            // console.log("all_num_rows: " + <?= $all_num_rows ?>);
            // console.log("lastid : " + $('.load-more').attr('lastid'));


            var num_rows = <?= $num_rows ?>;
            var call = 0
            var i = <?= $i ?>;
            $(window).scroll(function() {

                var lastID = $('.load-more').attr('lastID');
                var height = $(document).height() - $(window).height();
                var scroll_value = (numeral($(window).scrollTop()).value() + 250);

                if ((scroll_value >= height) && (lastID != 0) && num_rows == 9 && call == 0) {
                    // console.log(scroll_value + " >= " + height + " AND lastID : " + lastID + " num_rows : " + num_rows + " call : " + call + " i : " + <?= $i ?>);
                    call = 1;
                    var category = $('#mid-title').html();
                    var post_data = {
                        'start': lastID,
                        'i': i,
                        'category': category,
                        'all_num_rows': <?= $all_num_rows ?>,
                    };

                    contentLoader(post_data)

                }
            });

            function contentLoader(post_data) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('books/browse_loadMoreData'); ?>',
                    data: post_data,
                    async: true,
                    beforeSend: function() {
                        $('.load-more').show();
                    },
                    success: function(html) {
                        setTimeout(() => {
                            $('.load-more').remove();
                            $('#content_list').append(html);

                        }, 500);

                    }
                });
            }


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