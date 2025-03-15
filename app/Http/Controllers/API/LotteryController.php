<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function otos() {
        
        $url = 'https://bet.szerencsejatek.hu/cmsfiles/otos.csv';

        $response = Http::get($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Nem sikerült letölteni a fájlt'], 500);
        }

        $content = $response->body();

        return response()->streamDownload(function () use ($content) {
            echo $content;
        }, 'otos.csv', [
            'Content-Type' => 'text/csv',
        ]);

    }

    public function skandi()
    {
        //
    }

}
