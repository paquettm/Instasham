<?php $this->view('header', 'Instasham'); ?>

<h1><?=$data ?></h1>

<?php
if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] == $data->profile_id){
	echo '<a href="/Profile/edit">Edit my profile</a>';
}
?>

<h2>Publications by <?=$data ?></h2>
<?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
	$this->view('Publication/partial', $publication);
}
?>

<h2>Comments by <?=$data ?></h2>
<?php
$comments = $data->getComments();
foreach ($comments as $comment) {
	$this->view('Comment/partialOnPublication', $comment);
}
?>

<?php $this->view('footer'); ?>