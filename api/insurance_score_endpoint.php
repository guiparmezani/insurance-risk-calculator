<?php
/**
 * Insurance Score Calculator API endpoint script.
 *
 * @author  Guilherme Parmezani <g@parmezani.com>
 *
 * @param int    $example  This is an example function/method parameter description.
 * @param string $example2 This is a second example.
 */

require_once('../model/House.php');
require_once('../model/Vehicle.php');
require_once('../model/InsuredPerson.php');
require_once('../controller/InsuredPersonController.php');

// Converts JSON string to Object and assigns the data to variable
$personObject = json_decode(utf8_encode($_POST['jsonData']));

$personHouse = new House(null, $personObject->house->ownership_status);
$personVehicle = new Vehicle(null, null, null, $personObject->vehicle->year);

// Instantiate Insured Person using class's constructor function.
$insuredPerson = new InsuredPerson (
  intval($personObject->age),
  intval($personObject->dependents),
  $personHouse,
  number_format(floatval($personObject->income), 2, '.', ''),
  $personObject->marital_status,
  $personVehicle,
  $personObject->risk_questions
);

// Calls to controller and gets final results as a return. Then writes those results as the API response to the call. 
$insuredPersonController = new InsuredPersonController();
echo json_encode($insuredPersonController->calculateInsuranceScoreRisk($insuredPerson));

exit();
?>