<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TicketController extends Controller
{
    public function index(){
        $response = Http::withHeaders([
            "Accept" => "application/vnd.github.v3+json" ,
            "Authorization" => "token ".env('GITTOKEN')
        ])->get('https://api.github.com/repos/RGeetha24/gitapi/issues');
        $datas = $response->json();
        return view('tickets/index',compact('datas'));
    }

    public function editissue($id){

        $response = Http::withHeaders([
            "Accept" => "application/vnd.github.v3+json" ,
            "Authorization" => "token ".env('GITTOKEN')
        ])->get('https://api.github.com/repos/RGeetha24/gitapi/issues/'.$id);
        $data = $response->json();
        return view('tickets/edit',compact('data'));
    }
}
