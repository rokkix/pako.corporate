@if($services)
    <div id="content-page" class="content group">
        <div class="hentry group">
            <h2>Добавленные сервисы</h2>
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

                    @foreach($services as $service)
                        <tr>
                            <td class="align-left">{{$service->id}}</td>
                            <td class="align-left">{!! Html::link(route('admin.services.edit',['services'=>$service->id]),$service->title) !!}</td>
                            <td class="align-left">{{str_limit($service->desc,200)}}</td>
                            <td>

                                @if(isset($service->img))
                                    {!! Html::image(asset(env('THEME')).'/images/services/'.$service->img) !!}
                                @endif
                            </td>

                            <td>
                                {!! Form::open(['url' => route('admin.services.destroy',['services'=>$service->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                                {{ method_field('DELETE') }}
                                {!! Form::button('Удалить', ['class' => 'btn btn-french-5','type'=>'submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {!! Html::link(route('admin.services.create'),'Добавить  материал',['class' => 'btn btn-the-salmon-dance-3']) !!}


        </div>
        <!-- START COMMENTS -->
        <div id="comments">
        </div>
        <!-- END COMMENTS -->
    </div>
@else

 {!! Html::link(route('admin.services.create'),'Добавить  материал',['class' => 'btn btn-the-salmon-dance-3']) !!}
@endif