<?php
namespace Gaetan\P4\Model;

class User
{
    private $_id;
    private $_pseudo;
    private $_mail;
    private $_date_creation;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Getters
    public function id()
    {
        return $this->_id;
    }

    public function role()
    {
        return $this->_role;
    }

    public function name()
    {
        return $this->_name;
    }

    public function forname()
    {
        return $this->_forname;
    }

    public function mail()
    {
        return $this->_mail;
    }

    public function date()
    {
        return $this->_date;
    }

    // Setters

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setType($role)
    {
        if(is_string($role))
        {
            if ($role = 'admin' OR $role = 'common_user') {
                $this->_type = $role;
            }
        }
    }

    public function setTitle($name)
    {
        if(is_string($name))
        {
            $this->_name = $name;
        }
    }

    public function setForname($forname)
    {
        if(is_string($forname))
        {
            $this->_forname = $forname;
        }
    }

    public function setMail($mail)
    {
        if(is_string($mail))
        {
            $this->_mail = $mail;
        }
    }

    public function setDate($date)
    {
        if(is_string($date))
        {
            $this->_date = $date;
        }
    }

}
