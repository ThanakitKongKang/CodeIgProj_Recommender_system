<?php


// $re = new Recommend();
// $array_data = $re->getRecommendations($books, "jill");
// $result = $re->transformPreferences($books);
// $array_data = [];

//should be top rated by currently user
// $user_books = ['chaos','php in action'];

// foreach($user_books as $user_book){
//     array_push($array_data,$re->matchItems($result,$user_book));
// }

http://localhost/CodeIgProj_Recommender_system/user_guide/database/results.html
https://stackoverflow.com/questions/369602/deleting-an-element-from-an-array-in-php

echo "<div class='container'><h1>raw user rate</h1>";
print("<pre>".print_r($raw_books,true)."</pre>");
echo "</div>";

echo "<div class='container'><h1>raw user rate (flipped)</h1>";
print("<pre>".print_r($books,true)."</pre>");
echo "</div>";

echo "<div class='container'><h1>after matching </h1>";
echo "<div class='container'><h3>target list </h3>";
foreach($target_books as $target_book){
    echo $target_book ."<br>";
}
print("<pre>".print_r($recommend_flattened,true)."</pre>");
echo "</div>";

echo "<div class='container'><h1>Item-based (after avg&flatten)</h1>";
print("<pre>".print_r($recommend_list,true)."</pre>");
echo "</div>";
?>