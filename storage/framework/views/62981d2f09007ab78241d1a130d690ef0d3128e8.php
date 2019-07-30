
<?php $__env->startSection('content'); ?>
    <div class="wt-dbsectionspace wt-haslayout la-aw-freelancer">
        <div class="freelancer-profile" id="user_profile">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="wt-dashboardbox wt-dashboardtabsholder">
                        <?php echo $__env->make('back-end.freelancer.profile-settings.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="wt-tabscontent tab-content">
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
                            <div class="wt-awardsholder" id="wt-awards">
                                <?php echo Form::open(['url' => url('freelancer/store-project-award-settings'), 'class' =>'wt-formtheme wt-userform wt-formprojectinfo', 'id' => 'awards_projects', '@submit.prevent' => 'submitAwardsProjects']); ?>

                                    <div class="wt-addprojectsholder wt-tabsinfo">
                                        <?php echo $__env->make('back-end.freelancer.profile-settings.projects-awards.projects', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                    <div class="wt-addprojectsholder wt-tabsinfo la-awards">
                                        <?php echo $__env->make('back-end.freelancer.profile-settings.projects-awards.awards', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bootstrap_script'); ?>
    <script src="<?php echo e(asset('js/vendor/bootstrap.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>