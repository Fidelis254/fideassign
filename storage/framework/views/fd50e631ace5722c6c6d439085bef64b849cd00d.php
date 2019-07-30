<div class="preloader-section" v-if="loading" v-cloak>
    <div class="preloader-holder">
        <div class="loader"></div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2><?php echo e(trans('lang.import_updates')); ?></h2>
    </div>
    <?php if(Schema::hasTable('services') && Schema::hasTable('service_user')): ?>
        <div class="wt-securitysettings wt-tabsinfo  wt-haslayout">
            <div class="wt-settingscontent">
                <div class="wt-description">
                    <p><?php echo e(trans('lang.import_updates_warning')); ?></p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php echo Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id'
            =>'import-updates', '@submit.prevent'=>'importUpdate']); ?>

            <div class="wt-securitysettings wt-tabsinfo  wt-haslayout">
                <div class="wt-settingscontent">
                    <div class="wt-description">
                        <p><?php echo e(trans('lang.import_updates_note')); ?></p>
                    </div>
                </div>
            </div>
        <?php echo Form::submit(trans('lang.btn_import_updates'), array('class' => 'wt-btn')); ?>

        <?php echo Form::close(); ?>

    <?php endif; ?>
</div>
