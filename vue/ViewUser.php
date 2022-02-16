<?php
class ViewUser {

    /**
     * formulaire d'authentification
     * @param void
     * @return string
     * @access public
     */
    public function display_auth(){
        $result = '<main class="admin-input">
        <form method="post" action="auth" autocomplete="off">
            <label for="email">email</label>
            <input name="email" id="email" type="text" required />

            <label for="pwd">Mot de passe</label>
            <input name="pwd" id="pwd" type="password" required />

            <button type="submit">Se connecter</button>
        </form>
        </main>';
        return $result;
    }

    /**
     * afficher le succes ou l'échec de connexion
     * @param void
     * @return string
     * @access public
     */
    public function display_auth_result($user){
        $result = '<p>Votre email ou votre mot de passe est incorrect.</p>';
        if ($user != null) {
            $result = '<p>Vous êtes connecté</p>';
        }

        return $result;
    }

    /**
     * affiche le formulaire d'inscription
     * @param void
     * @return string
     * @access public
     */
    public function display_register($errorCode){
        $result = '<main>
        <form method="post" autocomplete="off" action="register">
            <label>Email</label>
            <input name="email" id="email" type="email" required />
            <label>Mot de Passe :</label>
            <input name="pwd" id="mdp" type="password" required />
            <label>Confirmez votre mot de passe :</label>
            <input name="cmdp" id="cmdp" type="password" required />
            <button type="submit">Créer votre compte</button>
        </form>
        </main>';

        if($errorCode){
            switch($errorCode){
                case(1):
                    $result = $result . "<p>Pour la sécurité de votre compte, votre mot de passe doit contenir au moins 8 caractères, au moins une minuscule, une majuscule et un chiffre. </br> Veuillez réessayer la création de votre compte.";
                    break;
                case(2):
                    $result = $result . "<p>Les mots de passes ne correspondent pas.</p>";
                    break;
                default:
                    $result = $result . "<p>Erreur.</p>";
                    break;
            }
        }

        return $result;
    }

    /**
     * affiche le résultat de l'inscription
     * @param void
     * @return string
     * @access public
     */
    public function display_register_result(){
        return "<p>Super ! Le compte a été créé.</p>";
    }

    /**
     * affiche le résultat de la déconnexion
     * @param void
     * @return string
     * @access public
     */
    public function display_disconnect(){
        $result = '<p>Déconnexion réussie avec succès</p>
            <p><u><a href="film">Retour au menu principal</a></u></p>';
        
        return $result;
    }

    /**
     * page affichée lorsqu'un utilisateur atteint une page qu'il ne doit pas atteindre avec l'URL
     * @param void
     * @return string
     * @access public
     */
    public function display_forbidden(){
        $result = '<p class="forbidden">ERROR 404 (vous ne pouvez pas avoir accès à cet URL  :/ )';
        return $result;
    }
}

?>