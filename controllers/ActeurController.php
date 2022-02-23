<?php
class ActeurController {

    protected $manager;
    protected $view;

    public function __construct(ActeurManager $manager, ViewActeur $view){
        $this->manager = $manager;
        $this->view = $view;
    }    

    /**
     * ajouter un acteur
     * @param void
     * @return string
     * @access private 
     */
    public function create()
    {
        $user = null;
        if (isset($_SESSION["loggedUser"])) {
            $user = unserialize($_SESSION["loggedUser"]);
        }

        if (!($user) && $user->droit() != 1) {
            return "Mauvais privilèges";
        }

        if (!(isset($_POST["nom"]) && isset($_POST["prenom"]))) {
            return $this->view->display_create();
        }
        
        
        
        if (isset($_FILES["userfile"]) && $_FILES["userfile"]["name"] !== "") {
            
            $file_name = rand() . $_FILES["userfile"]['name'];
            $dir = 'upload/' . $file_name; 

            

            move_uploaded_file($_FILES['userfile']['tmp_name'], $dir);

            $_POST["path"] = $dir;
        } else {
            $_POST["path"] = "upload/acteur.png";
            echo "Taille de fichier trop importante";
        }

        $acteur = new ActeurModel($_POST);

        $this->manager->add($acteur);

        return $this->view->display_create_result();
    }


    /**
     * ajouter un acteur à un film
     * @param void
     * @return string
     * @access private 
     */
    public function add_actor(){
        $user = null;
        if(isset($_SESSION["loggedUser"])){
            $user = unserialize($_SESSION["loggedUser"]);
        }
        if($user && $user->droit() > 0 && isset($_GET["idfilm"]) && !isset($_GET["newactor"])){
            $idFilm = intval($_GET["idfilm"]);
            $acteurs = $this->manager->getListWhereNotFilm($idFilm);

            return $this->view->display_add_actor($acteurs, $idFilm);
        

        }elseif($user && $user->droit() > 0 && isset($_GET["idfilm"]) && isset($_GET["newactor"])){

            $this->manager->addActorToFilm(intval($_GET["idfilm"]), intval($_GET["newactor"]));

            return $this->view->display_add_actor_result(intval($_GET["idfilm"]));
        
        }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        return "Aucun film séléctionné.";
    }

    /**
     * modifier les informations d'un acteur
     * @param void
     * @return string
     * @access private 
     */
    public function update(){
        if(isset($_GET["id"])){
            $id = intval($_GET["id"]);

            $acteur = $this->manager->get($id);

            $films = $this->manager->getFilmsWithActor($id);

            $user = null;
            if(isset($_SESSION["loggedUser"])){
                $user = unserialize($_SESSION["loggedUser"]);
            }

            if (isset($_POST["nom"]) && isset($_POST["prenom"])) {
                $acteur->setNom($_POST["nom"]);
                $acteur->setPrenom($_POST["prenom"]);
                $this->manager->update($acteur);
            }

            return $this->view->display_update($films, $acteur, $user);
        }
        return "Aucun film.";
    }

    /**
     * permetre l'affichage de tout les acteur
     * @param void
     * @return string
     * @access private 
     */
    public function all() {
        $acteurs = $this->manager->getList();

        $user = null;
        if(isset($_SESSION["loggedUser"])){
            $user = unserialize($_SESSION["loggedUser"]);
        }

        $result = $this->view->display_all($acteurs, $user);

        return $result;
    }

    /**
     * supprimer un acteur
     * @param void
     * @return string
     * @access private 
     */
    public function delete() {
        if (isset($_GET["id"])) {
            $acteur = $this->manager->get($_GET["id"]);
            $this->manager->delete($acteur);
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

?>