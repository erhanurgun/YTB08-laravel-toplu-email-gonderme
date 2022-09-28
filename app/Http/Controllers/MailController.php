<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailManagement;

class MailController extends Controller
{
    public function index()
    {
        return view('include.compose-email');
    }

    public function addMailPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'theme' => 'required',
        ], [
            'title.required' => 'Lütfen başlık alanını doldurunuz!',
            'description.required' => 'Lütfen mesaj alanını doldurunuz!',
            'theme.required' => 'Lütfen bir tema seçiniz!',
        ]);

        EmailManagement::create([
            'title' => $request->title,
            'description' => $request->description,
            'theme' => $request->theme
        ]);

        return redirect()->route('compose-email')->withSuccess('Toplu e-posta gönderme işlemi başarılı bir şekilde geçekleşti');
    }
}
