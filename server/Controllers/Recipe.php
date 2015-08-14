<?php
namespace Server\Entities;

use Server\Controllers\Request;
include '..\Controllers\Request.php';

/**
 * Class Recipe
 *
 * @author Dimitri FRUIT <dim.fruit@gmail.com>
 */
class Recipe extends Request
{
    /**
     * Database path relative to recipe
     */
    const TABLE = 'recipe/';

    /**
     * @var string
     */
    protected $author;

    /**
     * @var string
     */
    protected $mail;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $dish_type;

    /**
     * @var array
     */
    protected $tags;

    /**
     * @var string
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $updatedAt;

    /**
     * Request from front
     *
     * @var string
     */
    protected $request;

    protected $mapping = array(
        '' => ''
    );

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $dish_type
     */
    public function setDishType($dish_type)
    {
        $this->dish_type = $dish_type;
    }

    /**
     * @return string
     */
    public function getDishType()
    {
        return $this->dish_type;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param array $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Constructor
     *
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
        parent::parseRequest();
    }

    /**
     * Load all recipes
     *
     * @return string
     */
    protected function loadAll()
    {
        $url = self::BASE_URL . self::DATABASE . self::TABLE .'_search';
        return $this->curlCall('{"query":{"match_all":{}}}', $url);
    }

    /**
     * Load one recipe by her ID
     *
     * @param  $id
     * @return string
     */
    protected function loadById($id)
    {
        $url = self::BASE_URL . self::DATABASE . self::TABLE . $id;
        return $this->curlCall('', $url);
    }
}