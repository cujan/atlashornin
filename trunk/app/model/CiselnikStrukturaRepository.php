<?php

namespace Todo;
use Nette;

class CiselnikStrukturaRepository extends Repository {
     public function findById($id)
    {
	return $this->findAll()->get($id);
    }
}