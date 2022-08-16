<?php

/**
 * API response class. Stores the risk type for each insurance line.
 *
 * @author  Guilherme Parmezani <g@parmezani.com>
 *
 */
class InsuranceScore {
  public $auto;
  public $disability;
  public $home;
  public $life;
  
  function __construct($auto = 'ineligible', $disability = 'ineligible', $home = 'ineligible', $life = 'ineligible') {
    $this->auto = $auto;
    $this->disability = $disability;
    $this->home = $home;
    $this->life = $life;
  }
}


?>