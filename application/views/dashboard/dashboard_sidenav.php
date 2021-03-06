<nav class="main-menu nav_dashboard">
    <ul id="nav_dashboard_books">
        <li><i class="fas fa-book-open nav_header_icon"></i>
            <span class="nav_header text-muted">Book</span></li>
        <li class="nav_dashboard <?php if (isset($isBookManage)) echo $isBookManage; ?>">
            <a href="<?= base_url() ?>dashboard/book/manage">
                <i class="fas fadb fa-edit fa-2x"></i>
                <span class="nav_dashboard-text">
                    Manage Book
                </span>
            </a>

        </li>
        <li class="<?php if (isset($isInsert)) echo $isInsert; ?>">
            <a href="<?= base_url() ?>dashboard/book/insert">
                <i class="fas fadb fa-plus-square fa-2x"></i>
                <span class="nav_dashboard-text">
                    Insert Book
                </span>
            </a>

        </li>

    </ul>

    <ul id="nav_dashboard_users">
        <li><i class="fas fa-user nav_header_icon"></i><span class="nav_header text-muted">User</span></li>
        <li class="nav_dashboard <?php if (isset($isUserManage)) echo $isUserManage; ?>">
            <a href="<?= base_url() ?>dashboard/user/manage">
                <i class="fas fadb fa-user-edit fa-2x"></i>
                <span class="nav_dashboard-text">
                    Manage User
                </span>
            </a>
        </li>
        <li class="nav_dashboard <?php if (isset($isComment)) echo $isComment; ?>">
            <a href="<?= base_url() ?>dashboard/user/comment_manage">
                <i class="fas fadb fa-list fa-2x"></i>
                <span class="nav_dashboard-text">
                    Manage Comment
                </span>
            </a>
        </li>
    </ul>
    <ul id="nav_dashboard_courses">
        <li><i class="fas fa-book-reader nav_header_icon"></i><span class="nav_header text-muted">Course</span></li>
        <li class="nav_dashboard <?php if (isset($isCourse)) echo $isCourse; ?>">
            <a href="<?= base_url() ?>dashboard/course/manage">
                <i class="fas fadb fa-book fa-2x"></i>
                <span class="nav_dashboard-text">
                    Manage Course
                </span>
            </a>
        </li>
        <li class="nav_dashboard <?php if (isset($isInsertCourse)) echo $isInsertCourse; ?>">
            <a href="<?= base_url() ?>dashboard/course/insert">
                <i class="far fadb fa-plus-square fa-2x"></i>
                <span class="nav_dashboard-text">
                    Insert Course
                </span>
            </a>
        </li>
    </ul>

    <ul id="nav_dashboard_activity">
        <li><i class="fas fa-chart-line nav_header_icon"></i><span class="nav_header text-muted">Activity</span></li>
        <li class="nav_dashboard <?php if (isset($isActivity_view)) echo $isActivity_view; ?>">
            <a href="<?= base_url() ?>dashboard/activity/view">
                <i class="fas fadb fa-eye fa-2x"></i>
                <span class="nav_dashboard-text">
                    View Activity
                </span>
            </a>
        </li>
        <li class="nav_dashboard <?php if (isset($isActivity_search)) echo $isActivity_search; ?>">
            <a href="<?= base_url() ?>dashboard/activity/search">
                <i class="fas fadb fa-search fa-flip-horizontal fa-2x"></i>
                <span class="nav_dashboard-text">
                    Search Activity
                </span>
            </a>
        </li>
    </ul>
</nav>
<!-- end nav -->