<?php
namespace Server\Controllers;
use Server\Entities\Recipe;

include('Recipe.php');
include('Database.php');

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
     * @var \Server\Controllers\Database
     */
    protected $connection;

    public function __construct()
    {
        $this->parsingRequest();
    }

    protected function parsingRequest()
    {
        try {
            if (empty($_GET)) {
                throw new \Exception('No arguments');
            }

            if (!empty($_GET['recipe'])) {
                $this->recipeCall($_GET);
            }


        } catch (\Exception $e) {
            //@TODO Redirection to 404 page
        }
    }

    protected function recipeCall($request)
    {
        new Recipe($request, new Database());
    }

    protected function searchCall()
    {

    }
}

new Api();