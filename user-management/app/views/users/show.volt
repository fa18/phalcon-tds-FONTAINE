
<!-- Affiche le formulaire de modification/ajout d'un utilisateur-->
</br>
	<div class="ui container">
	<div>
	{{link_to("users/index","
	<i class='reply icon'> </i>Retour à la liste des utilisateurs")}}
	</div>

	<table class="ui selectable inverted table">

    


  <tbody>
  	<tr>
      <td>Id</td><td>{{user.getId()}}</td>
    </tr>
    <tr>
      <td>Prénom</td><td>{{user.getFirstname()}}</td>
    </tr>
    <tr>
      <td>Nom</td><td>{{user.getLastname()}}</td>
    </tr>
    <tr>
      <td>Login</td><td>{{user.getLogin()}}</td>
    </tr>
    <tr>
      <td>Adresse Email</td><td>{{user.getEmail()}}</td>
    </tr>
    <tr>
      <td>Role</td><td>{{user.getRole().getName()}}</td>
    </tr>
  </tbody>
</table>




	</div>

	

