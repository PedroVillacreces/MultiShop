<?php

class Comments
{
    public $id_comment;
    public $status;

    public function showComments()
    {

        $response = CommentsModel::showComments("comments");

        foreach ($response as $row => $item) {

            $status = $item['10'] == 1 ? "Aprobado" : "No aprobado";
            echo
                '<tr id="item' . $item['0'] . '">                        
                        <td class="date">' . $item['2'] . '</td> 
                        <td class="title">' . $item['11'] . '</td> 
                        <td class="comment">' . $item['1'] . '</td>
                         <td class="score">' . $item['5'] . '</td> 
                         <td class="mail">' . $item['6'] . '</td>
                         <td class="url">' . $item['7'] . '</td>
                         <td class="customer">' . $item['3'] . ' ' . $item['4'] . '</td> 
                         <td class="product">' . $item['8'] . '</td> 
                         <td class="category">' . $item['9'] . '</td> 
                         <td class="status">' . $status . '</td> 
                        <td>
                            <form role="form" method="POST" id="updateComment">
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button type="button" name="updateComment" id="updateComment" class="updateComment btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" data-id="' . $item['0'] . '">
                                            <input type="hidden" name="updateId" value="' . $item['0'] . '">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                            </form>                          
                        </td>';
        }
    }

    public function updateCommentUpdate($data)
    {
        $response = CommentsModel::updateComment($data, "comments");
        return $response;
    }

    public static function getCommentById($data)
    {
        $response = CommentsModel::getCommentById($data, "comments");
        return $response;
    }
}

if (isset($_POST['updateCommentUpdate'])) {

    $comment = new Comments();

    if (!isset($_POST["status"])) {
        $comment->status = 0;

    } else {
        $comment->status = $_POST['status'];
    }

    $comment->id_comment = $_POST['id_comment-update'];
    $comment->updateCommentUpdate($comment);
}