<div class="container">
    <h1 class="display-4">Your Courses</h1>
    <hr class="mb-2 w-50 mr-auto ml-0" style="border: 0;border-top: 3px solid #007bff;">
    <div id="course_content" class="mt-4">
        <!-- content header -->
        <div class="row justify-content-end mx-0 w-100" style="height:5rem;position: relative;background: linear-gradient(to left, #0062E6, #33AEFF);">
            <div class="col-8"></div>
            <div class="col-4 align-self-center text-right font-arial">
                <button class="btn btn-light font-weight-bold text-primary" data-toggle="modal" data-target="#course_registeration"><i class="fas fa-plus pr-3 fa-xs"></i>Add a course</button>
            </div>
        </div>

        <!-- content -->
        <div class="row mx-0 font-arial" style="min-height:25rem;border-bottom-left-radius: 7.5px;border-bottom-right-radius: 7.5px;border:1px solid #4c5a673d;background:#d0e8ff3d">
            <div class="col-12">
                <div class="row py-3 font-weight-bold font-arial" style="color:#004480b5;border-bottom:1px solid #4c5a673d;">
                    <div class="col-1"></div>
                    <div class="col-2">ID</div>
                    <div class="col-7">Name</div>
                    <div class="col-2">Date added</div>
                </div>
                <?php foreach ($course_registered as $course) : ?>
                    <div class="row bg-white py-3" style="color:#004480b5;border-bottom:1px solid #4c5a673d;">
                        <div class="col-1 align-self-center text-center">
                            <input type="checkbox" style="transform: scale(1.5);">
                        </div>
                        <div class="col-2 align-self-center"><?= $course['course_id'] ?></div>
                        <div class="col-7">
                            <div> <?= $course['course_name_en'] ?></div>
                            <div class="font-kanit"><?= $course['course_name_th'] ?></div>
                        </div>
                        <!-- monment js -->
                        <div class="col-2 small align-self-center font-kanit" style="cursor:default" data-time-format="time-ago" data-time-value="<?= $course['date'] ?>" title="<?= $course['date'] ?>"><?= $course['date'] ?></div>

                    </div>
                <?php endforeach; ?>

            </div>
        </div>

        <!-- zero course added -->
        <!-- <div class="text-center font-arial bg-light pb-5 mb-5" style="border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;">
            <img src="<?= base_url() ?>assets/img/clip-list-is-empty.png" style="max-width:45rem" alt="">
            <div class="font-weight-bold" style="color:#164d96">You haven't added any course </div>
            <div class="text-muted">Add a course to get started!</div>
        </div> -->

    </div>
</div>

<!-- Modal -->
<div class="modal fade slide-bottom" id="course_registeration" tabindex="-1" role="dialog" aria-labelledby="course_registeration" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_label">Add a course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body text-center">
                <select class="js-select-course" multiple="multiple" style="width:50%;">
                </select>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" style="display:none;" data-book_id="0" class="btn btn-primary rate_trigger">Submit</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        moment.locale('th');
        // time formatter
        $("[data-time-format]").each(function() {
            var el = $(this);
            switch (el.attr("data-time-format")) {
                case "time-ago":
                    var timeValue = el.attr("data-time-value")
                    var strTimeAgo = moment(timeValue).fromNow();
                    el.text(strTimeAgo);
                    break;
            }
        });

        $('.js-select-course').select2({
            ajax: {
                // url: "https://api.github.com/search/repositories",
                url: '<?php echo base_url('course/select_search'); ?>',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            templateResult: formatResult,
            templateSelection: formatResultSelection,

            placeholder: 'course id, course name',
            allowClear: true,
            minimumInputLength: 1,
        });

        function formatResult(result) {
            if (result.loading) {
                return result.course_name_th;
            }
            var $container = $(
                "<div class='select2-result clearfix'>" +
                "<div class='select2-result__result_id'></div>" +
                "<div class='select2-result__result_name_th'></div>" +
                "<div class='select2-result__result_name_en'></div>" +
                "</div>"
            );

            $container.find(".select2-result__result_id").text(result.course_id);
            $container.find(".select2-result__result_name_th").text(result.course_name_th);
            $container.find(".select2-result__result_name_en").text(result.course_name_en);

            return $container;
        }

        function formatResultSelection(result) {
            return result.course_name_en || result.course_name_th;
        }

    });
</script>