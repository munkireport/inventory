<?php if(isset($appName)):?>
    <?php $appList = [$appName]?>
<?php else:?>
    <?php configAppendFile(__DIR__ . '/../config.php')?>
    <?php $appList = conf('apps_to_track', [])?>
<?php endif?>

<?php foreach( $appList as $string):?>
<div class="col-lg-4 col-md-6">
    <div class="card app-widget" data-ident="<?php echo $string;?>">
        <div class="card-header" data-container="body">
            <i class="fa fa-tachometer"></i> <span></span>
        </div>
        <div class="list-group scroll-box"></div>
    </div><!-- /panel -->
</div><!-- /col -->
<?php endforeach?>

<script>
<?php require_once(__DIR__ . '/../js/app_widget.js'); ?>
</script>
