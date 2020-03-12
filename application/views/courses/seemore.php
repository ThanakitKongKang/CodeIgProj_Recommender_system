<div class="row">
    <!-- Current title -->
    <div class="container">
        <div class="animation_enter text-center">
            <div class="position-relative row">
                <h5 class="text-muted font-apple"><?= $title_mfy ?></h5>
            </div>
            <div class="position-relative row">
                <h1 class="display-4 page_title_header page_title_header_no_after font-arial"><?= $title_main ?></h1>
            </div>

        </div>
    </div>

</div>
<div class="dropdown-divider"></div>

<div class="container">
    <!-- 
    | -------------------------------------------------------------------------
    | content
    | -------------------------------------------------------------------------
     -->
    <?php if (($isCourseExists != FALSE)) { ?>
        <div id="content_list">
            <div class="row no-gutters col-12 mx-auto">
                <?php
                foreach ($recommend_list_detail_course as $rec_course) { ?>
                    <?php foreach ($rec_course as $key => $content) { ?>
                        <?php if ($key != "detail") { ?>


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
                        <?php } ?>
                    <?php } ?>

                <?php } ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="col-md-6 col-sm-12 mx-auto" role="alert">
            <div class="text-center">
                <img src="<?= base_url() ?>assets/img/404-Page-Not-Found.svg" alt="" class="col-md-6 col-sm-12" alt="">
            </div>
            <div class="alert alert-secondary ">
                SORRY, BUT THE PAGE YOU ARE LOOKING FOR DOES NOT EXIST, HAVE BEEN REMOVED, NAME CHANGED OR IS TEMPORARILY UNAVAILABLE
            </div>
            <a href="<?= base_url() ?>" class="btn btn-primary">GO TO HOMEPAGE</a>
        </div>

    <?php } ?>

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