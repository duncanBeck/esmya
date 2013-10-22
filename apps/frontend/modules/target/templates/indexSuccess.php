<h1>Targets List</h1>
<h1><?php echo $selected_user; ?>'s </h1>

<table>
  <thead>
    <tr>
      <th>Month Starting</th>
      <th>Sales target</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($targets as $target): ?>
    <tr>
        <td><a href="<?php echo url_for('target/show?id='.$target->getId()) ?>"><?php echo $target->getTimePeriod() ?></a></td>
      <td><?php echo $target->getSalesTarget() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('target/new') ?>">New</a>
