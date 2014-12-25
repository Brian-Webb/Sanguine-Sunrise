<!-- #login-form-wrapper -->
<div id="login-form-wrapper">
    <h3>Login</h3>
    <div id="login-form-error"></div>
    <form id="login-form">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" id="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
        <input type="email" name="email" id="login-form-email" onkeydown="enterKeySubmit('login-form-submit',event);" />
        <input type="password" name="password" id="login-form-password" onkeydown="enterKeySubmit('login-form-submit',event);" />
        <a class="button" href="#" id="login-form-submit" onclick="loginSubmit();return false;">Login</a>
    </form>
</div>
<!-- /#login-form-wrapper -->