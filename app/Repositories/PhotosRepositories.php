<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 03.05.2017
 * Time: 9:18
 */

namespace Pako\Repositories;


use File;
use Gate;
use Image;
use Config;
use Pako\Photo;

class PhotosRepositories extends Repository
{
    public function __construct(Photo $photo)
    {
        $this->model = $photo;
    }

    public function addPhoto($request)
    {

        if (Gate::denies('save', $this->model)) {
            abort(403);
        }
        // dd($request);
        $data = $request->except('_token', 'image');
        if (empty($data)) {
            return array('error' => 'Нет данных');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if ($image->isValid()) {

                $data['img'] = $this->imageSave($image);
            }

        } else {
            $request->flash();
            return ['error' => 'Не загружена картинка'];
        }
        // dd($data);
        if ($this->model->fill($data)->save()) {
            return ['status' => 'Работа добавлена'];
        }
    }

    public function updatePhoto($request, $photo)
    {
        if (Gate::denies('edit', $this->model)) {
            abort(403);
        }

        $data = $request->except('_token', 'image', '_method');
        if (empty($data)) {
            return array('error' => 'Нет данных');
        }

        if ($request->hasFile('image')) {


            $image = $request->file('image');

            if ($image->isValid()) {
                $this->deleteImage($photo);
                $data['img'] = $this->imageSave($image);
            }


        }

        $photo->fill($data);
        if ($photo->update()) {
            return ['status' => 'Материал обновлен'];
        }

    }

    public function deleteImage($photo)
    {
        $photo->img = json_decode($photo->img);

        if (File::exists(public_path() . '/' . env('THEME') . '/images/photos/' . $photo->img->max)) ;
        {
            File::delete(public_path() . '/' . env('THEME') . '/images/photos/' . $photo->img->max);
        }
        if (File::exists(public_path() . '/' . env('THEME') . '/images/photos/' . $photo->img->path)) ;
        {
            File::delete(public_path() . '/' . env('THEME') . '/images/photos/' . $photo->img->path);
        }
        return true;
    }

    public function imageSave($image)
    {
        $str = str_random(8);

        $obj = new \stdClass;


        $obj->max = $str . '_max.jpg';
        $obj->path = $str . '.jpg';

        $img = Image::make($image);
        $img->fit(Config::get('setting.photo_job')['width'],
            Config::get('setting.photo_job')['height'])->save(public_path() . '/' . env('THEME') . '/images/photos/' . $obj->path);

        $img->fit(Config::get('setting.img_job')['max']['width'],
            Config::get('setting.img_job')['max']['height'])->save(public_path() . '/' . env('THEME') . '/images/photos/' . $obj->max);

        return json_encode($obj);

    }



    public function deletePhoto($photo)
    {
        if(Gate::denies('destroy',$photo)) {
            abort(403);
        }
        
        if($photo->img) {
            $this->deleteImage($photo);
        }



        if($photo->delete()) {
            return ['status' => 'Материал удален'];
        }

    }

}