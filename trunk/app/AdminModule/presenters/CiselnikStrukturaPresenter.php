<?php

namespace AdminModule;

use Nette,
	Model;


/**
 * Homepage presenter.
 */
class CiselnikStrukturaPresenter extends \BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
