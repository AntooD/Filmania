<?php
class ViewFilm {

    /**
     * formulaire de modification et les informations du film
     * @param film
     * @param acteurs<ActeurModel>
     * @param user
     * @return string
     * @access public
     */
    public function display_update($film, $acteurs, $user)
    {
        $img = "./upload/defaultIMG.png";
        $path = $film->path();
        if ($path != "") {
            $img = './' . $path;
        }

        if (!$film) return "";

        $input_class = "user-input";
        $disabled = "disabled";

        if ($user && $user->droit() > 0) {
            $input_class = "admin-input";
            $disabled = "";
        }
        $result = '<main>
                <div class="div-flex">
                <form method="post" class=' . $input_class . ' action="">

                <img src="' . $img . '" alt="jacket film" />

                <label for="nom">Nom</label>
                <input ' . $disabled . ' name="nom" id="nom" type="text" value="' . $film->nom() . '" required />

                <label for="annee">Année</label>
                <input ' . $disabled . '  name="annee" id="annee" type="number" value="' . $film->annee() . '" required />

                <label for="vote">Nombre de votant</label>
                <input ' . $disabled . ' name="vote" id="vote" type="number" value="' . $film->vote() . '" required />

                <label for="score">Score</label>
                <input ' . $disabled . ' name="score" id="score" type="number" value="' . $film->score() . '" required />

                <input ' . $disabled . ' name="id" type="hidden" value="' . $film->id() . '" />

                <input '. $disabled .' name="path" type="hidden" value="'.$film->path().'" />';

        if ($user && $user->droit() > 0) {
            $result = $result . '<button type="submit">Modifier le film</button>';
        }
        $result = $result . '</form>';

        $result = $result . "<div>";

        if ($acteurs) {
            $result = $result . $this->display_acteurs_film($film, $acteurs, $user);
        }



        if ($user && $user->droit() > 0) {
            $result = $result . '<a class="btn" href="add-actor?idfilm=' . $film->id() . '">Ajouter un acteur</a>';
        }
        
        $result = $result.'</div></div></main>';

        return $result;
    }

    /**
     * affiche la liste des acteurs jouant dans le film donné
     * @param film
     * @param acteurs<ActeurModel>
     * @param user
     * @return string
     * @access public
     */
    public function display_acteurs_film($film, $acteurs, $user)
    {
        $result = '<table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>
        </thead>';

        foreach ($acteurs as $acteur) {
            $result = $result . "<tr>";
            $result = $result . "<td>" . $acteur->prenom();
            "</td>";
            $result = $result . "<td>" . $acteur->nom();
            "</td>";
            if ($user && $user->droit() > 0) {
                $result = $result . '<td class="delete"><a href="remove-actor?idfilm=' . $film->id() . '&idacteur=' . $acteur->id() . '&redirect=film">Retirer</a></td>';
            }
            $result = $result . "</tr>";
        }

        $result = $result . "</table>";

        return $result;
    }

    /**
     * affiche le formulaire de création d'un film
     * @param void
     * @return string
     * @access public
     */
    public function display_create()
    {
        $result = '<main>
        <form method="post" class="admin-input" enctype="multipart/form-data" action="create-film">
            <label for="nom">Nom</label>
            <input name="nom" id="nom" type="text" required />

            <label for="annee">Année</label>
            <input name="annee" id="annee" type="number" required />
            

            <label for="vote">Nombre de votant</label>
            <input name="vote" id="vote" type="number" required />

            <label for="score">Score</label>
            <input name="score" id="score" type="number" required />

            <label for="file">Affiche du film</label>
            <input type="hidden" id="file" name="MAX_FILE_SIZE" value="4000000" />
            <input type="file" name="userfile" />


            <button type="submit">Ajouter le film</button>
        </form>
        </main>';

        return $result;
    }

    /**
     * afficher le film créé
     * @param void
     * @return string
     * @access public
     */
    public function display_create_result()
    {
        $result = "<p>Nouveau film ajouté !</p>";

        return $result;
    }

    /**
     * afficher tous les films
     * @param void
     * @return string
     * @access public
     */
    public function display_all($films, $user)
    {
        $result = '<table>
        <thead>
            <tr>
                <th colspan="0" >Détails</th>
                <th colspan="1">Titres</th>
                <th colspan="1">Année</th>
                <th colspan="1">Nombre de votes</th>
                <th colspan="1">Note</th>
            </tr>
        </thead>
        ';

        foreach ($films as $item) {
            $result = $result . '<tr>';
            $result = $result . '<td class="info"><a href="infos-film?id=' . $item->id() . '"> ► </a></td>';
            $result = $result . '<td><a href="infos-film?id=' . $item->id() . '">' . $item->nom() . '</td>' . '<td>' . $item->annee() . '</td>' . '<td>' . $item->vote() . '</td>' . '<td>' . $item->score() . '</td>';
            if ($user) {
                $result = $result . '<td class="vote"><a href="vote-film?id=' . $item->id() . '">Voter</a></td>';
                if ($user->droit() > 0) {
                    $result = $result . '<td class="delete"><a href="delete-film?id=' . $item->id(). '">Supprimer</a></td>';
                }
            }

            $result = $result . '</tr>';
        }

        $result = $result . '</table>';

        return $result;
    }
}
