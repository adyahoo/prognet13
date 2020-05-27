<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use App\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	$response = Http::withHeaders(['key'=>'f9941f3ab651b045b7b3c32e83edc255'])->get('https://api.rajaongkir.com/starter/province');
       	$provinces = $response['rajaongkir']['results'];
       	foreach ($provinces as $province) {
       		$data_province[]=[
       			'id'=>$province['province_id'],
       			'province'=>$province['province']
       		];
       	};

       	Province::insert($data_province);
    }
}
