<div class='jumbotron' id='publication<?=$data->publication_id?>'>
	<hr>
	<?php
		$profile=$data->getProfile();
		$following = new \app\models\Follow();
		$following = $following->isFollowing($profile->user_id, $_SESSION['user_id']);
		$followingString = ($following) ? "true" : "false";
	?>
	<a href="/Publication/details/<?=$data->publication_id?>"><img src="/images/<?= $data->picture ?>" style="max-width: 60vw; max-height: 60vh;"></a>
	<p>Posted by <a href='/Profile/index/<?= $data->profile_id ?>?following=<?= $followingString ?>'><?= htmlspecialchars($profile) ?></a> on <?= $data->timestamp?><?php
		if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data->profile_id){
			echo "<a href='/Publication/delete/$data->publication_id'><i class='bi-trash'></i></a>";
			echo "<a href='/Publication/edit/$data->publication_id'><i class='bi-pen'></i></a>";
		}
	?></p>
	<p><?=htmlspecialchars($data->caption) ?></p>
</div>