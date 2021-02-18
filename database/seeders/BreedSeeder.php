<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Breed;
use App\Models\SubBreed;
use Illuminate\Support\Facades\Http;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
