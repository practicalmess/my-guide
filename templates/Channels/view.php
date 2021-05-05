<h1><?= $channel->name ?></h1>
<?php foreach ($shows as $show): ?>
    <p><?= $show->name ?></p>
    <p><?= $show->service ?></p>
    <p><?= $show->duration ?></p>
<?php endforeach; ?>
<?= $this->Flash->render() ?>