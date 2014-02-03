<?php

namespace FrontModule;

use Nette,
	Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends \BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
