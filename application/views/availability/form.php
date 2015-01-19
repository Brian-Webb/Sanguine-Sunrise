
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
	<form method="POST" action="/availability/save_availability">
	  <div class="row">
	  	<div class="small-12 columns availability-form">
	  	  <h1 class="accent-color bottom-border center-text">Raid Availability</h1>
	  	  <div class="row">
	  	  	<div class="medium-6 medium-offset-3 columns">
		      <h2>Character name: </h2>
		      <div>
		        <input type="text" name="characterName" placeholder="Enter Character Name" required />
		      </div>
    
		      <!-- Monday -->
		      <h2>Monday: </h2>
		      <div class="switch small">
		        <input type="radio" class="reveal-times" name="mondayAvailable" id="mondayAvailable1" data-day="monday" value="1" /><label for="mondayAvailable1"></label>Available<br />
		        <input type="radio" class="reveal-times" name="mondayAvailable" id="mondayAvailable0" data-day="monday" value="0" checked /><label for="mondayAvailable0"></label>Not Available<br />
		      </div>
		      <div id="times-monday" class="times-wrapper">
		        <span>Start Time</span>
		        <input type="time" name="mondayStartTime" value="13:00" />
		        <span>End Time</span>
		        <input type="time" name="mondayEndTime" value="00:00" />
		      </div>
		      <!-- /Monday -->
    
		      <!-- Tuesday -->
		      <h2>Tuesday: </h2>
		      <div class="switch small">
		        <input type="radio" class="reveal-times" name="tuesdayAvailable" id="tuesdayAvailable1" data-day="tuesday" value="1" /><label for="tuesdayAvailable1"></label>Available<br />
		        <input type="radio" class="reveal-times" name="tuesdayAvailable" id="tuesdayAvailable0" data-day="tuesday" value="0" checked /><label for="tuesdayAvailable0"></label>Not Available<br />
		      </div>
		      <div id="times-tuesday" class="times-wrapper">
		        <span>Start Time</span>
		        <input type="time" name="tuesdayStartTime" value="13:00" />
		        <span>End Time</span>
		        <input type="time" name="tuesdayEndTime" value="00:00" />
		      </div>
		      <!-- /Tuesday -->
    
		      <!-- Wednesday -->
		      <h2>Wednesday: </h2>
		      <div class="switch small">
		        <input type="radio" class="reveal-times" name="wednesdayAvailable" id="wednesdayAvailable1" data-day="wednesday" value="1" /><label for="wednesdayAvailable1"></label>Available<br />
		        <input type="radio" class="reveal-times" name="wednesdayAvailable" id="wednesdayAvailable0" data-day="wednesday" value="0" checked /><label for="wednesdayAvailable0"></label>Not Available<br />
		      </div>
		      <div id="times-wednesday" class="times-wrapper">
		        <span>Start Time</span>
		        <input type="time" name="wednesdayStartTime" value="13:00" />
		        <span>End Time</span>
		        <input type="time" name="wednesdayEndTime" value="00:00" />
		      </div>
		      <!-- /Wednesday -->
    
		      <!-- Thursday -->
		      <h2>Thursday: </h2>
		      <div class="switch small">
		        <input type="radio" class="reveal-times" name="thursdayAvailable" id="thursdayAvailable1" data-day="thursday" value="1" /><label for="thursdayAvailable1"></label>Available<br />
		        <input type="radio" class="reveal-times" name="thursdayAvailable" id="thursdayAvailable0" data-day="thursday" value="0" checked /><label for="thursdayAvailable0"></label>Not Available<br />
		      </div>
		      <div id="times-thursday" class="times-wrapper">
		        <span>Start Time</span>
		        <input type="time" name="thursdayStartTime" value="13:00" />
		        <span>End Time</span>
		        <input type="time" name="thursdayEndTime" value="00:00" />
		      </div>
		      <!-- /Thursday -->
    
		      <!-- Friday -->
		      <h2>Friday: </h2>
		      <div class="switch small">
		        <input type="radio" class="reveal-times" name="fridayAvailable" id="fridayAvailable1" data-day="friday" value="1" /><label for="fridayAvailable1"></label>Available<br />
		        <input type="radio" class="reveal-times" name="fridayAvailable" id="fridayAvailable0" data-day="friday" value="0" checked /><label for="fridayAvailable0"></label>Not Available<br />
		      </div>
		      <div id="times-friday" class="times-wrapper">
		        <span>Start Time</span>
		        <input type="time" name="fridayStartTime" value="13:00" />
		        <span>End Time</span>
		        <input type="time" name="fridayEndTime" value="00:00" />
		      </div>
		      <!-- /Friday -->
    
		      <!-- Saturday -->
		      <h2>Saturday: </h2>
		      <div class="switch small">
		        <input type="radio" class="reveal-times" name="saturdayAvailable" id="saturdayAvailable1" data-day="saturday" value="1" /><label for="saturdayAvailable1"></label>Available<br />
		        <input type="radio" class="reveal-times" name="saturdayAvailable" id="saturdayAvailable0" data-day="saturday" value="0" checked /><label for="saturdayAvailable0"></label>Not Available<br />
		      </div>
		      <div id="times-saturday" class="times-wrapper">
		        <span>Start Time</span>
		        <input type="time" name="saturdayStartTime" value="13:00" />
		        <span>End Time</span>
		        <input type="time" name="saturdayEndTime" value="00:00" />
		      </div>
		      <!-- /Saturday -->
    
		      <!-- Sunday -->
		      <h2>Sunday: </h2>
		      <div class="switch small">
		        <input type="radio" class="reveal-times" name="sundayAvailable" id="sundayAvailable1" data-day="sunday" value="1" /><label for="sundayAvailable1"></label>Available<br />
		        <input type="radio" class="reveal-times" name="sundayAvailable" id="sundayAvailable0" data-day="sunday" value="0" checked /><label for="sundayAvailable0"></label>Not Available<br />
		      </div>
		      <div id="times-sunday" class="times-wrapper">
		        <span>Start Time</span>
		        <input type="time" name="sundayStartTime" value="13:00" />
		        <span>End Time</span>
		        <input type="time" name="sundayEndTime" value="00:00" />
		      </div>
		      <!-- /Sunday -->

		      <!-- Comments -->
		      <label><span>Notes, exceptions, additional comments?</span>
		      	<textarea name="comments" id="comments" rows="6" placeholder="Comments go here!"></textarea>
		      </label>
		      <!-- /Comments -->
    
		      <button type="submit">Submit</button>
		    </div> <!-- /medium-6 columns -->
		  </div> <!-- /row -->
		</div> <!-- /small-12 columns -->
	  </div> <!-- /row -->
	</form>
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