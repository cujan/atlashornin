<?php

namespace Todo;
use Nette;

class CiselnikFarbaRepository extends Repository {
    public function findById($id)
    {
	return $this->findAll()->get($id);
    }
}

