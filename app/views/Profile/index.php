<?php $this->view('header', 'CliqueBait'); ?>

<h1><?= $data ?>
<?php
    if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != $data->user_id ){
        echo "<a href='/Profile/index/$data->user_id'><i class='bi-person-hearts'></i></a>";
    } else if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != $data->user_id ) {
        echo "<a href='/Profile/index/$data->user_id'><i class='bi-heartbreak-fill'></i></a>";
} ?>
</h1>

<?php
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data->user_id){
    echo '<a href="/Profile/edit/' . $_SESSION['user_id'] . '">Edit my profile</a>';
}
?>

<h2><?=$data ?>'s posts</h2>
<?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
    $this->view('Publication/partial', $publication);
}
?>

<?php $this->view('footer');