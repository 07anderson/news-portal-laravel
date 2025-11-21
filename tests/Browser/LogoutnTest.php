<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LogoutTest extends DuskTestCase
{
    public function testUserCanLogout()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1)) // usuario admin
                    ->visit('/dashboard') // o la ruta después del login
                    ->click('button[type="submit"]') // o el selector de logout
                    ->assertPathIs('/login');
        });
    }
}