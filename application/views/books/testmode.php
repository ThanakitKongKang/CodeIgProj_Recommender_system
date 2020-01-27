<div class="container">
    <?php
    echo "<form action='testmode' class='mt-3 mb-3' method='post'>
 <input type='text' name='cosineCheckCourse1' class='form-control w-25' style='display:inline-block;'  pattern='^[a-zA-Z]+[0-9]{6}|[0-9]{6}' title='6 letters of numbers. Starts with english letter is optional e.g. SC312002' value='$cosineCheckCourse1' placeholder='course id e.g. SC312002,SC312006' required>
 <input type='number' name='cosineCheckCourse2' class='form-control w-25' style='display:inline-block;' value='$cosineCheckCourse2'  placeholder='book id' required>
 <button type='submit' id='cosineSubmit' class='btn btn-outline-success'>Cosine Check</button>
</form>";

    if (!empty($cosineCheckCourse1)) {
        echo "<div class='container font-arial text-secondary'><h5>Dot product : $dot_product_string = <span class='text-primary'>" .  round($dotproductCourse, 4) . "</span></h5>";
        echo "</div>";
        echo "<div class='container font-arial text-secondary'><h5>Magnitude : (" . round($magnitude1, 4) . "*" . round($magnitude2, 4) . ") = <span class='text-primary'>" .  round($magnitudeCourse, 4) . "</span></h5>";
        echo "</div>";
        echo "<div class='container font-arial text-muted'><h4>cosine similarity between [$cosineCheckCourse1] and [$cosineCheckCourse2] is : " .  round($dotproductCourse, 4) . "/" .  round($magnitudeCourse, 4) . " = <span class='text-primary'>" . round($cosineSimCourse, 4) . "</span></h4>";
        echo "</div>";

        print("<pre class='text-primary'>[$cosineCheckCourse1] " . print_r($course_kwd[$cosineCheckCourse1], true) . "</pre>");
        print("<pre class='text-primary'>[$cosineCheckCourse2] " . print_r($tf_idf2[$cosineCheckCourse2 - 1], true) . "</pre>");
    }

    // echo "<form action='testmode' class='mt-3 mb-3' method='post'>
    //     <input type='number' name='cosineCheck1' class='form-control w-25' style='display:inline-block;' value='$cosineCheck1' required>
    //     <input type='number' name='cosineCheck2' class='form-control w-25' style='display:inline-block;' value='$cosineCheck2' required>
    //     <button type='submit' id='cosineSubmit' class='btn btn-outline-primary'>Cosine Check</button>
    // </form>";

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

    <script>
        $(document).ready(function() {

        });
    </script>