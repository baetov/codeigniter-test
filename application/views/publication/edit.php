<h3>Изменение публикации</h3>
<a href="<?php echo base_url('publication/index')?>" class="btn btn-outline-primary">назад</a>

<form action="<?php echo base_url('publication/update')?>" method="post" class="form-horizontal">
	<input type="hidden" name="txt_hidden" value="<?php echo $publication->id; ?>">
	<div class="form-group">
		<label for="title" class="col-md-10 text-left">Опиисание статьи</label>
		<div class="col-md-10">
			<input type="text" name="description" value="<?php echo $publication->description; ?>" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-10 text-left">Текст статьи</label>
		<div class="col-md-10">
			<textarea name="text" class="form-control"><?php echo $publication->text; ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 text-right"></label>
		<div class="col-md-10">
			<input type="submit" name="btnSave" class="btn btn-primary" value="Save">
		</div>
	</div>
</form>
