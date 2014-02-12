<?php
namespace Todo;
use Nette;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HorninaStrukturaRepository
 *
 * @author holub
 */
class HorninaStrukturaRepository extends Repository{
    public function vlozZaznam($idHornina,$struktura)
    {
	return $this->getTable()->insert(array('idHornina'=>$idHornina,'idCiselnikStruktura'=>$struktura));
    }
}


