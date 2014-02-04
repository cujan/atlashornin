<?php

namespace Todo;
use Nette;

class CiselnikTexturaRepository extends Repository {
     public function findById($id)
    {
	return $this->findAll()->get($id);
    }
}