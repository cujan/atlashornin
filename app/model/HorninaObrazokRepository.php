<?php

namespace Todo;
use Nette;

class HorninaObrazokRepository extends Repository {
    public function findById($id)
    {
	return $this->findAll()->get($id);
    }
    
    public function vlozObrazok($zaznam)
	{
	$this->getTable()->insert($zaznam);
	}
    
    
    
}

