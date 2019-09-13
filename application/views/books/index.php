<div class="container">
    <div id="top" class="row">
        <div class="col " id="col-1">

            <?php
            if (!$final_recommend_list) echo "recommended list is empty";
            else { ?>
                <div class="hover_img">

                    <img id="img-col-1" src="<?= base_url() ?>assets/book_covers/<?= $final_recommend_list[0]['book_id'] ?>.png">

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
                        <?php if (isset($final_recommend_list[0]['match'])) { ?>
                            <div class="small pl-1 badge badge-success">
                            <?php echo "Match " . number_format($final_recommend_list[0]['match'] * 100, 0) . "%";
                                } else { ?>
                                <div class="small pl-1 badge badge-info"> random strategy
                                <?php } ?>
                                </div>
                                <div class="small">field : <?= $final_recommend_list[0]['book_type'] ?></div>
                                <div class="small py-2">author : <?= $final_recommend_list[0]['author'] ?></div>
                            </div>
                    </div>

                    <div class="my-3 bg-light book_detail_content" id="book_detail_content_col1">
                        <a class="text-col-2-type ctg" data-ctg="<?= $final_recommend_list[0]["book_type"] ?>"><span><?= $final_recommend_list[0]['book_type'] ?></span></a>
                        <div class="text-col-2-name mt-2"> <a href="<?= base_url() ?>book/<?= $final_recommend_list[0]['book_id'] ?>" title="<?= $final_recommend_list[0]['book_name'] ?>"><?= $final_recommend_list[0]['book_name'] ?></a></div>
                        <div class="text-col-1-footer">
                            <input value="<?= $final_recommend_list[0]['b_rate'] ?>" class="rater_star_col2" title="">
                            <?php if ($final_recommend_list[0]['count_rate'] != 0) { ?>
                                <span class="position-absolute small font-arial text-info" style="bottom:1.6rem;left:7rem;width:2rem;">(<?= $final_recommend_list[0]['count_rate'] ?> <i class="fas fa-user fa-xs"></i>)</span>
                            <?php } ?>
                            <!-- <div class="small pl-1 badge badge-secondary"><?= number_format($final_recommend_list[0]['b_rate'], 1) ?>/5.0 rated by <?= $final_recommend_list[0]['count_rate'] ?> user<?php if ($final_recommend_list[0]['count_rate'] != 1) echo "s";  ?></div> -->
                            <?php if (isset($final_recommend_list[0]['match'])) { ?>
                                <div class="small pl-1 badge badge-success the_badge">
                                <?php echo "Match " . number_format($final_recommend_list[0]['match'] * 100, 0) . "%";
                                    } else { ?>
                                    <div class="small pl-1 badge badge-info the_badge"> random strategy
                                    <?php } ?>
                                    </div>

                                    <div class="text-col-2-author font-italic text-secondary" id="text-col-2-author_col1" title="<?= $final_recommend_list[0]['author'] ?>">By <?= $final_recommend_list[0]['author'] ?></div>
                                </div>

                        </div>



                    <?php } ?>

                    </div>
                    <div class="col" id="col-2">
                        <!-- another 4 recommended items -->
                        <?php
                        for ($i = 1; $i < 5; $i++) {
                            ?>
                            <div class="py-3"><?php if (isset($final_recommend_list[$i]['book_name'])) { ?>
                                    <div class="row h-100">
                                        <div class="col-4 hover_img_col2">

                                            <img class="img-col-2" src="<?= base_url() ?>assets/book_covers/<?= $final_recommend_list[$i]['book_id'] ?>.png">


                                            <div class="overlay_col2"><a href="<?= base_url() ?>book/<?= $final_recommend_list[$i]['book_id'] ?>" class="stretched-link"></a></div>

                                            <!-- <div class="hover_img_button_col2"><a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a></div> -->
                                        </div>

                                        <div class="col-8 text-col-2 bg-light book_detail_content" style="border-radius:1rem;">
                                            <a class="text-col-2-type ctg" data-ctg="<?= $final_recommend_list[$i]["book_type"] ?>"><span><?= $final_recommend_list[$i]['book_type'] ?></span></a>
                                            <div class="text-col-2-name"> <a href="<?= base_url() ?>book/<?= $final_recommend_list[$i]['book_id'] ?>" title="<?= $final_recommend_list[$i]['book_name'] ?>"><?= $final_recommend_list[$i]['book_name'] ?></a></div>
                                            <div class="text-col-2-footer w-100">
                                                <input value="<?= $final_recommend_list[$i]['b_rate'] ?>" class="rater_star_col2" title="">
                                                <?php if ($final_recommend_list[$i]['count_rate'] != 0) { ?>
                                                    <span class="position-absolute small font-arial text-info" style="bottom:1.6rem;left:7rem;width:2rem;">(<?= $final_recommend_list[$i]['count_rate'] ?> <i class="fas fa-user fa-xs"></i>)</span>
                                                <?php } ?>
                                                <!-- <div class="small pl-1 badge badge-secondary"><?= number_format($final_recommend_list[$i]['b_rate'], 1) ?>/5.0 rated by <?= $final_recommend_list[$i]['count_rate'] ?> user<?php if ($final_recommend_list[$i]['count_rate'] != 1) echo "s";  ?></div> -->
                                                <?php if (isset($final_recommend_list[$i]['match'])) { ?>
                                                    <div class="small pl-1 badge badge-success the_badge">
                                                    <?php echo "Match " . number_format($final_recommend_list[$i]['match'] * 100, 0) . "%";
                                                            } else { ?>
                                                        <div class="small pl-1 badge badge-info the_badge"> random strategy
                                                        <?php } ?>
                                                        </div>
                                                        <div class="text-col-2-author font-italic text-secondary" title="<?= $final_recommend_list[$i]['author'] ?>">By <?= $final_recommend_list[$i]['author'] ?></div>
                                                    </div>
                                            </div>

                                        </div>
                                    <?php } ?>

                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col" id="col-3">
                                <!-- another 4 recommended items -->
                                <?php
                                for ($i = 5; $i < 9; $i++) {
                                    ?>
                                    <div class="py-3"><?php if (isset($final_recommend_list[$i]['book_name'])) { ?>
                                            <div class="row">
                                                <div class="col-4 hover_img_col2">

                                                    <img class="img-col-2" src="<?= base_url() ?>assets/book_covers/<?= $final_recommend_list[$i]['book_id'] ?>.png">


                                                    <div class="overlay_col2"><a href="<?= base_url() ?>book/<?= $final_recommend_list[$i]['book_id'] ?>" class="stretched-link"></a></div>

                                                    <!-- <div class="hover_img_button_col2"><a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a></div> -->
                                                </div>

                                                <div class="col-8 text-col-2 bg-light book_detail_content" style="border-radius:1rem;">
                                                    <a class="text-col-2-type ctg" data-ctg="<?= $final_recommend_list[$i]["book_type"] ?>"><span><?= $final_recommend_list[$i]['book_type'] ?></span></a>
                                                    <div class="text-col-2-name"> <a href="<?= base_url() ?>book/<?= $final_recommend_list[$i]['book_id'] ?>" title="<?= $final_recommend_list[$i]['book_name'] ?>"><?= $final_recommend_list[$i]['book_name'] ?></a></div>
                                                    <div class="text-col-2-footer w-100">
                                                        <input value="<?= $final_recommend_list[$i]['b_rate'] ?>" class="rater_star_col2" title="">
                                                        <?php if ($final_recommend_list[$i]['count_rate'] != 0) { ?>
                                                            <span class="position-absolute small font-arial text-info" style="bottom:1.6rem;left:7rem;width:2rem;">(<?= $final_recommend_list[$i]['count_rate'] ?> <i class="fas fa-user fa-xs"></i>)</span>
                                                        <?php } ?>
                                                        <!-- <div class="small pl-1 badge badge-secondary"><?= number_format($final_recommend_list[$i]['b_rate'], 1) ?>/5.0 rated by <?= $final_recommend_list[$i]['count_rate'] ?> user<?php if ($final_recommend_list[$i]['count_rate'] != 1) echo "s";  ?></div> -->

                                                        <?php if (isset($final_recommend_list[$i]['match'])) { ?>
                                                            <div class="small pl-1 badge badge-success the_badge">
                                                            <?php echo "Match " . number_format($final_recommend_list[$i]['match'] * 100, 0) . "%";
                                                                    } else { ?>
                                                                <div class="small pl-1 badge badge-info the_badge"> random strategy
                                                                <?php } ?>
                                                                </div>
                                                                <div class="text-col-2-author font-italic text-secondary" title="<?= $final_recommend_list[$i]['author'] ?>">By <?= $final_recommend_list[$i]['author'] ?></div>
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
                                            <div class="col-3 category">
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
                                        <img class="position-absolute" :src="img_url" style="max-width:8rem;top:1rem;right:1rem;">
                                    </div>
                                    <hr class="mb-2 w-25" style="border: 0;border-top: 3px solid #007bff;">
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
                                <div class="animation_enter" id="toprate-div">
                                    <div class="row no-gutters">
                                        <?php
                                        foreach ($top_rated as $top) {
                                            ?>
                                            <div class="col-4 p-5 ">
                                                <div class="hover_img_mid">
                                                    <span class="text-img-rate badge badge-primary"> <?php if ($top['count_rate'] != 0) echo number_format($top["b_rate"], 1); ?></span>
                                                    <img class="img-book hover_img" src="<?= base_url() ?>assets/book_covers/<?= $top['book_id'] ?>.png">
                                                    <!-- <span class="text-img"><?= $top["book_name"] ?></span> -->
                                                    <div class="overlay_mid"><a href="<?= base_url() ?>book/<?= $top['book_id'] ?>" class="stretched-link"></a></div>

                                                    <!-- <div class="hover_img_button_mid"><a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a></div> -->
                                                    <div class="hover_img_content_mid text-center">
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
                                                                <div class="small"><?= number_format($top['b_rate'], 1) ?>/5.0 rated by <?= $top['count_rate'] ?> user<?php if($top['count_rate']>1) echo "s";?></div>
                                                            <?php } ?>
                                                        </div>
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
                                <div class="animation_enter" id="category_contents_body">
                                    <div class="row no-gutters">
                                        <div class="col-4 p-5" v-for="book in books">
                                            <div class="hover_img_mid">
                                                <span class="text-img-rate badge badge-primary" v-if="book.b_rate !== null"> {{ book.b_rate }}</span>
                                                <img class="img-book hover_img" v-bind:src="'<?= base_url() ?>assets/book_covers/'+book.book_id+'.png'" />
                                                <!-- <span class="text-img"> {{ book.book_name }}</span> -->

                                                <div class="overlay_mid"><a v-bind:href="'<?= base_url() ?>book/'+book.book_id+''" class="stretched-link"></a></div>
                                                <!-- <div class="hover_img_button_mid"><a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a></div> -->
                                                <div class="hover_img_content_mid text-center">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <script>
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
                                $('.load-more').toggle();
                                $('#app_mid_title').addClass('animation_enter');
                                $('#toprate-div').addClass('animation_enter');
                                mid_title.title = "20 Top rated books of all time";
                                toprated.category = "toprated";
                                mid_title.img_url = '<?= base_url() ?>assets/img/All.svg';
                                category_content.category = "";
                                $('.load-more').toggle();

                            });
                            $('.ctg').click(function(e) {
                                var category = ($(this).data('ctg'));
                                get_items_by_category(category);
                            });

                            $('.category').on("click", "a", function(event) {
                                var category = ($(this).data('ctg'));
                                get_items_by_category(category);
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
                                        $('.load-more').toggle();
                                        $('#category_contents_body').removeClass('animation_enter');
                                        $('#app_mid_title').removeClass('animation_enter');

                                        $('#category_contents_body').addClass('invisible');
                                        $('#app_mid_title').addClass('invisible');

                                    },
                                    success: function(data) {
                                        mid_title.title = category;
                                        mid_title.img_url = '<?= base_url() ?>assets/img/' + category + ".svg";
                                        toprated.category = false;
                                        category_content.category = "category";
                                        $('#category_contents_body').removeClass('invisible');
                                        $('#app_mid_title').removeClass('invisible');

                                        category_content.books = JSON.parse(data);
                                        $('#category_contents_body').addClass('animation_enter');
                                        $('#app_mid_title').addClass('animation_enter');
                                        $('.load-more').toggle();
                                    }
                                })
                            }
                            // bookmarker
                            $('.bookmark_trigger').click(function(e) {
                                var bookmark_data = {
                                    'book_id': $('#book_id').val(),
                                };

                                $.ajax({
                                    type: 'post',
                                    url: "<?php echo base_url(); ?>books/update_bookmark",
                                    data: bookmark_data,
                                    success: function(data) {
                                        if (data == "login") {
                                            Swal.fire({
                                                title: 'ไม่สามารถทำรายการได้ กรุณาเข้าสู่ระบบ!',
                                                type: 'error',
                                                confirmButtonText: 'เข้าสู่ระบบ',
                                                // timer: 1500
                                            }).then((result) => {
                                                if (result.value) {
                                                    window.location = "<?= base_url() ?>login";
                                                }
                                            })
                                        } else if (data == "inserted") {
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
                                            $('#bookmark_icon').removeClass("far");
                                            $('#bookmark_icon').addClass("fas");

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
                                            $('#bookmark_icon').removeClass("fas");
                                            $('#bookmark_icon').addClass("far");

                                        }
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
                                img_url: '<?= base_url() ?>assets/img/All.svg'
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