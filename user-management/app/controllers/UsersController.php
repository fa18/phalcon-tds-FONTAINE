<?php

class UsersController extends ControllerBase
{

	//Liste par défaut des utilisateurs, triés suivant sField dans l'ordre sens, en utilisant le filtre filter
    public function indexAction()
    {
    	$users=User::find();
    	$this->view->setVar("users",$users);
    }

   // indexAction(sField="firstname",sens="asc",filter=NULL)

	//Formulaire de saisie/modification d'un utilisateur, id est la clé primaire de l'utilisateur à modifier
	public function formAction($id=NULL){

	}

	//Met à jour l'utilisateur posté dans la base de données, puis affiche un message
	public function updateAction($id=NULL){

	}

	//Supprime l'utilisateur dont l'id est passé en paramètre
	public function deleteAction($id){

	}

	//Gère le message de mise à jour et affiche la vue
	public function messageAction(){

	}


}

