<?php

namespace App\Providers\Macros;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class DateServiceProvider extends ServiceProvider
{

    private $aMeses = [
        '1' => 'Enero',
        '2' => 'Febrero',
        '3' => 'Marzo',
        '4' => 'Abril',
        '5' => 'Mayo',
        '6' => 'Junio',
        '7' => 'Julio',
        '8' => 'Agosto',
        '9' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    ];

    private $aDaysOfWeek = [
        '0' => 'Domingo',
        '1' => 'Lunes',
        '2' => 'Martes',
        '3' => 'Miércoles',
        '4' => 'Jueves',
        '5' => 'Viernes',
        '6' => 'Sábado'
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $aMeses = $this->aMeses;
        $aDaysOfWeek = $this->aDaysOfWeek;

        Carbon::macro('getStringMonth', function() use($aMeses) {
            return $aMeses[$this->month];
        });

        Carbon::macro('getStringDay', function() use($aDaysOfWeek) {
            return $aDaysOfWeek[$this->dayOfWeek];
        });

        Carbon::macro('formatedDate', function() {
            return "{$this->getStringDay()}, {$this->format('d')} de {$this->getStringMonth()} del {$this->format('Y')}";
        });

        Carbon::macro('getTimeDiff', function() use($aDaysOfWeek) {
            $timeDif = $this->diff(Carbon::now());

            $string = '';
            if ($timeDif->d > 2) {
                $string = $this->formatedDate();
            } elseif ($timeDif->d != 0) {
                $conjugacion = $timeDif->d > 1 ? 'dias' : 'dia';
                $string = "Hace {$timeDif->d} $conjugacion";
            } elseif ($timeDif->h != 0) {
                $conjugacion = $timeDif->h > 1 ? 'horas' : 'hora';
                $string = "Hace {$timeDif->h} $conjugacion";
            } elseif ($timeDif->i != 0) {
                $conjugacion = $timeDif->i > 1 ? 'minutos' : 'minuto';
                $string = "Hace {$timeDif->i} $conjugacion";
            } else {
                $string = "Reciente";
            }
            return $string;
        });
    }
}
