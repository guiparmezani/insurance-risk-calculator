<?php

/**
 * Methods that the Insurance Person controller should implement.
 *
 * @author  Guilherme Parmezani <g@parmezani.com>
 */
interface InsuredPersonInterface {
  public function calculateInsuranceScoreRisk($insuredPerson);
}

?>