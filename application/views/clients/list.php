<div class="span10">
	<div class="content">
		<legend>Список клиентов <?php echo anchor('clients/add', '<i class="icon-user"></i> Добавить нового', 'class="btn btn-small"'); ?></legend>
		<table class="table table-striped table-bordered table-condensed">
		<thead>
			<tr>
				<th></th>
				<?php foreach ($fields as $field_name => $field_display) : ?>
				<th <?php if ($sort_by == $field_name) echo "class=\"sort-$sort_order\""; ?> >
				<?php echo anchor("clients/display/$field_name/" . (($sort_order == 'asc' && $field_name == $sort_by) ? 'desc' : 'asc') , $field_display); ?>
				</th>
				<?php endforeach; ?>
				
			</tr>
		</thead>
		<tbody>
		<?php foreach ($clients as $client): ?>
			<tr>
				<td>
                    <?php echo anchor('clients/edit/' . $client['id'],'<i class="icon-pencil"></i>', array('title'=>'редактировать')); ?>
                    <?php echo anchor('orders/filter/' . $client['id'],'<i class="icon-book"></i>', array('title'=>'список заказов')); ?>
                </td>
				<?php foreach ($fields as $field_name => $field_display) : ?>
				<td><?php echo $client[$field_name] ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
		<?php 
			echo $pagination; 
		?>
	</div>
</div><!--/span-->
