<h1>Agregar Anuncio</h1>
<?= $this->Form->create($ad, ['type' => 'file']) ?>
<?= $this->Form->control('image', ['type' => 'file']) ?>
<?= $this->Form->control('text') ?>
<?= $this->Form->control('link') ?>
<?= $this->Form->button(__('Guardar')) ?>
<?= $this->Form->end() ?>
