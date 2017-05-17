<div id="content-page" class="content group">
    <div class="hentry group">

        {!! Form::open(['url' => (isset($photo->id)) ? route('admin.photos.update',['photos'=>$photo->id]) : route('admin.photos.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <ul>










            @if(isset($photo->img->path))
                <li class="textarea-field">

                    <label>
                        <span class="label">Изображения материала:</span>
                    </label>

                    {{ Html::image(asset(env('THEME')).'/images/photos/'.$photo->img->path,'',['style'=>'width:400px']) }}
                    {!! Form::hidden('old_image',$photo->img->path) !!}

                </li>
            @endif


            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Изображение:</span>
                    <br />
                    <span class="sublabel">Изображение материала</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
                </div>

            </li>

                {{--<li class="text-field">--}}
                    {{--<label for="name-contact-us">--}}
                        {{--<span class="label">Ссылка на запись портфолио:</span>--}}
                        {{--<br />--}}
                        {{--<span class="sublabel">Ссылка на запись портфолио</span><br />--}}
                    {{--</label>--}}
                    {{--<div class="input-prepend">--}}
                        {{--{!! Form::select('portfolio_id', $test, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Не используется']) !!}--}}

                    {{--</div>--}}

                {{--</li>--}}

            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Категория:</span>
                    <br />
                    <span class="sublabel">Категория материала</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::select('portfolio_id', $portfolio_id, (isset($option) && $option) ? $option :FALSE) !!}
                </div>

            </li>

            @if(isset($photo->id))
                <input type="hidden" name="_method" value="PUT">

            @endif

            <li class="submit-button">
                {!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
            </li>

        </ul>





        {!! Form::close() !!}

        <script>
            CKEDITOR.replace( 'editor' );
            CKEDITOR.replace( 'editor2' );
        </script>
    </div>
</div>