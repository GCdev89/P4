<?php
namespace Gaetan\P4\Model;

Class Report
{
    private $_id;
    private $_user_id;
    private $_comment_id;
    private $_reason;
    private $_date;

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

    public function userId()
    {
        return $this->_user_id;
    }

    public function commentId()
    {
        return $this->_comment_id;
    }

    public function reason()
    {
        return $this->_reason;
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

    public function setUserId($userId)
    {
        $userId = (int) $userId;
        if ($userId > 0) {
            $this->_user_id = $userId;
        }
    }

    public function setCommentId($commentId)
    {
        $commentId = (int) $commentId;
        if ($commentId > 0) {
            $this->_comment_id = $commentId;
        }
    }

    public function setReason($reason)
    {
        if(is_string($reason))
        {
            if ($reason = 'discrimination' OR $reason = 'hate' OR $reason = 'else') {
                $this->_reason = $reason;
            }
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
