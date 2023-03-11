<?php $this->view('header', 'Cliquebait'); ?>

<form method='post' action=''>
	<input type='hidden' name='follower_id' value='$follower_id' />
	<input type='hidden' name='followed_id' value='$followed_id' />
	<input type='submit' name='follow' value="Follow" />
</form>

<form method='post' action=''>
	<input type='hidden' name='follower_id' value='$follower_id' />
	<input type='hidden' name='followed_id' value='$followed_id' />
	<input type='submit' name='unfollow' value="Unfollow" />
</form>

<?php
	public function display_followers($user_id) {
		$this->controller->get_followers($user_id);
	}

	public function display_following($user_id) {
		$this->controller->get_following($user_id);
	}
?>

<?php $this->view('footer'); ?>