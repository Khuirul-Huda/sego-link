<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function create(Request $request)
    {
        function random() {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $random_str = '';
          
            for ($i = 0; $i < 5; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $random_str .= $characters[$index];
            }
          
            return $random_str;
        }
        $username = $request->username;
        $dest_link = $request->dest_link;
        $wrapper_url = ( $request->wrapper_url ?? random());

        $link = Link::create([
            'username' => $username,
            'dest_link' => $dest_link,
            'wrapper_url' => $wrapper_url
        ]);
        $status_message = 'success';

        $data = [
            $status_message,
            $link->wrapper_url
        ];
        return view('home', ['data' => $data]);
        
    }

    public function go($key)
    {
        $getlink = Link::where('wrapper_url', $key)->get();
        $redirect_url = ($getlink[0]->dest_link ?? '/');
        return redirect($redirect_url, 302);
    }
}
