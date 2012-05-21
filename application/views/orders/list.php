<div class="span10">
    <div class="content">
        <legend>Список заказов <?php echo anchor('orders/add', '<i class="icon-book"></i> Добавить новый', 'class="btn btn-small"'); ?></legend>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr>
                <th></th>
                <?php foreach ($fields as $field_name => $field_display) : ?>
                <th <?php if ($sort_by == $field_name) echo "class=\"sort-$sort_order\""; ?> >
                    <?php
                        if(isset($filter))
                            echo anchor("orders/filter/$filter/$field_name/" . (($sort_order == 'asc' && $field_name == $sort_by) ? 'desc' : 'asc') , $field_display);
                        else
                            echo anchor("orders/display/$field_name/" . (($sort_order == 'asc' && $field_name == $sort_by) ? 'desc' : 'asc') , $field_display);
                    ?>
                </th>
                <?php endforeach; ?>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo anchor('orders/edit/' . $order['id'],'<i class="icon-pencil"></i>'); ?></td>
                <?php foreach ($fields as $field_name => $field_display) : ?>
                <td><?php echo $order[$field_name] ?></td>
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
