<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class ContactFormController extends Controller
{
    public function store(ContactFormRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Mail::to(config('mail.contact_form_recipient', env('CONTACT_FORM_RECIPIENT')))
            ->send(new ContactFormMail(
                name: $validated['name'],
                email: $validated['email'],
                phone: $validated['phone'] ?? null,
                messageContent: $validated['message'],
            ));

        return back()->with('success', 'Dziękujemy! Wiadomość została wysłana.');
    }
}
