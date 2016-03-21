<?php
try {
    $pass = '';
    if (empty($_ENV['LUTO'])) {
        $pass = 'titi';
    }
    $dbh = new PDO('mysql:host=localhost;dbname=luto', 'root', $pass);
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

function executeQueryFile($filesql, $dbh) {
    $query = file_get_contents($filesql);
    $array = explode(";\n", $query);
    $b = true;
    for ($i=0; $i < count($array) ; $i++) {
        $str = $array[$i];
        if ($str != '') {
            $str .= ';';
            $dbh->query($str);
        }
    }

    return $b;
}
?>