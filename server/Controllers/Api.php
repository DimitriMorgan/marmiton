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

    protected $parsedRequest;

    public function __construct()
    {
         $this->parsedRequest = $this->parsingRequest();
    }

    public function getParsedRequest()
    {
        return $this->parsedRequest;
    }

    protected function parsingRequest()
    {
        try {
            if (empty($_GET)) {
                throw new \Exception('No arguments');
            }

            if (!empty($_GET['recipe'])) {
                return $this->recipeCall($_GET);
            }


        } catch (\Exception $e) {
            //@TODO Redirection to 404 page
        }
    }

    protected function recipeCall($request)
    {
        $recipe = new Recipe($request, new Database());
        return $recipe->getParsedRequest();
    }

    protected function searchCall()
    {

    }
}

$api = new Api();
echo(json_encode($api->getParsedRequest()));die;
