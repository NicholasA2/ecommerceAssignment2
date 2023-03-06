<?php $this->view('header', 'Cliquebait'); ?>

<h1><?= $data ?></h1>

<?php
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data->user_id){
    echo '<a href="/Profile/edit">Edit my profile</a>';
}
?>

<h2><?=$data ?>'s posts</h2>
<?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
    $this->view('Publication/partial', $publication);
}
?>

<?php $this->view('footer'); ?>