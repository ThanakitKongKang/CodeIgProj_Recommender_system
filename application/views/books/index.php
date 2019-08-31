<div class="container">
    <div id="top" class="row">
        <div class="col " id="col-1">

            <?php
            if (!$final_recommend_list) echo "recommended list is empty";
            else { ?>

                <img class="" id="img-col-1" src="<?= base_url() ?>assets/book_covers/<?= $final_recommend_list[0]['book_id'] ?>.png">
                <a href="book/<?= $final_recommend_list[0]['book_id'] ?>" class="stretched-link"></a>
                <div id="text-col-1"></div>
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
                            <div class="col-4">
                                <img class="img-col-2" src="<?= base_url() ?>assets/book_covers/<?= $final_recommend_list[$i]['book_id'] ?>.png">
                                <a href="book/<?= $final_recommend_list[$i]['book_id'] ?>" class="stretched-link"></a>
                            </div>

                            <div class="col-8 text-col-2">
                                <a class="text-col-2-type ctg" href="#mid"><span><?= $final_recommend_list[$i]['book_type'] ?></span></a>
                                <div class="text-col-2-name"> <a href="book/<?= $final_recommend_list[$i]['book_id'] ?>"><?= $final_recommend_list[$i]['book_name'] ?></a></div>
                                <div class="text-col-2-author"><?= $final_recommend_list[$i]['author'] ?></div>
                                <div class="text-col-2-date">dd/mm/yyyy</div>
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
                        <div class="col-4 p-5">
                            <div>
                                <span class="text-img-rate badge badge-primary"><?= number_format($top["b_rate"], 1); ?></span>
                                <a href="book/<?= $top['book_id'] ?>" class=""><img class="img-book" src="<?= base_url() ?>assets/book_covers/<?= $top['book_id'] ?>.png">
                                    <span class="text-img"><?= $top["book_name"] ?></span></a>
                            </div>
                            <div class="position-relative">
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
                        <div>
                            <span class="text-img-rate badge badge-primary" v-if="book.b_rate !== null"> {{ book.b_rate }}</span>
                            <a v-bind:href="'book/'+book.book_id+''" class="">
                                <img class="img-book" v-bind:src="'<?= base_url() ?>assets/book_covers/'+book.book_id+'.png'" />
                                <span class="text-img"> {{ book.book_name }}</span></a>
                        </div>

                        <div class="position-relative">

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
            $('#dropdown-category').toggleClass("hover");
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

    var example1 = new Vue({
        el: '#example-1',
        data: {
            books: []
        }
    })
</script>