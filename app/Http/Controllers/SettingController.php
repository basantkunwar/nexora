<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function store(SettingRequest $request)
    {
        $data = $request->validated();

        // SAVE NORMAL FIELDS
        settings()->set($data);

        // ALL FILE FIELDS
        $files = [
            'logo',
            'favicon',
            'banner',
            'home_banner1',
            'home_banner2',
            'home_banner3',
            'offer_banner',
            'footer_banner1',
        ];

        foreach ($files as $file) {

            if ($request->hasFile($file)) {

                // DELETE OLD FILE IF EXISTS
                if (settings($file)) {
                    Storage::disk('public')->delete(settings($file));
                }

                // STORE NEW FILE
                $path = $request->file($file)->store('settings', 'public');

                settings()->set([
                    $file => $path
                ]);
            }
        }

        return redirect()
            ->route('settings.index')
            ->with('success', 'Settings updated successfully');
    }
}