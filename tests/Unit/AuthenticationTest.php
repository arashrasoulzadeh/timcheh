<?php
namespace Tests\Unit;

use App\Services\Interfaces\AuthenticationServiceInterface;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    public static $token = '';
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_register()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $registration = $authService->register( [ 'name' => 'arash', 'email' => 'admin@admin.com', 'password' => '1234' ] );
        $this->assertTrue( $registration !== false );
    }

    public function test_login()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $login = $authService->login( [ 'email' => 'admin@admin.com', 'password' => '1234' ] );
        $this->assertTrue( $login !== false );

        self::$token = $login;
    }

    public function test_login_wrong()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $login = $authService->login( [ 'email' => 'admin@admin.com', 'password' => 'incorrect' ] );
        $this->assertFalse( $login );
    }

    public function test_check()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $login = $authService->login( [ 'email' => 'admin@admin.com', 'password' => '1234' ] );
        $this->assertTrue( $login === self::$token );
    }

    public function test_refresh()
    {
        $authService = App::make( AuthenticationServiceInterface::class );
        $refresh = $authService->refresh( self::$token );
        $this->assertTrue( $refresh === 'sample-refreshed-token' );
    }


}
