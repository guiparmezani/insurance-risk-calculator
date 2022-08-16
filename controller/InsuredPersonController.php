<?php
include 'InsuredPersonInterface.php';
include 'InsuranceScore.php';

class InsuredPersonController implements InsuredPersonInterface {
	public function calculateInsuranceScoreRisk ($insuredPerson) {
		
		// Early return if person is ineligible
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

		$insurancePoints = [
			'auto' => $riskQuestionsSum,
			'disability' => $riskQuestionsSum,
			'home' => $riskQuestionsSum,
			'life' => $riskQuestionsSum
		];


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
		// Isn't it "wasn't"? Or, if it was produced in the last 5 years, then decuct 1 risk point?
		if ($insuredPerson->getVehicle()->getYear() > date('Y') - 5) {
			$insurancePoints['auto'] += 1;
		}

		foreach ($insurancePoints as $key => $variation) {
			if (!in_array($key, $ineligibilityList)) {
				$insurancePoints[$key] += $allLinesVariations;
			} else {
				$insurancePoints[$key] = 'ineligible';
			}
		}

		$insuranceScore->auto = $insurancePoints['auto'];
		$insuranceScore->disability = $insurancePoints['disability'];
		$insuranceScore->home = $insurancePoints['home'];
		$insuranceScore->life = $insurancePoints['life'];

		return json_encode($insuranceScore);
	}
}

?>