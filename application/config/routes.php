<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'BooksController';
$route['404_override'] = 'BooksController/notfound_override';
$route['translate_uri_dashes'] = FALSE;
/*
| -------------------------------------------------------------------------
| ABOUT
| -------------------------------------------------------------------------
*/
$route['welcome'] = 'BooksController/welcome';
/*
| -------------------------------------------------------------------------
| FILE UPLOAD
| -------------------------------------------------------------------------
*/
$route['upload-image'] = 'imageuploadcontroller';
$route['store-image'] = 'imageuploadcontroller/store';
/*
| -------------------------------------------------------------------------
| STORING USER DATA in CI SESSIONS
| -------------------------------------------------------------------------
*/
$route['signup'] = 'SessionController/signup';
$route['login'] = 'SessionController/login';
$route['logout'] = 'SessionController/logout';
/*
| -------------------------------------------------------------------------
| INDEX
| -------------------------------------------------------------------------
*/

$route['book/(:num)'] = 'BooksController/book';
$route['books'] = 'BooksController';
$route['admin_index'] = 'BooksController/admin_index';
$route['books/getBooksByCategory'] = 'BooksController/getBooksByCategory';
$route['books/rateBook'] = 'BooksController/rateBook';
$route['books/update_bookmark'] = 'BooksController/update_bookmark';
$route['books/isBookmarked'] = 'BooksController/isBookmarked';
$route['books/getBookRateByUser'] = 'BooksController/getBookRateByUser';
$route['books/loadMoreData'] = 'BooksController/loadMoreData';

/*
| -------------------------------------------------------------------------
| SAVED LIST
| -------------------------------------------------------------------------
*/
$route['saved'] = 'BooksController/saved';

/*
| -------------------------------------------------------------------------
| TEST
| -------------------------------------------------------------------------
*/
$route['test'] = 'BooksController/recommend';
$route['testmode'] = 'BooksController/testmode';

/*
| -------------------------------------------------------------------------
| BROWSE
| -------------------------------------------------------------------------
*/
$route['browse'] = 'BooksController/browse';
$route['browse/(:any)'] = 'BooksController/browse';
$route['books/browse_loadMoreData'] = 'BooksController/browse_loadMoreData';
$route['books/browse_categoryChange'] = 'BooksController/browse_categoryChange';
/*
| -------------------------------------------------------------------------
| SEARCH
| -------------------------------------------------------------------------
*/
$route['search'] = 'SearchController/search';
$route['search/result'] = 'SearchController/search';
$route['search/result/(:num)'] = 'SearchController/search';
$route['search/liveSearch'] = 'SearchController/liveSearch';
/*
| -------------------------------------------------------------------------
| COURSE
| -------------------------------------------------------------------------
*/
$route['course'] = 'CoursesController';
$route['course/select_search'] = 'CoursesController/select_search';
$route['course/add_course'] = 'CoursesController/add_course';
$route['course/delete_course'] = 'CoursesController/delete_course';
$route['seemore'] = 'CoursesController/seemore';
$route['seemore/(:any)'] = 'CoursesController/seemore';


/*
| -------------------------------------------------------------------------
| Rating history
| -------------------------------------------------------------------------
*/
$route['ratinghistory'] = 'BooksController/rating_history';
$route['books/loadMoreData_rating_history'] = 'BooksController/loadMoreData_rating_history';
/*
| -------------------------------------------------------------------------
| Save collection
| -------------------------------------------------------------------------
*/
$route['books/get_collection_by_username'] = 'BooksController/get_collection_by_username';
$route['books/add_to_collection'] = 'BooksController/add_to_collection';
$route['books/remove_from_collection'] = 'BooksController/remove_from_collection';
$route['books/create_collection'] = 'BooksController/create_collection';
$route['books/edit_collection_name'] = 'BooksController/edit_collection_name';
$route['books/delete_collection'] = 'BooksController/delete_collection';
/*
| -------------------------------------------------------------------------
| COMMENT
| -------------------------------------------------------------------------
*/
$route['comment/get'] = 'CommentsController/get';
$route['comment/post'] = 'CommentsController/post';
$route['comment/delete'] = 'CommentsController/delete';
$route['comment/upvote'] = 'CommentsController/upvote';
$route['comment/edit'] = 'CommentsController/edit';
$route['comment/toggle_function'] = 'CommentsController/toggle_function';
/*
| -------------------------------------------------------------------------
| DASHBOARD
| -------------------------------------------------------------------------
*/
$route['dashboard'] = 'DashboardController/book_manage_page';
$route['dashboard/book/manage'] = 'DashboardController/book_manage_page';
$route['dashboard/book/insert'] = 'DashboardController/insert_book_page';

$route['dashboard/user/manage'] = 'DashboardController/user_manage_page';
$route['dashboard/user/comment_manage'] = 'DashboardController/user_comment_manage_page';

$route['dashboard/course/manage'] = 'DashboardController/course_manage_page';
$route['dashboard/course/insert'] = 'DashboardController/course_insert_page';

$route['dashboard/activity/view'] = 'DashboardController/activity_view_page';
$route['dashboard/activity/search'] = 'DashboardController/activity_search_page';



// API
$route['api/book/get'] = 'DashboardController/book_get';
$route['api/book/update'] = 'DashboardController/book_update';
$route['api/book/delete'] = 'DashboardController/book_delete';
$route['api/book/insert'] = 'DashboardController/book_insert';
$route['api/book/name_exists'] = 'DashboardController/isBookNameExists';
$route['api/book/cover_upload'] = 'DashboardController/book_cover_upload';
$route['api/book/file_upload'] = 'DashboardController/book_file_upload';
$route['api/book/is_comment_enable'] = 'DashboardController/isCommentEnabled';

$route['api/user/get'] = 'DashboardController/user_get';
$route['api/user/get_one'] = 'SessionController/user_get_one';
$route['api/user/update'] = 'DashboardController/user_update';
$route['api/user/update_self'] = 'SessionController/user_update_self';
$route['api/user/delete'] = 'DashboardController/user_delete';
$route['api/user/name_exists'] = 'SessionController/isUsernameExists';
$route['api/user/password_match'] = 'SessionController/password_match';
$route['api/user/password_change'] = 'SessionController/password_change';


// $route['api/user/pic_upload'] = 'DashboardController/user_pic_upload';

$route['api/comment/get'] = 'DashboardController/comment_get';
$route['api/comment/delete'] = 'DashboardController/comment_delete';
$route['api/course/get'] = 'DashboardController/course_get';
$route['api/course/get_one'] = 'DashboardController/course_get_by_id';
$route['api/course/update'] = 'DashboardController/course_update';
$route['api/course/update_json'] = 'DashboardController/course_update_json';
$route['api/course/delete'] = 'DashboardController/course_delete';
$route['api/course/id_exists'] = 'DashboardController/isCourseIdExists';
$route['api/course/insert'] = 'DashboardController/course_insert';

$route['api/activity_view/insert'] = 'ActivityController/activity_view';
$route['api/activity_view/get_recently'] = 'ActivityController/get_recently_view';
$route['api/activity_search/get_recently'] = 'ActivityController/get_recently_search';
$route['api/activity_search/get_recently_for_livesearch'] = 'ActivityController/get_recently_for_livesearch';


$route['api/activity/get_dashboard_view'] = 'DashboardController/get_dashboard_view';




























/*
| -------------------------------------------------------------------------
| google form
| -------------------------------------------------------------------------
*/

$route['form'] = 'BooksController/form';

// HCI_EVENT
// $route['books/progress_hci'] = 'BooksController/progress_hci';

/*
| -------------------------------------------------------------------------
| REST API
| -------------------------------------------------------------------------
*/
$route['crsrec'] = 'BooksController/getCourseRecommend';
