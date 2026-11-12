<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    /**
     * Show the contact form.
     */
    public function create(): View
    {
        return view('contact.create');
    }

    /**
     * Store a message sent from the contact form.
     */
    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        ContactMessage::create($request->safe()->only(['name', 'email', 'subject', 'message']));

        return redirect()
            ->route('contact.create')
            ->with('status', '¡Gracias por escribirme! Te responderé lo antes posible.');
    }
}
