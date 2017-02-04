<?php
/**
 * Created by PhpStorm.
 * User: agomez
 * Date: 03/02/2017
 * Time: 18:15
 */

namespace Cube\Entities;


class Coordinate
{
    private $x;
    private $y;
    private $z;
    private $value;

    /**
     * Coordinate constructor.
     * @param $x
     * @param $y
     * @param $z
     * @param $value
     */
    public function __construct($x, $y, $z, $value)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getZ()
    {
        return $this->z;
    }

    /**
     * @param mixed $z
     */
    public function setZ($z)
    {
        $this->z = $z;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
