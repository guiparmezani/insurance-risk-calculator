<?php
class Vehicle {
  private $type;
  private $model;
  private $millage;
  private $year;
  
  function __construct($type, $model, $millage, $year) {
    $this->type = $type;
    $this->model = $model;
    $this->millage = $millage;
    $this->year = $year;
  }

  public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getModel(){
		return $this->model;
	}

	public function setModel($model){
		$this->model = $model;
	}

	public function getMillage(){
		return $this->millage;
	}

	public function setMillage($millage){
		$this->millage = $millage;
	}

	public function getYear(){
		return $this->year;
	}

	public function setYear($year){
		$this->year = $year;
	}
}


?>