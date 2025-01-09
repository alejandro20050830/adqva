<h1>Lista de Anuncios</h1>

<table>
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Texto</th>
            <th>Enlace</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ads as $ad): ?>
        <tr>
            <td><img src="<?= $ad->image ?>" alt="Ad Image" style="width:100px;"></td>
            <td><?= h($ad->text) ?></td>
            <td><?= h($ad->link) ?></td>
            <td>
                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $ad->id], ['confirm' => __('¿Está seguro de que desea eliminar # {0}?', $ad->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->Html->link(__('Agregar Anuncio'), ['action' => 'add']) ?>
