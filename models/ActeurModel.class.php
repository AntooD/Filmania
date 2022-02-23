<?php
// DAO
class ActeurModel
{
    protected $id,
        $nom,
        $prenom,
        $path;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function id()
    {
        return $this->id;
    }

    public function nom()
    {
        return $this->nom;
    }

    public function prenom()
    {
        return $this->prenom;
    }

    public function path()
    {
        return $this->path;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPath($path)
    {
        if (is_string($path)) {
            $this->path = $path;
        }
    }

    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
}  
?>