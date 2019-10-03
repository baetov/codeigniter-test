<h3>Обзор публиации</h3>
<a href="<?php echo base_url('publication/index')?>" class="btn btn-outline-primary">назад</a>
<?php if ($this->ion_auth->is_admin() || $this->ion_auth->in_group('member')) {?>
<a href="<?php echo base_url('publication/edit/'.$publication->id)?>" class="btn btn-info">редактировать</a>
<a href="<?php echo base_url('publication/delete/'.$publication->id)?>" class="btn btn-danger" onclick="return confirm('Вы действительно хотите удалть публикацию?');">удалть</a>
<?php }?>
<table id="w0" class="table table-striped table-bordered detail-view">
	<tbody>
		<tr>
			<th>ID</th>
			<td><?php echo $publication->id; ?></td>
		</tr>
		<tr>
			<th>Имя автора</th>
			<td><?php echo $author->username; ?></td>
		</tr>
		<tr>
			<th>описание</th>
			<td><?php echo $publication->description; ?></td>
		</tr>
		<tr>
			<th>дата создания</th>
			<td><?php echo $publication->created_at; ?></td>
		</tr>
		<tr>
			<th>дата изменения</th>
			<td><?php echo $publication->updated_at; ?></td>
		</tr>
	</tbody>
</table>
<h3>текст:</h3>
<p class><?php echo $publication->text; ?></p>

<div class="comment-wrap ">
	<h3> коментарии </h3>
	<?php foreach ($comments as $comment){?>
	<div class="comm-left">
		<?php
		if ($this->ion_auth->is_admin()){;?>
			<a href="<?php echo base_url('publication/deleteComment/'.$comment->id)?>" class="btn btn-outline-danger btn-sm">удалить</a>
		<?php }?>
		<div class="comm-author">
			<p>Автор</p>
<!--			<p>--><?php //echo $comm_author;?><!--</p>-->
		</div>
		<div class="comm-date">
			<p><?php echo $comment->created_at;?></p>
		</div>
	</div>
	<div class="comm-right">
		<div class="comm-text">
			<p>текст комментария</p>
			<p><?php echo $comment->text;?></p>
		</div>
	</div><hr>
	<?php }?>
</div>

<div class="add-comment">
	<form class="form-group" action="<?php echo base_url('publication/addComment/'.$publication->id)?>" method="post">
		<label for="exampleFormControlTextarea1">оставьте свой комментарий</label>
		<textarea name="text"  class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
		<input type="hidden" name="txt_hidden" value="<?php echo $publication->id;?>">
		<input type="submit" name="addComment" class="btn btn-primary btn-sm" value="Добавить коментарий">
	</form>
</div>
