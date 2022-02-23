<?php
class ViewActeur {

    /**
     * formulaire de modification et informations liées à un acteur
     * @param films<FilmModel>
     * @param acteur
     * @param user
     * @return string
     * @access public
     */
    public function display_update($films, $acteur, $user){
        
        $img = "./upload/acteur.png";
        $path = $acteur->path();
        if ($path != "") {
            $img = './' . $path;
        }

        if (!$acteur) return "";

        $input_class = "user-input";
        $disabled = "disabled";

        if ($user && $user->droit() > 0) {
            $input_class = "admin-input";
            $disabled = "";
        }
            $result = '<main>
                <form class='. $input_class .' method="post" action="">

                <img src="' . $img . '" alt="photo de profil" />

                <label for="nom">nom</label>
                <input '. $disabled .' name="nom" id="nom" type="text" value="'.$acteur->nom().'" required />

                <label for="prenom">prénom</label>
                <input '. $disabled .' name="prenom" id="annee" type="texte" value="'.$acteur->prenom().'" required />

                <input '. $disabled .' name="id" type="hidden" value="'.$acteur->id().'" />

                <input '. $disabled .' name="path" type="hidden" value="'.$acteur->path().'" />';
                
                
            if ($user && $user->droit() > 0){
                $result = $result . '<button type="submit">Modifier</button>';
            }
            $result = $result . '</form>';

            if($films){
                $result = $result . $this->display_films_acteur($films, $acteur, $user);
            }

            $result = $result.'</main>';
            return $result;

        }
    

    /**
     * affiche les films auquels un acteur a participé
     * @param films<FilmModel>
     * @param acteur
     * @param user
     * @return string
     * @access public
     */
    public function display_films_acteur($films, $acteur, $user){
        $result = '<table>
        <thead>
            <tr>
                <th>Titre </th>
                <th>Année</th>

            </tr>
        </thead>';

        foreach($films as $film){
            $result = $result . "<tr>";
            $result = $result . "<td>" . $film->nom();"</td>";
            $result = $result . "<td>" . $film->annee();"</td>";
            if($user && $user->droit() > 0){
                $result = $result . '<td class="delete"><a  href="remove-actor?idfilm='. $film->id() .'&idacteur='. $acteur->id() .'&redirect=acteur">Retirer</a></td>';
            }
            $result = $result . "</tr>";
        }

        $result = $result . "</table>";

        return $result;
    }

    /**
     * ajouter un acteur à un film
     * @param acteurs<ActeurModel>
     * @param idFilm
     * @return string
     * @access public
     */
    public function display_add_actor($acteurs, $idfilm){

        if($acteurs){
            $result = '<form method="get" action="add-actor?">
                <input type="text" name="idfilm" value="'.$idfilm.'" required hidden/>

                <select name="newactor" id="actor-select">';

                foreach($acteurs as $acteur){
                    $result = $result . '<option value="'.$acteur->id().'">'.$acteur->prenom().' '.$acteur->nom().'</option>';
                }

            $result = $result . '</select>
                <button type="submit">Ajouter</button>
                </form>';
            }else{
                $result = "<p>Il n'y a pas d'acteur à ajouter.</p>";
            }

        return $result;
    }

    /**
     * afficher le film avec l'acteur ajouté
     * @param idfilm
     * @return string
     * @access public
     */
    public function display_add_actor_result($idfilm){
        $result = '<p>L\'acteur sélectionné a été ajouté au cating du film</p>
            <a href="infos-film?id='. $idfilm .'">Voir la page du film</a>';
        return $result;
    }

    /**
     * créer un acteur
     * @param void
     * @return string
     * @access public
     */
    public function display_create(){
        $result = '<main>
            <form method="post" class="admin-input" enctype="multipart/form-data" action="create-acteur">
            <label for="nom">nom</label>
            <input name="nom" id="nom" type="text" required />

            <label for="prenom">prénom</label>
            <input id="prenom" name="prenom" type="text" required />

            <label for="file">Photo </label>
            <input type="hidden" id="file" name="MAX_FILE_SIZE" value="4000000" />
            <input type="file" name="userfile" />
            
            <button type="submit">Ajouter l\'acteur</button>
         </form>';

        return $result;
    }

    /**
     * afficher l'acteur créé
     * @param void
     * @return string
     * @access public
     */
    public function display_create_result()
    {
        $result = "<p>L'acteur que vous avez créé a été ajouté</p>";

        return $result;
    }

    /**
     * afficher tous les acteurs
     * @param acteur<ActeurModel>
     * @return string
     * @access public
     */
    public function display_all($acteur, $user){
        $result = '<table>
        <thead>
            <tr>
            <th>Détails</th>
            <th>Nom</th>
            <th>Prénom</th>
            </tr>
        </thead>
        ';
        
        foreach($acteur as $item){
            $result = $result.'<tr>';
            $result = $result.'<td class="info"><a href="infos-acteur?id='.$item->id().'">►</a></td>';
            $result = $result.'<td>'.$item->nom().'</td>'.'<td>'.$item->prenom().'</td>';

            if ($user) {
                if ($user->droit() > 0) {
                    $result = $result.'<td class="delete"><a href="delete-acteur?id='.$item->id().'">Supprimer</a></td>';
                }
            }

            $result = $result.'</tr>';
        }

        $result = $result.'</table>';

        return $result;
    }
}

?>