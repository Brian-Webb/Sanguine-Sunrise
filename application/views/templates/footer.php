        </div>    
        <!-- /main content -->

        <!-- sidebar -->
        <div class="medium-3 columns panel left">
            <div id="profile-area-placeholder"></div>
            <hr />
            <div id="roster-placeholder"></div>
        </div>
        <!-- /sidebar -->
    
    </div>
    <!-- /content wrapper -->
    
    <!-- footer -->
    <footer class="row">
        <div class="medium-12 columns panel">
            <h1>Footer</h1>
        </div>
    </footer>
    <!-- /footer -->
    
    <!-- #modal-ajax-container -->
    <div id="modal-ajax-container" class="reveal-modal small" data-reveal>
        <div id="ajax-container"></div>
        <a class="close-reveal-modal">&#215;</a>
    </div>
    <!-- /#modal-ajax-container -->
    
    <script src="/js/vendor/jquery.2.1.1.min.js"></script>
    <script>  
      lazyLoad('profile-area-placeholder','/widgets/profile_area');
      lazyLoad('roster-placeholder','/widgets/roster');
      
      /* common functions */
      function lazyLoad(id,url) {
          var $div = $('#'+id);
          $div.hide();
          $div.load(url, function(){
                $(this).fadeIn('slow','swing');
          });
      }
      
      function ajaxModal(url) {
          lazyLoad('ajax-container', url);
          $('#modal-ajax-container').foundation('reveal', 'open');
      }
      
      function loginSubmit() {
          var          email = $('#login-form-email').val(),
                    password = $('#login-form-password').val(),
            sanguine_sunrise = $('#sanguine_sunrise').val();
          $.ajax({
            type: "POST",
            url: "/user/login",
            data: {email: email, password: password, sanguine_sunrise: sanguine_sunrise},
            success: function( data ) {
                if(data) {
                    $('#modal-ajax-container').foundation('reveal', 'close');
                    lazyLoad('profile-area-placeholder','/widgets/profile_area');
                } else {
                    showAlertBox('login-form-error');
                }
            }
          });
        }
      
      function replaceLoginForm(userId) {
          $('#login-form-wrapper').load('/user/replaceLoginForm/' + userId);
      }
      
      function showAlertBox(id) {
        $.get('/widgets/alert_box/Invalid Login/alert', function(data){
            $('#'+id).html(data);
            $(document).foundation('alert', 'reflow');
        });
      }
      
      function userLogout() {          
          $.ajax({
            url: "/user/logout",
            context: document.body
          }).done(function() {
            lazyLoad('profile-area-placeholder','/widgets/profile_area');
          });
      }
      
      function enterKeySubmit(id, event) {
          if (event.keyCode == 13) {
              event.preventDefault();
              $('#'+id).click();
          }
      }
      
    </script>
    <script src="/js/foundation.5.4.7.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>