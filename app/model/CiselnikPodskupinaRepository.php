<?php

namespace Todo;
use Nette;

class CiselnikPodskupinaRepository extends Repository {
    public function findById($id)
    {
	return $this->findAll()->get($id);
    }
}

