<?php $this->view('header', 'CliqueBait'); ?>

<h1>Publication</h1>

<a href='publication<?=$data->publication_id?>'>Back</a>

<?php $this->view('Publication/partial',$data); ?>

?>
<a href='publication<?=$data->publication_id?>'>Back</a>

<?php $this->view('footer'); ?>