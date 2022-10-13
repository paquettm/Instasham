<?php $this->view('header', 'Instasham'); ?>
<?php
if(isset($_GET['message'])){
?>
<div class="alert alert-primary" role="alert">
	<?=$_GET['message']?>
</div>
<?php
}
?>
<h1>Create your Profile</h1>
<p>Provide the information requested in the form below.</p>
<form action='' method="post">
	<div class="form-group">
		<label class="col-sm-2 col-form-label">First name:<input class='form-control' type="text" name="first_name" placeholder="first name"/></label>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Middle name:<input class='form-control' type="text" name="middle_name" placeholder="middle name"/></label>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Last name:<input class='form-control' type="text" name="last_name" placeholder="last name"/></label>
	</div>
	<input type='submit' name='action' value="Create" class='btn btn-primary' />
</form>

<?php $this->view('footer'); ?>