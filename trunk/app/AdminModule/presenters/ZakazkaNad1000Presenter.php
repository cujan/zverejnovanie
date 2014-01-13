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
class ZakazkaNad1000Presenter extends \BasePresenter {

    /**
     * (non-phpDoc)
     *
     * @see Nette\Application\Presenter#startup()
     */
    private $zakazkaNad1000Repository;
    
    protected function startup() {
	parent::startup();
	$this->zakazkaNad1000Repository = $this->context->zakazkaNad1000Repository;
    }

    public function actionDefault() {
	
    }

    public function renderDefault() {
	
    }
    
     /************** edit ****************************/
    public function renderEdit($id = 0)
	{
		$form = $this['zakazkaForm'];
		if (!$form->isSubmitted()) {
			$zakazka = $this->zakazkaNad1000Repository->findById($id);
			if (!$zakazka) {
				$this->error('Zaznam nenajdeny');
			}
			$form->setDefaults($zakazka);
		}
	}
    /********************* view delete *********************/
    public function renderDelete($id = 0)
	{
		$this->template->zakazky = $this->zakazkaNad1000Repository->findById($id);
		if (!$this->template->zakazky) {
			$this->error('Záznam nenájdený');
		}
	}

    protected function createComponentGridZakazkaNad1000($name)
    {
	$grid = new Grid($this, $name);
	$grid->translator->lang = 'sk';
	$grid->filterRenderType = Filter::RENDER_INNER;
	//$grid->setDefaultSort(array('zverejnenie'=>'desc'));
	$grid->setModel($this->zakazkaNad1000Repository->findAll());
	$grid->addColumnText('komodita', 'Komodita')->setSortable()->setFilterText();
	$grid->addColumnDate('terminUskutocnenia', 'Termín uskutočnenia')->setDateFormat(Date::FORMAT_DATE)->setSortable()->setFilterText();
	$grid->addColumnDate('zverejnenie', 'Zverejnenie')->setDateFormat(Date::FORMAT_DATE)->setSortable()->setFilterText();
	$grid->addActionHref('edit', 'Edit')->setIcon('pencil');
	$grid->addActionHref('delete', 'Delete')->setIcon('pencil');
	
    }
    
    
    
    //formular pre pridanie zakazky
    protected function createComponentZakazkaForm() {
		
	$form = new Form;
	$form->addText('komodita','Komodita');
	$form->addDate('terminUskutocnenia', 'Termín uskutočnenia', DateInput::TYPE_DATE)
		->addRule(Form::VALID);
	$form->addDate('zverejnenie', 'Zverejnenie', DateInput::TYPE_DATE)
		->addRule(Form::VALID);
	$form->addSubmit('uloz', 'Ulož')->onClick[] = callback($this, 'zakazkaFormSubmitted');
	$form->addSubmit('cancel', 'Storno')->onClick[] = callback($this,'cancelFormSubmitted');
	//$form->onSuccess[] = callback($this, 'zakazkaFormSubmitted');
	return $form;
	   
    }
    
     // volá se po úspěšném odeslání formuláře
    public function zakazkaFormSubmitted($button)
    {
        $values = $button->getForm()->getValues();
		
		$id = (int) $this->getParameter('id');
		if ($id) {
			$this->zakazkaNad1000Repository->findById($id)->update($values);
			$this->flashMessage('Zákazka bola upravená.');
		} else {
			$this->zakazkaNad1000Repository->findAll()->insert($values);
			$this->flashMessage('Zákazka bola pridaná.');
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
		$this->zakazkaNad1000Repository->findById($this->getParameter('id'))->delete();
		$this->flashMessage('Zákazka bola úspešne zmazaná.');
		$this->redirect('default');
	}
    public function cancelFormSubmitted()
	{
		$this->redirect('default');
	}



	    

}