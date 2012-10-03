<h1>Greed dice game</h1>

<table>
  <thead>
    <tr>
        <td colspan="5" style="width: 100px;text-align: center;"><b>Dices</b></td>
        <td><b>Score</b></td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($result['throws'] as $throw): ?>
      <tr>
        <?php foreach($throw['dices'] as $dice):?>
          <td><?php echo $dice ?></td>
        <?php endforeach; ?>

        <td><?php echo $throw['score'] ?></td>
      </tr>
    <?php endforeach; ?>
    <tr>
      <td colspan="5"><b>Total score</b></td>
      <td><?php echo $result['score'] ?></td>
    </tr>
  </tbody>
</table>

<?php echo link_to('Roll again', 'game/index');?>

