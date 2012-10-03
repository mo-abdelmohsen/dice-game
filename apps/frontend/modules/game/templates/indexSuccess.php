<h1>Greed dice game</h1>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo $form->renderFormTag('game/index',array('method' => sfWebRequest::POST ))?>
  <?php echo $form->renderGlobalErrors() ?>
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" value="Play" />
      </td>
    </tr>
  </table>
</form>
