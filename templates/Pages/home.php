<!-- src/Template/Pages/home.ctp -->
<div class="container">
    <h1 class="text-center my-4">Últimas Noticias</h1>
    <div class="row">
        <?php if (!empty($adsArray)): ?>
            <?php foreach ($adsArray as $ad): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Mostrar la imagen de la noticia -->
                        <?php if (!empty($ad['image_url'])): ?>
                            <img src="<?= $ad['image_url'] ?>" class="card-img-top" alt="Imagen de la noticia">
                        <?php else: ?>
                            <img src="<?= $this->Url->image('placeholder.jpg') ?>" class="card-img-top" alt="Imagen predeterminada">
                        <?php endif; ?>

                        <div class="card-body">
                            <!-- Mostrar la descripción de la noticia -->
                            <p class="card-text"><?= h($ad['description']) ?></p>
                        </div>

                        <!-- Enlace para ver más detalles -->
                        <div class="card-footer bg-white">
                            <a href="<?= h($ad['link']) ?>" class="btn btn-primary btn-block" target="_blank">Leer más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center">No hay noticias disponibles.</p>
            </div>
        <?php endif; ?>
    </div>
</div>