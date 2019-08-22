<?php

require_once("recommend.php");
require_once("sample_list.php");


$re = new Recommend();
// $array_data = $re->getRecommendations($books, "jill");
$result = $re->transformPreferences($books);
$array_data = [];

//should be top rated by currently user
$user_books = ['chaos','php in action'];

foreach($user_books as $user_book){
    array_push($array_data,$re->matchItems($result,$user_book));
}


echo "<div class='container'><h1>User-based</h1>";
print("<pre>".print_r($array_data,true)."</pre>");
echo "</div>";
?>