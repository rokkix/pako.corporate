<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 02.05.2017
 * Time: 8:24
 */

namespace Pako\Repositories;
use Illuminate\Support\Facades\Route;
use Image;
use Config;
use Gate;
use File;
use Pako\Portfolio;

class PortfoliosRepositories extends Repository
{
    public function __construct(Portfolio $portfolio)
    {
        $this->model = $portfolio;
    }

    public function one($alias, $attr = [])
    {
        $portfolio = parent::one($alias, $attr);
        if ($portfolio) {

            $portfolio->img = json_decode($portfolio->img);


        }
        if (Route::currentRouteName() == 'portfolios.show' && isset($portfolio->photo) && count($portfolio->photo) > 0) {

            foreach ($portfolio->photo as $portfoli) {
                $portfoli->img = json_decode($portfoli->img);


            }

        }
        //dd($portfolio);
        return $portfolio;
    }

    public function addPortfolio($request) {
        if (Gate::denies('save', $this->model)) {
            abort(403);
        }
       // dd($request);
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

                $obj->micro = $str . '_micro.jpg';
                $obj->mini = $str . '_mini.jpg';

                $obj->max = $str . '_max.jpg';
                $obj->path = $str . '.jpg';

                $img = Image::make($image);
                $img->fit(Config::get('setting.portfolio_image')['width'],
                    Config::get('setting.portfolio_image')['height'])->save(public_path() . '/' . env('THEME') . '/images/portfolios/' . $obj->path);

                $img->fit(Config::get('setting.portfolio_img')['max']['width'],
                    Config::get('setting.portfolio_img')['max']['height'])->save(public_path() . '/' . env('THEME') . '/images/portfolios/' . $obj->max);

                $img->fit(Config::get('setting.portfolio_img')['mini']['width'],
                    Config::get('setting.portfolio_img')['mini']['height'])->save(public_path() . '/' . env('THEME') . '/images/portfolios/' . $obj->mini);
                $img->fit(Config::get('setting.portfolio_img')['micro']['width'],
                    Config::get('setting.portfolio_img')['micro']['height'])->save(public_path() . '/' . env('THEME') . '/images/portfolios/' . $obj->micro);
                $data['img'] = json_encode($obj);


            }

        } else {
            $request->flash();
            return ['error' => 'Не загружена картинка'];
        }
       // dd($data);
        if($this->model->fill($data)->save()) {
            return ['status' => 'Работа добавлена'];
        }

    }
    public function updatePortfolio($request,$portfolio) {
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
        if (isset($result->id) && ($result->id != $portfolio->id)) {
            $request->merge(array('alias' => $data['alias']));
            $request->flash();
            return ['error' => 'Данный псовдоним уже используется'];
        }

        if ($request->hasFile('image')) {


            $image = $request->file('image');

            if ($image->isValid()) {
                $this->deleteImage($portfolio);
                $str = str_random(8);

                $obj = new \stdClass;

                $obj->micro = $str . '_micro.jpg';
                $obj->mini = $str . '_mini.jpg';

                $obj->max = $str . '_max.jpg';
                $obj->path = $str . '.jpg';

                $img = Image::make($image);
                $img->fit(Config::get('setting.portfolio_image')['width'],
                    Config::get('setting.portfolio_image')['height'])->save(public_path() . '/' . env('THEME') . '/images/portfolios/' . $obj->path);

                $img->fit(Config::get('setting.portfolio_img')['max']['width'],
                    Config::get('setting.portfolio_img')['max']['height'])->save(public_path() . '/' . env('THEME') . '/images/portfolios/' . $obj->max);

                $img->fit(Config::get('setting.portfolio_img')['mini']['width'],
                    Config::get('setting.portfolio_img')['mini']['height'])->save(public_path() . '/' . env('THEME') . '/images/portfolios/' . $obj->mini);
                $img->fit(Config::get('setting.portfolio_img')['micro']['width'],
                    Config::get('setting.portfolio_img')['micro']['height'])->save(public_path() . '/' . env('THEME') . '/images/portfolios/' . $obj->micro);
                $data['img'] = json_encode($obj);


            }


        }

        $portfolio->fill($data);
        if ($portfolio->update()) {
            return ['status' => 'Материал обновлен'];
        }


    }
    public function deleteImage($portfolio) {
        $portfolio->img = json_decode($portfolio->img);
       // dd($portfolio);
        if (File::exists(public_path() . '/' . env('THEME') . '/images/portfolios/' . $portfolio->img->mini)) ;
        {
            File::delete(public_path() . '/' . env('THEME') . '/images/portfolios/' . $portfolio->img->mini);
        }
        if (File::exists(public_path() . '/' . env('THEME') . '/images/portfolios/' . $portfolio->img->micro)) ;
        {
            File::delete(public_path() . '/' . env('THEME') . '/images/portfolios/' . $portfolio->img->micro);
        }
        if (File::exists(public_path() . '/' . env('THEME') . '/images/portfolios/' . $portfolio->img->max)) ;
        {
            File::delete(public_path() . '/' . env('THEME') . '/images/portfolios/' . $portfolio->img->max);
        }
        if (File::exists(public_path() . '/' . env('THEME') . '/images/portfolios/' . $portfolio->img->path)) ;
        {
            File::delete(public_path() . '/' . env('THEME') . '/images/portfolios/' . $portfolio->img->path);
        }
        return true;
    }

    public function deletePortfolio($portfolio) {
        if(Gate::denies('destroy',$portfolio)) {
            abort(403);
        }
        if($portfolio->img) {
            $this->deleteImage($portfolio);
        }


        $portfolio->photo()->delete();
        if($portfolio->delete()) {
            return ['status' => 'Материал удален'];
        }
    }
}