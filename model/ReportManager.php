<?php
namespace Gaetan\P4\Model;

require_once('model/Manager.php');
require('model/Report.php');

Class ReportManager extends Manager
{
    private $_db;

    public function __construct()
    {
        $this->setDb();
    }

    public function add(Report $report)
    {
        $q = $this->_db->prepare('INSERT INTO report(user_id, comment_id, reason, date) VALUES(:user_id, :comment_id, :reason, NOW())');
        $affectedLines =$q->execute(array(
            'user_id' => $report->userId(),
            'comment_id' => $report->commentId(),
            'reason' => $report->reason(),
        ));
        return $affectedLines;
    }

    public function setDb()
    {
        $db = $this->dbConnect();
        $this->_db = $db;
    }
}
