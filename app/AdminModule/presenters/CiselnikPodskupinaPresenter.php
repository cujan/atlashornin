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
class CiselnikPodskupinaPresenter extends \BasePresenter
{
	private $ciselnikPodskupinaRepository;
	
	
	protected function startup() {
	    parent::startup();
	    $this->ciselnikPodskupinaRepository = $this->context->ciselnikPodskupinaRepository;
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
		$polozka = $this->ciselnikPodskupinaRepository->findById($id);
		if(!$polozka){
		    $this->error('Zaznam nenajdeny');
		}
		$form->setDefaults($polozka);
	    }
	}
	
	/*********** view delete ***********/
	public function renderDelete($id = 0)
	{
	    $this->template->polozky = $this->ciselnikPodskupinaRepository->findById($id);
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
	    $this->ciselnikPodskupinaRepository->findById($this->getParameter('id'))->delete();
	    $this->flashMessage('Polozka bola zmazana');
	    $this->redirect('default');
	}

	



	protected function createComponentGridCiselnikPodskupina($name) {
	    $grid = new Grid($this,$name);
	    $grid->translator->lang = 'sk';
	    $grid->filterRenderType = Filter::RENDER_INNER;
	    $grid->setModel($this->ciselnikPodskupinaRepository->findAll());
	    $grid->addColumnText('nazov', 'nazov');
	    
	    $grid->addActionHref('edit', 'Edituj');
	    $grid->addActionHref('delete', 'Zmaz');
	    
	}
	
	/************ formular pre pridanie ***********/
	
	protected function createComponentPolozkaForm($name) {
	    
	    $form = new Form;
	    $form->addText('nazov', 'Nazov');
	    
	    $form->addSubmit('uloz','Uloz')->onClick[]=  callback($this, 'nazovFormSubmitted');
	    $form->addSubmit('cancel','Storno')->onClick[]=  callback($this, 'cancelFormSubmitted');
	    
	    return $form;
	}
	
	//vola sa po uspesnom odoslani formulara
	public function  nazovFormSubmitted($button)
	{
	    $values = $button->getForm()->getValues();
	    $id = (int) $this->getParameter('id');
	    if($id){
		$this->ciselnikPodskupinaRepository->findById($id)->update($values);
		$this->flashMessage('Nazov upraveny');
	    } else {
		$this->ciselnikPodskupinaRepository->findAll()->insert($values);
		$this->flashMessage('Nazov pridany');
	    }
	    $this->redirect('default');
	}

	public function cancelFormSubmitted(){
	    $this->redirect('default');
	}
}
