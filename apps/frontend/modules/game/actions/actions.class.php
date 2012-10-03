<?php

/**
 * game actions.
 *
 * @package    greed
 * @subpackage game
 * @author     Abdelmohsen
 *
 */
class gameActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = $form = new DiceForm();

    if($request->isMethod(sfWebRequest::POST))
    {
      $this->form->bind($request->getParameter($form->getName()));
      if($form->isValid())
      {
        $result = $form->play();

        //display the result
        $this->getUser()->setFlash('result',$result);
        $this->redirect("game/result");
      }
    }
  }


 /**
  * Executes index action
  *
  * Display the game score
  */
  public function executeResult()
  {
    if(!$this->getUser()->hasFlash('result'))
    {
      $this->redirect("game/index");
    }

    $this->result = $this->getUser()->getFlash('result');
  }
}
