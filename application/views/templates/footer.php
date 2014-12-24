        </div>    
        <!-- /main content -->

        <!-- sidebar -->
        <div class="medium-3 columns panel left">
            <?php widget::run('login_form'); ?> 
            <?php widget::run('character_list'); ?> 
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
    
    <script src="/js/vendor/jquery.js"></script>
    <script src="/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
      
      $('#login-form-submit').click(function(){
          var datastring = $(this).closest('#login-form').serialize();
          $.ajax({
            type: "POST",
            url: "user/login",
            data: datastring,
            success: function( data ) {
                if(data) {
                    replaceLoginForm(data);
                } else {
                    showLoginError();
                }
            }
          });
          return false;
      });
      
      function replaceLoginForm(userId) {
          $('#login-form-wrapper').load('user/replaceLoginForm/' + userId);
      }
      
      function showLoginError() {
          var failAlert = '<div data-alert class="alert-box alert">' +
                            'Invalid Login' +
                            '<a href="#" class="close">&times;</a>' +
                            '</div>';
          $('#login-form-wrapper').prepend(failAlert);
      }
    </script>
  </body>
</html>