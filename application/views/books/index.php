<div class="container">
    <div id="top" class="row">
        <div class="col-sm-4" id="col-1">

            <?php
            if (!$final_recommend_list) echo "recommended list is empty";
            else { ?>
                <div class="hover_img position-relative">

                    <img id="img-col-1" src="<?= base_url() ?>assets/book_covers/<?= $final_recommend_list[0]['book_id'] ?>.PNG">

                    <!-- <div id="text-col-1"></div> -->

                    <div class="overlay"><a href="<?= base_url() ?>book/<?= $final_recommend_list[0]['book_id'] ?>" class="stretched-link"> </a></div>

                    <!-- <div class="hover_img_button">
                        <a class="btn btn-primary bookmark_trigger"><i class="far fa-bookmark"></i></a>

                    </div> -->

                    <div class="hover_img_content text-center">
                        <div class="">
                            <input value="<?= $final_recommend_list[0]['b_rate'] ?>" class="rater_star" title="">
                            <div class="small"><?= number_format($final_recommend_list[0]['b_rate'], 1) ?>/5.0 rated by <?= $final_recommend_list[0]['count_rate'] ?> user<?php if ($final_recommend_list[0]['count_rate'] != 1) echo "s";  ?></div>
                        </div>
                        <hr class="my-2" style="border: 0;border-top: 1px solid rgb(255, 255, 255);}">
                        <div class="hover_img_content_name"><?= $final_recommend_list[0]['book_name'] ?></div>
                        <div class="small">field : <?= $final_recommend_list[0]['book_type'] ?></div>
                        <div class="small py-2">author : <?= $final_recommend_list[0]['author'] ?></div>
                    </div>
                </div>

                <div class="my-3 bg-light book_detail_content book_detail_content_index" id="book_detail_content_col1">
                    <a class="text-col-2-type ctg" data-ctg="<?= $final_recommend_list[0]["book_type"] ?>"><span><?= $final_recommend_list[0]['book_type'] ?></span></a>
                    <?php if ($this->session->userdata('logged_in')) { ?>
                        <a class="ellipsis_menu ellipsis_menu_trigger" data-book_id="<?= $final_recommend_list[0]["book_id"] ?>" data-book_name="<?= $final_recommend_list[0]["book_name"] ?>"><i class="fas fa-chevron-down fa-xs"></i></a>
                    <?php } ?>
                    <div class="text-col-2-name"> <a href="<?= base_url() ?>book/<?= $final_recommend_list[0]['book_id'] ?>" title="<?= $final_recommend_list[0]['book_name'] ?>"><?= $final_recommend_list[0]['book_name'] ?></a></div>
                    <div class="text-col-1-footer">
                        <input value="<?= $final_recommend_list[0]['b_rate'] ?>" class="rater_star" title="">
                        <?php if ($final_recommend_list[0]['count_rate'] != 0) { ?>
                            <span class="position-absolute font-arial text-info user_rated_this_1" title="<?= $final_recommend_list[0]['count_rate'] ?> user<?php if ($final_recommend_list[0]['count_rate'] != 1) echo "s";  ?> rated this" style="bottom:0.25rem;left:10rem;width:10rem;">(<?= $final_recommend_list[0]['count_rate'] ?> <i class="fas fa-user fa-xs"></i>)</span>
                        <?php } ?>
                        <!-- <div class="small pl-1 badge badge-secondary"><?= number_format($final_recommend_list[0]['b_rate'], 1) ?>/5.0 rated by <?= $final_recommend_list[0]['count_rate'] ?> user<?php if ($final_recommend_list[0]['count_rate'] != 1) echo "s";  ?></div> -->


                        <div class="text-col-2-author font-italic text-secondary" id="text-col-2-author_col1" title="<?= $final_recommend_list[0]['author'] ?>"><?= $final_recommend_list[0]['author'] ?></div>
                    </div>

                </div>



            <?php } ?>

        </div>
        <div class="col-sm-4" id="col-2">
            <!-- another 4 recommended items -->
            <?php
            for ($i = 1; $i < 5; $i++) {
                ?>
                <div class="py-3"><?php if (isset($final_recommend_list[$i]['book_name'])) { ?>
                        <div class="row h-100">
                            <div class="col-4 hover_img_col2" style="height: 7.875rem;">

                                <img class="img-col-2" src="<?= base_url() ?>assets/book_covers/<?= $final_recommend_list[$i]['book_id'] ?>.PNG">


                                <div class="overlay_col2"><a href="<?= base_url() ?>book/<?= $final_recommend_list[$i]['book_id'] ?>" class="stretched-link"></a></div>

                                <!-- <div class="hover_img_button_col2"><a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a></div> -->
                            </div>

                            <div class="col-8 text-col-2 bg-light book_detail_content book_detail_content_index" style="border-radius:1rem;">
                                <a class="text-col-2-type ctg" data-ctg="<?= $final_recommend_list[$i]["book_type"] ?>"><span><?= $final_recommend_list[$i]['book_type'] ?></span></a>
                                <?php if ($this->session->userdata('logged_in')) { ?>
                                    <a class="ellipsis_menu ellipsis_menu_trigger" data-book_id="<?= $final_recommend_list[$i]["book_id"] ?>" data-book_name="<?= $final_recommend_list[$i]["book_name"] ?>"><i class="fas fa-chevron-down fa-xs"></i></a>
                                <?php } ?>
                                <div class="text-col-2-name"> <a href="<?= base_url() ?>book/<?= $final_recommend_list[$i]['book_id'] ?>" title="<?= $final_recommend_list[$i]['book_name'] ?>"><?= $final_recommend_list[$i]['book_name'] ?></a></div>
                                <div class="text-col-2-footer w-100">
                                    <input value="<?= $final_recommend_list[$i]['b_rate'] ?>" class="rater_star_col2" title="">
                                    <?php if ($final_recommend_list[$i]['count_rate'] != 0) { ?>
                                        <span class="position-absolute small font-arial text-info user_rated_this" title="<?= $final_recommend_list[$i]['count_rate'] ?> user<?php if ($final_recommend_list[$i]['count_rate'] != 1) echo "s"; ?> rated this" style="bottom:0.05rem;left:7rem;width:2rem;">(<?= $final_recommend_list[$i]['count_rate'] ?> <i class="fas fa-user fa-xs"></i>)</span>
                                    <?php } ?>
                                    <!-- <div class="small pl-1 badge badge-secondary"><?= number_format($final_recommend_list[$i]['b_rate'], 1) ?>/5.0 rated by <?= $final_recommend_list[$i]['count_rate'] ?> user<?php if ($final_recommend_list[$i]['count_rate'] != 1) echo "s";  ?></div> -->
                                    <div class="text-col-2-author font-italic text-secondary" title="<?= $final_recommend_list[$i]['author'] ?>"><?= $final_recommend_list[$i]['author'] ?></div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>

                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-sm-4" id="col-3">
            <!-- another 4 recommended items -->
            <?php
            for ($i = 5; $i < 9; $i++) {
                ?>
                <div class="py-3"><?php if (isset($final_recommend_list[$i]['book_name'])) { ?>
                        <div class="row">
                            <div class="col-4 hover_img_col2" style="height: 7.875rem;">

                                <img class="img-col-2" src="<?= base_url() ?>assets/book_covers/<?= $final_recommend_list[$i]['book_id'] ?>.PNG">


                                <div class="overlay_col2"><a href="<?= base_url() ?>book/<?= $final_recommend_list[$i]['book_id'] ?>" class="stretched-link"></a></div>

                                <!-- <div class="hover_img_button_col2"><a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a></div> -->
                            </div>

                            <div class="col-8 text-col-2 bg-light book_detail_content book_detail_content_index" style="border-radius:1rem;">
                                <a class="text-col-2-type ctg" data-ctg="<?= $final_recommend_list[$i]["book_type"] ?>"><span><?= $final_recommend_list[$i]['book_type'] ?></span></a>
                                <?php if ($this->session->userdata('logged_in')) { ?>
                                    <a class="ellipsis_menu ellipsis_menu_trigger" data-book_id="<?= $final_recommend_list[$i]["book_id"] ?>" data-book_name="<?= $final_recommend_list[$i]["book_name"] ?>"><i class="fas fa-chevron-down fa-xs"></i></a>
                                <?php } ?>
                                <div class="text-col-2-name"> <a href="<?= base_url() ?>book/<?= $final_recommend_list[$i]['book_id'] ?>" title="<?= $final_recommend_list[$i]['book_name'] ?>"><?= $final_recommend_list[$i]['book_name'] ?></a></div>
                                <div class="text-col-2-footer w-100">
                                    <input value="<?= $final_recommend_list[$i]['b_rate'] ?>" class="rater_star_col2" title="">
                                    <?php if ($final_recommend_list[$i]['count_rate'] != 0) { ?>
                                        <span class="position-absolute small font-arial text-info user_rated_this" title="<?= $final_recommend_list[$i]['count_rate'] ?> user<?php if ($final_recommend_list[$i]['count_rate'] != 1) echo "s"; ?> rated this" style="bottom:0.05rem;left:7rem;width:2rem;">(<?= $final_recommend_list[$i]['count_rate'] ?> <i class="fas fa-user fa-xs"></i>)</span>
                                    <?php } ?>
                                    <!-- <div class="small pl-1 badge badge-secondary"><?= number_format($final_recommend_list[$i]['b_rate'], 1) ?>/5.0 rated by <?= $final_recommend_list[$i]['count_rate'] ?> user<?php if ($final_recommend_list[$i]['count_rate'] != 1) echo "s";  ?></div> -->
                                    <div class="text-col-2-author font-italic text-secondary" title="<?= $final_recommend_list[$i]['author'] ?>"><?= $final_recommend_list[$i]['author'] ?></div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>

                </div>
            <?php
            }
            ?>
        </div>
    </div>

</div>
<div id="mid" class="mt-5">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light pb-0 w-100" style="border-bottom: 1px solid #CCC6BA;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-index" aria-controls="navbarNavDropdown2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-12 justify-content-center" id="navbarNavDropdown-index">
                    <ul class="navbar-nav nav-menu">
                        <li class="nav-item">
                            <a class="nav-link" id="top-rated">Top rated books <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown" id="dropdown-category-toggle">
                            <a class="nav-link dropdown-toggle" id="dropdown-category">
                                Category
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="mid-content" class="container">
        <!-- Category -->
        <div class="position-relative text-center">
            <div id="dropdown-category-menu" style="display: none;">
                <div class="row no-gutters">
                    <?php
                    foreach ($category_list as $category) {
                        ?>
                        <div class="col-sm-3 category mb-3">
                            <a class="nav-link link" data-ctg="<?= $category["book_type"] ?>"><?= $category["book_type"] ?></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Current title -->
        <div id="app_mid_title" class="animation_enter">
            <template>
                <div class="position-relative">
                    <h1 id="mid-title" class="display-4 font-arial text-center pt-5">{{title}}</h1>
                    <img class="position-absolute" id="img_mid_title" :src="img_url">
                </div>
                <hr class="mb-5 w-25" style="border: 0;border-top: 3px solid #007bff;">
                <div class="load-more justify-content-center my-5 text-center" style="display: none!important;">
                    <div class="spinner-border text-primary mr-3" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Loading...
                </div>
            </template>
        </div>


        <!-- Top rated -->
        <template id="top_rated_contents" v-if="category === 'toprated'">
            <div class="animation_enter the_mid_content" id="toprate-div">
                <div class="row no-gutters text-center">
                    <?php
                    foreach ($top_rated as $top) {
                        ?>
                        <div class="col-4 mb-4 align-self-center">
                            <div class="hover_img_mid position-relative">
                                <span class="text-img-rate badge badge-primary"> <?php if ($top['count_rate'] != 0) echo number_format($top["b_rate"], 1); ?></span>
                                <img class="img-book hover_img" src="<?= base_url() ?>assets/book_covers/<?= $top['book_id'] ?>.PNG">
                                <!-- <span class="text-img"><?= $top["book_name"] ?></span> -->

                                <a class="overlay_mid" href="<?= base_url() ?>book/<?= $top['book_id'] ?>"></a>

                                <!-- <div class="hover_img_button_mid"><a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a></div> -->
                                <div class="hover_img_content_mid text-center">
                                    <a href="<?= base_url() ?>book/<?= $top['book_id'] ?>" class="text-decoration-none text-white stretched-link">
                                        <div class="py-2"><?= $top['book_name'] ?></div>
                                        <div class="small py-2">field : <?= $top['book_type'] ?></div>
                                        <div class="small py-2" title="<?= $top['author'] ?>">author : <?= $top['author'] ?></div>
                                        <div class="mt-5 text-center">
                                            <hr class="my-2" style="border: 0;border-top: 1px solid rgb(255, 255, 255);}">
                                            <?php if ($top['count_rate'] != 0) { ?>
                                                <!-- HARD CODE rater star -->
                                                <div class="rating-container rating-sm rating-animate is-display-only">
                                                    <!-- <div class="rating-stars" v-bind:title="book.b_rate+' Stars'"><span class="empty-stars"><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span></span><span class="filled-stars" v-bind:style="'width:'+(book.b_rate*20)+'%;'"><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span></span><input v-bind:value="book.b_rate" class="rater_star rating-input" title=""></div> -->
                                                    <div class="rating-stars" title="<?= $top['b_rate'] ?> Stars"><span class="empty-stars"><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span></span><span class="filled-stars" style="width:<?= $top['b_rate'] * 20 ?>%;"><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span></span><input value="<?= $top['b_rate'] ?>" class="rating-input" title=""></div>
                                                </div>
                                                <div class="small"><?= number_format($top['b_rate'], 1) ?>/5.0 rated by <?= $top['count_rate'] ?> user<?php if ($top['count_rate'] > 1) echo "s"; ?></div>
                                            <?php } ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </template>

        <!-- items by category -->
        <template id="category_contents" v-if="category === 'category'">
            <div class="animation_enter the_mid_content" id="category_contents_body">
                <div class="row no-gutters text-center">
                    <div class="col-4 mb-4 align-self-center" v-for="book in books">
                        <div class="hover_img_mid position-relative">
                            <span class="text-img-rate badge badge-primary" v-if="book.b_rate !== null"> {{ book.b_rate }}</span>
                            <img class="img-book hover_img" v-bind:src="'<?= base_url() ?>assets/book_covers/'+book.book_id+'.PNG'" />
                            <!-- <span class="text-img"> {{ book.book_name }}</span> -->

                            <a class="overlay_mid" v-bind:href="'<?= base_url() ?>book/'+book.book_id+''"></a>

                            <!-- <div class="hover_img_button_mid"><a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a></div> -->
                            <div class="hover_img_content_mid text-center">
                                <a v-bind:href="'<?= base_url() ?>book/'+book.book_id+''" class="text-decoration-none text-white stretched-link">
                                    <div class="py-2">{{ book.book_name }}</div>
                                    <div class="small py-2">field : {{ book.book_type }}</div>
                                    <div class="small py-2">author : {{ book.author }}</div>

                                    <div class="mt-5 text-center">
                                        <hr class="my-2" style="border: 0;border-top: 1px solid rgb(255, 255, 255);}">
                                        <div v-if="book.count_rate !== '0'">
                                            <div class="rating-container rating-sm rating-animate is-display-only">
                                                <!-- HARD CODE rater star for Vue.js -->
                                                <div class="rating-stars" v-bind:title="book.b_rate+' Stars'"><span class="empty-stars"><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span></span><span class="filled-stars" v-bind:style="'width:'+(book.b_rate*20)+'%;'"><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span></span><input v-bind:value="book.b_rate" class="rating-input" title=""></div>
                                            </div>

                                            <!-- <input v-bind:value="book.b_rate" class="rater_star" title="" /> -->
                                            <div class="small">{{ book.b_rate }}/5.0 rated by {{ book.count_rate }} user(s)</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>

<!-- Modal -->
<div class="modal fade slide-bottom" id="rate_modal" tabindex="-1" role="dialog" aria-labelledby="rate_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left:8rem;">
                <input value="0" class="rater_star_modal" title="" data-show-clear="false">
                <input value="0" id="modal_book_id" title="" type="hidden">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" style="display:none;" data-book_id="0" class="btn btn-primary rate_trigger">Submit</button>
            </div>
        </div>
    </div>
</div>

<div id="popup_menu" class="position-absolute bg-white slide-bottom" style="display:none">
    <div class="load_popup_menu text-center justify-content-center my-5" style="display: none;">
        <div class="spinner-border text-primary mr-3" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        Loading...
    </div>
    <div id="popup_menu_content">
        <div id="popup_menu_bookmark">
        </div>
        <div id="popup_menu_rate">
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {


        $(document).on('click', 'a[href^="#"]', function(e) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: $($(this).attr('href')).offset().top
            }, 500, 'linear');
        });

        $('html').click(function() {
            $('#dropdown-category-menu').hide();
            $('#dropdown-category').removeClass("hover");
            if (!$(".ellipsis_menu").hasClass("hovered")) {
                if (!$("#popup_menu").hasClass("hovered")) {
                    $('#popup_menu').hide();
                }
            }
        });

        $('#dropdown-category-toggle').click(function(e) {
            e.stopPropagation();
        });

        $('#dropdown-category').click(function(e) {
            $('#dropdown-category-menu').toggle();
            $(this).toggleClass("hover");
        });

        $('#top-rated').click(function(e) {
            $('#toprate-div').removeClass('animation_enter');
            $('#app_mid_title').removeClass('animation_enter');
            $(document.body).css({
                'cursor': 'wait'
            });
            var interval = setInterval(function() {
                $('#app_mid_title').addClass('animation_enter');
                $('#toprate-div').addClass('animation_enter');
                mid_title.title = "20 Top rated books of all time";
                toprated.category = "toprated";
                mid_title.img_url = '<?= base_url() ?>assets/img/all.svg';
                category_content.category = "";
                clearInterval(interval);
                $(document.body).css({
                    'cursor': 'default'
                });
            }, 50);


        });
        $('.ctg').click(function(e) {
            var category = ($(this).data('ctg'));
            get_items_by_category(category);
        });

        $('.category').on("click", "a", function(event) {
            var category = ($(this).data('ctg'));
            get_items_by_category(category);
        });

        /*
        | -------------------------------------------------------------------------
        | start popup_menu function
        | -------------------------------------------------------------------------
        */
        var global_book_id = 0;
        $('.ellipsis_menu_trigger').click(function(e) {
            var book_id = ($(this).data('book_id'));
            var book_name = ($(this).data('book_name'));
            var rect = $(this).offset();
            clickedPopupTrigger(book_id, rect, book_name)
        });

        // hover ellipsis_menu
        $(".ellipsis_menu").hover(function() {
            $(this).addClass("hovered");
        }, function() {
            $(this).removeClass("hovered");
        });

        // hover ellipsis_menu
        $("#popup_menu").hover(function() {
            $(this).addClass("hovered");
        }, function() {
            $(this).removeClass("hovered");
        });


        function clickedPopupTrigger(book_id, rect, book_name) {
            $('#popup_menu').css({
                "top": (rect.top - 155),
                "left": (rect.left - 230),
            });

            if ($('#popup_menu').css('display') == 'none') {
                showPopupMenu(book_id, book_name);
            } else {
                if (global_book_id != book_id) {
                    $('#popup_menu').hide();
                    var interval = setInterval(function() {
                        showPopupMenu(book_id, book_name);
                        clearInterval(interval);
                    }, 50);

                } else {
                    $('#popup_menu').toggle();
                }
            }
            global_book_id = book_id;
        }

        function showPopupMenu(book_id, book_name) {
            var post_data = {
                'book_id': book_id,
            };

            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/isBookmarked",
                async: true,
                data: post_data,
                beforeSend: function() {
                    $('.load_popup_menu').show();
                    $('#popup_menu_content').hide();

                },
                success: function(data_isBookmarked) {
                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url(); ?>books/getBookRateByUser",
                        async: true,
                        data: post_data,
                        success: function(data_getBookRateByUser) {
                            $('.load_popup_menu').hide();
                            $('#popup_menu_content').show();
                            if (data_isBookmarked) {
                                $('#popup_menu_bookmark').html('<a class="dropdown-item bookmark_trigger popup_menu_item" data-book_id="' + book_id + '"><div class="row"><div class="col-1" style="padding-left:1.1rem;"><i class="fas fa-bookmark popup_menu_icon text-primary" id="bookmark_icon"></i></div><div class="col" style="padding-left: 0.8rem;"><div class="save_text">unsave book</div><div class="save_text_muted">ลบออกจากรายการที่บันทึกไว้ของคุณ</div></div></div></a>');
                            } else {
                                $('#popup_menu_bookmark').html('<a class="dropdown-item bookmark_trigger popup_menu_item" data-book_id="' + book_id + '"><div class="row"><div class="col-1" style="padding-left:1.1rem;"><i class="far fa-bookmark popup_menu_icon" id="bookmark_icon"></i></div><div class="col" style="padding-left: 0.8rem;"><div class="save_text">save book</div><div class="save_text_muted">เพิ่มลงในรายการที่บันทึกไว้ของคุณ</div></div></div></a>');
                            }
                            if (data_getBookRateByUser != false) {
                                $('.rater_star_modal').rating('update', data_getBookRateByUser);
                                $('#popup_menu_rate').html('<a class="dropdown-item rate_modal_trigger popup_menu_item" data-toggle="modal" data-target="#rate_modal"><div class="row"><div class="col-1"><i class="fas fa-star popup_menu_icon text-warning"></i></div><div class="col"><div class="rate_text">update rate</div><div class="rate_text_muted">เปลี่ยนคะแนนที่คุณให้</div></div></div></a>');

                            } else {
                                $('.rater_star_modal').rating('update', 0);
                                $('.rate_trigger').hide();
                                $('#popup_menu_rate').html('<a class="dropdown-item rate_modal_trigger popup_menu_item" data-toggle="modal" data-target="#rate_modal"><div class="row"><div class="col-1"><i class="far fa-star popup_menu_icon"></i></div><div class="col"><div class="rate_text">rate this</div><div class="rate_text_muted">ให้คะแนนสิ่งนี้</div></div></div></a>');

                            }
                            modal_book_id
                            $('#modal_book_id').val(book_id);
                            // $('.rate_trigger').attr("data-book_id", "");
                            // $('.rate_trigger').attr("data-book_id", book_id);

                            $('#modal_label').html('Rate <span class="text-primary">' + book_name + '</span>');

                        }
                    })
                }
            })
            $('#popup_menu').show();
        }
        $('#rate_modal').on('hidden.bs.modal', function() {
            $('#popup_menu').hide();
        })

        $('.rater_star_modal').on('rating:change', function(event, value, caption) {
            $('.rate_trigger').show();
        });

        $('.rate_trigger').click(function(e) {
            var rating = {
                'rating': $('.rater_star_modal').rating().val(),
                'book_id': $('#modal_book_id').val(),
            };
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/rateBook",
                data: rating,
                async: true,
                success: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        title: 'Rated successfully !',
                        type: 'success',
                    });

                    // HCI EVENT
                    hciprogress($('#modal_book_id').val());

                    $('#rate_modal').modal('hide');
                    global_book_id = 0;

                }
            })
        });

        function get_items_by_category(category) {
            var data_category = {
                'category': category,
            };

            // call bookscontroller to call model
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/getBooksByCategory/",
                data: data_category,
                beforeSend: function() {
                    $(document.body).css({
                        'cursor': 'wait'
                    });
                    $('.load-more').toggle();
                    $('#category_contents_body').removeClass('animation_enter');
                    $('#app_mid_title').removeClass('animation_enter');
                    $('#category_contents_body').addClass('invisible');
                    $('#app_mid_title').addClass('invisible');

                },
                success: function(data) {
                    mid_title.title = category;
                    category = category.toLowerCase()
                    mid_title.img_url = '<?= base_url() ?>assets/img/' + category + ".svg";
                    toprated.category = false;
                    category_content.category = "category";
                    $('#category_contents_body').removeClass('invisible');
                    $('#app_mid_title').removeClass('invisible');

                    category_content.books = JSON.parse(data);
                    $('#category_contents_body').addClass('animation_enter');
                    $('#app_mid_title').addClass('animation_enter');
                    $('.load-more').toggle();
                    $(document.body).css({
                        'cursor': 'default'
                    });
                }
            })
        }

        $('#popup_menu_rate').click(function(e) {
            $('#popup_menu').hide();
        });

        // bookmarker
        $('#popup_menu_bookmark').click('.bookmark_trigger', function(e) {
            var this_elm = $(this).find('.bookmark_trigger');
            var bookmark_data = {
                'book_id': this_elm.data('book_id'),
            };
            var count_all_saved_list = $('#count_all_saved_list').html();
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/update_bookmark",
                data: bookmark_data,
                async: true,
                success: function(data) {
                    if (data == "login") {
                        please_login();
                    } else if (data == "inserted") {
                        toastBookmarkSaved(this_elm.data('book_id'));

                        this_elm.find('i').removeClass("far");
                        this_elm.find('i').addClass("fas");
                        this_elm.find('span').html(" unsave book");
                        count_all_saved_list++;
                        $('#count_all_saved_list').html(count_all_saved_list)

                    } else if (data == "removed") {
                        toastBookmarkUnsaved();
                        this_elm.find('i').removeClass("fas");
                        this_elm.find('i').addClass("far");
                        this_elm.find('span').html(" save book");
                        count_all_saved_list--;
                        $('#count_all_saved_list').html(count_all_saved_list)
                    }
                    $('#popup_menu').hide();
                }
            })
        });

    });

    $('.rater_star').rating({
        'showCaption': false,
        'stars': '5',
        'min': '0',
        'max': '5',
        'step': '0.5',
        'size': 'sm',
        displayOnly: true,
    });

    $('.rater_star_modal').rating({
        'showCaption': true,
        'stars': '5',
        'min': '0',
        'max': '5',
        'step': '0.5',
        'size': 'md',
        'clearCaption': '0',
    });

    $('.rater_star_col2').rating({
        'showCaption': false,
        'stars': '5',
        'min': '0',
        'max': '5',
        'step': '0.5',
        'size': 'xs',
        displayOnly: true,

    });
    var mid_title = new Vue({
        el: '#app_mid_title',
        data: {
            title: '20 Top rated books of all time',
            img_url: '<?= base_url() ?>assets/img/all.svg'
        }
    });

    var toprated = new Vue({
        el: '#top_rated_contents',
        data: {
            category: 'toprated'
        }
    });

    var category_content = new Vue({
        el: '#category_contents',
        data: {
            category: '',
            books: []
        }
    });


    var category_content_body = new Vue({
        el: '#category_content_body',
        data: {
            books: []
        }
    });
</script>