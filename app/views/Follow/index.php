<?php $this->view('header', 'Cliquebait'); ?>

<?php
foreach ($data as $publication) {
    $this->view('Publication/partial', $publication);
}
?>

<?php $this->view('footer'); ?>