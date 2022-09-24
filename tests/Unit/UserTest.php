<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form(){
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_delete_user(){
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user){
            $user->delete();
        }

        $this->assertTrue(true);
    }

    public function test_guarda_nuevo_user(){
        $respuesta = $this->post('/register', [
            'name' => 'Rafael',
            'email' => 'rafael@gmail.com',
            'password' => 'rafael123',
            'password_confirmation' => 'rafael123'
        ]);

        return $respuesta->assertRedirect('/home');
    }

    // public function test_user_duplication(){
    //     $user1 = User::make([
    //         'name' => 'John Doe',
    //         'email' => 'johndoe@gmail.com'
    //     ]);

    //     $user2 = User::make([
    //         'name' => 'Dary',
    //         'email' => 'johndoe@gmail.com'
    //     ]);

    //     $this->assertTrue($user1->name != $user2->name);
    // }

    // public function test_user_duplication(){
    //     $user1 = User::make([
    //         'name' => 'John Dere',
    //         'email' => 'johndoe@gmail.com'
    //     ]);

    //     $user2 = User::make([
    //         'name' => 'Dary',
    //         'email' => 'dary@gmail.com'
    //     ]);

    //     $this->assertTrue($user1->email != $user2->email, $user1->name != $user2->name);
    // }

    public function test_loguea_usuario(){
        $respuesta = $this->post('/register', [
            'email' => 'rafaelgmail.com',
            'password' => 'rafael123',
        ]);

        return $respuesta->assertRedirect('/home');
    }
}
