<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $day->getId() ?></td>
    </tr>
    <tr>
      <th>Date:</th>
      <td><?php echo $day->getSalesDate() ?></td>
    </tr>
    <tr>
      <th>Actual sales:</th>
      <td><?php echo $day->getActualSales() ?></td>
    </tr>
    <tr>
      <th>Sales person:</th>
      <td><?php echo $day->getSalesPersonId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('sales/edit?id='.$day->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('sales/index') ?>">List</a>
