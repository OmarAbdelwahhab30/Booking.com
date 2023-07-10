<?php

namespace Tests\Feature\Auth;

use App\Enum\UserRoleEnum;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
  use refreshDatabase;

      public function test_registration_succeeded_with_admin_role()
      {
            $response = $this->postJson("api/register",[
                'name'  =>  "admin",
                'email' =>  "admin1111@gmail.com",
                'password'  => "123456789",
                'password_confirmation' => "123456789",
                'role_id'   => Role::ROLE_ADMINISTRATOR,
            ]);

            $response->assertStatus(200);
      }

    public function test_registration_succeeded_with_user_role()
    {
        $response = $this->postJson("api/register",[
            'name'  =>  "user",
            'email' =>  "user@gmail.com",
            'password'  => "123456789",
            'password_confirmation' => "123456789",
            'role_id'   => Role::ROLE_USER,
        ]);

        $response->assertStatus(200)->assertJsonStructure([
            "status",
            "msg",
            "User" => [
                "name",
                "email",
                "role_id",
                "updated_at",
                "created_at",
                "id",
                "token",
            ]
        ]);
    }

    public function test_registration_succeeded_with_owner_role()
    {
        $response = $this->postJson("api/register",[
            'name'  =>  "owner",
            'email' =>  "owner@gmail.com",
            'password'  => "123456789",
            'password_confirmation' => "123456789",
            'role_id'   => Role::ROLE_OWNER,
        ]);

        $response->assertStatus(200)->assertJsonStructure([
            "status",
            "msg",
            "User" => [
                "name",
                "email",
                "role_id",
                "updated_at",
                "created_at",
                "id",
                "token",
            ]
        ]);
    }
}
