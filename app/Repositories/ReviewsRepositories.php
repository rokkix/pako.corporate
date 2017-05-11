<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 02.05.2017
 * Time: 10:42
 */

namespace Pako\Repositories;


use Pako\Review;

class ReviewsRepositories extends Repository
{
    public function __construct(Review $review)
    {
        $this->model = $review;
    }

}