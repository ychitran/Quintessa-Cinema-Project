<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function listContact() {
        $contacts = Contact::all();
        return response()->json($contacts);
    }
}
