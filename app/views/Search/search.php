<?php $this->view('header', 'Cliquebait'); ?>

<?php
public function search_results($publications) {
	echo "Posts:";
	foreach ($publications as $publication) {
		 $this->view('Publication/partial', $publication);
	}
}