<!--Affiche la liste des utilisateurs-->
<div class="ui container">
</br>
<?= $this->tag->linkTo(['users/form', '
<button class=\'ui primary button\' >
 <i class=\'add user icon yellow\' ></i> Ajouter un nouvel utilisateur
</button>']) ?>
<div class="ui transparent left icon input">
  <input type="text" placeholder="Search...">
  <i class="search icon"></i>
</div>


<table class="ui inverted table">
  <thead>
    <tr><th><div class="ui checkbox "> <input type="checkbox" name="check"></div></th>
    <th>Id</th>
    <th>Login</th>
    <th>Prénom</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Role</th>
    <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) { ?>
    <tr>
      <td><div class="ui checkbox "> <input type="checkbox" name="check"></div></td>
      <td><?= $user->getId() ?></td>
      <td><?= $user->getLogin() ?></td>
      <td><?= $user->getFirstname() ?></td>
      <td><?= $user->getLastname() ?></td>
      <td><?= $user->getEmail() ?></td>
      <td><?= $user->getRole()->getName() ?></td>
      <td>
        <?= $this->tag->linkto('users/form/update', '<i class=\'write icon\'></i>') ?>
        <?= $this->tag->linkto('users/form/delete', '<i class=\'erase icon red\'></i>') ?>
      </td>
    </tr>
   <?php } ?>
  </tbody>
  <tfoot>
    <tr><th colspan="8">
      <div class="ui right floated pagination menu">
        <a class="icon item">
          <i class="left chevron icon"></i>
        </a>
        <a class="item active">1</a>
        <a class="item">2</a>
        <a class="item">3</a>
        <a class="item">4</a>
        <a class="icon item">
          <i class="right chevron icon"></i>
        </a>
      </div>
    </th>
  </tr></tfoot>
</table>
</div>