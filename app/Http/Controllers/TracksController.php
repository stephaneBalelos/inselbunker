<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TracksController extends Controller
{
    //

    public function showTracks(Request $request) {
        $rawTracks = $this->loadSCTracks()->json();
        $tracksList = array_map(function ($track) {
            return $track;
        }, $rawTracks);
        return view('work', ['tracks' => $tracksList]);
    }

    private function loadSCTracks() {
        $SCClientId = '95f22ed54a5c297b1c41f72d713623ef';
        // 550345083 763848805
        $SCuid = '550345083'; 
        return Http::get('http://api.soundcloud.com/users/' . $SCuid . '/tracks?client_id=' . $SCClientId);
    }
}
