<?php
namespace Todo;
use Nette;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HorninaLokalitaSlovenskoRepository
 *
 * @author holub
 */
class HorninaLokalitaSlovenskoRepository extends Repository{
    public function vlozZaznam($idHornina,$lokalita)
    {
	return $this->getTable()->insert(array('idHornina'=>$idHornina,'idLokalitaSlovensko'=>$lokalita));
    }
}

?>
