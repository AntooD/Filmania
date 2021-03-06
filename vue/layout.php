<?php
function layout($title, $content) {
    $user = null;

    if(isset($_SESSION["loggedUser"])){
        $user = unserialize($_SESSION["loggedUser"]);
    }

    echo '<!DOCTYPE html>
        <html lang="fr">
        <head>
            <title>'. $title. '</title>
        </head>
        <body>
            <header>';
                '<nav>
                    <ul>';
                    echo '<li><a href="film">Films</a></li>';
                    echo '<li><a href="acteur">Acteurs</a></li>';

                        if($user){
                            if($user->droit() == 1){
                                echo '<li><a href="create-acteur">Ajouter un Acteur</a></li>';
                                echo '<li><a href="create-film">Ajouter un Film</a></li>';
                            }
                            echo '<li><a href="disconnect">Se déconnecter</a></li>';
                            
                        
                    }else{
                        echo '<li><a href="auth">Se connecter</a></li>';
                        echo "<li><a href='register'>S'inscrire</a></li>";                        
                    }
                    echo '</ul>
                </nav>
            </header>

            '.$content.'

            <style>';
               include "./assets/index.css";
        echo '</style> 
        </body>
    </html>';
}
?>