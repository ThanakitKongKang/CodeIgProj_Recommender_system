<div class="container" style="min-height:100vh">
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
    ?>
    <button type="button" class="btn btn_linear_theme btn-primary btn-block mb-2 py-3" data-toggle="modal" data-target="#course_registered_modal">
        คอร์สในระบบ
    </button>
    <!-- Modal -->
    <div class="modal fade" id="course_registered_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">course_registered info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <?php
                    print("<pre>" . print_r($course_registered, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn_linear_theme btn-primary btn-block mb-2 py-3" data-toggle="modal" data-target="#course_registered_keyword_modal">
        คีย์เวิร์ดของคอร์สในระบบ 
    </button>
    <div class="modal fade" id="course_registered_keyword_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">course_registered_keyword info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <?php
                    print("<pre>" . print_r($course_registered_keyword, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn_linear_theme btn-primary btn-block mb-2 py-3" data-toggle="modal" data-target="#course_keyword_user_modal">
        คีย์เวิร์ดของคอร์สที่ผู้ใช้ลงทะเบียน
    </button>
    <div class="modal fade" id="course_keyword_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">course keywords by user's registered courses's id</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <?php
                    print("<pre>" . print_r($item, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn_linear_theme btn-primary btn-block mb-2 py-3" data-toggle="modal" data-target="#cosineSim_course_modal">
        หนังสือที่ตรงกับคอร์ส
    </button>
    <div class="modal fade" id="cosineSim_course_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">cosineSim_course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <?php
                    print("<pre>" . print_r($cosineSim_course, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn_linear_theme btn-primary btn-block mb-2 py-3" data-toggle="modal" data-target="#recommend_list_detail_course_modal">
        รายละเอียดหนังสือที่ตรงกับคอร์ส
    </button>
    <div class="modal fade" id="recommend_list_detail_course_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">recommend_list_detail_course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <?php
                    print("<pre>" . print_r($recommend_list_detail_course, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php

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