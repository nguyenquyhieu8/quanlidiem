<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('applicant')->get();

        return view('admin.feedback.index', compact('contacts'));
    }
}
