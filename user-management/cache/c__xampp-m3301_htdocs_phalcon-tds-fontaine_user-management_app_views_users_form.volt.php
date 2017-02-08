<!-- Affiche le formulaire de modification/ajout d'un utilisateur-->
</br>
	<div class="ui container">
	<div>
	<?= $this->tag->linkTo(['users/index', '
	<i class=\'reply icon\'> </i>Retour à la liste des utilisateurs']) ?>
	</br><i class="info icon"></i>
</div>
<form method="post">
	

	<div class="ui form">
	  <div class="three fields">
	    <div class="field">
	      <label>Prénom</label>
	      <input type="text" placeholder="">
	    </div>
	    <div class="field">
	      <label>Nom</label>
	      <input type="text" placeholder="">
	    </div>
		</br>
	  </div>
	</div>

	<div class="ui form">
	  <div class="three fields">
	    <div class="field">
	      <label>Login</label>
	      <input type="text" placeholder="Nom" required>
	    </div>
	    <div class="field">
	      <label>Mot de passe</label>
	      <input type="password" required >
	    </div>
	    <div class="field">
	      <label>Email</label>
	      <input type="text" required >
	    </div>
	  </div>
	</div>


	<div >
		<label>Role</label> 
		<select class="ui compact selection dropdown">
	    <option value="superadmin">superadmin</option>
	    <option value="admin">admin</option>
	    <option selected="selected" value="user">user</option>
	  	</select>
  	</div></br>

	<button class="positive ui button">Valider</button>
	<button class="ui toggle button">Rénitialiser</button>

	</div>
</form>