<div class="container" style="min-height:100vh">
    <?php
    echo "<form action='testmode' class='mt-3 mb-5' method='post'>
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
    <button type="button" class="btn bg_linear_theme btn-primary   mb-2 py-3" data-toggle="modal" data-target="#target_books" title="ผู้ใช้ได้ให้คะแนนสูงสุด">
        หนังสือที่เป็นเป้าหมาย
    </button>
    <!-- Modal -->
    <div class="modal fade" id="target_books" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
                    <h5 class="modal-title" id="exampleModalLabel">course_registered info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <?php
                    print("<pre>" . print_r($target_books, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn bg_linear_theme btn-primary   mb-2 py-3" data-toggle="modal" data-target="#raw_books" title="หนังสือที่ผู้ใช้แต่ละคนให้คะแนน">
        การให้คะแนนทั้งหมดในระบบ
    </button>
    <!-- Modal -->
    <div class="modal fade" id="raw_books" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
                    <h5 class="modal-title" id="exampleModalLabel">course_registered info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <?php
                    print("<pre>" . print_r($books, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn bg_linear_theme btn-primary   mb-2 py-3" data-toggle="modal" data-target="#recommend_matched" title="ผลลัพธ์ของการหา Similarity โดยใช้ Euclidean distance">
        หนังสือที่แนะนำ (each of target book)
    </button>
    <!-- Modal -->
    <div class="modal fade" id="recommend_matched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
                    <h5 class="modal-title" id="exampleModalLabel">course_registered info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <?php
                    print("<pre>" . print_r($recommend_matched, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn bg_linear_theme btn-primary   mb-2 py-3" data-toggle="modal" data-target="#final_recommend_list" title="รายละเอียดของหนังสือที่แนะนำ">
        ลิสต์หนังสือแนะนำ
    </button>
    <!-- Modal -->
    <div class="modal fade" id="final_recommend_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
                    <h5 class="modal-title" id="exampleModalLabel">course_registered info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <?php
                    print("<pre>" . print_r($final_recommend_list, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end collaborative -->
    <hr class="my-3 mb-4">

    <button type="button" class="btn bg_linear_theme btn-primary   mb-2 py-3" data-toggle="modal" data-target="#course_registered_modal">
        คอร์สที่ลงทะเบียน
    </button>
    <!-- Modal -->
    <div class="modal fade" id="course_registered_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
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

    <button type="button" class="btn bg_linear_theme btn-primary   mb-2 py-3" data-toggle="modal" data-target="#course_registered_keyword_modal">
        คีย์เวิร์ดของคอร์สในระบบ
    </button>
    <div class="modal fade" id="course_registered_keyword_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
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

    <button type="button" class="btn bg_linear_theme btn-primary   mb-2 py-3" data-toggle="modal" data-target="#course_keyword_user_modal">
        คีย์เวิร์ดของคอร์สที่ผู้ใช้ลงทะเบียน
    </button>
    <div class="modal fade" id="course_keyword_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
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

    <button type="button" class="btn bg_linear_theme btn-primary   mb-2 py-3" data-toggle="modal" data-target="#cosineSim_course_modal">
        หนังสือที่ตรงกับคอร์ส
    </button>
    <div class="modal fade" id="cosineSim_course_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
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

    <button type="button" class="btn bg_linear_theme btn-primary   mb-2 py-3" data-toggle="modal" data-target="#recommend_list_detail_course_modal">
        รายละเอียดหนังสือที่ตรงกับคอร์ส
    </button>
    <div class="modal fade" id="recommend_list_detail_course_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
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
    <hr class="my-3 mb-4">
    <button type="button" class="btn bg_linear_theme btn-primary mb-2 py-3" data-toggle="modal" data-target="#getActivityRecommend_viewed">
        รายการที่แนะนำจากการ View
    </button>
    <div class="modal fade" id="getActivityRecommend_viewed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
                    <h5 class="modal-title" id="exampleModalLabel">getActivityRecommend_viewed</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <h4 class="display-4 text-center text_gradient_theme">การดูล่าสุด</h4>
                    <?php
                    print("<pre>" . print_r($recently_view, true) . "</pre>");
                    ?>
                    <hr class="my-3 mb-4">

                    <h4 class="display-4 text-center text_gradient_theme">รายการแนะนำ</h4>
                    <?php
                    print("<pre>" . print_r($getActivityRecommend_viewed, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn bg_linear_theme btn-primary mb-2 py-3" data-toggle="modal" data-target="#getActivityRecommend_search">
        รายการที่แนะนำจากการ Search
    </button>
    <div class="modal fade" id="getActivityRecommend_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
                    <h5 class="modal-title" id="exampleModalLabel">getActivityRecommend_search</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <h4 class="display-4 text-center text_gradient_theme">การ Search ล่าสุด</h4>
                    <?php
                    print("<pre>" . print_r($recently_search, true) . "</pre>");
                    ?>
                    <hr class="my-3 mb-4">

                    <h4 class="display-4 text-center text_gradient_theme">รายการแนะนำ</h4>
                    <?php
                    print("<pre>" . print_r($getActivityRecommend_search, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn bg_linear_theme btn-primary mb-2 py-3" data-toggle="modal" data-target="#getActivity_popular">
        กำลังฮิต
    </button>
    <div class="modal fade" id="getActivity_popular" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
                    <h5 class="modal-title" id="exampleModalLabel">getActivity_popular</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <h4 class="display-4 text-center text_gradient_theme">กำลังฮิตในสัปดาห์</h4>
                    <?php
                    print("<pre>" . print_r($getActivity_popular, true) . "</pre>");
                    ?>
                </div>
                <div class="edit_footer modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn bg_linear_theme btn-primary mb-2 py-3" data-toggle="modal" data-target="#getActivity_viewAgain">
        ดูอีกครั้ง
    </button>
    <div class="modal fade" id="getActivity_viewAgain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg_linear_theme">
                    <h5 class="modal-title" id="exampleModalLabel">getActivity_viewAgain</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4">
                    <h4 class="display-4 text-center text_gradient_theme"> ดูอีกครั้ง</h4>
                    <?php
                    print("<pre>" . print_r($getActivity_viewAgain, true) . "</pre>");
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

    ?>

    <script>
        $(document).ready(function() {

        });
    </script>