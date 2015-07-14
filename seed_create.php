<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=luto', 'root', '');
    executeQueryFile('./seeds/insert/recipe.sql', $dbh);
    executeQueryFile('./seeds/insert/comment.sql', $dbh);
    executeQueryFile('./seeds/insert/recipe_ingredient_quantity.sql', $dbh);
    executeQueryFile('./seeds/insert/ingredient.sql', $dbh);
    executeQueryFile('./seeds/insert/quantity.sql', $dbh);
    executeQueryFile('./seeds/insert/recipe_tag.sql', $dbh);
    executeQueryFile('./seeds/insert/tag.sql', $dbh);
    executeQueryFile('./seeds/insert/step.sql', $dbh);
    echo "<div>Creation with success</div>";
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}


?>