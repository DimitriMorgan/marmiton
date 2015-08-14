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
     * @var PDO
     */
    protected $connection;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=luto', 'root', '');
    }

    /**
     * Get Connection
     *
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }
}