<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\JsonResponse as Json;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(): Json
    {
        $contacts = Contact::query()->with('workTime')->get();

        return response()->json($contacts);
    }
}
