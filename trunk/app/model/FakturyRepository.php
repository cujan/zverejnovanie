<?php
namespace Todo;
use Nette;

class FakturyRepository extends Repository{
    public function findById($id)
	{
		return $this->findAll()->get($id);
	}

}

