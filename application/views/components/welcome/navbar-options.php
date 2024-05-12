<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-globe"></span> Productores <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <?php foreach ($productors->result_array() as $productor) : ?>
            <li><a href="<?= site_url("productor/{$productor['productor_slug']}/filter"); ?>"><?= $productor['productor_name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-globe"></span> Géneros <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <?php foreach ($genders->result_array() as $gender) : ?>
            <li><a href="<?= site_url("gender/{$gender['gender_slug']}/filter"); ?>"><?= $gender['gender_name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-tags"></span> Categorías <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <?php foreach ($categories->result_array() as $category) : ?>
            <li><a href="<?= site_url("category/{$category['category_slug']}/filter"); ?>"><?= $category['category_name'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</li>