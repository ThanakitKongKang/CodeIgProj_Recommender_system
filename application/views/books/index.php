<div class="container">
    <div id="top" class="row">
        <div class="col " id="col-1">

            <?php
            if (!$final_recommend_list) echo "recommended list is empty";
            else { ?>
                <div class="hover_img">

                    <img id="img-col-1" src="<?= base_url() ?>assets/book_covers/<?= $final_recommend_list[0]['book_id'] ?>.png">

                    <!-- <div id="text-col-1"></div> -->

                    <div class="overlay"><a href="book/<?= $final_recommend_list[0]['book_id'] ?>" class="stretched-link"> </a></div>

                    <div class="hover_img_button">
                        <a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a>

                    </div>
                    <div class="hover_img_content pr-4">
                        <div style="float:right">
                            <input value="<?= $final_recommend_list[0]['b_rate'] ?>" class="rater_star" title="">
                            <div class="small"><?= $final_recommend_list[0]['b_rate'] ?>/5.0 rated by <?= $final_recommend_list[0]['count_rate'] ?> users</div>
                        </div>
                        <div class="mt-5 pt-5"><?= $final_recommend_list[0]['book_name'] ?></div>
                        <div class="small pt-4">field : <?= $final_recommend_list[0]['book_type'] ?></div>
                        <div class="small py-2">author : <?= $final_recommend_list[0]['author'] ?></div>
                    </div>
                </div>
            <?php } ?>

            <!-- big image top recommended-->
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


                                <div class="overlay_col2"><a href="book/<?= $final_recommend_list[$i]['book_id'] ?>" class="stretched-link"></a></div>

                                <div class="hover_img_button_col2"><a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a></div>
                            </div>

                            <div class="col-8 text-col-2">
                                <a class="text-col-2-type ctg" href="#mid"><span><?= $final_recommend_list[$i]['book_type'] ?></span></a>
                                <div class="text-col-2-name"> <a href="book/<?= $final_recommend_list[$i]['book_id'] ?>"><?= $final_recommend_list[$i]['book_name'] ?></a></div>
                                <div class="text-col-2-author"><?= $final_recommend_list[$i]['author'] ?></div>
                                <input value="<?= $final_recommend_list[$i]['b_rate'] ?>" class="rater_star_col2" title="">
                            </div>

                        </div>
                    <?php } ?>

                </div>
            <?php
            }
            ?>
        </div>
        <div class="col" id="col-3">
            <div>
            </div>
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
                            <a class="nav-link" href="#mid" id="top-rated">Top rated books <span class="sr-only">(current)</span></a>
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
                            <a class="nav-link link" href="#mid" data-ctg="<?= $category["book_type"] ?>"><?= $category["book_type"] ?></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Current title -->
        <div id="app_mid_title">
            <template>
                <h1 id="mid-title" class="font-arial text-center py-5">{{title}}</h1>
            </template>
        </div>


        <!-- Top rated -->
        <template id="top_rated_contents" v-if="category === 'toprated'">
            <div>
                <div class="row no-gutters">
                    <?php
                    foreach ($top_rated as $top) {
                        ?>
                        <div class="col-4 p-5 ">
                            <div class="hover_img_mid">
                                <span class="text-img-rate badge badge-primary"><?= number_format($top["b_rate"], 1); ?></span>
                                <img class="img-book hover_img" src="<?= base_url() ?>assets/book_covers/<?= $top['book_id'] ?>.png">
                                <!-- <span class="text-img"><?= $top["book_name"] ?></span> -->




                                <div class="overlay_mid"><a href="book/<?= $top['book_id'] ?>" class="stretched-link"></a></div>

                                <div class="hover_img_button_mid"><a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a></div>
                                <div class="hover_img_content_mid">
                                    <div class="py-2"><?= $top['book_name'] ?></div>
                                    <div class="small py-2">field : <?= $top['book_type'] ?></div>
                                    <div class="small py-2">author : <?= $top['author'] ?></div>
                                    <div class="mt-5 text-center">
                                        <input value="<?= $top['b_rate'] ?>" class="rater_star" title="">
                                        <div class="small"><?= $top['b_rate'] ?>/5.0 rated by <?= $top['count_rate'] ?> users</div>
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
            <div>
                <div class="row no-gutters">
                    <div class="col-4 p-5" v-for="book in books">
                        <div class="hover_img_mid">
                            <span class="text-img-rate badge badge-primary" v-if="book.b_rate !== null"> {{ book.b_rate }}</span>

                            <img class="img-book hover_img" v-bind:src="'<?= base_url() ?>assets/book_covers/'+book.book_id+'.png'" />
                            <!-- <span class="text-img"> {{ book.book_name }}</span> -->

                            <div class="overlay_mid"><a v-bind:href="'book/'+book.book_id+''" class="stretched-link"></a></div>
                            <div class="hover_img_button_mid"><a href="#" class="btn btn-primary"><i class="far fa-bookmark"></i></a></div>
                            <div class="hover_img_content_mid">
                                <div class="py-2">{{ book.book_name }}</div>
                                <div class="small py-2">field : {{ book.book_type }}</div>
                                <div class="small py-2">author : {{ book.author }}</div>

                                <div class="mt-5 text-center">
                                    <div class="rating-container rating-sm rating-animate is-display-only">
                                        <!-- HARD CODE rater star for Vue.js -->
                                        <div class="rating-stars" v-bind:title="book.b_rate+' Stars'"><span class="empty-stars"><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span><span class="star"><i class="far fa-star"></i></span></span><span class="filled-stars" v-bind:style="'width:'+(book.b_rate*20)+'%;'" style="width: 86%;"><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span><span class="star"><i class="fas fa-star"></i></span></span><input v-bind:value="book.b_rate" class="rater_star rating-input" title=""></div>
                                    </div>

                                    <!-- <input v-bind:value="book.b_rate" class="rater_star" title="" /> -->
                                    <div class="small">{{ book.b_rate }}/5.0 rated by {{ book.count_rate }} users</div>
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
            mid_title.title = "20 Top rated books of all time";
            toprated.category = "toprated";
            category_content.category = "";
        });
        $('.ctg').click(function(e) {
            mid_title.title = "Category 1";
            toprated.category = false;
            category_content.category = "category";
        });

        $('.category').on("click", "a", function(event) {
            var category = ($(this).data('ctg'));
            // vue
            mid_title.title = category;
            toprated.category = false;
            category_content.category = "category";

            var data_category = {
                'category': category,
            };
            // call bookscontroller to call model
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>books/getBooksByCategory/",
                data: data_category,
                success: function(data) {
                    category_content.books = JSON.parse(data);
                }
            })
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
    });

    var mid_title = new Vue({
        el: '#app_mid_title',
        data: {
            title: '20 Top rated books of all time'
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