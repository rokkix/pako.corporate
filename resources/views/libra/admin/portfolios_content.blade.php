@if($portfolios)
    <div id="content-page" class="content group">
        <div class="hentry group">
            <h2>Добавленные статьи</h2>
            <div class="short-table white">
                <table style="width: 100%" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="align-left">ID</th>
                        <th>Заголовок</th>
                        <th>Псевдоним</th>
                        <th>Текст</th>
                        <th>Изображение</th>
                        <th>Фильтр</th>
                        <th>Клиент</th>
                        <th>Вложенные фото</th>
                        <th>Дествие</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($portfolios as $portfolio)
                        <tr>
                            <td class="align-left">{{$portfolio->id}}</td>
                            <td class="align-left">{!! Html::link(route('admin.portfolios.edit',['portfolios'=>$portfolio->alias]),$portfolio->title) !!}</td>
                            <td class="align-left">{{$portfolio->alias}}</td>
                            <td class="align-left">{{str_limit($portfolio->text,200)}}</td>
                            <td>

                                @if(isset($portfolio->img->mini))
                                    {!! Html::image(asset(env('THEME')).'/images/portfolios/'.$portfolio->img->max) !!}
                                @endif
                            </td>
                            <td>{{$portfolio->filter->title}}</td>
                            <td>{{$portfolio->customer}}</td>

                            <td>{!! Html::link(route('admin.photos.show',['photos'=>$portfolio->id]),'Редактировать',['class' => 'btn btn-the-salmon-dance-3']) !!}</td>
                            <td>
                                {!! Form::open(['url' => route('admin.portfolios.destroy',['$portfolio'=>$portfolio->alias]),'class'=>'form-horizontal','method'=>'POST']) !!}
                                {{ method_field('DELETE') }}
                                {!! Form::button('Удалить', ['class' => 'btn btn-french-5','type'=>'submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {!! Html::link(route('admin.portfolios.create'),'Добавить  материал',['class' => 'btn btn-the-salmon-dance-3']) !!}


        </div>
        <!-- START COMMENTS -->

        <!-- END COMMENTS -->
    </div>
@else
    {!! Html::link(route('admin.portfolios.create'),'Добавить  материал',['class' => 'btn btn-the-salmon-dance-3']) !!}
@endif