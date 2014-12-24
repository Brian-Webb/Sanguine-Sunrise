<div id="login-form-wrapper">
            <h3>Login</h3>
        <form action="/user/login" method="POST" id="login-form">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash();?>" />
            <input type="email" name="email" />
            <input type="password" name="password" />
            <input type="submit" value="Login" class="button" id="login-form-submit" />
        </form>
    </div>