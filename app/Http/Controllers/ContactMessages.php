<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactMessages extends Controller
{
    //


    public function showForm () {
        return view('contact');
    }

    public function saveContact (Request $request) {
        $validator = Validator::make($request->all(), [
            'fullname' => ['required', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'message' => ['required', 'max:555'],
            'agreement' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect($request->path())
                        ->withErrors($validator)
                        ->withInput();
        }

        $newContact = new Contact;
        $newContact->name = $request->fullname;
        $newContact->email = $request->email;
        $newContact->message = $request->message;

        $newContact->save();

        return view('contact', ['post_success' => 'success']);
    }
}
