<?php

namespace App;

use Absolute\View\Layout,
	Absolute\Router\Route,
	Absolute\Application\Bootstrap AS AbsBootstrap,
	Absolute\Registry;

class Bootstrap extends AbsBootstrap{
	
	protected function initMongo() {
		$mongo = new \Mongo();
		
		Registry::set('mongo', $mongo);
	}
	
	protected function initRouter() {
		/*
		*
		* Routes
		* 	/
		* 		Go to Home/Index
		*
		* /profile
		* 		Go to User/profile
		* 			Param:
		* 				login = session
		*
		*
		* /settings
		* 		Go to Settings/index
		*
		* /help
		* 		Go to Helper/index
		*
		* /register
		* 		Go to Register/index
		*
		* /$login$
		* 		Go to User/timeline
		* 			Param:
		* 				login = $login$
		*/
		
		$this->getRouter()
			->addRoute( new Route('help', 'help') )
			->addRoute( new Route('register', 'register') )
			->addRoute( new Route('settings', 'settings') )
			->addRoute( new Route('profile', 'profile', 'profile') )
			->addRoute( new Route('home page', 'home', 'index', '#^$#i') )
			->addRoute( new Route('users profiles', 'user', 'timeline', '/^profile\/(.*)/') )
			->addRoute( new Route('user name', 'user', 'timeline', '/(.*)/') )
			;
	}
	
	protected function initLayout() {
		Layout::getInstance()
			->getHeaderStyle()
				->append('/statics/bootstrap/assets/css/bootstrap.css')
				->append('/statics/bootstrap/assets/css/bootstrap-responsive.css');
		
		Layout::getInstance()
			->getHeaderScript()
				->append('/statics/bootstrap/assets/js/jquery.js')
				->append('/statics/bootstrap/assets/js/google-code-prettify/prettify.js')
				->append('/statics/bootstrap/assets/js/bootstrap-transition.js')
				->append('/statics/bootstrap/assets/js/bootstrap-alert.js')
				->append('/statics/bootstrap/assets/js/bootstrap-modal.js')
				->append('/statics/bootstrap/assets/js/bootstrap-dropdown.js')
				->append('/statics/bootstrap/assets/js/bootstrap-scrollspy.js')
				->append('/statics/bootstrap/assets/js/bootstrap-tab.js')
				->append('/statics/bootstrap/assets/js/bootstrap-tooltip.js')
				->append('/statics/bootstrap/assets/js/bootstrap-popover.js')
				->append('/statics/bootstrap/assets/js/bootstrap-button.js')
				->append('/statics/bootstrap/assets/js/bootstrap-collapse.js')
				->append('/statics/bootstrap/assets/js/bootstrap-carousel.js')
				->append('/statics/bootstrap/assets/js/bootstrap-typeahead.js')
				;
	}
}