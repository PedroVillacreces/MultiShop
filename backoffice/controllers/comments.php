<?php

class Comments
{
    public $id_comment;
    public function showComments(){

        $response = CommentsModel::showComments("comments");

        foreach ($response as $row => $item) {
            echo
                '<tr id="item'.$item['0'].'">
                        <td class="id_comment">'.$item['0'].'</td>
                        <td class="date">'.$item['1'].'</td> 
                        <td class="comment">'.$item['2'].'</td>
                         <td class="score">'.$item['3'].'</td> 
                         <td class="mail">'.$item['4'].'</td>
                         <td class="url">' .$item['5']. '</td>
                         <td class="customer">'.$item['6'].'</td> 
                         <td class="product">'.$item['7'].'</td> 
                         <td class="category">'.$item['8'].'</td> 
                         <td class="status">'.$item['9'].'</td> 
                        <td>
                            <form role="form" method="POST" id="deleteComment">
                                <button type="submit" name="deleteComment" id="deleteComment" class="deleteCommentButton btn btn-danger btn-sm">
                                <input type="hidden" name="deleteId" value="'.$item['0'].'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                            
                        </td>';
              }
    }

    public function deleteComment()
    {
        $response = CommentsModel::deleteComment($this->id_comment, "comments");
        return $response;
    }
}

if (isset($_POST['deleteComment'])){
    $comment = new Comments();
    $comment ->id_comment = $_POST['deleteId'];
    $comment->deleteComment();
}