<?php $this->view('header', 'Instasham'); ?>

<h1>Publication</h1>

<a href='/#publication<?=$data->publication_id?>'>Back</a>

<?php $this->view('Publication/partial',$data); ?>

<?php
$comments=$data->getComments();
foreach ($comments as $comment) {
	$this->view('Comment/partial',$comment);
}

?>
<a href='/#publication<?=$data->publication_id?>'>Back</a>

<?php $this->view('footer'); ?>