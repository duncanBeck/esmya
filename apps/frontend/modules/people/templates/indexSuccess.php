<h1>This Month's Summary - September</h1>
<h1><?php echo $selected_user; ?>'s </h1>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Add Sales</th>
      <th>Target</th>
      <th>Active</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($sales_persons as $sales_person): ?>
    <tr>
      <td><?php echo $sales_person->getName() ?></td>
        <td><a href="<?php echo url_for('sales/index?sale_id='.$sales_person->getId()) ?>">Sales!</a></td>
        <td><a href="<?php echo url_for('targets/index?sale_id='.$sales_person->getId()) ?>">Targets!</td>
      <td><a href="<?php echo url_for('people/show?id='.$sales_person->getId()) ?>"><?php echo ($sales_person->getIsActive()) ? 'yes':'no'; ?></a></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php /*
  *
    <a href="<?php echo url_for('people/new') ?>">New</a>
*/
?>
