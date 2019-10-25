<div class="container">
    <div class="row">
        <!-- pdf -->
        <div class="d-inline-block col-sm p-0 bg-light detail_pdf_section" style="height: 90vh!important;width:40vw!important">
            <object data="<?= base_url() ?>assets/book_files/<?= str_replace("#", "sharp", $book_detail['book_name']) ?>.pdf#view=Fit&pagemode=bookmarks" type="application/pdf" width="100%" height="100%">
            </object>
            <div class="display-4 text-secondary" id="detail_undesktop" style="display:none">Content is only available on desktop</div>
        </div>
        <!-- right section -->
        <div class="pl-5 col-sm position-relative detail_book_detail_section">
            <div class="row">
                <div class="col-sm pt-3">
                    <img id="" style="width:100%;box-shadow: 0 2.5px 5px rgba(0, 0, 0, 0.25);" src="<?= base_url() ?>assets/book_covers/<?= $book_detail['book_id'] ?>.PNG">
                </div>

                <div class="col-sm bg-light pt-3 book_detail_content" style="border-radius:1rem;height: 23rem;">
                    <!-- RATE section -->
                    <div>
                        <div class="text-center">
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
                    <div class="w-100">
                        <hr>
                        <input id="book_id" type="hidden" value="<?= $book_detail['book_id'] ?>">
                        <div class="mb-2 font-arial font-weight-bolder" title="<?= $book_detail['book_name'] ?>" id="book_detail_section_name"> <?= $book_detail['book_name'] ?></div>
                        <div class="book_detail_text pt-1"><span class="">Category : </span><a class="link " href="<?= base_url() ?>browse/<?= strtolower(ucwords(str_replace(" ", "-", $book_detail["book_type"]))) ?>"><span><?= $book_detail['book_type'] ?></span></a></div>
                        <div class="book_detail_text pt-1">Author : <?= $book_detail['author'] ?></div>
                    </div>

                    <!-- bookmark trigger -->
                    <div class="position-absolute w-100 text-center" style="bottom:1rem;padding-right:1.75rem;">
                        <hr class="mb-2">
                        <button class="btn btn-primary bookmark_trigger mt-2">
                            <?php if ($bookmark == TRUE) { ?>
                                <i class="fas fa-bookmark" id="bookmark_icon"></i>
                            <?php echo "<span class='save_text font-arial'> unsave book</span>";
                            } else {
                                ?><i class="far fa-bookmark" id="bookmark_icon"></i>
                            <?php echo "<span class='save_text font-arial'> save book</span>";
                            } ?></button>

                        <?php if ($this->session->userdata('logged_in')) { ?>
                            <button class="btn btn-warning rate_modal_trigger popup_menu_item mt-2" id="detail_rate_mobile" style="display:none" data-toggle="modal" data-target="#rate_modal">

                            </button>
                        <?php } ?>

                    </div>

                </div>
            </div>
            <?php if (!empty($recommend_list_detail)) { ?>
                <div class="position-absolute font-apple" id="similar_book_title">Similar to</div>
                <div class="row py-3 mt-3 position-relative" id="similar_book_detail" style="border-radius:0.25rem;border:1px solid #0000000d;background-color:#f9f9f9">
                    <div class="pt-5 pr-5" id="similar_book_content">
                        <?php foreach ($recommend_list_detail as $book) { ?>
                            <div class="col-4 hover_img_similar_book_content">
                                <div class="position-relative">
                                    <img class="img-col-2" src="<?= base_url() ?>assets/book_covers/<?= $book['book_id'] ?>.PNG">
                                    <div class="overlay_similar"><a href="<?= base_url() ?>book/<?= $book['book_id'] ?>" class="stretched-link"></a></div>
                                </div>
                                <div class="hover_img_content_similar text-center">
                                    <div class="py-2 hover_similar_book_title mb-2" style="white-space:normal"><?= $book['book_name'] ?></div>
                                    <div class="small pt-1 overlay_similar_content font-arial">field : <?= $book['book_type'] ?></div>
                                    <div class="small pt-1 overlay_similar_content font-arial" title="<?= $book['author'] ?>">author : <?= $book['author'] ?></div>
                                    <div class="mt-4 text-center">
                                        <hr class="my-2" style="border: 0;border-top: 1px solid rgb(255, 255, 255);}">
                                        <?php if ($book['count_rate'] != 0) { ?>
                                            <!-- HARD CODE rater star -->
                                            <div class="rating-container rating-xs rating-animate is-display-only">
                                                <!-- <div class="rating-stars" v-bind:title="book.b_rate+' Stars'"><span class="empty-stars"><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span></span><span class="filled-stars" v-bind:style="'width:'+(book.b_rate*20)+'%;'"><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span></span><input v-bind:value="book.b_rate" class="rater_star rating-input" title=""></div> -->
                                                <div class="rating-stars" title="<?= $book['b_rate'] ?> Stars"><span class="empty-stars"><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span></span><span class="filled-stars" style="width:<?= $book['b_rate'] * 20 ?>%;"><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span></span><input value="<?= $book['b_rate'] ?>" class="rating-input" title=""></div>
                                            </div>
                                            <div class="small"><?= number_format($book['b_rate'], 1) ?>/5.0 rated by <?= $book['count_rate'] ?> user<?php if ($book['count_rate'] > 1) echo "s"; ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="position-absolute text-center similar_book_arrow" id="similar_book_arrow_left"><i class="text-white fas fa-chevron-left fa-lg pr-2" style="z-index:1"></i></div>
                <div class="position-absolute text-center similar_book_arrow" id="similar_book_arrow_right"><i class="text-white fas fa-chevron-right fa-lg  pl-2" style="z-index:1"></i></div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade slide-bottom" id="rate_modal" tabindex="-1" role="dialog" aria-labelledby="rate_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label">Rate <?= $book['book_name'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="margin-left:8rem;">
                <input value="<?= $user_rate['rate'] ?>" class="rater_star_modal" title="" data-show-clear="false">
                <input value="<?= $book['book_id'] ?>" id="modal_book_id" title="" type="hidden">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" style="display:none;" data-book_id="<?= $book['book_id'] ?>" class="btn btn-primary rate_trigger">Submit</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    <?php if (!empty($recommend_list_detail)) { ?>
        var similar_book_detail_width = $("#similar_book_detail").get(0);
        if (similar_book_detail_width.scrollWidth < 600) {
            $("#similar_book_arrow_right").hide();
        }
    <?php } ?>

    $(document).ready(function() {
        var not_login = true;
        <?php if ($this->session->userdata('logged_in')) { ?>
            var not_login = false;
        <?php } ?>

        var isMobile = window.matchMedia("only screen and (max-width: 1024px)").matches;

        if (isMobile) {
            // alert("Mobile phone display is not supported , Unable to read an E-book, We Recommend using a desktop");
            $('.rater_star').rating({
                'stars': '5',
                'min': '0',
                'max': '5',
                'step': '0.5',
                'size': 'sm',
                containerClass: 'text-center',
                displayOnly: true,
                showCaption: false,
                showClear: false,
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

        } else if (!isMobile) {
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
        }

        if (not_login) {
            // rater
            $('.rating-stars').click(function(e) {
                please_login();
            });

        } else {
            // rater
            var default_rating = ($('.rating-input').val());
            if (default_rating == "") {
                $('#detail_rate_mobile').html('<i class="far fa-star"></i> <span class="rate_text">rate</span>');
            } else {
                $('#detail_rate_mobile').html('<i class="fas fa-star"></i> <span class="rate_text">update</span>');
            }
            console.log(default_rating);

            // bookmarker
            $('.rating-stars').on("click", rating_change);

            function rating_change() {
                var this_elm = $(this);
                // call bookscontroller to call model
                var rating = {
                    'rating': $('.rating-input').val(),
                    'book_id': $('#book_id').val(),
                };

                $.ajax({
                    type: 'post',
                    url: "<?php echo base_url(); ?>books/rateBook",
                    data: rating,
                    async: true,
                    beforeSend: function() {
                        $(this_elm).addClass("disabled");
                    },
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
                        $(this_elm).removeClass("disabled");
                        $(this_elm).on("click", rating_change);

                        // HCI EVENT
                        hciprogress($('#book_id').val());
                    }
                })
            }
        }

        // bookmarker
        $('.bookmark_trigger').on("click", bookmark_triggered);

        function bookmark_triggered() {
            var this_elm = $(this);
            var bookmark_data = {
                'book_id': $('#book_id').val(),
            };
            var count_all_saved_list = $('#count_all_saved_list').html();
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

                    if (data == "login") {
                        please_login();
                    } else if (data == "inserted") {
                        toastBookmarkSaved($('#book_id').val());

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
                }
            })
        }
        $('.rater_star_modal').on('rating:change', function(event, value, caption) {
            $('.rate_trigger').show();
        });

        $('.rate_trigger').click(function(e) {
            var rate_value = $('.rater_star_modal').rating().val();
            var rating = {
                'rating': rate_value,
                'book_id': $('#book_id').val(),
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
                    hciprogress($('#book_id').val());


                    $('#rate_modal').modal('hide');
                    $('.rating-stars').rating('update', rate_value);

                    $('.rating-stars').rating('refresh', {
                        showClear: false,
                        showCaption: false
                    });
                    $('.rater_star_modal').rating('refresh', {
                        showClear: false,
                        showCaption: true
                    });

                    if (default_rating == "") {
                        $('#span_rating_text').html("based on 1 user");
                        $('#rate_avg_user').html(Number($('#rate_avg_user').html()) + 1);
                        default_rating = 1;
                    }
                    $('#rate_avg').html(data);
                    $('#your_rate').html(rate_value);

                    $('#span_rating').removeClass("badge-secondary");
                    $('#span_rating').addClass("badge-warning");

                    $('#detail_rate_mobile').html('<i class="fas fa-star"></i> <span class="rate_text">update</span>');


                }
            })

        });


        function please_login() {
            Swal.fire({
                title: 'Create an account or log in!',
                type: 'error',
                confirmButtonText: 'Login',
                // timer: 1500
            }).then((result) => {
                if (result.value) {
                    window.location = "<?= base_url() ?>login";
                }
            })
        }
        $("#similar_book_arrow_right").click(function(e) {
            var leftPos = $('#similar_book_detail').scrollLeft();
            $("#similar_book_detail").animate({
                scrollLeft: leftPos + 300
            }, 250, function() {
                var newPos = $('#similar_book_detail').scrollLeft();
                // console.log(newPos);
                if (newPos != 0) {
                    $("#similar_book_arrow_left").show();
                }

                var similar_book_detail_width = $("#similar_book_detail").get(0);
                // console.log(newPos+600 + ">" + similar_book_detail_width.scrollWidth);
                if (newPos + 600 > similar_book_detail_width.scrollWidth) {
                    $("#similar_book_arrow_right").hide();
                }
            });
        });

        $("#similar_book_arrow_left").click(function(e) {
            var leftPos = $('#similar_book_detail').scrollLeft();
            $("#similar_book_detail").animate({
                scrollLeft: leftPos - 300
            }, 250, function() {
                var newPos = $('#similar_book_detail').scrollLeft();
                // console.log(newPos);
                if (newPos <= 100) {
                    $("#similar_book_arrow_left").hide();
                }
                var similar_book_detail_width = $("#similar_book_detail").get(0);
                // console.log(newPos+600 + ">" + similar_book_detail_width.scrollWidth);
                if (newPos + 600 < similar_book_detail_width.scrollWidth) {
                    $("#similar_book_arrow_right").show();
                }
            });
        });
    });
</script>