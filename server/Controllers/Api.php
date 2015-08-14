<?php
namespace Server\Controllers;
include('Recipe.php');

/**
 * Class Api
 *
 * @author Dimitri FRUIT <dim.fruit@gmail.com>
 */
class Api
{
    /**
     * Database connection
     *
     * @var Server\Controllers\Database
     */
    protected $connection;

    public function __construct()
    {
        $this->parsingRequest();
    }

    protected function parsingRequest()
    {
        try {
            if (empty($_POST)) {
                throw new \Exception('No arguments');
            }

            if (!empty($_POST['recipe'])) {
                $this->recipeCall($_POST['recipe']);
            }


        } catch (\Exception $e) {
            //@TODO Redirection to 404 page
        }
    }

    protected function recipeCall($request)
    {
        new Recipe($request);
    }

    protected function searchCall()
    {

    }
}

new Api();