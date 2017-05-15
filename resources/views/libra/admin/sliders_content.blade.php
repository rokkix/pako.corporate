@if($sliders)
    <div id="content-page" class="content group">
        <div class="hentry group">
            <h2>Добавленные статьи</h2>
            <div class="short-table white">
                <table style="width: 100%" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="align-left">ID</th>
                        <th>Заголовок</th>
                        <th>Текст</th>
                        <th>Изображение</th>
                        <th>Дествие</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($sliders as $slider)
                        <tr>
                            <td class="align-left">{{$slider->id}}</td>
                            <td class="align-left">{!! Html::link(route('admin.sliders.edit',['sliders'=>$slider->id]),$slider->title) !!}</td>
                            <td class="align-left">{{str_limit($slider->desc,200)}}</td>
                            <td>

                                @if(isset($slider->img))
                                    {!! Html::image(asset(env('THEME')).'/images/slider/'.$slider->img) !!}
                                @endif
                            </td>

                            <td>
                                {!! Form::open(['url' => route('admin.sliders.destroy',['sliders'=>$slider->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                                {{ method_field('DELETE') }}
                                {!! Form::button('Удалить', ['class' => 'btn btn-french-5','type'=>'submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {!! HTML::link(route('admin.sliders.create'),'Добавить  материал',['class' => 'btn btn-the-salmon-dance-3']) !!}


        </div>
        <!-- START COMMENTS -->
        <div id="comments">
        </div>
        <!-- END COMMENTS -->
    </div>
@endif