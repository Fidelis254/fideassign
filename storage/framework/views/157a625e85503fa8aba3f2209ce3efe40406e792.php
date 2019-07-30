
<?php $__env->startSection('content'); ?>
    <div class="wt-dbsectionspace wt-haslayout la-pm-freelancer">
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="freelancer-profile" id="user_profile">
                        <?php if(Session::has('message')): ?>
                            <div class="flash_msg">
                                <flash_messages :message_class="'success'" :time ='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak></flash_messages>
                            </div>
                        <?php endif; ?>
                        <?php if($errors->any()): ?>
                            <ul class="wt-jobalerts">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flash_msg">
                                        <flash_messages :message_class="'danger'" :time ='10' :message="'<?php echo e($error); ?>'" v-cloak></flash_messages>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                        <div class="wt-dashboardbox wt-dashboardtabsholder">
                            <?php echo $__env->make('back-end.freelancer.profile-settings.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <div class="wt-tabscontent tab-content">
                                <div class="wt-educationholder" id="wt-education">
                                    <?php echo Form::open(['url' => url('freelancer/store-payment-settings'), 'class' =>'wt-formtheme wt-userform', 'id' => 'payment_settings', '@submit.prevent'=>'submitPaymentSettings']); ?>

                                        <div class="wt-userexperience wt-tabsinfo">
                                            <div class="wt-tabscontenttitle">
                                                <h2><?php echo e(trans('lang.payout_id')); ?></h2>
                                                <span><?php echo e(trans('lang.payout_note')); ?></span>
                                            </div>
                                            <div class="wt-settingscontent">
                                                <div class="wt-formtheme wt-userform">
                                                    <div class="form-group form-group-half">
                                                        <?php echo e(Form::text('payout_id',  e($payout_id), ['class' => 'form-control', 'placeholder' => trans('lang.ph_payout_id')])); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wt-updatall">
                                            <i class="ti-announcement"></i>
                                            <span><?php echo e(trans('lang.save_changes_note')); ?></span>
                                            <?php echo Form::submit(trans('lang.btn_save_update'), ['class' => 'wt-btn', 'id'=>'submit-profile']); ?>

                                        </div>
                                    <?php echo form::close();; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>