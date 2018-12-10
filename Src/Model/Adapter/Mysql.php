<?php
namespace Oat\Model\Adapter;

use Oat\App\ConfigurationManager;
use Oat\App\Exception\ConfigException;
use PDO;

class Mysql implements AdapterInterface
{

    private $pdo;
    private $configPath;

    public function __construct($independencyContainer)
    {
        $this->configPath = __DIR__ . $independencyContainer->get(ConfigurationManager::class)->get('mysqlsourcepath');
    }



    /**
     * get one user with the ID
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function showOne($userId)
    {
        try {
            $request = $this->getConnection()->prepare('
                SELECT id, login, password, title, lastname, firstname, gender, email, picture, address
                FROM users
                WHERE id = ?
            ');
            $request->execute(array($userId));
            $result = $request->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception($e);
        }

        return $result;
    }

    /**
     * get all the user
     * @return array
     * @throws \Exception
     */
    public function showAll()
    {
        try {
            $request = $this->getConnection()->prepare('
                SELECT id, login, password, title, lastname, firstname, gender, email, picture, address
                FROM users
            ');
            $request->execute();
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception($e);
        }
        return $result;
    }


    /**
     * @return PDO
     * @throws ConfigException
     */
    protected function getConnection()
    {
        if (!$this->pdo) {
            if (!file_exists($this->configPath)) {
                throw new ConfigException('Config file missing');
            }
            $config = parse_ini_file($this->configPath);
            $this->pdo = new PDO('mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'], $config['username'], $config['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }
}