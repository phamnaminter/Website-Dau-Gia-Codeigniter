<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalog_model extends MY_Model {


	public function __construct()
	{
		parent::__construct();
		$this->table = 'catalog';
	}

}

/* End of file Catalog_model.php */
/* Location: ./application/models/Catalog_model.php */ 