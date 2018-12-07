<?php
/**
 * InstallServiceProvider.php
 *
 * PHP version 7
 *
 * @category    Providers
 * @package     App\Providers
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html LGPL-2.1
 * @link        https://xpressengine.io
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

/**
 * Class InstallServiceProvider
 *
 * @category    Providers
 * @package     App\Providers
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html LGPL-2.1
 * @link        https://xpressengine.io
 */
class InstallServiceProvider extends ServiceProvider
{
    /**
     * Service Provider Boot
     *
     * @return void
     */
    public function boot()
    {
        Route::get('/', function() {
            return redirect()->route('install.index');
        });

        Route::prefix('install')
            ->middleware('safe')
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/install.php'));

        app('config')->set('app.debug', true);

        // 실제 키 생성전 임시
        // .env 를 생성하지 않기 때문에 설치 전 encrypt key 값이 존재하지 않음
        app('config')->set('app.key', Str::random(32));
        \App\Http\Middleware\ExceptAppendableVerifyCsrfToken::setExcept('/install/post');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}
