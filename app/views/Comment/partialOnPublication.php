<div class='jumbotron' id='comment<?=$data->comment_id?>'>
	<hr>
	<?php $publication = $data->getPublication(); ?>
	<p>Comment on <a href='/Publication/details/<?=$publication->publication_id ?>#comment<?=$data->comment_id?>'><img style="max-width:150px;" src="/images/<?= $publication->picture ?>" /></a> on <?= $data->date_time?><?php
		if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] == $data->profile_id){
			echo "<a href='/Comment/delete/$data->comment_id'><i class='bi-trash'></i></a>";
			?>
			<a href='javascript:$("#commentEdit<?=$data->comment_id?>").prop("disabled",false);$("#commentEdit<?=$data->comment_id?>").next("button").prop("disabled",false);'><i class='bi-pen' onclick=''></i></a></p>
<form action='/Comment/edit/<?=$data->comment_id?>' method="post">
	<div class="input-group">
		<input class='form-control' type="text" name="comment" id='commentEdit<?=$data->comment_id?>' placeholder="comment" value='<?=htmlspecialchars($data->comment)?>' disabled/>
		<button type='submit' name='action' class='btn btn-primary' disabled><i class='bi-send'></i></button>
	</div>
</form>
	<?php }else{?>
	</p><p><?=htmlspecialchars($data->comment) ?></p>
	<?php	}
	?>
</div>
