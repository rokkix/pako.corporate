<?php

namespace Pako\Http\Controllers;

use Illuminate\Http\Request;

use Pako\Http\Requests;
use Pako\Repositories\MenusRepositories;
use Pako\Menu;
use Illuminate\Support\Facades\Mail;


class ContactsController extends SiteController
{
    public function __construct()
    {
        parent::__construct(new MenusRepositories(new Menu()));
        
        $this->template = env('THEME') . '.contacts';

    }

    public function index(Request $request) {

        if ($request->isMethod('post')) {


            $messages = [
                'required' => "Поле :attribute обязательно к заполнению",
                'email' => "Поле :attribute должно соответствовать email адресу"
            ];
            $this->validate($request, [
                'yit_contact.name' => 'required|max:255',
                'yit_contact.email' => 'required|email',
                'yit_contact.message' => 'required'

            ], $messages);

            $data = $request['yit_contact'];


            $result = Mail::send(env('THEME') . '.email', ['data' => $data], function ($message) use ($data) {
                $mail_admin = env('MAIL_ADMIN');
                $message->from($data['email'], $data['name']);
                $message->to($mail_admin, 'Mr. Admin')->subject('Question');
            });
            if ($result) {
                 return redirect()->route('contacts')->with('status','Email is send');
                   }
        }


         $contact_sidebar = view(env('THEME').'.contact_sidebar')->render();
         $this->vars = array_add($this->vars,'contact_sidebar' , $contact_sidebar);
         $content = view(env('THEME'). '.contact_content')->render();
         $this->vars = array_add($this->vars,'content' ,$content );

        return $this->renderOutput();

    }
}
