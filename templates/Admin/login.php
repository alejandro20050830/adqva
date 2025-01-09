<!-- src/Template/Admin/login.ctp -->
<div class="container">
    <h1 class="text-center">Login de Administrador</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?= $this->Form->create(null, ['url' => ['action' => 'login']]) ?>
            <div class="form-group">
                <?= $this->Form->control('username', ['label' => 'Usuario', 'required' => true]) ?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('password', ['label' => 'Contraseña', 'required' => true]) ?>
            </div>
            <?= $this->Form->button(__('Iniciar Sesión'), ['class' => 'btn btn-primary btn-block']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>