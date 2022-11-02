<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_server_check_out()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_User_database()
    {
        $this->assertDatabaseHas('users' ,[
            "name"=>"Howka",
            "phone"=>972206114,
            "role"=>'user',
        ]);
    }

    
    public function test_Debt_database()
    {
        $this->assertDatabaseHas('debts' ,[
            "d_name"=>"anyone",
            'd_phone'=>123456789,
            'cost'=>1000000,
        ]);
    }

    public function test_auth_user_login()
    {
        $response = $this->post('/api/login' , [
            "name"=>"Howka",
            "phone"=>"972206114",
            "role"=>"user",
            "password"=>Hash::make('admin')
        ] , ["Accept"=>"application/json"]);

        $response->assertStatus(200);
    }
}
