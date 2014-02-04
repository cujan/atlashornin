<?php

namespace Todo;
use Nette;

class LokalitaSlovenskoRepository extends Repository {
     public function findById($id)
    {
	return $this->findAll()->get($id);
    }
}