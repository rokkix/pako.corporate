<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 02.05.2017
 * Time: 10:42
 */

namespace Pako\Repositories;

use Gate;
use Pako\Review;

class ReviewsRepositories extends Repository
{
    public function __construct(Review $review)
    {
        $this->model = $review;
    }
    public function addReview($request) {
       // dd($request);
        if (Gate::denies('save', $this->model)) {
            abort(403);
        }

        $data = $request->except('_token');
        if (empty($data)) {
            return array('error' => 'Нет данных');
        }


        if($this->model->fill($data)->save()) {
            return ['status' => 'Отзыв добавлен'];
        }

    }

    public function updateReview($request,$review) {
        if (Gate::denies('edit', $this->model)) {
            abort(403);
        }

        $data = $request->except('_token','_method');
        if (empty($data)) {
            return array('error' => 'Нет данных');
        }


        $review->fill($data);
        if ($review->update()) {
            return ['status' => 'Отзыв обновлен'];
        }
    }
    public function deleteReview($review) {
        if(Gate::denies('destroy',$review)) {
            abort(403);
        }


        if($review->delete()) {
            return ['status' => 'Отзыв удален'];
        }
    }

}