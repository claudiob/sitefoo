<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $sitefoo_user->getId() ?></td>
    </tr>
    <tr>
      <th>First name:</th>
      <td><?php echo $sitefoo_user->getFirstName() ?></td>
    </tr>
    <tr>
      <th>Last name:</th>
      <td><?php echo $sitefoo_user->getLastName() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $sitefoo_user->getEmail() ?></td>
    </tr>
    <tr>
      <th>Birth date:</th>
      <td><?php echo $sitefoo_user->getBirthDate() ?></td>
    </tr>
    <tr>
      <th>Country:</th>
      <td><?php echo $sitefoo_user->getCountry() ?></td>
    </tr>
    <tr>
      <th>Time zone:</th>
      <td><?php echo $sitefoo_user->getTimeZone() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $sitefoo_user->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $sitefoo_user->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('user/edit?id='.$sitefoo_user->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('user/index') ?>">List</a>
