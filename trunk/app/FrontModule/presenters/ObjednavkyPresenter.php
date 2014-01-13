<?php
namespace FrontModule;
use Grido\Grid, Grido\Components\Filters\Filter;;

/**
 * Description of FakturyPresenter
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
    
    protected function createComponentGridObjednavky($name)
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
	//$grid->addAction('edit', 'Edit')->setIcon('pencil');
	//$grid->addAction('delete', 'Delete')->setIcon('pencil');
	
    }

}