<?php $this->view('header','Log into your account'); ?>

<form method="post" action="">
	<label>Username:</label><input type="text" name="username"><br>
	<label>Password:</label><input type="password" name="password"><br>
	<input type="submit" name="action" value='Login'> <br>
	Don't already have an account? <a href="/User/register">Register</a>
	
</form>

<?php $this->view('footer'); ?>