<?php

class UsersController extends ControllerBase
{

	//Liste par défaut des utilisateurs, triés suivant sField dans l'ordre sens, en utilisant le filtre filter
    public function indexAction($page=1,$sField="firstname",$sens="asc",$filter=NULL)
    {

    	$users=User::query()
    		->orderBy($sField." ".$sens)
    		->execute();
    	$this->view->setVar("users",$users);
    	$this->view->setVar("champActuel",$sField);
    	$this->view->setVar("sensTri",$sens);

    	 $this->view->setVar("tabColonnes",["id","login","firstname","lastname","email","idrole"]);
    	 $this->view->setVar("href","http://localhost/phalcon-tds-FONTAINE/user-management/users/index/1");
    }

   

	//Formulaire de saisie/modification d'un utilisateur, id est la clé primaire de l'utilisateur à modifier
	public function formAction($id=NULL){

		$this->view->setVar("ListeDesRoles", Role::find());

		if(isset($_POST["firstname"], $_POST['lastname'], $_POST['login'], $_POST['email'], $_POST['idrole'])) {
            $user = new User();
            $user->setFirstname($_POST["firstname"]);
            $user->setLastname($_POST["lastname"]);
            $user->setLogin($_POST["login"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->setIdrole($_POST["idrole"]);
    	$user->save();
        }
		

	}

	//Met à jour l'utilisateur posté dans la base de données, puis affiche un message
	public function updateAction($id=NULL){

	}

	//Supprime l'utilisateur dont l'id est passé en paramètre
	public function deleteAction(){

	}

	//Gère le message de mise à jour et affiche la vue
	public function messageAction(){

	}


}

