<?php
namespace AdminModule;
/**
 * Homepage presenter.
 */
use Murdej\Menu;
class HomepagePresenter extends \BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

	public function createComponentHlavneMenu() {
	    $menu = new Menu;
	    $menuItem = new \Murdej\MenuNode();
	    $menuItem->name = "Položka v první úrovni";
	    $menuItem->link = 'Presenter:akce';
	    $menuItem->id = 'polozka1';
	    return $menu;
	}
	
}
