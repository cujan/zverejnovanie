<?php
namespace Todo;
use Nette;

class ObjednavkyRepository extends Repository{
    public function findById($id)
	{
		return $this->findAll()->get($id);
	}
}

