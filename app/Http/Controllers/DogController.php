<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breed;
use App\Models\SubBreed;
use Illuminate\Support\Facades\Http;

class DogController extends Controller
{
    public function index(){
        $breeds = Breed::select('name', 'id')->with('sub:name,breed_id')->get();
        return view('home')->with([
            'breeds' => $breeds,
        ]);

    }

    public function get(){
        $data = Http::get('https://dog.ceo/api/breeds/list/all')->body();
        $data = json_decode($data, true);
        foreach($data['message'] as $key => $value){

            $breed = Breed::create([
                'name' => $key,
            ]);

            if(is_array($value)){
                foreach($value as $sub){
                    SubBreed::create([
                        'name' => $sub,
                        'breed_id' => $breed->id,
                    ]);
                }
            }
        };
        //return $data;
    }
}
