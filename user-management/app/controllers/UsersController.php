<?php
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
class UsersController extends ControllerBase
{

	//Liste par défaut des utilisateurs, triés suivant sField dans l'ordre sens, en utilisant le filtre filter
    public function indexAction($page=1,$sField="firstname",$sens="asc",$filter=NULL)
    {
    	 if (isset($_GET['filter'])){
            $filter=$_GET['filter'];
            unset($_GET['filter']);
            $this->dispatcher->forward(["controller"=>"users","action"=>"index","params"=>[$page,$sField,$sens,$filter]]);
        }

    	$users=User::query()
    		    ->where("firstname like '%$filter%'")
                ->orWhere("lastname like '%$filter%'")
                ->orWhere("email like '%$filter%'")
                ->orWhere("login like '%$filter%'")
                ->orWhere("idrole like '%$filter%'")
    		->orderBy($sField." ".$sens)
    		->execute();
    	$this->view->setVar("users",$users);
    	$this->view->setVar("champActuel",$sField);
    	$this->view->setVar("sensTri",$sens);

    	 $this->view->setVar("tabColonnes",["id","login","firstname","lastname","email","idrole"]);
    	 $this->view->setVar("href","http://localhost/phalcon-tds-FONTAINE/user-management/users/index/1");

    	 // Create a Model paginator,
        $paginator = new PaginatorModel(
            [
                "data"  => $users,
                "limit" => 15,
                "page"  => $page,
            ]
        );
		// Get the paginated results
        $pager = $paginator->getPaginate();
        $this->view->setVar("pager",$pager);

        //pagination maison
        $this->view->setVar("pageCourante",$page);
        $pagePrec=$page-1;
        $pageSuiv=$page+1;
        $this->view->setVar("pagePrec",$pagePrec);
        $this->view->setVar("pageSuiv",$pageSuiv);
        $this->view->setVar("champ",$sField);
        $slash="/";
        $this->view->setVar("slash",$slash);
        $this->view->setVar("sens",$sens);

    }

   

	//Formulaire de saisie/modification d'un utilisateur, id est la clé primaire de l'utilisateur à modifier
	public function formAction($id=NULL){

		$this->view->setVar("ListeDesRoles", Role::find());

		if($id==NULL){
			$user = new User();
		}
		else{
			$user = User::findFirst($id);
		}	
		$this->view->setVar("user", $user);

	

	}

	//Met à jour l'utilisateur posté dans la base de données, puis affiche un message
	public function updateAction($id=NULL){

		if($id==NULL){ //ajout
			if(isset($_POST['login'], $_POST['email'], $_POST['idrole'])) {
	            $user = new User();
	            $user->setFirstname($_POST["firstname"]);
	            $user->setLastname($_POST["lastname"]);
	            $user->setLogin($_POST["login"]);
	            $user->setEmail($_POST["email"]);
	            $user->setPassword($_POST["password"]);
	            $user->setIdrole($_POST["idrole"]);
	    		if($user->save()){
	    			$this->view->setVar("successUserAdd", "Utilisateur ajouté");
	    		}
	    		else{
	    			$msg = "Problème d'enregistrement \n";
	                foreach ($user->getMessages() as $message) { //message d'erreur
	                    $msg .= $message . "\n";
	                }
	                $this->view->setVar("erreurUserAdd", $msg);

	    		}

	    		//$this->view->setVar("contenuMsg", "Utilisateur ajouté");
	        }
	        $this->dispatcher->forward(["controller"=>"users","action"=>"index"]);

    	}else{ // modification
    		if(isset($_POST['login'], $_POST['email'], $_POST['idrole'])) {
	    		$user = User::findFirst($id);
	    		
	            $user->setFirstname($_POST["firstname"]);
	            $user->setLastname($_POST["lastname"]);
	            $user->setLogin($_POST["login"]);
	            $user->setEmail($_POST["email"]);
	            $user->setPassword($_POST["password"]);
	            $user->setIdrole($_POST["idrole"]);
	    		$user->update();
	    		$this->dispatcher->forward(["controller"=>"users","action"=>"index"]);
    		}
    	}


	}

	//Supprime l'utilisateur dont l'id est passé en paramètre
	public function deleteAction($id=NULL){
		$user = User::findFirst($id);
		if($user->delete()){
	    	$this->view->setVar("successUserDelete", "Utilisateur supprimé");
	    }
	    $this->dispatcher->forward(["controller"=>"users","action"=>"index"]);
	}

	//affiche l'utilisateur
	public function showAction($id=NULL){
		$user = User::findFirst($id);
		$this->view->setVar("user", $user);
		$this->view->setVar("ListeDesRoles", Role::find());
	}	

	//Gère le message de mise à jour et affiche la vue
	public function messageAction(){

	}


}

