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

    public function getListReports()
    {
        $reports = [];

        $q = $this->_db->query('SELECT u.pseudo userPseudo, r.user_id userId, r.comment_id commentId, r.reason reason, DATE_FORMAT(r.date, \'%d/%m/%Y %Hh%imin\') AS date, c.user_id commentUserId, c.title title, c.content content, c.date commentDate
        FROM user u
        INNER JOIN report r
            ON r.user_id = u.id
        INNER JOIN comment c
            ON r.comment_id = c.id');

        while($data = $q->fetch())
        {
            $reports[] = new Report($data);
        }
        $q->closeCursor();

        return $reports;
    }

    public function setDb()
    {
        $db = $this->dbConnect();
        $this->_db = $db;
    }
}
