<?php if(isset($appName)):?>
    <?php $appList = [$appName]?>
<?php else:?>
    <?php configAppendFile(__DIR__ . '/../config.php')?>
    <?php $appList = conf('apps_to_track', [])?>
<?php endif?>

<?php foreach( $appList as $string):?>
<div class="col-lg-4 col-md-6">
    <div class="panel panel-default app-widget" data-ident="<?php echo $string;?>">
        <div class="panel-heading" data-container="body">
            <h3 class="panel-title"><i class="fa fa-tachometer"></i> <span></span></h3>
        </div>
        <div class="list-group scroll-box"></div>
    </div><!-- /panel -->
</div><!-- /col -->
<?php endforeach?>

<script>
<?php require_once(__DIR__ . '/../js/app_widget.js'); ?>
</script>
