<div id="page-meta" class="group">
    <div class="container">
        <div class="row">
            <div class="span12">
                <!-- TITLE -->
                <div class="title">
                    <div class="icontitle">
                        <img src="{{ asset(env('THEME')) }}/images/contact-form/contact_icon.png" alt="title"/>
                    </div>
                    <div class="title-with-icon">
                        <h1>Email</h1>
                    </div>
                </div>

                <!-- BREDCRUMB -->
                <div class="breadcrumbs">
                    <span class="before-text">Перейти на:</span>

                    <p id="yit-breadcrumb" itemprop="breadcrumb">
                        <a class="home" href="{{ route('home') }}">Главную страницу</a> |
                        <a class="no-link current" href="{{ route('portfolios.index') }}">Наши работы</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SLOGAN -->
<div class="slogan">
    <h3>Отправить нам письмо</h3>


</div>
<!-- END SLOGAN -->

@if (count($errors) > 0)
    <div class="box error-box">

        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

    </div>
@endif

@if (session('status'))
    <div class="box success-box">
        {{ session('status') }}
    </div>
@endif
<div id="content-page" class="span9 content group">
    <div class="page type-page status-publish hentry group">
        <form class="contact-form row" method="post" action="{{ route('contacts') }}" enctype="multipart/form-data">

            <div class="usermessagea"></div>
            <fieldset>

                <ul>

                    <li class="text-field with-icon span3">

                        <label for="name-contact-form">
                            <span class="mainlabel">Имя</span>
                        </label>

                        <div class="input-prepend"><span class="add-on">
                                        <img src="{{ asset(env('THEME')) }}/images/contact-form/user.png" alt="" title="" /></span><input type="text" name="yit_contact[name]" id="name-contact-form" class="with-icon required" value="" />
                        </div>

                        <div class="msg-error"></div>

                        <div class="clear"></div>
                    </li>

                    <li class="text-field with-icon span3">

                        <label for="email-contact-form">
                            <span class="mainlabel">Почта</span>
                        </label>

                        <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="{{ asset(env('THEME')) }}/images/contact-form/envelope.png" alt="" title="" />
                                        </span>
                            <input type="text" name="yit_contact[email]" id="email-contact-form" class="with-icon required email-validate" value="" />
                        </div>

                        <div class="msg-error"></div>

                        <div class="clear"></div>
                    </li>

                    <li class="text-field with-icon span3">

                        <label for="phone-contact-form">
                            <span class="mainlabel">Телефон</span>
                        </label>

                        <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="{{ asset(env('THEME')) }}/images/contact-form/phone.png" alt="" title="" />
                                        </span>
                            <input type="text" name="yit_contact[phone]" id="phone-contact-form" class="with-icon" value="" />
                        </div>

                        <div class="msg-error"></div>

                        <div class="clear"></div>
                    </li>

                    <li class="textarea-field with-icon span9">

                        <label for="message-contact-form">
                            <span class="mainlabel">Сообщение</span>
                        </label>

                        <div class="input-prepend">
                                        <span class="add-on">
                                            <img src="{{ asset(env('THEME')) }}/images/contact-form/pencil.png" alt="" title="" />
                                        </span>
                            <textarea name="yit_contact[message]" id="message-contact-form" rows="8" cols="30" class="with-icon required"></textarea>
                        </div>

                        <div class="msg-error"></div>

                        <div class="clear"></div>
                    </li>

                    <li class="submit-button span9">
                        {{ csrf_field() }}
                        <input type="text" name="yit_bot" id="yit_bot" />
                        <input type="hidden" name="yit_action" value="sendemail"/>
                        <input type="hidden" name="yit_referer" value="get-in-touch.html" />
                        <input type="hidden" name="id_form" value="4" />
                        <input type="submit" name="yit_sendemail" value="Отправить сообщение" class="sendmail alignright" />
                        <div class="clear"></div>
                    </li>
                </ul>
            </fieldset>
        </form>

        <script type="text/javascript">
            var messages_form_4 = {
                name: "Укажите имя",
                email: "Укажите email",
                phone: "",
                message: "Напишите сообщение"
            };
        </script>
    </div>
</div>