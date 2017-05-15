<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 02.05.2017
 * Time: 3:46
 */

namespace Pako\Repositories;


use Config;
use Pako\Slider;
use Gate;
use Image;
use File;

class SlidersRepositories extends Repository
{
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }

    public function addSlider($request) {
        if (Gate::denies('save', $this->model)) {
            abort(403);
        }

        $data = $request->except('_token', 'image');
        if (empty($data)) {
            return array('error' => 'Нет данных');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if ($image->isValid()) {

                $str = str_random(8);



                $img_name = $str . '_slider.jpg';


                $img = Image::make($image);

                $img->fit(Config::get('setting.slider_image')['width'],
                    Config::get('setting.slider_image')['height'])->save(public_path() . '/' . env('THEME') . '/images/slider/' . $img_name);

                
              
                $data['img'] = $img_name;


            }

        } else {
            $request->flash();
            return ['error' => 'Не загружена картинка'];
        }
        
        if($this->model->fill($data)->save()) {
            return ['status' => 'Слайдер добавлен'];
        }
    }

    public function deleteImage($slider) {
        if (File::exists(public_path() . '/' . env('THEME') . '/images/slider/' . $slider->img)) ;
        {
            File::delete(public_path() . '/' . env('THEME') . '/images/slider/' . $slider->img);
        }
    }

    public function updateSlider($request,$slider) {
        if (Gate::denies('edit', $this->model)) {
            abort(403);
        }
        //dd($request->all());
        $data = $request->except('_token', 'image', '_method');
        if (empty($data)) {
            return array('error' => 'Нет данных');
        }

        if ($request->hasFile('image')) {


            $image = $request->file('image');

            if ($image->isValid()) {

               $this->deleteImage($slider);

                $str = str_random(8);



                $img_name = $str . '_slider.jpg';


                $img = Image::make($image);
                $img->fit(Config::get('setting.slider_image')['width'],
                    Config::get('setting.slider_image')['height'])->save(public_path() . '/' . env('THEME') . '/images/slider/' . $img_name);


                $data['img'] = $img_name;


            }


        }
        $slider->fill($data);
        if ($slider->update()) {
            return ['status' => 'Слайд обновлен'];
        }
    }

    public function deleteSlider($slider) {

        if(Gate::denies('destroy',$slider)) {
            abort(403);
        }
        if($slider->img) {
            $this->deleteImage($slider);
        }

        
        if($slider->delete()) {
            return ['status' => 'Слайд удален'];
        }
    }

}