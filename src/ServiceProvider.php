<?php
/**
 * Created by Mike <zhengzhe94@gmail.com>.
 * Date: 2019/3/25
 * Time: 17:48
 */

namespace Gzoran\Weather;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * @var boolean
     */
    protected $defer = true;

    /**
     * @author Mike <zhengzhe94@gmail.com>
     */
    public function register()
    {
        $this->app->singleton(Weather::class, function(){
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    /**
     * @author Mike <zhengzhe94@gmail.com>
     * @return array
     */
    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}