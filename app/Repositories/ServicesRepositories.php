<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 13.05.2017
 * Time: 18:13
 */

namespace Pako\Repositories;
use Gate;
use Image;
use Config;
use File;
use Pako\Service;

class ServicesRepositories extends Repository
{
    public function __construct(Service $service)
    {
        $this->model = $service;
    }
    public function addService($request) {
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



                $img_name = $str . '_service.jpg';


                $img = Image::make($image);

                $img->fit(Config::get('setting.service_image')['width'],
                    Config::get('setting.service_image')['height'])->save(public_path() . '/' . env('THEME') . '/images/services/' . $img_name);



                $data['img'] = $img_name;


            }

        } else {
            $request->flash();
            return ['error' => 'Не загружена картинка'];
        }

        if($this->model->fill($data)->save()) {
            return ['status' => 'Сервис добавлен'];
        }
    }

    public function updateService($request,$service) {
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

                $this->deleteImage($service);

                $str = str_random(8);



                $img_name = $str . '_service.jpg';


                $img = Image::make($image);
                $img->fit(Config::get('setting.service_image')['width'],
                    Config::get('setting.service_image')['height'])->save(public_path() . '/' . env('THEME') . '/images/services/' . $img_name);


                $data['img'] = $img_name;


            }


        }
        $service->fill($data);
        if ($service->update()) {
            return ['status' => 'Сервис обновлен'];
        }
    }

    public function deleteImage($service) {
        if (File::exists(public_path() . '/' . env('THEME') . '/images/services/' . $service->img)) ;
        {
            File::delete(public_path() . '/' . env('THEME') . '/images/services/' . $service->img);
        }
        return true;
    }
    public function deleteService($service) {
        if(Gate::denies('destroy',$service)) {
            abort(403);
        }
        if($service->img) {
            $this->deleteImage($service);
        }


        if($service->delete()) {
            return ['status' => 'Сервис удален'];
        }
    }
}