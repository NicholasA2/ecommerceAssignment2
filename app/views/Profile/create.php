<?php $this->view('header', 'Create your profile'); ?>

<form method="post" action="">
	<label>First Name:</label><input type="text" name="first_name"><br>
	<label>Last Name:</label><input type="text" name="last_name"><br>
		<label>Middle Name:</label><input type="text" name="middle_name"><br>

	<input type="submit" name="action" value='Create'> <br>
</form>
<?php $this->view('footer'); ?>