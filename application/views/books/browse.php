<div class="row">
    <!-- Current title -->
    <div class="container">
        <div id="app_mid_title" class="animation_enter">
            <template>
                <div class="position-relative row">
                    <img :src="img_url" class="mr-4" style="max-width:8rem;height:8rem;transform: scaleX(-1);">
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
                                <a class="nav-link ctg" id="all" href="<?= base_url() ?>browse/all" data-ctg="All">All</a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link ctg" href="<?= base_url() ?>browse/<?= strtolower(ucwords(str_replace(" ", "-", $category["book_type"]))) ?>" id="<?= strtolower(ucwords(str_replace(" ", "-", $category["book_type"]))) ?>" data-ctg="<?= $category["book_type"] ?>"><?= $category["book_type"] ?></a>
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
    <!-- 
    | -------------------------------------------------------------------------
    | content
    | -------------------------------------------------------------------------
     -->

    <div id="content_list" class="animation_enter_softly">
        <div class="row no-gutters">
            <?php if (($content_list != FALSE)) {
                foreach ($content_list as $content) { ?>
                    <div class="col-4">
                        <div class="py-3" style="width:21.5rem;">
                            <div class="card hover_img_col2" style="width: 21.5rem;">
                                <a href="<?= base_url() ?>book/<?= $content['book_id'] ?>" title="<?= $content['book_name'] ?>">
                                    <img class="img-col-2" src="<?= base_url() ?>assets/book_covers/<?= $content['book_id'] ?>.png" style="height:28rem"></a>
                                <div class="overlay_card"><a href="<?= base_url() ?>book/<?= $content['book_id'] ?>" class="stretched-link"></a></div>
                                <div class="card-body pb-0 pt-2" style="height:8rem;">
                                    <a class="card_body_type ctg" href="<?= base_url() ?>browse/<?= strtolower(ucwords(str_replace(" ", "-", $content["book_type"]))) ?>"><span><?= $content['book_type'] ?></span></a>
                                    <div class="card-title text-col-2-name pt-1"><a href="<?= base_url() ?>book/<?= $content['book_id'] ?>" title="<?= $content['book_name'] ?>"><?= $content['book_name'] ?></a></div>
                                    <div class="rater_star_grid">
                                        <input value="<?= $content['b_rate'] ?>" class="rater_star" title="">
                                    </div>
                                    <div class="text-card-author font-italic text-secondary" title="<?= $content['author'] ?>">By <?= $content['author'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $i++;
                    }
                    echo "</div>";
                    // fix this session userdata
                    if ($num_rows == 9 &&  $all_num_rows != $i) { ?>

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
            <?php } else if ($all_num_rows == 0) { ?>

                <div class="load-more pt-5 w-100" lastID="0">
                    <h1 class="font-weight-lighter text-center">ไม่มีหนังสือ <i class="fas fa-book"></i> ประเภท <span class="text-primary"><?= str_replace("%20", " ", $get_url) ?></span> </h1>
                    <div class="position:relative text-center">
                        <?php $rand = rand(1, 2);
                            if ($rand == 1) { ?>
                            <img src="<?= base_url() ?>assets/img/fogg-page-not-found-1.png" style="max-width:65rem" alt="">
                        <?php } else if ($rand == 2) { ?>
                            <img src="<?= base_url() ?>assets/img/fogg-page-not-found.png" style="max-width:65rem" alt="">
                        <?php } ?>
                    </div>
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
        // console.log(<?= $page ?>);
        var category = mid_title.title.replace(" ", "-");
        $('#' + category).addClass("hovered");

        // console.log("i: " + <?= $i ?>);
        // console.log("num_rows: " + <?= $num_rows ?>);
        // console.log("all_num_rows: " + <?= $all_num_rows ?>);
        // console.log("lastid : " + $('.load-more').attr('lastid'));

        var num_rows = <?= $num_rows ?>;
        var call = 0
        $(window).scroll(function() {
            var lastID = $('.load-more').attr('lastID');
            var height = $(document).height() - $(window).height();
            var scroll_value = (numeral($(window).scrollTop()).value() + 250);
            // console.log(num_rows + " " + lastID + " " + call);


            if ((scroll_value >= height) && (lastID != 0) && num_rows == 9 && call == 0) {
                // console.log(scroll_value + " >= " + height + " AND lastID : " + lastID + " num_rows : " + num_rows + " call : " + call + " i : " + <?= $i ?>);
                call = 1;
                var category = $('#mid-title').html();
                var post_data = {
                    'start': lastID,
                    'i': <?= $i ?>,
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
    var mid_title = new Vue({
        el: '#app_mid_title',
        data: {
            title: '<?= $page ?>',
            img_url: '<?= base_url() ?>assets/img/<?= $page ?>.svg'
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