<?php if ($success) : ?>
  <div class="card-panel green lighten-2">
    <span class="white-text">
      <?= $success ?>
    </span>
    <i id="close" class="material-icons white-text right waves-effect btn-flat">close</i>
  </div>
<?php endif; ?>

<?php if ($error): ?>
  <div class="card-panel red lighten-2">
    <span class="white-text">
      <?= $error ?>
    </span>

    <i id="close" class="material-icons white-text right waves-effect btn-flat">close</i>
  </div>
<?php endif; ?>