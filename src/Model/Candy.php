<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 30/10/18
 * Time: 17:30
 */

namespace Model;


class Candy
{
    private $id;
    private $name;
    private $id_ean;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIdEan()
    {
        return $this->id_ean;
    }

    /**
     * @param mixed $id_ean
     */
    public function setIdEan($id_ean)
    {
        $this->id_ean = $id_ean;
    }
}
