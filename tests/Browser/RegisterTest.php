<?php

use Illuminate\Support\Facades\Auth;

it('registers a user', function () {
    visit('/register')
        -> fill('name' , 'Ananya')
        -> fill('email' , 'ananya@webexpertinfotech.com')
        -> fill('password' , 'ananya@2026')
        -> click('Create Account')
        -> assertPathIs('/');

    $this->assertAuthenticated();

    expect(Auth::user())->toMatchArray([
        'name' => 'Ananya' ,
        'email' => 'ananya@webexpertinfotech.com'
    ]);
});

it('requires a valid email', function () {
    visit('/register')
        -> fill('name' , 'Ananya')
        -> fill('email' , 'ananya@example.com')
        -> fill('password' , 'ananya@2026')
        -> click('Create Account')
        -> assertPathIs('/register');
});
