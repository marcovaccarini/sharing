<?php namespace App\Http\Composers;
use Illuminate\Contracts\View\View;

/**
 * Created by IntelliJ IDEA.
 * User: marco
 * Date: 07/05/15
 * Time: 11.20
 */

class NavigationComposer {
    public function Compose(View $view){

        $view->with('servicesMenu', \App\Service::get());

        $view->with('navigationLatestCasehistories', \App\Casehistory::latest()->take(1)->get());


    }

}