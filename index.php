<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>YouGET | Youtube Downloader</title>
  <meta name="description" content="Home Page of Grupo">
  <meta name="author" content="NicnHus">

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/header.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery.js"></script>

</head>

<body>

	<div id="global_container">


		<!-- HEADER BEGINS -->
		<div id="header_bar">
			<div id="inner_header_bar">
				<div id="left_logo">YouGet</div>
				<div id="right_nav">Language: English US</div>
			</div>
		</div>
		<!-- HEADER STOPS -->

		<!-- INNER_CONTAINER BEGINS -->
		<div class="inner_container">
			<div class="container_section">

				<form action="file_functions/functions.php" method="POST">
					<div id="field_container">
						<div class="field">
							<input type="text" name="videos[]" placeholder="Enter video url" size="50">
							<i class="fa fa-check-circle-o correct-url"></i>
							<i class="fa fa-times-circle-o wrong-url"></i><br/>
						</div>
					</div>
					<i class="fa fa-plus-circle add-field"></i><br/>
					<input type="submit" value="Submit" >
				</form>

			</div>
		</div>
		<!-- INNER_CONTAINER STOPS -->
      
   	</div>
  <script src="js/events.js"></script>
</body>
</html>