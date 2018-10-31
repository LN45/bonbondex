<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 30/10/18
 * Time: 17:31
 */

namespace Model;

/**
 * Class CandyManager
 * @package Model
 */
class CandyManager extends AbstractManager
{
    /**
     *
     */
const TABLE ='candy';

    /**
     * CandyManager constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

}
