<?php

class LoginController extends ControllerBase
{


//Établit une connexion d'utilisateur (instance de User mise en session) 
//à partir du premier utilisateur de type admin trouvé dans la base de données
public function asAdminAction(){

}

//Établit une connexion d'utilisateur (instance de User mise en session) 
//à partir du premier utilisateur de type user trouvé dans la base de données
public function asUserAction(){

}

//Appelle le formulaire de connexion(GET), soumission par POST vers login/auth
public function indexAction(){

}

//Reçoit le résultat de la connexion et affiche son résultat (réussite ou non) 
public function authAction(){
	
}

}