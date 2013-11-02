<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $chat->getId() ?></td>
    </tr>
    <tr>
      <th>Sales person:</th>
      <td><?php echo $chat->getSalesPersonId() ?></td>
    </tr>
    <tr>
      <th>Chat room:</th>
      <td><?php echo $chat->getChatRoom() ?></td>
    </tr>
    <tr>
      <th>Time entered:</th>
      <td><?php echo $chat->getTimeEntered() ?></td>
    </tr>
    <tr>
      <th>Message:</th>
      <td><?php echo $chat->getMessage() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('podium/edit?id='.$chat->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('podium/index') ?>">List</a>
