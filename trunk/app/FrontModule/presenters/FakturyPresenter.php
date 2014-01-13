<?php
namespace FrontModule;
use Grido\Grid, Grido\Components\Filters\Filter;;

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
	$this->template->faktury = $this->fakturyRepository->findAll();
    }
    
    protected function createComponentGridFaktury($name)
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
	//$grid->addColumnDate('dorucenie', 'Doručenie')->setSortable()->setFilterText();
	//$grid->addColumnDate('splatnost', 'Splatnosť')->setSortable()->setFilterText();
	$grid->addColumnDate('zverejnenie', 'Zverejnenie')->setSortable()->setFilterText();
	
	//$grid->addAction('edit', 'Edit')->setIcon('pencil');
	//$grid->addAction('delete', 'Delete')->setIcon('pencil');
	
    }

}