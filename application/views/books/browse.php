<div class="row">
    <!-- Current title -->
    <div class="container">
        <div id="app_mid_title_browse" class="animation_enter text-center">
            <template>
                <div class="position-relative row">
                    <img :src="img_url" class="mr-4" alt="">
                    <h1 id="mid-title_browse" class="display-4 font-arial pt-5 text-uppercase">{{title}}</h1>
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
                <ul class="navbar-nav nav-menu" style="white-space: nowrap;overflow-x: auto;-webkit-overflow-scrolling: touch;">

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

    <div id="content_list" >
        <div class="row no-gutters" style="margin-left:0.5rem;">
            <?php if (($content_list != FALSE)) {
                foreach ($content_list as $content) { ?>
                    <div class="col-sm-4 align-self-center content_browse_row" style="max-width: 30.333333%;" data-aos="fade-up">
                        <div class="py-3">
                            <div class="card card_hover_img">
                                <a href="<?= base_url() ?>book/<?= $content['book_id'] ?>" title="<?= $content['book_name'] ?>">
                                    <img class="card_img" src="<?= base_url() ?>assets/book_covers/<?= $content['book_id'] ?>.PNG" alt=""></a>
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
                                        <span class="position-absolute small font-arial text-info user_rated_this" style="bottom:1.1rem;left:8.5rem;width:2rem;">(<?= $content['count_rate'] ?> <i class="fas fa-user fa-xs"></i>)</span>
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


</div>
<!-- Modal -->
<div class="modal fade slide-bottom" id="rate_modal" tabindex="-1" role="dialog" aria-labelledby="rate_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg_linear_theme">
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
    $('html').click(function() {
        if (!$(".ellipsis_menu").hasClass("hovered")) {
            if (!$("#popup_menu").hasClass("hovered")) {
                $('#popup_menu').hide();
            }
        }
    });
    $(document).ready(function() {
        // console.log(<?= $page ?>);
        var regex = new RegExp(" ", "g");
        var category = mid_title.title.replace(regex, "-");
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
                var category = $('#mid-title_browse').html();
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

        /*
    | -------------------------------------------------------------------------
    | start popup_menu function
    | -------------------------------------------------------------------------
    */
        var global_book_id = 0;
        $(document).on('click', '.ellipsis_menu_trigger', function(e) {
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
                    // hciprogress($('#modal_book_id').val());

                    $('#rate_modal').modal('hide');
                    global_book_id = 0;


                }
            })
        });

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
    var mid_title = new Vue({
        el: '#app_mid_title_browse',
        data: {
            title: '<?= $page ?>',
            img_url: '<?= base_url() ?>assets/img/<?= $page ?>.svg'
        }
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