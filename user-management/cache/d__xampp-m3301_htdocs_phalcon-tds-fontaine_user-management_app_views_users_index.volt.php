<!--Affiche la liste des utilisateurs-->
<div class="ui container">
</br>
<a href="http://localhost/phalcon-tds-FONTAINE/user-management/users/form">
<button class="ui primary button">
  Ajouter un nouvel utilisateur
</button>
</a>

Rechercher : <div class="ui transparent left icon input">
  <input type="text" placeholder="Search...">
  <i class="search icon"></i>
</div>


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
      <td><?= $user->getRole()->getName() ?></td>
      <td>
      <div class="ui buttons">
  	  <button class="ui button">Modifier</button>
  	  <div class="or" data-text="ou"></div>
  	  <button class="ui positive button">Supprimer</button>
	  </div>
      </td>
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
</div>