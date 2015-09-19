<?php

namespace CodeAgenda\Providers;

use CodeAgenda\Entities\Pessoa;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if(!\App::runningInConsole()){
            view()->share(['letras' => $this->getLetra()]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function getLetra()
    {
        foreach(Pessoa::orderBy("apelido")->get() as $pessoa){
            $letra[] = substr($pessoa->apelido,0,1);
        }

        return array_unique($letra);
    }
}
