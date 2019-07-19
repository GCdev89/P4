<?php
namespace Gaetan\P4\Model;

class Comment
{
    /**
    *@var int $_id
    *@var int $_id_ticket
    *@var string $_title
    *@var string $_author
    *@var string $_content
    *@var int $_report
    *@var int $_date
    */

    private $_id;
    private $_post_id;
    private $_title;
    private $_author;
    private $_content;
    private $_report;
    private $_date_comment;

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

    public function postId()
    {
        return $this->_post_id;
    }

    public function title()
    {
        return $this->_title;
    }

    public function author()
    {
        return $this->_author;
    }

    public function content()
    {
        return $this->_content;
    }

    public function dateComment()
    {
        return $this->_date_comment;
    }

    // Setters

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
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

    public function setAuthor($author)
    {
        if(is_string($author))
        {
            $this->_author = $author;
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
        if ($report > 0) {
            $this->_report = $report;
        }
    }

    public function setDateComment($dateComment)
    {
        if(is_string($dateComment))
        {
            $this->_date_comment = $dateComment;
        }
    }

}
