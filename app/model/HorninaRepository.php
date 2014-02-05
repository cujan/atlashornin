<?php

namespace Todo;
use Nette;

class HorninaRepository extends Repository {
    public function findById($id)
    {
	return $this->findAll()->get($id);
    }
}

