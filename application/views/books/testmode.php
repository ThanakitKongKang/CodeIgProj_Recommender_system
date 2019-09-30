<div class="container">
    <?php
    echo "<div class='container'><h4>books_name</h4>";
    print("<pre>" . print_r($books_name, true) . "</pre>");
    echo "</div>";

    echo "<div class='container'><h4>Term Frequency</h4>";
    print("<pre>" . print_r($words_segment, true) . "</pre>");
    echo "</div>";

    echo "<div class='container'><h4>transformer</h4>";
    print("<pre>" . print_r($tf_no_stopwords, true) . "</pre>");
    echo "</div>";

    echo "<div class='container'><h4>cosine similarity</h4>";
    print("<pre>" . print_r($cosineSim, true) . "</pre>");
    echo "</div>";
    ?>
</div>