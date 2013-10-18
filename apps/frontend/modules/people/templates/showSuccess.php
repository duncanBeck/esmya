<table>
  <tbody>
    <tr>

    <tr>
      <th>Name:</th>
      <td><?php echo $sales_person->getName() ?></td>
    </tr>
    <tr>
      <th>Region:</th>
      <td><?php echo $sales_person->getRegion() ?></td>
    </tr>

    <tr>
      <th>Is active:</th>
      <td><?php echo $sales_person->getIsActive() ?></td>
    </tr>

  </tbody>
</table>

<hr />

<a href="<?php echo url_for('people/edit?id='.$sales_person->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('people/index') ?>">List</a>
