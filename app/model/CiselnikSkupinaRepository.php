<?php

namespace Todo;
use Nette;

class CiselnikSkupinaRepository extends Repository {
     public function findById($id)
    {
	return $this->findAll()->get($id);
    }
}