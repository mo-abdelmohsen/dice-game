<?php

/**
 *Dices form.
 *
 * @package    greed
 * @subpackage form
 * @author     Abdelmohsen
 */
class DiceForm extends BaseForm
{

  public function configure()
  {
    $this->setWidgets(array(
      'rolls' => new sfWidgetFormInputText()
    ));

    $this->setValidators(array(
      'rolls' => new sfValidatorInteger(array('required' => true, 'min' => 1 , 'max' => 50)),
    ));

    $this->widgetSchema->setNameFormat('dice[%s]');

  }

 /**
  * roll the dices and get the score
  *
  * @return array
  */
  public function play()
  {
    $rolls = $this->getValue('rolls');
    $dices = new Dices();
    $gameResult = array();
    $gameResult['score'] = 0;

    for($i = 0;$i < $rolls ; $i++)
    {
      $gameResult['throws'][$i]['dices'] = $dicesRoll = $dices->rollGroup(5);
      $gameResult['throws'][$i]['score'] = $score =$this->calculateRollResult($dicesRoll);
      $gameResult['score'] += $score;
    }

    return $gameResult;
  }

 /**
  *
  * get score for every roll
  *
  * @param $dicesRoll
  * @return int|string
  *
  */
  protected function calculateRollResult($dicesRoll)
  {
    $dicesCount = array_count_values($dicesRoll);

    $score = 0;

    foreach ($dicesCount as $side => $count)
    {
      $chunksOfThree = intval($count / 3);
      $count  %= 3;

      switch($side)
      {
        case 1:
          $score += (1000 * $chunksOfThree);
          $score += (100  * $count);
          break;
        case 5:
          $score += (50 * $count);
        default:
          $score += $side * $chunksOfThree * 100;
          break;
      }
    }

    return $score;
  }
}
