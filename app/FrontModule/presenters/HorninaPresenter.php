<?php
namespace FrontModule;
/**
 * Description of HorninaPresenter
 *
 * @author holub
 */

use Nette,
	Model,
	Grido\Grid,
	Grido\Components\Filters\Filter,
	Nette\Application\UI\Form;

class HorninaPresenter extends \BasePresenter {

    /**
     * (non-phpDoc)
     *
     * @see Nette\Application\Presenter#startup()
     */
    private $horninaRepository;
    private $horninaObrazokRepository;
    protected function startup() {
	parent::startup();
	$this->horninaRepository = $this->context->horninaRepository;
	$this->horninaObrazokRepository = $this->context->horninaObrazokRepository;
    }

    public function actionDefault() {
	
    }

    public function renderDefault() {
	
    }
    /************ detail ************/
	public function  renderEdit($id = 0)
	{
	    
	    $this->template->hornina = $this->horninaRepository->findById($id);
	    $this->template->obrazky = $this->horninaObrazokRepository->findBy(array('idHornina'=>$id));
	    
	    
	}
    
    protected function createComponentGridHornina($name) {
	    $grid = new Grid($this,$name);
	    $grid->translator->lang = 'sk';
	    $grid->filterRenderType = Filter::RENDER_INNER;
	    $grid->setModel($this->horninaRepository->findAll());
	    $grid->addColumnText('nazov', 'nazov');
	    $grid->addColumnText('idCiselnikSkupina', 'Skupina')->setColumn(function($item){return $item->ciselnikSkupina->nazov;});
	    $grid->addColumnText('idCiselnikFarba', 'Farba')->setColumn(function($item){return $item->ciselnikFarba->nazov;});
	    $grid->addColumnText('idCiselnikPodskupina', 'Podskupina')->setColumn(function($item){return $item->ciselnikPodskupina->nazov;});
	    
	    
	    $grid->addActionHref('edit', 'Detail');
	    
	    
	}

}