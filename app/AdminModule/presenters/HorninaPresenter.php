<?php

namespace AdminModule;

use Nette,
	Model,
	Grido\Grid,
	Grido\Components\Filters\Filter,
	Nette\Application\UI\Form;


/**
 * Homepage presenter.
 */
class HorninaPresenter extends \BasePresenter
{
	private $horninaRepository;
	private $ciselnikSkupinaRepository;
	private $ciselnikFarbaRepository;
	private $ciselnikPodskupinaRepository;
	private $ciselnikTexturaRepository;
	private $ciselnikStrukturaRepository;
	private $lokalitaSlovenskoRepository;
	
	private $horninaLokalitaSlovenskoRepository;
	private $horninaStrukturaRepository;
	private $horninaTexturaRepository;
	
	
	protected function startup() {
	    parent::startup();
	    $this->horninaRepository = $this->context->horninaRepository;
	    $this->ciselnikSkupinaRepository = $this->context->ciselnikSkupinaRepository;
	    $this->ciselnikFarbaRepository = $this->context->ciselnikFarbaRepository;
	    $this->ciselnikPodskupinaRepository = $this->context->ciselnikPodskupinaRepository;
	    $this->ciselnikTexturaRepository = $this->context->ciselnikTexturaRepository;
	    $this->ciselnikStrukturaRepository = $this->context->ciselnikStrukturaRepository;
	    $this->lokalitaSlovenskoRepository = $this->context->lokalitaSlovenskoRepository;
	    $this->horninaLokalitaSlovenskoRepository = $this->context->horninaLokalitaSlovenskoRepository;
	    $this->horninaStrukturaRepository = $this->context->horninaStrukturaRepository;
	    $this->horninaTexturaRepository = $this->context->horninaTexturaRepository;
	}

		public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}
	
	/************ edit ************/
	public function  renderEdit($id = 0)
	{
	    $form = $this['polozkaForm'];
	    if (!$form->isSubmitted()){
		$polozka = $this->horninaRepository->findById($id);
		if(!$polozka){
		    $this->error('Zaznam nenajdeny');
		}
		$form->setDefaults($polozka);
	    }
	}
	
	/*********** view delete ***********/
	public function renderDelete($id = 0)
	{
	    $this->template->polozky = $this->horninaRepository->findById($id);
	    if(!$this->template->polozky){
		$this->error('zaznam nenajdeny');
	    }
	}
	
	protected function createComponentDeleteForm()
	{
	    $form = new Form();
	    $form->addSubmit('delete','Zmaz')->onClick[]=  callback($this,'deleteFormSucceeded');
	    $form->addSubmit('cancel','Storno')->onClick[]=  callback($this,'cancelFormSubmitted');
	    $form->addProtection();
	    return $form;
	}
	
	public function deleteFormSucceeded(){
	    $this->horninaRepository->findById($this->getParameter('id'))->delete();
	    $this->flashMessage('Polozka bola zmazana');
	    $this->redirect('default');
	}

	



	protected function createComponentGridCiselnikPodskupina($name) {
	    $grid = new Grid($this,$name);
	    $grid->translator->lang = 'sk';
	    $grid->filterRenderType = Filter::RENDER_INNER;
	    $grid->setModel($this->horninaRepository->findAll());
	    $grid->addColumnText('nazov', 'nazov');
	    $grid->addColumnText('idCiselnikSkupina', 'Skupina')->setColumn(function($item){return $item->ciselnikSkupina->nazov;});
	    $grid->addColumnText('idCiselnikFarba', 'Farba')->setColumn(function($item){return $item->ciselnikFarba->nazov;});
	    $grid->addColumnText('idCiselnikPodskupina', 'Podskupina')->setColumn(function($item){return $item->ciselnikPodskupina->nazov;});
	    
	    
	    $grid->addActionHref('edit', 'Edituj');
	    $grid->addActionHref('delete', 'Zmaz');
	    
	}
	
	/************ formular pre pridanie ***********/
	
	protected function createComponentPolozkaForm($name) {
	   $skupina = $this->ciselnikSkupinaRepository->findAll()->fetchPairs('id','nazov');
   	   $farba = $this->ciselnikFarbaRepository->findAll()->fetchPairs('id','nazov');
	   $podskupina = $this->ciselnikPodskupinaRepository->findAll()->fetchPairs('id','nazov');
	   $textura = $this->ciselnikTexturaRepository->findAll()->fetchPairs('id','nazov');
	   $struktura = $this->ciselnikStrukturaRepository->findAll()->fetchPairs('id','nazov');
	   $lokalitaSlovensko = $this->lokalitaSlovenskoRepository->findAll()->fetchPairs('id','nazov');
	   
	    
	    $form = new Form;
	    $form->addText('nazov', 'Nazov')->setRequired('Zvolte nazov');
	    $form->addSelect('idCiselnikSkupina','Skupina',$skupina);
	    $form->addSelect('idCiselnikFarba','Farba',$farba);
	    $form->addSelect('idCiselnikPodskupina','Podskupina',$podskupina);
	    $form->addCheckboxList('textura','textura',$textura);
	    $form->addCheckboxList('struktura','struktura',$struktura);
	    $form->addCheckboxList('lokalitaSlovensko','Lokalita Slovensko',$lokalitaSlovensko);
	    
	    
	    $form->addSubmit('uloz','Uloz')->onClick[]=  callback($this, 'nazovFormSubmitted');
	    $form->addSubmit('cancel','Storno')->onClick[]=  callback($this, 'cancelFormSubmitted');
	    
	    return $form;
	}
	
	//vola sa po uspesnom odoslani formulara
	public function  nazovFormSubmitted($button)
	{
	    $values = $button->getForm()->getValues();
	    $id = (int) $this->getParameter('id');
	    $textury = $values->textura;
	    $struktury = $values->struktura;
	    $lokality = $values->lokalitaSlovensko;
	    
	    unset($values->textura);
	    unset($values->struktura);
	    unset($values->lokalitaSlovensko);
	    
	    
	    if($id){
		//$this->horninaRepository->findById($idHornina)->update($values);
		$this->flashMessage('Nazov upraveny');
	    } else {
		$this->horninaRepository->findAll()->insert($values);
		$this->flashMessage('Nazov pridany');
		
		//vlozi zaznamy do tabulky horninaTextura
		if ($textury != NULL) {
		    foreach ($textury as $textura)
		    {
				$this->horninaTexturaRepository->vlozZaznam($idHornina,$textura);
		    }    
		}
		//vlozi zaznamy do tabulky struktura
		if ($struktury != NULL) {
		    foreach ($struktury as $struktura)
		    {
				$this->horninaStrukturaRepository->vlozZaznam($idHornina,$struktura);
		    }    
		}
		//vlozi zaznamy do tabulky horninaLokalitaSlovensko
		if ($lokality != NULL) {
		    foreach ($lokality as $lokalita)
		    {
				$this->horninaLokalitaSlovenskoRepository->vlozZaznam($idHornina,$lokalita);
		    }    
		}
		
	    }
	    $this->redirect('default');
	}

	public function cancelFormSubmitted(){
	    $this->redirect('default');
	}
}
