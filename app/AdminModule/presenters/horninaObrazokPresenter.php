<?php
namespace AdminModule;

use Nette,
	Model,
	Grido\Grid,
	Grido\Components\Filters\Filter,
	Nette\Application\UI\Form,
	Nette\Forms\IControl;
/**
 * Description of horninaObrazok
 *
 * @author holub
 */
class horninaObrazokPresenter extends \BasePresenter {

   
    private $horninaObrazokRepository;
    private $horninaRepository;
    
    
    protected function startup() {
	parent::startup();
	$this->horninaObrazokRepository = $this->context->horninaObrazokRepository;
	$this->horninaRepository = $this->context->horninaRepository;
	
    }

    public function actionDefault() {
	
    }

    public function renderDefault() {
	
    }
    
    public function renderDelete($id = 0)
	{
	    $this->template->polozky = $this->horninaObrazokRepository->findById($id);
	    if(!$this->template->polozky){
		$this->error('zaznam nenajdeny');
	    }
	}
    
    protected function createComponentGridHorninaObrazok($name){
	    $grid = new Grid($this,$name);
	    $grid->translator->lang = 'sk';
    	    $grid->filterRenderType = Filter::RENDER_INNER;
	    $grid->setModel($this->horninaObrazokRepository->findAll());
	    $grid->addColumnText('nazov', 'nazov');
	    $grid->addColumnText('popis', 'popis');
	    $grid->addColumnText('nazovSuboru', 'Subor');
	    $grid->addColumnText('idHornina', 'Hornina')->setColumn(function($item){return $item->hornina->nazov;});
	    $grid->addActionHref('delete', 'Zmaz');
    }
    
    /********** mazanie ********/
    protected function createComponentDeleteForm()
	{
	    $form = new Form();
	    $form->addSubmit('delete','Zmaz')->onClick[]=  callback($this,'deleteFormSucceeded');
	    $form->addSubmit('cancel','Storno')->onClick[]=  callback($this,'cancelFormSubmitted');
	    $form->addProtection();
	    return $form;
	}
	
	public function deleteFormSucceeded(){
	    $this->horninaObrazokRepository->findById($this->getParameter('id'))->delete();
	    $this->flashMessage('Polozka bola zmazana');
	    $this->redirect('default');
	}
    
    /************ formular pre pridanie ***********/
	
	protected function createComponentPolozkaForm($name) {
	   $hornina = $this->horninaRepository->findAll()->fetchPairs('id','nazov');
   	   

	   
	    
	    $form = new Form;
	    $form->addText('nazov', 'Nazov')->setRequired('Zvolte nazov');
	    $form->addText('popis', 'Popis')->setRequired('Zvolte popis');
	    $form->addSelect('idHornina','Hornina',$hornina);
	    $form ->addUpload('nazovSuboru', 'Súbor');
	    
	    
	    $form->addSubmit('uloz','Uloz')->onClick[]=  callback($this, 'nazovFormSubmitted');
	    $form->addSubmit('cancel','Storno')->onClick[]=  callback($this, 'cancelFormSubmitted');
	    
	    return $form;
	}
	
	//vola sa po uspesnom odoslani formulara
	public function  nazovFormSubmitted($button)
	{
	    $values = $button->getForm()->getValues();
	    //ziska nazov subor
	$suborNazov =$values->nazovSuboru->getName( );
	//unset($values->nazovSuboru);
	//prida nazov suboru do pola $values
	$values["nazovSuboru"]=$suborNazov;
	//vybere vlastnosti o subore
	
	
	//ulozi na server subor
	//$imgUrl = $this->context->dirs['wwwDir'] . '/images/horniny/' . $subor->name;
	//$subor->move($imgUrl);
	//$this->naleziskaObrazokRepository->vlozObrazok($values);
	
	//$values->nazovSuboru->move('/www/images/horniny');
	
	
	
	
	    $id = (int) $this->getParameter('id');
	   if($id){
		$this->horninaObrazokRepository->findById($id)->update($values);
		$this->flashMessage('Nazov upraveny');
	  } else {
		$this->horninaObrazokRepository->findAll()->insert($values);
		$this->flashMessage('Nazov pridany');
		
	    }
	    $this->redirect('default');
	    //dump($values);
	    //dump($subor);
	}

	public function cancelFormSubmitted(){
	    $this->redirect('default');
	}
    

}