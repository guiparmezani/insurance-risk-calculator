<?php

/**
 * House class. Holds House variables that are accessible via getters and setters only.
 *
 * @author  Guilherme Parmezani <g@parmezani.com>
 *
 */
class House {
  private $buildingType;
  private $ownershipStatus;
  
  function __construct($buildingType, $ownershipStatus) {
    $this->buildingType = $buildingType;
    $this->ownershipStatus = $ownershipStatus;
  }

  public function getBuildingType(){
    return $this->buildingType;
  }

  public function setBuildingType($buildingType){
    $this->buildingType = $buildingType;
  }

  public function getOwnershipStatus(){
    return $this->ownershipStatus;
  }

  public function setOwnershipStatus($ownershipStatus){
    $this->ownershipStatus = $ownershipStatus;
  }
}


?>