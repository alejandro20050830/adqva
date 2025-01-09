<h1>Lista de Anuncios</h1>
<ul>
    <?php foreach ($ads as $ad): ?>
        <li><?= h($ad->title) ?></li>
    <?php endforeach; ?>
</ul>
