<?php
namespace AdminModule;
use Grido\Grid, Grido\Components\Filters\Filter,
	\Grido\Components\Columns\Date,
	Grido\Components\Columns\Column,
	Nette\Application\UI\Form,
	Nette\Utils\Html,
	Vodacek\Forms\Controls\DateInput;

/**
 * Description of FakturyPresenter
 *
 * @author holub
 */
class FakturyPresenter extends \BasePresenter {

    /**
     * (non-phpDoc)
     *
     * @see Nette\Application\Presenter#startup()
     */
    private $fakturyRepository;
    
    protected function startup() {
	parent::startup();
	$this->fakturyRepository = $this->context->fakturyRepository;
    }

    public function actionDefault() {
	
    }

    public function renderDefault() {
	
    }
    
     /************** edit ****************************/
    public function renderEdit($id = 0)
	{
		$form = $this['fakturaForm'];
		if (!$form->isSubmitted()) {
			$faktura = $this->fakturyRepository->findById($id);
			if (!$faktura) {
				$this->error('Zaznam nenajdeny');
			}
			$form->setDefaults($faktura);
		}
	}
    /********************* view delete *********************/
    public function renderDelete($id = 0)
	{
		$this->template->faktury = $this->fakturyRepository->findById($id);
		if (!$this->template->faktury) {
			$this->error('Záznam nenájdený');
		}
	}

    protected function createComponentGridFaktura($name)
    {
	$grid = new Grid($this, $name);
	$grid->translator->lang = 'sk';
	$grid->filterRenderType = Filter::RENDER_INNER;
	//$grid->setDefaultSort(array('zverejnenie'=>'desc'));
	$grid->setModel($this->fakturyRepository->findAll());
	$grid->addColumnText('cisloFaktury', 'Cislo Faktury')->setSortable()->setFilterText();
	$grid->addColumnText('predmetFaktury', 'Predmet faktúry')->setSortable()->setFilterText();
	$grid->addColumnText('dodavatel', 'Dodávateľ')->setSortable()->setFilterText();
	$grid->addColumnText('objednavatel', 'Objednávateľ')->setSortable()->setFilterText();
	$grid->addColumnText('celkovaHodnota', 'Celková hodnota')->setSortable()->setFilterText();
	$grid->addColumnDate('dorucenie', 'Doručenie')->setSortable()->setFilterText();
	$grid->addColumnDate('splatnost', 'Splatnosť')->setSortable()->setFilterText();
	$grid->addColumnDate('zverejnenie', 'Zverejnenie')->setSortable()->setFilterText();
	
	$grid->addActionHref('edit', 'Edit')->setIcon('pencil');
	$grid->addActionHref('delete', 'Delete')->setIcon('pencil');
	
    }
    
    
    
    //formular pre pridanie zakazky
    protected function createComponentFakturaForm() {
		
	$form = new Form;
	$form->addText('cisloFaktury','Cislo Faktury');
	$form->addText('predmetFaktury','Predmet faktúry');
	$form->addText('dodavatel','Dodávateľ');
	$form->addText('objednavatel','Objednávateľ');
	$form->addText('celkovaHodnota','Celková hodnota');
	
	$form->addDate('dorucenie', 'Doručenie', DateInput::TYPE_DATE)
		->addRule(Form::VALID);
	$form->addDate('splatnost', 'Splatnosť', DateInput::TYPE_DATE)
		->addRule(Form::VALID);
	$form->addDate('zverejnenie', 'Zverejnenie', DateInput::TYPE_DATE)
		->addRule(Form::VALID);
	$form->addSubmit('uloz', 'Ulož')->onClick[] = callback($this, 'fakturaFormSubmitted');
	$form->addSubmit('cancel', 'Storno')->onClick[] = callback($this,'cancelFormSubmitted');
	//$form->onSuccess[] = callback($this, 'zakazkaFormSubmitted');
	return $form;
	   
    }
    
     // volá se po úspěšném odeslání formuláře
    public function fakturaFormSubmitted($button)
    {
        $values = $button->getForm()->getValues();
		
		$id = (int) $this->getParameter('id');
		if ($id) {
			$this->fakturyRepository->findById($id)->update($values);
			$this->flashMessage('Faktúra bola upravená.');
		} else {
			$this->fakturyRepository->findAll()->insert($values);
			$this->flashMessage('Faktúra bola pridaná.');
		}
		$this->redirect('default');

        
        
    }
    
    protected function createComponentDeleteForm()
	{
		$form = new Form;
		$form->addSubmit('delete', 'Zmaž')->onClick[]= callback($this, 'deleteFormSucceeded');
		$form->addSubmit('cancel','Storno')->onClick[]= callback($this, 'cancelFormSubmitted');
		$form->addProtection();
		return $form;
	}
    public function deleteFormSucceeded()
	{
		$this->fakturyRepository->findById($this->getParameter('id'))->delete();
		$this->flashMessage('Faktúra bola úspešne zmazaná.');
		$this->redirect('default');
	}
    public function cancelFormSubmitted()
	{
		$this->redirect('default');
	}



	    

}