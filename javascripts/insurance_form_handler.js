$(document).ready(function(){
	// Intercepts our form submissions and runs API call
	$("#insuranceScoreCalculationForm").submit(function(event){
		event.preventDefault()
		
		const insuredPersonData = {
			age: $('#insuranceScoreCalculationForm input[name="age"]').val(),
			dependents: $('#insuranceScoreCalculationForm input[name="dependents"]').val(),
			house: {'ownership_status' : $('#insuranceScoreCalculationForm select[name="houseOwnershipStatus"]').val()},
			income: $('#insuranceScoreCalculationForm input[name="income"]').val(),
			marital_status: $('#insuranceScoreCalculationForm select[name="maritalStatus"]').val(),
			vehicle: {year : $('#insuranceScoreCalculationForm input[name="vehicleYear"]').val()},
			risk_questions: [$('#insuranceScoreCalculationForm select[name="riskQuestion1"]').val(), $('#insuranceScoreCalculationForm select[name="riskQuestion2"]').val(), $('#insuranceScoreCalculationForm select[name="riskQuestion3"]').val()]
		}
		
		const apiCallParameters = {
			url: "controller/api/insurance_score_endpoint.php",
			dataType: "text",
			type: "POST",
		  data: { jsonData: JSON.stringify( insuredPersonData ) }, // Our valid JSON string
		  success: function( data, status, xhr ) {
		  	console.log('API response returned successfull.')
		  },
		  error: function( xhr, status, error ) {
		  	console.log('Error processing the request. Error message: ' + error)
		  }
		}
		$.ajax( apiCallParameters )
	})
})