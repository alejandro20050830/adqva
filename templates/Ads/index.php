<h1>Anuncios</h1>
<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Descripción</th>
            <th>Enlace</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ads as $ad): ?>
        <tr>
            <td><?= h($ad->title) ?></td>
            <td><?= h($ad->description) ?></td>
            <td><?= h($ad->link) ?></td>
            <td><img src="<?= h($ad->image) ?>" alt="<?= h($ad->title) ?>" width="100"></td>
            <td>
                <?= $this->Html->link(__('Ver'), ['action' => 'view', $ad->id]) ?>
                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $ad->id], ['confirm' => __('¿Estás seguro de que deseas eliminar # {0}?', $ad->title)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
