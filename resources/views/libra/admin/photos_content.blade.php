@if($photos)
    <div id="content-page" class="content group">
        <div class="hentry group">
            <h2>Добавленные статьи</h2>
            <div class="short-table white">
                <table style="width: 100%" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="align-left">ID</th>


                        <th>Изображение</th>
                        <th>Куда вложен</th>

                        <th>Дествие</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($photos as $photo)
                        <tr>
                            <td class="align-left">{!! Html::link(route('admin.photos.edit',['photos'=>$photo->id]),$photo->id) !!}</td>


                            <td>

                                @if(isset($photo->img->max))
                                    {!! Html::image(asset(env('THEME')).'/images/photos/'.$photo->img->max) !!}
                                @endif
                            </td>
                            <td>{{($photo->portfolio_id)}}</td>


                            <td>
                                {!! Form::open(['url' => route('admin.photos.destroy',['photos'=>$photo->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                                {{ method_field('DELETE') }}
                                {!! Form::button('Удалить', ['class' => 'btn btn-french-5','type'=>'submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {!! Html::link(route('admin.photos.create'),'Добавить  материал',['class' => 'btn btn-the-salmon-dance-3']) !!}


        </div>
        <!-- START COMMENTS -->
        <div id="comments">
        </div>
        <!-- END COMMENTS -->
    </div>
@endif