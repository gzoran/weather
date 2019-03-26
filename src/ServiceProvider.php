<?php

/*
 * This file is part of the gzoran/weather.
 *
 * (c) gzoran <zhengzhe94@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Gzoran\Weather;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * @author Mike <zhengzhe94@gmail.com>
     */
    public function register()
    {
        $this->app->singleton(Weather::class, function () {
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    /**
     * @author Mike <zhengzhe94@gmail.com>
     *
     * @return array
     */
    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}
