<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 03.05.2017
 * Time: 9:18
 */

namespace Pako\Repositories;


use Pako\Comment;

class CommentsRepositories extends Repository
{
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }
}