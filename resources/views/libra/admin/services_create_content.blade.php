<div id="content-page" class="content group">
    <div class="hentry group">

        {!! Form::open(['url' => (isset($service->id)) ? route('admin.services.update',['services'=>$service->id]) : route('admin.services.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <ul>

            <li class="textarea-field">
                <label for="message-contact-us">
                    <span class="label">Заголовок:</span>
                </label>
                <div class="input-prepend"><span class="add-on"></span>
                    {!! Form::textarea('title', isset($service->title) ? $service->title  : old('title'), ['id'=>'editor2','class' => 'form-control','placeholder'=>'Введите заголовок']) !!}
                </div>
                <div class="msg-error"></div>
            </li>

            <li class="textarea-field">
                <label for="message-contact-us">
                    <span class="label">Краткое описание:</span>
                </label>
                <div class="input-prepend"><span class="add-on"></span>
                    {!! Form::textarea('desc', isset($service->desc) ? $service->desc  : old('desc'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст описание']) !!}
                </div>
                <div class="msg-error"></div>
            </li>



            @if(isset($service->img))
                <li class="textarea-field">

                    <label>
                        <span class="label">Изображения слайдера:</span>
                    </label>

                    {{ Html::image(asset(env('THEME')).'/images/services/'.$service->img,'',['style'=>'width:400px']) }}
                    {!! Form::hidden('old_image',$service->img) !!}

                </li>
            @endif


            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Изображение:</span>
                    <br />
                    <span class="sublabel">Изображение сервиса</span><br />
                </label>
                <div class="input-prepend">
                    {!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
                </div>

            </li>


            @if(isset($service->id))
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