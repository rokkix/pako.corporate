<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 02.05.2017
 * Time: 3:46
 */

namespace Pako\Repositories;


use Pako\Slider;

class SlidersRepositories extends Repository
{
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }

}