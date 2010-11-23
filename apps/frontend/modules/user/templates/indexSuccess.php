<h1>Sitefoo users List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Email</th>
      <th>Birth date</th>
      <th>Country</th>
      <th>Time zone</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sitefoo_users as $sitefoo_user): ?>
    <tr>
      <td><a href="<?php echo url_for('user/show?id='.$sitefoo_user->getId()) ?>"><?php echo $sitefoo_user->getId() ?></a></td>
      <td><?php echo $sitefoo_user->getFirstName() ?></td>
      <td><?php echo $sitefoo_user->getLastName() ?></td>
      <td><?php echo $sitefoo_user->getEmail() ?></td>
      <td><?php echo $sitefoo_user->getBirthDate() ?></td>
      <td><?php echo $sitefoo_user->getCountry() ?></td>
      <td><?php echo $sitefoo_user->getTimeZone() ?></td>
      <td><?php echo $sitefoo_user->getCreatedAt() ?></td>
      <td><?php echo $sitefoo_user->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('user/new') ?>">New</a>
