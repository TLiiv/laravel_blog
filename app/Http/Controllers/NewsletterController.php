<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

use Exception;

class NewsletterController extends Controller
{
    public function __invoke(Newsletterw $newsletter)
    {

        request()->validate(['email' => 'required|email']);
    try{
        $newsletter->subscribe(request('email'));
    }catch(Exception $e){
        throw ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.'
        ]);
    }

     return redirect('/')->with('success','You are now signed up for our newsletter!');
    }
}
