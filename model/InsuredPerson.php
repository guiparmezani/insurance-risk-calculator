<?php
class InsuredPerson {
  private $age;
  private $dependents;
  private $houseOwnershipStatus;
  private $income;
  private $maritalStatus;
  private $vehicleYear;
  private $riskQuestion1;
  private $riskQuestion2;
  private $riskQuestion3;

  function __construct($age, $dependents, $houseOwnershipStatus, $income, $maritalStatus, $vehicleYear, $riskQuestion1, $riskQuestion2, $riskQuestion3) {
    $this->age = $age;
    $this->dependents = $dependents;
    $this->houseOwnershipStatus = $houseOwnershipStatus;
    $this->income = $income;
    $this->maritalStatus = $maritalStatus;
    $this->vehicleYear = $vehicleYear;
    $this->riskQuestion1 = $riskQuestion1;
    $this->riskQuestion2 = $riskQuestion2;
    $this->riskQuestion3 = $riskQuestion3;
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

  public function getHouseOwnershipStatus(){
    return $this->houseOwnershipStatus;
  }

  public function setHouseOwnershipStatus($houseOwnershipStatus){
    $this->houseOwnershipStatus = $houseOwnershipStatus;
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

  public function getVehicleYear(){
    return $this->vehicleYear;
  }

  public function setVehicleYear($vehicleYear){
    $this->vehicleYear = $vehicleYear;
  }

  public function getRiskQuestion1(){
    return $this->riskQuestion1;
  }

  public function setRiskQuestion1($riskQuestion1){
    $this->riskQuestion1 = $riskQuestion1;
  }

  public function getRiskQuestion2(){
    return $this->riskQuestion2;
  }

  public function setRiskQuestion2($riskQuestion2){
    $this->riskQuestion2 = $riskQuestion2;
  }

  public function getRiskQuestion3(){
    return $this->riskQuestion3;
  }

  public function setRiskQuestion3($riskQuestion3){
    $this->riskQuestion3 = $riskQuestion3;
  }
}

?>