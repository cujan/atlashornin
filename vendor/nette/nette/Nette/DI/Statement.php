<?php

/**
 * This file is part of the Nette Framework (http://nette.org)
 * Copyright (c) 2004 David Grudl (http://davidgrudl.com)
 */

namespace Nette\DI;

use Nette;


/**
 * Assignment or calling statement.
 *
 * @author     David Grudl
 */
class Statement extends Nette\Object
{
	/** @var string  class|method|$property */
	public $entity;

	/** @var array */
	public $arguments;


	public function __construct($entity, array $arguments = array())
	{
		$this->entity = $entity;
		$this->arguments = $arguments;
	}

}
