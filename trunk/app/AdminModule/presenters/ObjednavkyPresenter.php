<?php
namespace AdminModule;
use Grido\Grid, Grido\Components\Filters\Filter,
	\Grido\Components\Columns\Date,
	Grido\Components\Columns\Column,
	Nette\Application\UI\Form,
	Nette\Utils\Html,
	Vodacek\Forms\Controls\DateInput;

/**
 * Description of ObjednavkyPresenter
 *
 * @author holub
 */
class ObjednavkyPresenter extends \BasePresenter {

    /**
     * (non-phpDoc)
     *
     * @see Nette\Application\Presenter#startup()
     */
    private $objednavkyRepository;
    
    protected function startup() {
	parent::startup();
	$this->objednavkyRepository = $this->context->objednavkyRepository;
    }

    public function actionDefault() {
	
    }

    public function renderDefault() {
	
    }
    
     /************** edit ****************************/
    public function renderEdit($id = 0)
	{
		$form = $this['objednavkaForm'];
		if (!$form->isSubmitted()) {
			$objednavka = $this->objednavkyRepository->findById($id);
			if (!$objednavka) {
				$this->error('Zaznam nenajdeny');
			}
			$form->setDefaults($objednavka);
		}
	}
    /********************* view delete *********************/
    public function renderDelete($id = 0)
	{
		$this->template->objednavky = $this->objednavkyRepository->findById($id);
		if (!$this->template->objednavky) {
			$this->error('Záznam nenájdený');
		}
	}

    protected function createComponentGridObjednavka($name)
    {
	$grid = new Grid($this, $name);
	$grid->translator->lang = 'sk';
	$grid->filterRenderType = Filter::RENDER_INNER;
	//$grid->setDefaultSort(array('zverejnenie'=>'desc'));
	$grid->setModel($this->objednavkyRepository->findAll());
	$grid->addColumnText('cisloObjednavky', 'Číslo objednávky')->setSortable()->setFilterText();
	$grid->addColumnText('predmetObjednavky', 'Predmet objednávky')->setSortable()->setFilterText();
	$grid->addColumnText('dodavatel', 'Dodávateľ')->setSortable()->setFilterText();
	$grid->addColumnText('objednavatel', 'Objednávateľ')->setSortable()->setFilterText();
	$grid->addColumnText('vystavenie', 'Vystavenie')->setSortable()->setFilterText();
	$grid->addColumnText('zverejnene', 'Zverejnenie')->setSortable()->setFilterText();
	
	$grid->addActionHref('edit', 'Edit')->setIcon('pencil');
	$grid->addActionHref('delete', 'Delete')->setIcon('pencil');
	
    }
    
    
    
    //formular pre pridanie zakazky
    protected function createComponentObjednavkaForm() {
		
	$form = new Form;
	$form->addText('cisloObjednavky','Číslo objednávky');
	$form->addText('predmetObjednavky','Predmet objednávky');
	$form->addText('dodavatel','Dodávateľ');
	$form->addText('objednavatel','Objednávateľ');
		
	$form->addDate('vystavenie', 'Vystavenie', DateInput::TYPE_DATE)
		->addRule(Form::VALID);
	$form->addDate('zverejnene', 'Zverejnenie', DateInput::TYPE_DATE)
		->addRule(Form::VALID);
	$form->addSubmit('uloz', 'Ulož')->onClick[] = callback($this, 'objednavkaFormSubmitted');
	$form->addSubmit('cancel', 'Storno')->onClick[] = callback($this,'cancelFormSubmitted');
	//$form->onSuccess[] = callback($this, 'zakazkaFormSubmitted');
	return $form;
	   
    }
    
     // volá se po úspěšném odeslání formuláře
    public function objednavkaFormSubmitted($button)
    {
        $values = $button->getForm()->getValues();
		
		$id = (int) $this->getParameter('id');
		if ($id) {
			$this->objednavkyRepository->findById($id)->update($values);
			$this->flashMessage('Objednávka bola upravená.');
		} else {
			$this->objednavkyRepository->findAll()->insert($values);
			$this->flashMessage('Objednávka bola pridaná.');
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
		$this->objednavkyRepository->findById($this->getParameter('id'))->delete();
		$this->flashMessage('Objednávka bola úspešne zmazaná.');
		$this->redirect('default');
	}
    public function cancelFormSubmitted()
	{
		$this->redirect('default');
	}



	    

}