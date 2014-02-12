<?php
namespace Todo;
use Nette;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HorninaTexturaRepository
 *
 * @author holub
 */
class HorninaTexturaRepository extends Repository{
    
     public function vlozZaznam($idHornina,$textura)
    {
	return $this->getTable()->insert(array('idHornina'=>$idHornina,'idCiselnikTextura'=>$textura));
    }
}


