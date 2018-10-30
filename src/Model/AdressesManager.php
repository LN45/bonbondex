<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace Model;

/**
 *
 */
class AdressesManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'adresses';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

    public function update(AdressesManager $bonbonDex):int
    {
        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET `nom` = :nom WHERE id=:id");
        $statement->bindValue('id', $bonbonDex->getId(), \PDO::PARAM_INT);
        $statement->bindValue('nom', $bonbonDex->getName(), \PDO::PARAM_STR);

        return $statement->execute();
    }
}
