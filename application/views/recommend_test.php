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

http: //localhost/CodeIgProj_Recommender_system/user_guide/database/results.html


if ($this->session->userdata('flash_success')) {
    ?>
    <div class="alert alert-success" role="alert">
        A simple success alert—check it out!
    </div>
<?php
}

echo "<div class='container'><h1>raw user rate</h1>";
print("<pre>" . print_r($raw_books, true) . "</pre>");
echo "</div>";

echo "<div class='container'><h1>raw user rate (flipped)</h1>";
print("<pre>" . print_r($books, true) . "</pre>");
echo "</div>";

echo "<div class='container'><h1>after matching </h1>";
echo "<div class='container'><h3>target list </h3>";
echo "<div class='text-primary'>";
foreach ($target_books as $target_book) {
    echo $target_book . "<br>";
}
echo "</div></div>";

echo "<div class='container'><h1>Item-based (after avg&flatten)</h1>";
print("<pre>" . print_r($recommend_flattened, true) . "</pre>");
echo "</div>";

echo "<div class='container'><h1>recommended book list (must be new to user)</h1>";
print("<pre>" . print_r($recommend_list, true) . "</pre>");
echo "</div>";

echo "<div class='container'><h1>random strategy list</h1>";
print("<pre>" . print_r($list_bookname_to_merge, true) . "</pre>");
echo "</div>";

echo "<div class='container'><h1>merge recommended book with random strategy to make it 9</h1>";
print("<pre>" . print_r($recommend_list_bookname, true) . "</pre>");
echo "</div>";

echo "<div class='container'><h1>Final recommend list</h1>";
print("<pre>" . print_r($final_recommend_list, true) . "</pre>");
echo "</div>";
?>