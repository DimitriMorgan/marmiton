<?php
try {
    $pass = '';
    if (empty($_ENV['LUTO'])) {
        $pass = 'titi';
    }
    $dbh = new PDO('mysql:host=localhost;dbname=luto', 'root', $pass);
    executeQueryFile('./seeds/rollback/drop_all.sql', $dbh);
    echo "<div>Delete complete with success</div>";
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
