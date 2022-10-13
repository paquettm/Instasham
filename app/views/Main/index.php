<?php $this->view('header', 'Instasham'); ?>

<p>This is the index of the Main controller. This is where you see publications.</p>

<?php
foreach ($data as $publication) {
	$this->view('Publication/partial', $publication);
}
?>

<?php $this->view('footer'); ?>