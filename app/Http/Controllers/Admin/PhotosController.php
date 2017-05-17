<?php

namespace Pako\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Gate;

use Illuminate\Support\Facades\Route;
use Pako\Http\Requests;
use Pako\Http\Controllers\Controller;
use Pako\Photo;
use Pako\Portfolio;
use Pako\Repositories\PhotosRepositories;
use Pako\Repositories\PortfoliosRepositories;

class PhotosController extends AdminController
{

    protected $photo_rep;
    public function __construct(PhotosRepositories $photo_rep,PortfoliosRepositories $p_rep)
    {
        parent::__construct();

        if(Gate::denies('VIEW_ADMIN_ARTICLES')) {
            abort(403);
        }
        $this->photo_rep = $photo_rep;
        $this->p_rep = $p_rep;
        $this->template = env('THEME') . '.admin.photos';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $option = session('option');


        $this->title = 'Добавить новое фото';

        $res = $this->getPortfolios()->reduce(function ($returnPhotos, $portfolio) {
            $returnPhotos[$portfolio->id] = $portfolio->id;
            return $returnPhotos;
        }, []);
        // dd($res);
        $this->content = view(env('THEME'). '.admin.photos_create_content')->with(['portfolio_id'=>$res,'option' => $option])->render();
        return $this->renderOutput();
    }

    public function getPortfolios() {
        return Portfolio::all();
    }


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->photo_rep->addPhoto($request);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->back()->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $portfolio =  Portfolio::where('id',$id)->first();
//           if(!$portfolio) {
//                abort(404);
//            }

        $photos = $this->getPhotos($id);
        session(['option' => $id]);

        foreach ($photos as $photo) {
            $photo->img = json_decode($photo->img);
        }

        $this->title = 'Фото работ';
        //$articles = $this->getArticles();
        $this->content = view(env('THEME') . '.admin.photos_content')->with('photos',$photos)->render();
        return $this->renderOutput();
    }

    public function getPhotos($id) {
        $res = $this->p_rep->get('*',FALSE,FALSE,['id',$id]);
        if(!$res) {
            abort(404);
        }
        $photos = $res->first()->photo;
        return $photos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit',new Photo())) {
            abort(403);
        }

        $photo = Photo::find($id);
        if($photo == null) {
            abort(404);
        }

        $option = session('option');

        $photo->img = json_decode($photo->img);
        $res = $this->getPortfolios()->reduce(function ($returnPhotos, $portfolio) {
            $returnPhotos[$portfolio->id] = $portfolio->id;
            return $returnPhotos;
        }, []);

        $this->title = 'Редактирование материала';
        $this->content = view(env('THEME'). '.admin.photos_create_content')->with(['option'=>$option,'portfolio_id' => $res,'photo'=>$photo])->render();
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);
        if($photo == null) {
            abort(404);
        }
        $result = $this->photo_rep->updatePhoto($request,$photo);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->route('admin.portfolios.index')->with($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        if($photo == null) {
            abort(404);
        }
        $result = $this->photo_rep->deletePhoto($photo);
        if(is_array($result) && !empty($result['error'])) {
            return back()->with($result);
        }
        return redirect()->back()->with($result);
    }
}
