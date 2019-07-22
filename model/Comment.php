<?php
namespace Gaetan\P4\Model;

class Comment
{
    /**
    *@var int $_id
    *@var int $_post_id
    *@var string $_title
    *@var string $_author
    *@var string $_content
    *@var int $_report
    *@var int $_date
    */

    private $_id;
    private $_user_id;
    private $_post_id;
    private $_title;
    private $_content;
    private $_report;
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

    public function postId()
    {
        return $this->_post_id;
    }

    public function title()
    {
        return $this->_title;
    }

    public function content()
    {
        return $this->_content;
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
        if(is_string($userId))
        {
            $this->_user_id = $userId;
        }
    }

    public function setPostId($postId)
    {
        $postId = (int) $postId;
        if ($postId > 0) {
            $this->_post_id = $postId;
        }
    }

    public function setTitle($title)
    {
        if(is_string($title))
        {
            $this->_title = $title;
        }
    }



    public function setContent($content)
    {
        if(is_string($content))
        {
            $this->_content = $content;
        }
    }

    public function setReport($report)
    {
        $report =(int) $report;
        if ($report >= 0) {
            $this->_report = $report;
        }
    }

    public function setDateComment($date)
    {
        if(is_string($date))
        {
            $this->_date = $date;
        }
    }

}
