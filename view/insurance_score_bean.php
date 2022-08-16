<div class="form-wrapper">
	<!-- Form intro -->
	<p>Please enter your personal informantion to calculate your risk score (results below form)</p>

	<!-- The form has not action attribute because it's intercepted by our Javascript and posted via Ajax to our API endpoint. -->
	<form id="insuranceScoreCalculationForm">
		<label>Age</label>
		<input type="number" name="age">

		<label>Dependents</label>
		<input type="number" name="dependents">

		<label>House Ownership Status (if applied)</label>
		<select name="houseOwnershipStatus">
			<option value="">Select an option</option>
			<option value="owned">I own a house</option>
			<option value="mortgaged">I live in a mortgaged house</option>
		</select>

		<label>Income</label>
		<input type="float" name="income">

		<label>Marital Status</label>
		<select name="maritalStatus">
			<option value="">Select an option</option>
			<option value="single">Single</option>
			<option value="married">Married</option>
		</select>

		<label>Vehicle Year (if applied)</label>
		<input type="number" name="vehicleYear">

		<label>Risk Question 1</label>
		<select name="riskQuestion1">
			<option value="0">0</option>
			<option value="1">1</option>
		</select>

		<label>Risk Question 2</label>
		<select name="riskQuestion2">
			<option value="0">0</option>
			<option value="1">1</option>
		</select>
		
		<label>Risk Question 3</label>
		<select name="riskQuestion3">
			<option value="0">0</option>
			<option value="1">1</option>
		</select>
		
	
		<input type="submit" value="Calculate" class="submit-button">
	</form>

</div>

<div class="results">
	<label><strong>Auto</strong> insurance risk score</label>
	<span id="autoResults"></span>

	<label><strong>Disability</strong> insurance risk score</label>
	<span id="disabilityResults"></span>

	<label><strong>Home</strong> insurance risk score</label>
	<span id="homeResults"></span>

	<label><strong>Life</strong> insurance risk score</label>
	<span id="lifeResults"></span>
</div>
