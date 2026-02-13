<div class="row">
  
</div>
<div class="row">
  <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categories as $categ) { ?>
      <tr class="table-active">
        <td scope="row"><?= e($categ['Nom']) ?></td>
        <td scope="row"><?= e($categ['Description']) ?></td>
        <td scope="row"><a class="btn btn-light" href="/admin/modif/<?= e($categ['ID']) ?>" role="button">Modifier</a></td>
        <td scope="row"><a class="btn btn-light" href="/admin/delete/<?= e($categ['ID']) ?>" role="button">Supprimer</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>