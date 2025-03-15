<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\String_;

class LotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getFile(String $url) {
        $response = Http::get($url);
        if ($response->failed()) {
            return response()->json(['error' => 'Nem sikerült letölteni a fájlt'], 500);
        }
        $content = $response->body();
        return $content;
    }

    public function otos() {
        $url = 'https://bet.szerencsejatek.hu/cmsfiles/otos.csv';
        $content = $this->getFile($url);

        return response()->streamDownload(function () use ($content) {
            echo $content;
        }, 'otos.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }

    public function skandi() {
        $url = 'https://bet.szerencsejatek.hu/cmsfiles/skandi.csv';
        $content = $this->getFile($url);

        return response()->streamDownload(function () use ($content) {
            echo $content;
        }, 'skandi.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }

    public function hatos(){
        $url = 'https://bet.szerencsejatek.hu/cmsfiles/hatos.csv';
        $content = $this->getFile($url);

        return response()->streamDownload(function () use ($content) {
            echo $content;
        }, 'hatos.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }

    public function eurojackpot(){
        $url = 'https://bet.szerencsejatek.hu/cmsfiles/eurojackpot.csv';
        $content = $this->getFile($url);

        return response()->streamDownload(function () use ($content) {
            echo $content;
        }, 'eurojackpot.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }

}
