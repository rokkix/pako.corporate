<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 02.05.2017
 * Time: 12:24
 */

namespace Pako\Repositories;


use Pako\Article;

class ArticlesRepositories extends Repository
{
    public function __construct(Article $articles)
    {
        $this->model = $articles;
    }

    public function one($alias,$attr = []) {
       $article = parent::one($alias,$attr);
        if($article && !empty($attr)) {
            $article->load('comments');
            $article->comments->load('user');
        }
        return $article;
    }
}