<?php

namespace App\Providers;

use App\BookCard;
use App\BorrowInfo;
use App\UserCard;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public $bookCat = ['Analog Electronic', 'Digital Electronic', 'Electronic Communication', 'Control', 'Computer', 'Programming', 'Thesis', 'Project', 'Handbook', 'Dictionary', 'Journal', 'Religion', 'Others'];

    public $major = ['Civil', 'Archi', 'EC', 'EP', 'IT', 'MP', 'MC'];

    public function userCount(){

        $user = new UserCard();
        return $user->count();

    }

    public function bookCount()
    {
        $book = new BookCard();
        return $book->count();
    }

    public function expired(){

        $today = date("Y-m-d");
        $info = new BorrowInfo();
        $count = $info->where('last_date',"<",$today)->where("return_status","0")->count();

        return $count;


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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::share('availability', ['unavailable','available']);
        View::share('bookCat', $this->bookCat);
        View::share('major', $this->major);
        View::share("userTotal",$this->userCount());
        View::share('bookTotal', $this->bookCount());
        View::share("expiredCount",$this->expired());
    }
}
