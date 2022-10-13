<?php $this->view('header', 'Instasham'); ?>

<h1>Edit Publication Caption</h1>
<form action='' method='post' enctype='multipart/form-data'>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Picture:</label><img id='pic_preview' src='/images/<?=$data->picture ?>' style="max-width:200px;max-height:200px" />
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Caption:<textarea placeholder='Say something about your picture.' name="caption"><?= htmlspecialchars($data->caption) ?></textarea></label>
	</div>
	<input type="submit" name="action" value="Publish" class='btn btn-primary' />
</form>

<script>
	picture.onchange = evt => {
  const [file] = picture.files
  if (file) {
    pic_preview.src = URL.createObjectURL(file)
  }
}
</script>
<?php $this->view('footer'); ?>