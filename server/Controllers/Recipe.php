<?php
namespace Server\Entities;

use Server\Controllers\Request;
include 'Request.php';

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
    const TABLE = 'recipe';

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
    protected $created_at;

    /**
     * @var string
     */
    protected $updated_at;

    /**
     * Request from front
     *
     * @var string
     */
    protected $request;

    protected $mapping = array(
        'author' => 'author',
        'mail' => 'mail',
        'title' => 'title',
        'dish_type' => 'dishType',
        'tags' => 'tags',
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt'
    );

    /**
     * Constructor
     *
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
        return parent::parseRequest('recipe', $this);
    }

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
    public function setCreated_at($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * @return string
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * @param string $dishType
     */
    public function setDish_type($dishType)
    {
        $this->dish_type = $dishType;
    }

    /**
     * @return string
     */
    public function getDish_type()
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
        $this->tags = explode(' ', $tags);
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
    public function setUpdated_at($updatedAt)
    {
        $this->updated_at = $updatedAt;
    }

    /**
     * @return string
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Load all recipes
     *
     * @return string
     */
    protected function loadAll()
    {
        $url = self::BASE_URL . self::DATABASE . self::TABLE .'/_search';
        return $this->setCollectionFromJson($this->curlCall('{"query":{"match_all":{}}}', $url), $this->mapping, $this);
    }

    /**
     * Load one recipe by her ID
     *
     * @param  $id
     * @return string
     */
    protected function loadById($id)
    {
        $url = self::BASE_URL . self::DATABASE . self::TABLE . '/' . $id;
        return $this->setDataFromObject(json_decode($this->curlCall('', $url))->_source, $this->mapping, $this);
    }

    protected function insert()
    {
        $url = self::BASE_URL . self::DATABASE . self::TABLE;
        $data = $_POST;
        unset($data['recipe']);
        $data['tags'] = explode(' ', $_POST['tags']);
        $data['created_at'] = date('Y-m-d G:i:s');
        $data['updated_at'] = date('Y-m-d G:i:s');

        return $this->curlCall(json_encode($data), $url);
    }
}