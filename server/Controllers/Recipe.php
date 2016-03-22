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
    protected $id;

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
     * @var array
     */
    protected $steps;

    /**
     * Request from front
     *
     * @var string
     */
    protected $request;

    protected $databaseHelper;

    protected $mapping = array(
        'id' => 'id',
        'author' => 'author',
        'mail' => 'mail',
        'title' => 'title',
        'dish_type' => 'dish_Type',
        'tags' => 'tags',
        'created_at' => 'created_At',
        'updated_at' => 'updated_At'
    );

    /**
     * Constructor
     *
     * @param \Server\Controllers\Request $request
     * @param \Server\Controllers\Database $databaseHelper
     */
    public function __construct($request, $databaseHelper)
    {
        $this->request = $request;
        $this->databaseHelper = $databaseHelper;
        return parent::parseRequest('recipe', $this);
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
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
        if (is_array($tags)) {
            $this->tags = $tags;
        } else {
            $this->tags = explode(' ', $tags);
        }
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
     * Get steps
     *
     * @return array
     */
    public function getSteps()
    {
        return $this->steps;
    }

    /**
     * Set steps
     *
     * @param array $steps
     * @return array
     */
    public function setSteps($steps)
    {
        $this->steps = $steps;
        return $this;
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
        $this->setDataFromObject(json_decode($this->curlCall('', $url))->_source, $this->mapping, $this);
        return $this->setSteps(
            $this->databaseHelper->select('SELECT * FROM luto.step WHERE step.recipe_id = ? ORDER BY step_order', array($id))
        );
    }

    protected function search($search)
    {
        $search = str_replace(' ', '+', $search);
        $url = self::BASE_URL . self::DATABASE . self::TABLE . '/_search?q=' . "'$search'";

        return $this->setCollectionFromJson($this->curlCall('', $url), $this->mapping, $this);
    }

    protected function insert()
    {
        $url = self::BASE_URL . self::DATABASE . self::TABLE;
        $data = $_POST;

        unset($data['recipe']);
        $data['tags'] = explode(' ', $_POST['tags']);
        $data['created_at'] = date('Y-m-d G:i:s');
        $data['updated_at'] = date('Y-m-d G:i:s');
        $data['notation'] = '-1';
        $data['numberNotation'] = 0;

        $this->insertSteps($data, $this->curlCall(json_encode($data), $url));
    }

    protected function insertSteps($steps, $id)
    {
        $i = 1;
        while ($i < 3) {
            $params = array(
                $steps['step_' . $i . '_title'],
                $steps['step_' . $i . '_description'],
                $i,
                $id
            );

            $this->databaseHelper->insert("INSERT INTO step ('step_title', 'step_description', 'step_order', 'recipe_id') VALUES (?, ?, ?, ?)", $params);
            $i++;
        }
    }
}