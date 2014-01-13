<?php
namespace FrontModule;
use Grido\Grid, Grido\Components\Filters\Filter,
 Grido\Components\Columns\Date;

/**
 * Description of FakturyPresenter
 *
 * @author holub
 */
class ZmluvyPresenter extends \BasePresenter {

    /**
     * (non-phpDoc)
     *
     * @see Nette\Application\Presenter#startup()
     */
    private $zmluvyRepository;
    
    protected function startup() {
	parent::startup();
	$this->zmluvyRepository = $this->context->zmluvyRepository;
    }

    public function actionDefault() {
	
    }

    public function renderDefault() {
	
    }
    
    protected function createComponentGridZmluvy($name)
    {
	$grid = new Grid($this, $name);
	$grid->translator->lang = 'sk';
	$grid->filterRenderType = Filter::RENDER_INNER;
	//$grid->setDefaultSort(array('zverejnenie'=>'desc'));
	$grid->setModel($this->zmluvyRepository->findAll());
	$grid->addColumnText('cisloZmluvy', 'Číslo zmluvy')->setSortable()->setFilterText();
	$grid->addColumnText('popis', 'Popis')->setSortable()->setFilterText();
	$grid->addColumnDate('zverejnenie', 'Zverejnenie')->setDateFormat(Date::FORMAT_DATE)->setSortable()->setFilterText();
	//$grid->addAction('edit', 'Edit')->setIcon('pencil');
	//$grid->addAction('delete', 'Delete')->setIcon('pencil');
	
    }

}