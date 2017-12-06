<?php

require_once "../../models/comments.php";
require_once "../../controllers/comments.php";

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 4/12/17
 * Time: 19:04
 */
class AjaxComment
{
    public $id_comment;
    public $status;

    public function getComment($data)
    {
        $response = Comments::getCommentById($data);
        echo json_encode(array('Comment' => $response));
    }
}

if (isset($_POST["getComment"])) {
    $comment = new AjaxComment();
    $comment->id_comment = $_POST["getComment"];
    $comment->getComment($comment);
}
