<div class="container">
    <?php
    echo "<form action='testmode' class='mt-3 mb-3' method='post'>
        <input type='number' name='cosineCheck1' class='form-control w-25' style='display:inline-block;' value='$cosineCheck1' required>
        <input type='number' name='cosineCheck2' class='form-control w-25' style='display:inline-block;' value='$cosineCheck2' required>
        <button type='submit' id='cosineSubmit' class='btn btn-outline-primary'>Cosine Check</button>
    </form>";
    if (!empty($cosineCheck1)) {
        echo "<div class='container font-arial'><h4>cosine similarity between [$cosineCheck1] and [$cosineCheck2] is : $cosineSim</h4>";
        echo "</div>";
        echo "<div class='container font-arial text-secondary'><h5>Dot product : $dotproduct</h5>";
        echo "</div>";
        echo "<div class='container font-arial text-secondary'><h5>Magnitude : $magnitude</h5>";
        echo "</div>";

        print("<pre class='text-primary'>[$cosineCheck1] " . print_r($tf_no_stopwords2[$cosineCheck1 - 1], true) . "</pre>");
        print("<pre class='text-danger'>[$cosineCheck2] " . print_r($tf_no_stopwords2[$cosineCheck2 - 1], true) . "</pre>");
    }

    echo "<div class='container mt-5'><h4>course_registered</h4>";
    print("<pre>" . print_r($course_registered, true) . "</pre>");
    echo "</div>";

    echo "<div class='container mt-5'><h4>course_registered_keyword</h4>";
    print("<pre>" . print_r($course_registered_keyword, true) . "</pre>");
    echo "</div>";

    echo "<div class='container mt-5'><h4>course keywords by user's registered courses's id</h4>";
    print("<pre>" . print_r($item, true) . "</pre>");
    echo "</div>";

    echo "<div class='container mt-5'><h4>cosineSim_course</h4>";
    print("<pre>" . print_r($cosineSim_course, true) . "</pre>");
    echo "</div>";

    echo "<div class='container mt-5'><h4>recommend_list_detail_course</h4>";
    print("<pre>" . print_r($recommend_list_detail_course, true) . "</pre>");
    echo "</div>";

    // echo "<div class='container mt-5'><h4>books_name retrieving</h4>";
    // print("<pre>" . print_r($books_name, true) . "</pre>");
    // echo "</div>";

    // echo "<div class='container'><h4>Term Frequency</h4>";
    // print("<pre>" . print_r($words_segment, true) . "</pre>");
    // echo "</div>";

    // echo "<div class='container'><h4>tf_no_stopwords</h4>";
    // print("<pre>" . print_r($tf_no_stopwords2, true) . "</pre>");
    // echo "</div>";
    ?>

    <?php
    foreach ($recommend_list_detail_course as $rec_course) { ?>
        <div class="center bg-light m-5 p-5 text-center" data-slick='{"slidesToShow": 5, "slidesToScroll": 5}'>
            <?php foreach ($rec_course as $sub_rec_course) {
            ?>
                <div class="h-100">
                    <h5 class='m-2 bg-white'><?= $sub_rec_course["book_name"] ?></h5>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <script>
        $(document).ready(function() {
            $('.center').each(function(index) {
                var randomSpeed = 1000 * (index + 1);
                $(this).slick({
                    lazyLoad: 'ondemand',
                    centerMode: true,
                    centerPadding: '60px',
                    slidesToShow: 5,
                    autoplay: true,
                    autoplaySpeed: randomSpeed,
                    responsive: [{
                            breakpoint: 768,
                            settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '40px',
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '40px',
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            });
        });
    </script>