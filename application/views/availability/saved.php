
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sanguine Sunrise | Welcome</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <link rel="stylesheet" href="../css/custom.css" />
    <script src="../js/vendor/modernizr.js"></script>
  </head>
  <body>
  	<!-- Availability form -->
	  <div class="row">
	  	<div class="small-12 columns availability-form">
	  	  <h1 class="accent-color bottom-border center-text">Raid Availability</h1>
                  <p class="center-text">Your availability has been saved successfully!<br /> We will take these submissions into consideration and announce the best days/times to raid!</p>
		</div> <!-- /small-12 columns -->
	  </div> <!-- /row -->
	<!-- Footer stuff -->
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation.5.4.7.min.js"></script>
    <script>
      $(document).foundation();

      $('.reveal-times').click(function() {
      	var day = $(this).data('day');
      	var available = $(this).attr('value');

      	var $timesDiv = $('#times-' + day);

      	if(available == 1){
      		$timesDiv.slideDown(300);
      	} else {
      		$timesDiv.slideUp(300);
      	}
      });
    </script>
    <!-- /Footer -->
  </body>
</html>