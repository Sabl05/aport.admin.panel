<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\WorkTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(): Factory|View|Application
    {
        $contacts = Contact::all();

        return view('contact.index', compact('contacts'));
    }

    public function store(Request $request): RedirectResponse
    {
        $contact = new Contact();
        $contact->title = $request->title;
        $contact->save();

        foreach ($request->work_time as $key => $work_time) {
            WorkTime::query()->create([
                'name' => $key,
                'since' => $work_time["since"],
                'till' => $work_time["till"],
                'contact_id' => $contact->id
            ]);
        }

        return redirect()->route('contact.index');
    }

    public function update(Request $request): RedirectResponse
    {
        $contact = Contact::query()->find($request->id);
        $contact->title = $request->title;
        foreach ($request->work_time as $key => $work_time) {
            WorkTime::query()
                ->where([
                    ['contact_id', $contact->id],
                    ['name', $key]
                ])->update([
                    'since' => $work_time["since"],
                    'till' => $work_time["till"],
                ]);
        }

        return redirect()->route('contact.index');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        WorkTime::query()->where('contact_id', $contact->id)->delete();
        $contact->delete();

        return redirect()->route('contact.index');
    }
}
