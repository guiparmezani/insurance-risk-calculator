<?php
include 'InsuredPersonInterface.php';
include 'InsuranceScore.php';

class InsuredPersonController implements InsuredPersonInterface {

	/**
	 * Calculates the insurance risk score for a given person. Then translates the scores into terms in string format.
	 *
	 * @author  Guilherme Parmezani <g@parmezani.com>
	 *
	 * @param InsuredPerson $insuredPerson
	 */
	public function calculateInsuranceScoreRisk ($insuredPerson) {
		
		// Early return if person is ineligible to all four insurance lines
		$insuranceScore = new InsuranceScore();
		$ineligibilityList = $insuredPerson->getIneligibilityList();
		if (count($ineligibilityList) == 4) {
			return json_encode($insuranceScore);
		}
		
		// Calculates the base score by summing the risk questions points
		$allLinesVariations = 0;
		$riskQuestionsSum = 0;
		foreach ($insuredPerson->getRiskQuestions() as $riskQuestion) {
			$riskQuestionsSum += $riskQuestion;
		}

		// Key value array that stores the risk points.
		$insurancePoints = [
			'auto' => $riskQuestionsSum,
			'disability' => $riskQuestionsSum,
			'home' => $riskQuestionsSum,
			'life' => $riskQuestionsSum
		];

		// Business rules logic. Tests conditions and updates risk points
		if ($insuredPerson->getAge() < 30) {
			$allLinesVariations -= 2;
		} elseif ($insuredPerson->getAge() < 40) {
			$allLinesVariations -= 1;
		}

		if ($insuredPerson->getIncome() > 200000) {
			$allLinesVariations -= 1;
		}

		if ($insuredPerson->getHouse()->getOwnershipStatus() == 'mortgaged') {
			$insurancePoints['home'] += 1;
			$insurancePoints['disability'] += 1;
		}

		if ($insuredPerson->getDependents() > 0) {
			$insurancePoints['disability'] += 1;
			$insurancePoints['life'] += 1;
		}

		if ($insuredPerson->getMaritalStatus() == 'married') {
			$insurancePoints['life'] += 1;
			$insurancePoints['disability'] -= 1;
		}
		
		// From expecifications:
		// ———
		// "If the user's vehicle was produced in the last 5 years, add 1 risk point to that vehicle’s score."
		// ———
		// Isn't it "wasn't produced"? Or, if it was produced in the last 5 years, then decuct 1 risk point?
		// I assume a car produced in the last 5 years is considered new and should not increase the risk?
		// This code chunk implements what the expectations asked for, regardless.
		if ($insuredPerson->getVehicle()->getYear() > date('Y') - 5) {
			$insurancePoints['auto'] += 1;
		}


		// Calculates the final scores and labels each of them.
		foreach ($insurancePoints as $key => $variation) {
			if (!in_array($key, $ineligibilityList)) {
				$insurancePoints[$key] += $allLinesVariations;
				if ($insurancePoints[$key] < 1) {
					$insurancePoints[$key] = 'economic';
				} elseif ($insurancePoints[$key] > 0 && $insurancePoints[$key] < 3) {
					$insurancePoints[$key] = 'regular';
				} else {
					$insurancePoints[$key] = 'responsible';
				}
			} else {
				$insurancePoints[$key] = 'ineligible';
			}
		}

		// Prepares response object and returns.
		$insuranceScore->auto = $insurancePoints['auto'];
		$insuranceScore->disability = $insurancePoints['disability'];
		$insuranceScore->home = $insurancePoints['home'];
		$insuranceScore->life = $insurancePoints['life'];

		return $insuranceScore;
	}
}

?>