<h1>Shows</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Service</th>
        <th>Duration</th>
    </tr>

    <?php foreach ($shows as $show): ?>
    <tr>
        <td>
            <?= $show->name ?>
        </td>
        <td>
            <?= $show->service ?>
        </td>
        <td>
            <?= $show->duration ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
  echo $this->Form->create($show, ['url' => ['controller' => 'Shows', 'action' => 'add'], ['type' => 'post']]);
  echo $this->Form->control('name');
  echo $this->Form->control('service');
  echo $this->Form->control('duration');
  echo $this->Form->button(__('Save'));
  echo $this->Form->end();
?>
</form>
<?= $this->Flash->render() ?>