<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    //function che riceve i dati e li salva nel db
    public function store(Request $request)
    {

        $mail_data = $request->all();

        $is_valid = true;

        //validations
        $validator = Validator::make(
            $mail_data,
            [
                'name' => 'required|min:3|max:100',
                'email' => 'required|email|max:255',
                'message' => 'required|min:10'
            ],
            [
                'name.required' => 'Nome obbligatorio!',
                'name.min' => 'Il nome deve avere almeno :min caratteri.',
                'name.max' => 'Il nome non può avere più di :max caratteri.',
                'email.required' => 'Email obbligatoria!',
                'email.email' => 'Inserisci una mail valida.',
                'email.max' => 'Superati :max caratteri, mail non valida.',
                'message.required' => 'Campo obbligatorio.',
                'message.min' => 'Il messagio deve avere almeno :min caratteri.'
            ]
        );

        //se ci sono errori li restituisce
        if ($validator->fails()) {
            $is_valid = false;
            $errors = $validator->errors();

            return response()->json(compact('is_valid', 'errors'));
        }

        //salvataggio nel db
        $new_lead = new Lead();
        $new_lead->fill($mail_data);
        $new_lead->save();

        //invio mail
        Mail::to('carmelo@boolean.com')->send(new NewContact($new_lead));

        return response()->json(compact('is_valid'));
    }
}
