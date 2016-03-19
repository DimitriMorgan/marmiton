<?php
namespace Server\Controllers;

/**
 * Class Database
 *
 * @author Dimitri FRUIT <dim.fruit@gmail.com>
 */
class Database
{
    /**
     * Database connection
     *
     * @var \PDO
     */
    protected $connection;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->connection = new \PDO('mysql:host=localhost;dbname=luto', 'root', '');
    }

    /**
     * Select request to DB
     *
     * @param string $request
     * @param string $param
     * @return array
     */
    public function select($request, $param)
    {
        $query = $this->connection->prepare($request);
        $query->execute($param);
        return $query->fetchAll();
    }

    /**
     * Get Connection
     *
     * @return \PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }
}