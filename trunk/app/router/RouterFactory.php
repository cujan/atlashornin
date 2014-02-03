<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList(); 

		$router[] = new Route('index.php', 'Front:Homepage:default', Route::ONE_WAY);
   # admin
   $router[] = $adminRouter = new RouteList('Admin');
   $adminRouter[] = new Route('admin/[<lang [a-z]{2}>/]<presenter>/<action>[/<id>]', 'Homepage:default');
   # front
   $router[] = $frontRouter = new RouteList('Front');
   $frontRouter[] = new Route('[<lang [a-z]{2}>/]<action>', 'Homepage:default');

   $frontRouter[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');

   return $router;
	}

}
