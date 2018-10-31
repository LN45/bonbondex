<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 31/10/18
 * Time: 00:19
 */

namespace Model;


/**
 * Class CandyManager
 * @package Model
 */
class HomeManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'home';

    /**
     *  Initializes this class.
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE, $pdo);
    }

}
