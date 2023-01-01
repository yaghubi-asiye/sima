<?php

namespace App\Providers;

use App\Models\Tdl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $auth = auth()->user();
        if($auth != null){

        $monthNumber = $date = jdate('now')->format('%m');
        $dayNumber = $date = jdate('now')->format('%d');
        $monthNumberStr = '%' . "$monthNumber" . '%';
        $dayNumberStr = '%' . '%' . "$dayNumber";
        $box['1'] = Tdl::where("jDate", "like", "$dayNumberStr")->where('user_id', auth()->user()->id)->count('id');
        $box['2'] = Tdl::where("jDate", "like", "$dayNumberStr")->where('user_id', auth()->user()->id)->where('status', 'انجام شده')->count('id');
        $box['5'] = Tdl::where("jDate", "like", "$monthNumberStr")->where('user_id', auth()->user()->id)->count('id');
        $box['6'] = Tdl::where("jDate", "like", "$monthNumberStr")->where('user_id', auth()->user()->id)->where('status', 'انجام شده')->count('id');
        $e = now();
        // dd($e);


        view()->share([
            'box'=>$box,
            'e' => $e
        ]);
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
}
