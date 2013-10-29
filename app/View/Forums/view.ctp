<!-- File: /app/View/Forums/view.ctp -->

<h1>View Thread</h1>

<table>
    <tr>
        <th>Delete</th>
        <th>Thread Id</th>
        <th>Content</th>
        <th>Created</th>
        <th>Edit</th>
    </tr>

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $this->Html->link("Delete", array('controller' => 'posts',
                   'action'=> 'delete', $post['Post']['id']), array('confirm' => 'Are you sure?')); ?></td>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $post['Post']['content'];?>
        </td>
        <td><?php echo $post['Post']['created'];?></td>
        <td><?php echo $this->Html->link("Edit", array('controller' => 
                           'posts','action'=> 'edit', $post['Post']['id'])); ?> </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>

<?php echo $this->Html->link("Back", array('controller' => 'bands','action'=> 'view', $forum)); ?>
<br><br>
<?php echo $this->Html->link("Create Post", array('controller' => 'posts','action'=> 'create', $forum)); ?>
<br><br>
