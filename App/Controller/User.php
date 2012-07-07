<?php

namespace App\Controller;

use Absolute\Controller\Action;

class User extends Action {
	
	protected function timelineAction() {
		$this->view->user = $this->getParam(0);
		
		$this->render();
	}
	
}