<?php
require_once('../../model/InsuredPerson.php');
require_once('../InsuredPersonController.php');

// Assigns the JSON data to variable in String format
$person_data = utf8_encode($_POST['jsonData']);

// Converts JSON string to Object
$personJson = json_decode($person_data);

// Instantiate Insured Person
$person = new InsuredPerson (
  $personJson->age,
  $personJson->dependents,
  $personJson->houseOwnershipStatus,
  $personJson->income,
  $personJson->maritalStatus,
  $personJson->vehicleYear,
  $personJson->riskQuestion1,
  $personJson->riskQuestion2,
  $personJson->riskQuestion3
);

var_dump($person);

calculate_insurance_risk_score(null);
exit();
?>