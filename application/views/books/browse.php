<div class="row">
    <!-- Current title -->
    <div class="container">
        <div id="app_mid_title" class="animation_enter">
            <template>
                <div class="position-relative row">
                    <img :src="img_url" class="mr-4" style="max-width:8rem;height:8rem;">
                    <h1 id="mid-title" class="display-4 font-arial pt-5 text-uppercase" style="left:4rem;">{{title}}</h1>
                </div>
            </template>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light pb-0 w-100" style="border-bottom: 1px solid #CCC6BA;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-browse" aria-controls="navbarNavDropdown1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-12" id="navbarNavDropdown-browse">
                <ul class="navbar-nav nav-menu">

                    <?php
                    foreach ($category_list as $category) {
                        if ($category === reset($category_list)) {
                            // First item  
                            ?>
                            <li class="nav-item">
                                <a class="nav-link ctg hovered" id="All" data-ctg="All">All</a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link ctg" id="<?= ucwords(str_replace(" ", "-", $category["book_type"])) ?>" data-ctg="<?= $category["book_type"] ?>"><?= $category["book_type"] ?></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container">
    <div class="load-more justify-content-center my-5 text-center" style="display: none!important;">
        <div class="spinner-border text-primary mr-3" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        Loading...
    </div>

    <!-- 
    | -------------------------------------------------------------------------
    | content
    | -------------------------------------------------------------------------
     -->

    <div id="content_list">
        <?php if (($content_list != FALSE)) {
            foreach ($content_list as $content) { ?>

                <div class="row bg-light py-3 book_detail_content mt-3" style="border-radius:1rem;border:1px solid #0000000d">
                    <div class="col pl-4" style="max-width:11rem;">
                        <a href="<?= base_url() ?>book/<?= $content['book_id'] ?>">
                            <img id="" style="width:100%;box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.25);" src="<?= base_url() ?>assets/book_covers/<?= $content['book_id'] ?>.png">
                        </a>
                    </div>
                    <!-- RATE section -->
                    <div class="col">
                        <div>
                            <?php if ($content['count_rate'] != 0) { ?>
                                <span class="badge badge-warning" style="font-size: 1rem;"><span class="font-arial">
                                        <span style="letter-spacing: 1px;" class="font-weight-bold" id="rate_avg">
                                            <?= number_format($content['b_rate'], 1); ?>
                                        </span>
                                        <span class="small" style="color: #6b6b6b;">/5</span></span>
                                </span>
                                <span class="small text-secondary">based on <?= $content['count_rate'] ?> user<?php if ($content['count_rate'] != 1) echo "s";  ?> </span>

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
                        <div class="pb-2 font-arial font-weight-bolder"> <a href="<?= base_url() ?>book/<?= $content['book_id'] ?>" class="link"><?= $content['book_name'] ?></a></div>
                        <div class="book_detail_text pt-1">Category : <a class="book_detail_text link" href="<?= base_url() ?>browse/<?= $content['book_type'] ?>"><span><?= $content['book_type'] ?></span></a></div>
                        <div class="book_detail_text pt-1">Author : <?= $content['author'] ?></div>
                        <span class="removed_item position-absolute text-primary" style="top:9.5rem;left:23rem;"></span>
                    </div>
                </div>
            <?php $i++;
                }
// fix this session userdata
                if ($num_rows == 20 &&  $this->session->userdata('count_all_content_list') != $i) { ?>
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
<!-- fix this -->
        <?php } else if ($this->session->userdata('count_all_content_list') == 0) { ?>

            <div class="load-more pt-5" lastID="0">
                <h1 class="font-weight-lighter text-center">คุณไม่ได้บันทึก <i class="far fa-bookmark"></i> รายการใด ๆ</h1>
                <div class="position:relative text-center">
                    <img src="<?= base_url() ?>assets/img/fogg-list-is-empty.png" style="max-width:40rem" alt="">
                </div>
            </div>

        <?php } else if ($num_rows == 0) { ?>
            <div class="load-more pt-5" lastID="0">

            </div>
        <?php } ?>
    </div>

    <!-- เอาให้เหมือน index col-2  -->
</div>

<script>
    $(document).ready(function() {

        $('.ctg').click(function(e) {
            var old_category = $('#mid-title').html().replace(" ", "-");
            var category = ($(this).data('ctg')).replace(" ", "-");

            // old_category.replace(" ", "-");
            // category.replace(" ", "-");

            mid_title.title = $(this).data('ctg');

            $('#' + category).toggleClass("hovered");
            $('#' + old_category).toggleClass("hovered");

            if (category == "All")
                category = "Online_education_SVG";
            mid_title.img_url = '<?= base_url() ?>assets/img/' + category.replace("-", " ") + ".svg";

        });

        var num_rows = <?= $num_rows ?>;
        var call = 0
        $(window).scroll(function() {
            var lastID = $('.load-more').attr('lastID');
            console.log(lastID);
            var height = $(document).height() - $(window).height();
            var scroll_value = (numeral($(window).scrollTop()).value() + 250);
            // console.log(num_rows + " " + lastID + " " + call);
            console.log(scroll_value + " >= " + height + " AND lastID : " + lastID + " num_rows : " + num_rows + " call : " + call);

            if ((scroll_value >= height) && (lastID != 0) && num_rows == 20 && call == 0) {
                console.log("true");
                call = 1;
                var category = ($(this).data('ctg'));
                var post_data = {
                    'start': lastID,
                    'i': <?= $i ?>,
                    'category': category,
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
    var mid_title = new Vue({
        el: '#app_mid_title',
        data: {
            title: 'All',
            img_url: '<?= base_url() ?>assets/img/Online_education_SVG.svg'
        }
    });
</script>