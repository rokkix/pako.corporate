<?php

namespace Pako\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gate;
use Pako\Http\Requests;
use Pako\Http\Controllers\Controller;
use Pako\Repositories\ReviewsRepositories;
use Pako\Review;

class ReviewsController extends AdminController
{
    protected $reviews_rep;
    public function __construct(ReviewsRepositories $review_rep)
    {
        parent::__construct();

        if(Gate::denies('VIEW_ADMIN_ARTICLES')) {
            abort(403);
        }

        $this->reviews_rep = $review_rep;
        $this->template = env('THEME') . '.admin.reviews';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Редактирование отзыва';
        $reviews = $this->getReviews();
        //dd($reviews);
        //dd($slider);
        $this->content = view(env('THEME') . '.admin.reviews_content')->with('reviews',$reviews)->render();
        return $this->renderOutput();
    }

    public function getReviews() {
        $reviews = $this->reviews_rep->get();
        return $reviews;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('save',new Review())) {
            abort(403);
        }
        $this->title = "Добавить новый отзыв";
        $this->content = view(env('THEME'). '.admin.reviews_create_content')->render();
        //dd($this->content);
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->reviews_rep->addReview($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.reviews.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        if(Gate::denies('edit',new Review())) {
            abort(403);
        }


        $this->title = 'Редактирование отзыва - '.$review->title;
        $this->content = view(env('THEME'). '.admin.reviews_create_content')->with('review',$review)->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $result = $this->reviews_rep->updateReview($request,$review);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.reviews.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $result = $this->reviews_rep->deleteReview($review);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.reviews.index')->with($result);
    }
}
