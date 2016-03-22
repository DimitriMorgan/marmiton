<?php
class BaseController
{
    public function __construct()
    {
        $this->indexAction();
    }

    public function indexAction()
    {
        $recipes = $this->curlCall('http://localhost/server/Controllers/Api.php?recipe=all');
        include_once('./client/test.php');
    }

    private function curlCall($url)
    {
        //  Initiate curl
        $ch = curl_init();

        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
new BaseController();
?>


<!--<form action="server/Controllers/Api.php">
    <input name="recipe" value="insert">
    <input name="author" value="author-test">
    <input name="mail" value="mail-test">
    <input name="title" value="title-test">
    <input name="dish_type" value="dish-type-test">
    <input name="tags" value="tags-test">
    <input name="step_1_title" value="titre etape 1">
    <input name="step_1_description" value="description etape 1">
    <input name="step_2_title" value="titre etape 2">
    <input name="step_2_description" value="description etape 2">
    <input name="step_3_title" value="titre etape 3">
    <input name="step_3_description" value="description etape 3">
    <input name="search" value="bon marché">
    <input type="submit">
</form>

<form method="GET" action="server/Controllers/Api.php">
    <input name="recipe" value="search">
    <input name="search" value="citron">
</form>-->