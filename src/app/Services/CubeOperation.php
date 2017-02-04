<?php
/**
 * Created by PhpStorm.
 * User: agomez
 * Date: 04/02/2017
 * Time: 17:58
 */

namespace Cube\Services;

use Cube\Entities\Coordinate;

class CubeOperation
{

    private $cubeData;

    /**
     * CubeOperation constructor.
     * @param $input
     */
    public function __construct($input)
    {
        $this->cubeData = $input;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function isValid()
    {
        foreach ($this->cubeData as $row) {
            if (isset($row['operation']) && isset($row['params'])) {
                $operation = $row['operation'];
                if ($operation == "update") {
                    if (sizeof($row['params']) != 4) {
                        throw new \Exception("Invalid number of values for update operation");
                    }
                } elseif ($operation == "query") {
                    if (sizeof($row['params']) != 6) {
                        throw new \Exception("Invalid number of values for query operation");
                    }
                }else {
                    throw new \Exception("Invalid operation");
                }
            }
        }
        return true;
    }

    /**
     * @return array
     */
    public function execute()
    {
        $this->isValid();

        $matrix = [];
        $total = [];

        foreach ($this->cubeData as $row) {
            $operation = $row['operation'];
            if ($operation == "update") {
                if (sizeof($row['params']) == 4) {
                    $x = $row['params'][0];
                    $y = $row['params'][1];
                    $z = $row['params'][2];
                    $value = $row['params'][3];
                    $matrix = self::update($x, $y, $z, $value, $matrix);
                    continue;
                }
            } elseif ($operation == "query") {
                if (sizeof($row['params']) == 6) {
                    $x1 = $row['params'][0];
                    $y1 = $row['params'][1];
                    $z1 = $row['params'][2];
                    $x2 = $row['params'][3];
                    $y2 = $row['params'][4];
                    $z2 = $row['params'][5];
                    $total[] = self::query($matrix, $x1, $y1, $z1, $x2, $y2, $z2);
                    continue;
                }
            }
        }
        return $total;
    }

    /**
     * @param $x
     * @param $y
     * @param $z
     * @param $value
     * @param $matrix
     * @return mixed
     */
    public static function update($x, $y, $z, $value, $matrix)
    {
        $matrix[] = new Coordinate($x, $y, $z, $value);
        return $matrix;
    }

    /**
     * @param $matrix
     * @param $x1
     * @param $y1
     * @param $z1
     * @param $x2
     * @param $y2
     * @param $z2
     * @return int|mixed
     */
    public static function query($matrix, $x1, $y1, $z1, $x2, $y2, $z2)
    {
        $summation = 0;
        /** @var Coordinate $coordinate */
        foreach ($matrix as $coordinate) {
            if ($coordinate->getX() >= $x1 && $coordinate->getX() <= $x2
                && $coordinate->getY() >= $y1 && $coordinate->getY() <= $y2
                && $coordinate->getZ() >= $z1 && $coordinate->getZ() <= $z2
            )
                $summation += $coordinate->getValue();
        }
        return $summation;
    }
}
