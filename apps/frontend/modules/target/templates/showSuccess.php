<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $target->getId() ?></td>
    </tr>
    <tr>
      <th>Sales target:</th>
      <td><?php echo $target->getSalesTarget() ?></td>
    </tr>
    <tr>
      <th>Time period:</th>
      <td><?php echo $target->getTimePeriod() ?></td>
    </tr>
    <tr>
      <th>Sales person:</th>
      <td><?php echo $target->getSalesPersonId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('target/edit?id='.$target->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('target/index') ?>">List</a>
