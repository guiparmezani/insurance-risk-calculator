<?php
class InsuredPerson {
  private $age;
  private $dependents;
  private $house;
  private $income;
  private $maritalStatus;
  private $vehicle;
  private $riskQuestions;

  function __construct($age, $dependents, $house, $income, $maritalStatus, $vehicle, $riskQuestions) {
    $this->age = $age;
    $this->dependents = $dependents;
    $this->house = $house;
    $this->income = $income;
    $this->maritalStatus = $maritalStatus;
    $this->vehicle = $vehicle;
    $this->riskQuestions = $riskQuestions;
  }

  public function getAge(){
    return $this->age;
  }

  public function setAge($age){
    $this->age = $age;
  }

  public function getDependents(){
    return $this->dependents;
  }

  public function setDependents($dependents){
    $this->dependents = $dependents;
  }

  public function getHouse(){
    return $this->house;
  }

  public function setHouse($house){
    $this->house = $house;
  }

  public function getIncome(){
    return $this->income;
  }

  public function setIncome($income){
    $this->income = $income;
  }

  public function getMaritalStatus(){
    return $this->maritalStatus;
  }

  public function setMaritalStatus($maritalStatus){
    $this->maritalStatus = $maritalStatus;
  }

  public function getVehicle(){
    return $this->vehicle;
  }

  public function setVehicle($vehicle){
    $this->vehicle = $vehicle;
  }

  public function getRiskQuestions(){
    return $this->riskQuestions;
  }

  public function setRiskQuestions($riskQuestions){
    $this->riskQuestions = $riskQuestions;
  }


  // Checks for imperative rules..
  public function getIneligibilityList () {
    $ineligibilityList = [];

    if ($this->getAge() > 59) {
      array_push($ineligibilityList, 'life');
      array_push($ineligibilityList, 'disability');
    }

    if (!in_array('disability', $ineligibilityList) && $this->getIncome() != null && $this->getIncome() < 1) {
      array_push($ineligibilityList, 'disability');
    }

    if ($this->getVehicle()->getYear() == null || $this->getVehicle()->getYear() == 0 || $this->getVehicle()->getYear() == '') {
      array_push($ineligibilityList, 'auto');
    }

    if ($this->getHouse()->getOwnershipStatus() == null || $this->getHouse()->getOwnershipStatus() == '') {
      array_push($ineligibilityList, 'home');
    }

    return $ineligibilityList;
  }
}

?>