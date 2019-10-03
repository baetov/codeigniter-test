<h3>Добавление публикации</h3>
<a href="<?php echo base_url('publication/index')?>" class="btn btn-outline-primary">назад</a>

<form action="<?php echo base_url('publication/submit')?>" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="title" class="col-md-10 text-left">Описание статьи</label>
		<div class="col-md-10">
			<input type="text" name="description" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-10 text-left">Текст статьи</label>
		<div class="col-md-10">
			<textarea name="text" class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 text-right"></label>
		<div class="col-md-10">
			<input type="submit" name="btnSave" class="btn btn-primary" value="Save">
		</div>
	</div>
</form>
