<?php $this->view('header', 'Register your account'); ?>

<form method="post" action="">
	<label>Username:</label><input type="text" name="username"><br>
	<label>Password:</label><input type="password" name="password"><br>
	<input type="submit" name="action" value='Register'> <br>
	 <a href="/User/index"> Already have an account? Login.</a>
</form>

<?php $this->view('footer'); ?>