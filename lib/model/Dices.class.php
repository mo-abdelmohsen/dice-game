<?php
/**
 * Dices object
 *
 * @package    greed
 * @subpackage model
 * @author     Abdelmohsen
 */

class Dices
{
 /**
  * @param int $sides
  * @return int
  */
  public function rollOne ($sides = 6)
  {
    return mt_rand(1,$sides);
  }

 /**
  * @param int $dicesNumber
  * @param int $sides
  * @return array
  *
  */
  public function rollGroup($dicesNumber = 5 ,$sides = 6)
  {
    $result =  array();
    for($i = 0;$i<$dicesNumber;$i++){
       $result[] = $this->rollOne($sides);
    }

    return $result;
  }


}
