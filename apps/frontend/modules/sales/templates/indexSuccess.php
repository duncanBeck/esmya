<h1><?php echo $selected_user; ?>'s Sales Figures</h1>

<table>
  <thead>
    <tr>
      <th>Date</th>
      <th>Actual sales</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($days as $day): ?>
    <tr>
      <td><a href="<?php echo url_for('sales/show?id='.$day->getId()) ?>"><?php echo $day->getSalesDate() ?></a></td>
      <td><?php echo $day->getActualSales() ?></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('sales/new') ?>">New</a>
