@if($reviews)
    <div id="content-page" class="content group">
        <div class="hentry group">
            <h2>Добавленные отзывы</h2>
            <div class="short-table white">
                <table style="width: 100%" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="align-left">ID</th>

                        <th>Текст</th>


                        <th>Клиент</th>
                        <th>Город</th>
                        <th>Дествие</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($reviews as $review)
                        <tr>
                            <td class="align-left">{{$review->id}}</td>
                            <td class="align-left">{!! Html::link(route('admin.reviews.edit',['reviews'=>$review->id]),$review->text) !!}</td>


                            <td>{{$review->customer}}</td>
                            <td>{{$review->city}}</td>
                            <td>
                                {!! Form::open(['url' => route('admin.reviews.destroy',['reviews'=>$review->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
                                {{ method_field('DELETE') }}
                                {!! Form::button('Удалить', ['class' => 'btn btn-french-5','type'=>'submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {!! HTML::link(route('admin.reviews.create'),'Добавить  отзыв',['class' => 'btn btn-the-salmon-dance-3']) !!}


        </div>
    </div>
    @else
    {!! HTML::link(route('admin.reviews.create'),'Добавить  отзыв',['class' => 'btn btn-the-salmon-dance-3']) !!}
@endif