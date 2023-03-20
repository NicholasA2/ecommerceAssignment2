<?php $this->view('header', 'CliqueBait'); ?>

<h1><?= $data ?>
<?php
    if(isset($_SESSION['user_id'])){
     	if(!$data->isFollowed($_SESSION['user_id'])){
	        echo "<a href='/Follow/follow/$data->user_id'><i class='bi-person-hearts'></i></a>";
    	} else {
        	echo "<a href='/Follow/unFollow/$data->user_id'><i class='bi-heartbreak-fill'></i></a>";
        }
	} ?>
</h1>

<?php
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data->user_id){
    echo '<a href="/Profile/edit/' . $_SESSION['user_id'] . '">Edit my profile</a>';
}
?>


<?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
    $this->view('Publication/partial', $publication);
}

echo "<h2>My followers</h2>";
$followers = $data->getFollowers();
foreach ($followers as $follower) {
    echo "<a href='/Profile/index/$follower->user_id'>$follower</a><br>";
}

?>

<?php $this->view('footer');