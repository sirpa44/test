<?php

namespace Oat\Model\Adapter;

use PDO;

class Database implements AdapterInterface
{

    private $pdo;
    private $configPath = __DIR__ . '/../../../config/database.ini';

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $config = parse_ini_file($this->configPath);
        $this->pdo = new PDO('mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'], $config['username'], $config['password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    /**
     * get one user with the ID
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function showOne($id)
    {
        $request = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $request->execute(array($id));
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * get all the user
     * @return array
     */
    public function showAll()
    {
        $request = $this->pdo->prepare('SELECT * FROM users');
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
}