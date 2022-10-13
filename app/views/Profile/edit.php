<?php $this->view('header', 'Instasham'); ?>

<h1><?=$data ?></h1>

<form action='' method="post">
	<div class="form-group">
		<label class="col-sm-2 col-form-label">First name:<input class='form-control' type="text" name="first_name" placeholder="first name" value='<?=htmlspecialchars($data->first_name)?>'/></label>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Middle name:<input class='form-control' type="text" name="middle_name" placeholder="middle name" value='<?=htmlspecialchars($data->middle_name)?>'/></label>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Last name:<input class='form-control' type="text" name="last_name" placeholder="last name" value='<?=htmlspecialchars($data->last_name)?>'/></label>
	</div>
	<input type='submit' name='action' value="Modify" class='btn btn-primary' />
</form>
<a href='/Profile/' class='btn btn-secondary'>Cancel</a>

<?php $this->view('footer'); ?>