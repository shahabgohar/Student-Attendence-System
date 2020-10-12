<?php
namespace App\ReuseableCode;
trait ProvideDate{

    public function provideDate(){
        $ca = \Carbon\Carbon::now()->toArray();
        return $ca['year'].":".$ca['month'].":".$ca['day'];
    }
    public function provideTime(){
        $ca = \Carbon\Carbon::now()->toArray();
        return $ca['hour'].":".$ca['minute'].":".$ca['second'];
    }
}
