<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 02.05.2017
 * Time: 8:24
 */

namespace Pako\Repositories;


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
        if ($portfolio->photo && count($portfolio->photo) > 0) {

            foreach ($portfolio->photo as $portfoli) {
                $portfoli->img = json_decode($portfoli->img);


            }

        }
        //dd($portfolio);
        return $portfolio;
    }
}