<?php
class UserModel
{
    protected $id,
        $email,
        $pwd = null,
        $droit;


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

    public function pwd()
    {
        return $this->pwd;
    }

    public function email()
    {
        return $this->email;
    }

    public function droit()
    {
        return $this->droit;
    }

    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPrivilege($droit)
    {
        $this->droit = $droit;
    }
}
?>