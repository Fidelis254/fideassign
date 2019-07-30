<?php echo Form::open(['url' => '', 'class' =>'wt-formtheme wt-userform', 'id' =>'payment-form', '@submit.prevent'=>'submitMpesaSettings']); ?>

    <div class="wt-location wt-tabsinfo">
        <div class="wt-tabscontenttitle">
            <h2><?php echo e(trans('Mpesa settings')); ?></h2>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    <?php echo Form::text('client_id', e($client_id), ['class' => 'form-control', 'placeholder' => trans('Mpesa Number')]); ?>

                </div>
            </div>
        </div>
        <div class="wt-settingscontent">
            <div class="wt-formtheme wt-userform">
                <div class="form-group">
                    <?php echo e(Form::input('password', 'paypal_password', e($payment_password), ['class' => 'form-control', 'placeholder' => trans('OrgAccount_Number')])); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="wt-updatall la-updateall-holder">
        <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'wt-btn']); ?>

    </div>
<?php echo Form::close(); ?>