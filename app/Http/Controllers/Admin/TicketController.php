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
            "Authorization" => "token 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"
        ])->get('https://api.github.com/repos/RGeetha24/gitapi/issues');
        $datas = $response->json();
        return view('tickets/index',compact('datas'));
    }

    public function editissue($id){
        $response = Http::withHeaders([
            "Accept" => "application/vnd.github.v3+json" ,
            "Authorization" => "token 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"
        ])->get('https://api.github.com/repos/RGeetha24/gitapi/issues/'.$id);
        $data = $response->json();
        return view('tickets/edit',compact('data'));
    }

    public function createissue(Request $request){
        $response = Http::withHeaders([
            "Accept" => "application/vnd.github.v3+json" ,
            "Authorization" => "token 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"
        ])->post('https://api.github.com/repos/RGeetha24/gitapi/issues',['title'=>$request->title,'body'=>$request->description]);
        $data = $response->json();
        return redirect()->route('issues')->with('success',"Issue added successfully");
    }

    public function updateissue($id,Request $request){
        $response = Http::withHeaders([
            "Accept" => "application/vnd.github.v3+json" ,
            "Authorization" => "token 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"
        ])->post('https://api.github.com/repos/RGeetha24/gitapi/issues/'.$id,['title'=>$request->title,'body'=>$request->description]);
        $data = $response->json();
        return redirect()->route('issues')->with('success',"Issue updated successfully");
    }

    public function lockissue($id){
        $response = Http::withHeaders([
            "Accept" => "application/vnd.github.v3+json" ,
            "Authorization" => "token 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"
        ])->put("https://api.github.com/repos/RGeetha24/gitapi/issues/".$id."/lock",['lock_reason'=>"off-topic"]);
        return redirect()->route('issues')->with('success',"Issue locked successfully");
    }

    public function unlockissue($id){
        $response = Http::withHeaders([
            "Accept" => "application/vnd.github.v3+json" ,
            "Authorization" => "token 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"
        ])->delete("https://api.github.com/repos/RGeetha24/gitapi/issues/".$id."/lock",['lock_reason'=>"off-topic"]);
        return redirect()->route('issues')->with('success',"Issue unlocked successfully");
    }
}
