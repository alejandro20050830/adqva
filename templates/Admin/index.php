<!-- src/Template/Admin/index.ctp -->
<div class="container">
    <h1 class="text-center">Panel de Administración</h1>
    <p>Bienvenido al panel de administración. Aquí puedes gestionar el contenido de tu sitio.</p>
    <a href="<?= $this->Url->build(['action' => 'logout']) ?>" class="btn btn-danger">Cerrar Sesión</a>
</div>