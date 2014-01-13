<?php
namespace Todo;
use Nette;

class ZakazkaNad1000Repository extends Repository{
    public function findById($id)
	{
		return $this->findAll()->get($id);
	}

}
?>
