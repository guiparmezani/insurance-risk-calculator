$(document).ready(function(){
	
	// Intercepts our form submissions and runs API call
	$("#insuranceScoreCalculationForm").submit(function(event){
		event.preventDefault()

		// Populates JSON using form input values
		const insuredPersonData = {
			age: $('#insuranceScoreCalculationForm input[name="age"]').val(),
			dependents: $('#insuranceScoreCalculationForm input[name="dependents"]').val(),
			house: {'ownership_status' : $('#insuranceScoreCalculationForm select[name="houseOwnershipStatus"]').val()},
			income: $('#insuranceScoreCalculationForm input[name="income"]').val(),
			marital_status: $('#insuranceScoreCalculationForm select[name="maritalStatus"]').val(),
			vehicle: {year : $('#insuranceScoreCalculationForm input[name="vehicleYear"]').val()},
			risk_questions: [$('#insuranceScoreCalculationForm select[name="riskQuestion1"]').val(), $('#insuranceScoreCalculationForm select[name="riskQuestion2"]').val(), $('#insuranceScoreCalculationForm select[name="riskQuestion3"]').val()]
		}
		
		// Sets up Ajax call and sends to API endpoint. Then, handles response. If success, updates the Results frontend markup. If error, shows error message.
		const apiCallParameters = {
			url: "api/insurance_score_endpoint.php",
			dataType: "text",
			type: "POST",
		  data: { jsonData: JSON.stringify( insuredPersonData ) },
		  success: function( data, status, xhr ) {
		  	console.log('API response returned successfull.')
		  	$('#errorMessage').addClass('hidden')
		  	
		  	const insuranceResults = $.parseJSON(data)
		  	
				var resultsPresentation = anime.timeline({
				  easing: 'easeInOutQuad',
				  duration: 500
				});

				resultsPresentation
				.add({
				  targets: '.results',
				  opacity: 0,
				  marginTop: [12, 30],
				})
				.add({
					targets: '.results',
				  opacity: 1,
				  marginTop: [30, 12],
				  begin: function(){
				  	$('#autoResults').text(insuranceResults.auto)
				  	$('#disabilityResults').text(insuranceResults.disability)
				  	$('#homeResults').text(insuranceResults.home)
				  	$('#lifeResults').text(insuranceResults.life)
				  }
				})
		  },
		  error: function( xhr, status, error ) {
		  	console.log('Error processing the request. Error message: ' + error)
		  	$('#errorMessage').removeClass('hidden')
		  }
		}
		$.ajax( apiCallParameters )
	})
})