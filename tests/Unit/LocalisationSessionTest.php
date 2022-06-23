<?php

namespace Tests\Unit;

use App\Models\User;
use Closure;
use http\Cookie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class LocalisationSessionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /** @test */
    public function test()
    {


        $language= 'nl';
        app()->setLocale($language);
        session()->put('locale', $language);

            $locale=Session::get('locale');
            if ($locale==='nl'){
                $this->assertTrue(true);
            }else{
                $this->assertTrue(false);
            }
    }
}
