<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Str;

class Url_controller extends Controller
{
    public function index(){
        $shortLinks = ShortLink::all()->sortByDesc('id');
        return view("index",compact('shortLinks'));
    }

    public function store(Request $req){
        $req->validate([
            'mainLink' =>'required|url'
        ]);

        $input['mainLink'] = $req->mainLink;
        $input['shortLink'] = "https://sheba/".Str::random(6);

        ShortLink::create($input);
        return redirect('/')->withSuccess('Short Link Generated..');
    }

    public function delete($id){
        $url = ShortLink::findOrFail($id);
        $url->delete();
        return redirect('/')->withSuccess('Link Deleted');
    }
}
