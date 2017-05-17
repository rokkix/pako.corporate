<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 02.05.2017
 * Time: 12:24
 */

namespace Pako\Repositories;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Pako\Article;
use Image;

class ArticlesRepositories extends Repository
{
    public function __construct(Article $articles)
    {
        $this->model = $articles;
    }



    public function one($alias, $attr = [])
    {
        $article = $this->model->where('alias', $alias)->first();
//        if(!$article){
//            return abort(404);
//        }
        if ($article && !empty($attr)) {
            $article->load('comments');
            $article->comments->load('user');
        }
        return $article;
    }

    public function addArticle($request)
    {

        if (Gate::denies('save', $this->model)) {
            abort(403);
        }
        $data = $request->except('_token', 'image');
        if (empty($data)) {
            return array('error' => 'Нет данных');
        }
        if (empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }
        if ($this->one($data['alias'], FALSE)) {
            $request->merge(array('alias' => $data['alias']));
            $request->flash();
            return ['error' => 'Данный псовдоним уже используется'];
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if ($image->isValid()) {

                $str = str_random(8);

                $obj = new \stdClass;

                $obj->mini = $str . '_mini.jpg';
                $obj->max = $str . '_max.jpg';
                $obj->path = $str . '.jpg';

                $img = Image::make($image);
                $img->fit(Config::get('setting.image')['width'],
                    Config::get('setting.image')['height'])->save(public_path() . '/' . env('THEME') . '/images/blog/' . $obj->path);

                $img->fit(Config::get('setting.articles_img')['max']['width'],
                    Config::get('setting.articles_img')['max']['height'])->save(public_path() . '/' . env('THEME') . '/images/blog/' . $obj->max);

                $img->fit(Config::get('setting.articles_img')['mini']['width'],
                    Config::get('setting.articles_img')['mini']['height'])->save(public_path() . '/' . env('THEME') . '/images/blog/' . $obj->mini);
                $data['img'] = json_encode($obj);


            }

        } else {
            $request->flash();
            return ['error' => 'Не загружена картинка'];
        }
        $this->model->fill($data);
        if ($request->user()->articles()->save($this->model)) {
            return ['status' => 'Материал добавлен'];
        }



    }

    public function updateArticle($request, $article)
    {

        if (Gate::denies('edit', $this->model)) {
            abort(403);
        }
        $data = $request->except('_token', 'image', '_method');
        if (empty($data)) {
            return array('error' => 'Нет данных');
        }
        if (empty($data['alias'])) {
            $data['alias'] = $this->transliterate($data['title']);
        }
        $result = $this->one($data['alias'], FALSE);
        if (isset($result->id) && ($result->id != $article->id)) {
            $request->merge(array('alias' => $data['alias']));
            $request->flash();
            return ['error' => 'Данный псовдоним уже используется'];
        }

        if ($request->hasFile('image')) {


            $image = $request->file('image');

            if ($image->isValid()) {

            $this->deleteImage($article);

                $str = str_random(8);

                $obj = new \stdClass;

                $obj->mini = $str . '_mini.jpg';
                $obj->max = $str . '_max.jpg';
                $obj->path = $str . '.jpg';

                $img = Image::make($image);
                $img->fit(Config::get('setting.image')['width'],
                    Config::get('setting.image')['height'])->save(public_path() . '/' . env('THEME') . '/images/blog/' . $obj->path);

                $img->fit(Config::get('setting.articles_img')['max']['width'],
                    Config::get('setting.articles_img')['max']['height'])->save(public_path() . '/' . env('THEME') . '/images/blog/' . $obj->max);

                $img->fit(Config::get('setting.articles_img')['mini']['width'],
                    Config::get('setting.articles_img')['mini']['height'])->save(public_path() . '/' . env('THEME') . '/images/blog/' . $obj->mini);
                $data['img'] = json_encode($obj);


            }


        }
        $article->fill($data);
        if ($article->update()) {
            return ['status' => 'Материал обновлен'];
        }
    }

    public function deleteImage($article) {
        $article->img = json_decode($article->img);
        if (File::exists(public_path() . '/' . env('THEME') . '/images/blog/' . $article->img->mini)) ;
        {
            File::delete(public_path() . '/' . env('THEME') . '/images/blog/' . $article->img->mini);
        }
        if (File::exists(public_path() . '/' . env('THEME') . '/images/blog/' . $article->img->max)) ;
        {
            File::delete(public_path() . '/' . env('THEME') . '/images/blog/' . $article->img->max);
        }
        if (File::exists(public_path() . '/' . env('THEME') . '/images/blog/' . $article->img->path)) ;
        {
            File::delete(public_path() . '/' . env('THEME') . '/images/blog/' . $article->img->path);
        }
        return true;
    }

    public function deleteArticle($article) {

        if(Gate::denies('destroy',$article)) {
            abort(403);
        }
        if($article->img) {
            $this->deleteImage($article);
        }


        $article->comments()->delete();
        if($article->delete()) {
            return ['status' => 'Материал удален'];
        }
    }
}