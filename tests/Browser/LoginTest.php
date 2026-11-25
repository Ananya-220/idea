<?php

use App\Models\User;

it('logs in a user', function () {
    $user = User::factory() -> create(['password' => 'ananya@2026']);

    visit('/login')
        -> fill('email' , $user -> email)
        -> fill('password' , 'ananya@2026')
        -> click('@login-button')
        -> assertPathIs('/');

    $this->assertAuthenticated();

});

it('logs out a user', function () {
    $user = User::factory() -> create();

    $this -> actingAs($user);

    visit('/') -> click('Log Out');

    $this->assertGuest();

});
