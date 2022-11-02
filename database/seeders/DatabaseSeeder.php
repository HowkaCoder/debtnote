<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name"=>"Howka",
            "phone"=>"972206114",
            "role"=>"user",
            "password"=>Hash::make('admin')
        ]);
        
        $mytime = Carbon::now();
        $date =  $mytime->toDateTimeString();

        DB::table('debts')->insert([
            'user_id'=>1,
            'd_name'=>"anyone",
            'd_phone'=>123456789,
            'cost'=>1000000,
            'date'=>$date
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\Debt::factory(10)->create();

    }
}
