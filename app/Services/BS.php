<?php
namespace App\Services;

use Config;
class Bs
{
	private $date;
	public function __construct(){
		$this->date = Config::get('cal');
	}
	public function getDate(){
		return $this->date;
	}
}