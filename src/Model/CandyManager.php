<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 31/10/18
 * Time: 00:19
 */

namespace Model;


class CandyManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'candy';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }



    public function insert(Candy $candy): int
    {
        // prepared request
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`id`,`name`,`url`) VALUES (:id, :name , :url)");
        $statement->bindValue('id', $candy->getId(), \PDO::PARAM_INT);
        $statement->bindValue('name', $candy->getName(), \PDO::PARAM_STR);
        $statement->bindValue('url', $candy->getUrl(), \PDO::PARAM_STR);

        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }

}