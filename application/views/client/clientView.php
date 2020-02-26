<h1> <?php echo $title; ?> </h1>

<table>
  <?php foreach ($clients as $client): ?> 
  <tr>
    <td> <?php echo $client['nomClient']; ?> </td>
    <td> <?php echo $client['numClient']; ?> </td>
    <td> <?php echo $client['adresse']; ?> </td>
    <td> <?php echo $client['numTel']; ?> </td>
    <td> <?php echo $client['mail']; ?> </td>
  </tr>
<?php endforeach; ?>
</table>