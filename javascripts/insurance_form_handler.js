$(document).ready(function(){
	// Intercepts our form submissions and runs API call
	$("#insuranceScoreCalculationForm").submit(function(event){
    event.preventDefault()
    
    const insuredPersonData = {
		  age: $('#insuranceScoreCalculationForm input[name="age"]').val(),
		  dependents: $('#insuranceScoreCalculationForm input[name="dependents"]').val(),
		  houseOwnershipStatus: $('#insuranceScoreCalculationForm select[name="houseOwnershipStatus"]').val(),
		  income: $('#insuranceScoreCalculationForm input[name="income"]').val(),
		  maritalStatus: $('#insuranceScoreCalculationForm select[name="maritalStatus"]').val(),
		  vehicleYear: $('#insuranceScoreCalculationForm input[name="vehicleYear"]').val(),
		  riskQuestion1: $('#insuranceScoreCalculationForm select[name="riskQuestion1"]').val(),
		  riskQuestion2: $('#insuranceScoreCalculationForm select[name="riskQuestion2"]').val(),
		  riskQuestion3: $('#insuranceScoreCalculationForm select[name="riskQuestion3"]').val(),
		}
		
		const apiCallParameters = {
		  url: "controller/api/insurance_score_endpoint.php",
		  dataType: "text",
		  type: "POST",
		  data: { jsonData: JSON.stringify( insuredPersonData ) }, // Our valid JSON string
		  success: function( data, status, xhr ) {
		     console.log('success')
		  },
		  error: function( xhr, status, error ) {
		     console.log(error)
		  }
		}
		$.ajax( apiCallParameters )
  })
})