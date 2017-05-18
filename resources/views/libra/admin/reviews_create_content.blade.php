<div id="content-page" class="content group">
    <div class="hentry group">

        {!! Form::open(['url' => (isset($review->id)) ? route('admin.reviews.update',['reviews'=>$review->id]) : route('admin.reviews.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <ul>
            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Отзыв:</span>
                    <br />
                    <span class="sublabel">Текст отзыва</span><br />
                </label>
                <div class="input-prepend"><span class="add-on"></span>
                    {!! Form::textarea('text', isset($review->text) ? $review->text  : old('text'), ['placeholder'=>'Введите текст страницы']) !!}
                </div>
            </li>



            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Клиент:</span>
                    <br />
                    <span class="sublabel">введите имя клиента</span><br />
                </label>
                <div class="input-prepend"><span class="add-on"></span>
                    {!! Form::text('customer', isset($review->customer) ? $review->customer  : old('customer'), ['placeholder'=>'Введите имя клиента']) !!}
                </div>
            </li>

            <li class="text-field">
                <label for="message-contact-us">
                    <span class="label">Населеный пункт:</span>
                </label>
                <div class="input-prepend"><span class="add-on"></span>
                    {!! Form::text('city', isset($review->city) ? $review->city  : old('customer'), ['placeholder'=>'Введите город']) !!}
                </div>
                <div class="msg-error"></div>
            </li>






            @if(isset($review->id))
                <input type="hidden" name="_method" value="PUT">

            @endif

            <li class="submit-button">
                {!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}
            </li>

        </ul>





        {!! Form::close() !!}


    </div>
</div>