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
    }

   

	//Formulaire de saisie/modification d'un utilisateur, id est la clé primaire de l'utilisateur à modifier
	public function formAction($id=NULL){

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

