<?php namespace App\Providers;

use App\Casehistory;
use App\Service;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->composeNavigation();

        $this->composeLatestCasehistories();

    }

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

    /**
     * Compose the navigation bar.
     */
    private function composeNavigation()
    {
        //  if is more compless use a dedicated one
        view()->composer('partials.nav', 'App\Http\Composers\NavigationComposer');

        //  for simple app do this way
       // view()->composer('partials.nav', function ($view) {

       //     $view->with('servicesMenu', Service::get());

        //});
    }

    private function composeLatestCasehistories()
    {
        view()->composer('app', function ($view) {

            $view->with('otherCasehistories', Casehistory::with('pictures')->latest()->take(6)->get());

        });
    }


}
