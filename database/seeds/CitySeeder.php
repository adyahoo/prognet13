<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use App\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders(['key'=>'f9941f3ab651b045b7b3c32e83edc255'])->get('https://api.rajaongkir.com/starter/city');
        $citys = $response['rajaongkir']['results'];
        foreach ($citys as $city) {
          $data_city[]=[
            'id'=>$city['city_id'],
            'province_id'=>$city['province_id'],
            'city_name'=>$city['city_name'],
            'postal_code'=>$city['postal_code']
          ];
        };

        City::insert($data_city);
    }
}
