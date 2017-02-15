<!-- Affiche le formulaire de modification/ajout d'un utilisateur-->
</br>
	<div class="ui container">
	<div>
	<?= $this->tag->linkTo(['users/index', '
	<i class=\'reply icon\'> </i>Retour à la liste des utilisateurs']) ?>
	</br><i class="info icon"></i>
</div>

	

	<div class="ui equal width form">
            <div class="fields">
                <div class="field">
                    <label>Prénom</label>
                    <input name="firstname" placeholder="First Name" type="text" value="<?= $user->getFirstname() ?>">
                </div>
                <div class="field">
                    <label>Nom</label>
                    <input name="lastname" placeholder="Last Name" type="text" value="<?= $user->getLastname() ?>">
                </div>
            </div>
            <div class="fields">
                <div class="field required">
                    <label>Login</label>
                    <input name="login" placeholder="Login" type="text" required value="<?= $user->getLogin() ?>">
                </div>
                <div class="field required">
                    <label>Mot de passe</label>
                    <input name="password"  type="password" required value="<?= $user->getPassword() ?>">
                </div>
            </div>
            <div class="fields">
                <div class="field required">
                    <label>Email</label>
                    <input name="email" placeholder="Email" type="email" required value="<?= $user->getEmail() ?>">
                </div>
            </div>
            <div class="fields">
                <div class="field">
                    <label>Role</label>
                    <select name="idrole" class="ui search dropdown">
                        <?php foreach ($ListeDesRoles as $role) { ?>
                        <option value="1" selected><?= $role->name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="fields">
                <input class="fluid positive ui button" type="submit" value="Ajouter">
                <input class="fluid ui button" type="reset" value="Réinitialiser">
            </div>
        </form>
    </div>
</div>
