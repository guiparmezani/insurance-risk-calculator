# Insurance Risk Calculator — Origin Take-Home Assignment
This web application takes a set of numbers that represent risk points for signing insurance lines with possible customers. Users use a web form to type in personal information and answer a few questions. The frontend gathers these inputs and sends them to an API endpoint that runs on the same server. The API responds with a collection of words for each of the insurance lines that the company offers. Those results are displayed on the frontend, below the form.

### Installation
Extract the compressed project file into a folder that's publicly served on a web server. Any machine that runs Apache + PHP 7.4+ should be able to run the app. An easy way to go about it is to use a PHP development environment stack, like [XAMPP](https://www.apachefriends.org/). Here's the set up guide for XAMPP:
- Download XAMPP and install;
- Open XAMPP. On the "Welcome" tab, click on "Open Application Folder";
- Navigate to a folder called "htdocs";
- Edit the file called "index.php";
- Replace its content with the following snippet:
- <?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/origin-guilherme-parmezani/');
	exit;
?>
- Extract the project file on the same folder (htdocs);
- On XAMPP, click on the "Manage Servers" tab, and start the Apache Web Server service (if not started yet);
- Go back to the "Welcome" tab and click "Open Application";

Alternatively, you can use the app by going to this personal web server: https://parmezani.com/origin-guilherme-parmezani/

### Technology Stack and Project Enginerring Process
The decision of using PHP was made by taking in consideration the solid knowledge on that language held by the developer. It's also a widely used programming language. Chances are prople won't have much trouble installing it or being able to feed inputs to the app in order to look at results. Setting up the environment is rather simple and that's a plus. PHP allows object oriented logic too, which was key to achieve the expected results.

MVC (Model-View-Control) architecture was implemented in this project. The first step was to build the frontend (View) and make sure the inputs were being sent to the API endpoint with no issues. Then, we built the core code in the Control layer, which receives the data, processes it based off the business rules. From here, we can either use the Model layer to persist the processed data, or simply return the results to the View layer, which was the case. The application is extensible and easy to tweak since the layers are separated from each other.

### Final Notes
This project was fun to work on! It can probably be used as a real software in the future. The API logic is on a folder that's separated from the others, in case we want to serve other apps publicly. The only thing that would be necessary is to set up authentication. Since the endpoint does not listen to third party apps, there is no authentication implemented. This is all documented within the proejct files in code comment format.