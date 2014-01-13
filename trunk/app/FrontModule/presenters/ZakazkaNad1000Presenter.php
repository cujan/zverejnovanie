<?php
namespace FrontModule;
use Grido\Grid, Grido\Components\Filters\Filter,
	\Grido\Components\Columns\Date;

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
	//$grid->addAction('edit', 'Edit')->setIcon('pencil');
	//$grid->addAction('delete', 'Delete')->setIcon('pencil');
	
    }

}