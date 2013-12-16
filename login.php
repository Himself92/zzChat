<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php if($error){ ?>
        <div class="alert alert-danger">
            <?=_t($error)?>
        </div>
        <?php } ?>
        <form role="form" class="form-signin" action="index.php?request=login" method="post">
            <h2 class="form-signin-heading"><?= _t('signin')?></h2>
            <input type="text" name="user" autofocus="" required="" placeholder="<?=_t('user')?>" class="form-control">
            <button type="submit" class="btn btn-lg btn-primary btn-block" style="margin-top: 3px;"><?=_t('enter')?></button>
        </form>
    </div>
  </div>
</div>