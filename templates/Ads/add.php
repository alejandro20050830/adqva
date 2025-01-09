<h1>Agregar Anuncio</h1>
<?= $this->Form->create($ad, ['type' => 'file']) ?>
<fieldset>
    <legend><?= __('Agregar Anuncio') ?></legend>
    <?= $this->Form->control('title', ['label' => 'Título']) ?>
    <?= $this->Form->control('description', ['label' => 'Descripción']) ?>
    <?= $this->Form->control('link', ['label' => 'Enlace']) ?>
    <?= $this->Form->control('image', ['type' => 'file', 'label' => 'Imagen']) ?>
</fieldset>
<?= $this->Form->button(__('Guardar Anuncio')) ?>
<?= $this->Form->end() ?>
