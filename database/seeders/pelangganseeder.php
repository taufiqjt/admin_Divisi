<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class pelangganseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($m=0;$m < 1111;$m++){

            if($m <= 222)
            {
                $userid = 1;
            }
            elseif($m <= 222 * 2)
            {
                $userid = 2;
            }
            elseif($m <= 222 * 3)
            {
                $userid = 3;
            }
            elseif($m <= 222 * 4)
            {
                $userid = 4;
            }
            else
            {
                $userid = 5;
            }
            
            DB::table('tb_pelanggan')->insert([
                'id_pelanggan'=>$faker->numerify('############'),
                'nama'=>$faker->name(),
                'alamat'=>$faker->address(),
                'tarif' => $faker->randomElement(['B3' ,'S3K','L','S3','T','P2','LB3','LP2']),
                'daya'=> $faker->numerify('######'),
                'gardu'=>$faker->bothify('??-###'),
                'user_id' =>  $userid,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
                ]);
        }
    }
}
