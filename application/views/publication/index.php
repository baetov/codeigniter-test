

<div class="container">
	<?php
	if($this->session->flashdata('success_msg')){
		?>
		<div class="alert alert-success">
			<?php echo $this->session->flashdata('success_msg'); ?>
		</div>
		<?php
	}
	?>


	<?php
	if($this->session->flashdata('error_msg')){
		?>
		<div class="alert alert-success">
			<?php echo $this->session->flashdata('error_msg'); ?>
		</div>
		<?php
	}
	?>
	<?php if ($this->ion_auth->is_admin() || $this->ion_auth->in_group('member')) {?>
		<a href="<?php echo base_url('/publication/create')?>" class="btn btn-success">добавить статью</a>
	<?php }?>
	<h3>список публикаций</h3>
	<table class="table table-bordered wy-table-responsive">
			<thead>
				<tr>
					<td>№</td>
					<td>описание</td>
					<td>дата публикаци</td>
					<td>actions</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($publications as $publication){
						?>
				<tr>
					<td><? echo $publication->id;?></td>
					<td><? echo $publication->description;?></td>
					<td><? echo $publication->created_at;?></td>
					<td>
						<a href="<?php echo base_url('publication/show/'.$publication->id)?>" class="btn btn-outline-success" >детальный обзор</a>
						<?php if ($this->ion_auth->is_admin() || $this->ion_auth->in_group('member')) {?>
							<a href="<?php echo base_url('publication/edit/'.$publication->id)?>" class="btn btn-info">редактировать</a>
							<a href="<?php echo base_url('publication/delete/'.$publication->id)?>" class="btn btn-danger" onclick="return confirm('Вы действительно хотите удалть публикацию?');">удалть</a>
						<?php }?>
					</td>
				</tr>
				<?php }?>
			</tbody>
	</table>
</div>



