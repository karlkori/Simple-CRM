<div class="span10">
	<div class="content">
		<legend>Список клиентов</legend>
          <div class="form-actions">
          	<?php echo anchor('clients/add', 'Добавить', 'class="btn btn-primary"'); ?>
          </div>
		<table class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
				<th></th>
				<th>Название</th>
				<th>Контактное лицо</th>
				<th>Телефоны</th>
				<th>Е-почта</th>
				<th>Адрес</th>
				<th>Примечание</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($clients as $client): ?>
			<tr>
				<td><?php echo anchor('clients/edit/' . $client['id'],'<i class="icon-pencil"></i>'); ?></td>
				<td><?php echo $client['name'] ?></td>
				<td><?php echo $client['contactname'] ?></td>
				<td><?php echo $client['tel'] ?></td>
				<td><?php echo $client['email'] ?></td>
				<td><?php echo $client['address'] ?></td>
				<td><?php echo $client['description'] ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
		<?php 
			echo $pagination; 
		?>

	</div>
</div><!--/span-->
