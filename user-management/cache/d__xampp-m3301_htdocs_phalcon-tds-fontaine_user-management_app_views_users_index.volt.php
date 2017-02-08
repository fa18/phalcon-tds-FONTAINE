<!--Affiche la liste des utilisateurs-->

<p>Affichage des utilisateurs</p>


<table class="ui inverted table">
  <thead>
    <tr><th>Id</th>
    <th>Login</th>
    <th>Prénom</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Role</th>
    <th>Action</th>
  </tr></thead>
  <tbody>
    <?php foreach ($users as $user) { ?>
    <tr>
    <td><?= $user->getId() ?></td>
      <td><?= $user->getLogin() ?></td>
      <td><?= $user->getFirstname() ?></td>
      <td><?= $user->getLastname() ?></td>
      <td><?= $user->getEmail() ?></td>
      <td><?= $user->getIdrole() ?></td>
      
    </tr>
   <?php } ?>
  </tbody>
  <tfoot>
    <tr><th colspan="3">
      <div class="ui right floated pagination menu">
        <a class="icon item">
          <i class="left chevron icon"></i>
        </a>
        <a class="item">1</a>
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



