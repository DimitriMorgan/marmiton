<?php
class BaseController
{
    public function __construct()
    {
        $recipeGet = (!empty($_GET['recipe']) ? $_GET['recipe'] : '');

        if (!empty($recipeGet)) {
            if ($recipeGet == 'insert') {
                return $this->insertAction();
            }
            return $this->recipeAction($recipeGet);
        }
        return $this->indexAction();
    }

    public function indexAction()
    {
        $recipes = $this->curlCall('http://localhost/server/Controllers/Api.php?recipe=all');
        $this->loadView('home', $recipes);
    }

    public function recipeAction($id)
    {
        $recipe = $this->curlCall('http://localhost/server/Controllers/Api.php?recipe=' . $id);
        if (empty($recipe)) {

            $this->loadView('404');
            return;
        }
        $this->loadView('recipe', $recipe);
    }

    public function insertAction()
    {
        $this->loadView('insert');
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

    private function loadView($view, $options = null)
    {
        include_once('./client/assets/template/header.php');
        include_once('./client/'.$view.'.php');
        include_once('./client/assets/template/footer.php');
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

<!--

          (__)
          (oo)
    /------\/
   / |    ||
  *  /\---/\
     ~~   ~~

Luto !
-->
