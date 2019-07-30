
<?php $__env->startSection('content'); ?>
    <div class="skills-listing" id="packages">
        <?php if(Session::has('message')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak></flash_messages>
            </div>
        <?php elseif(Session::has('error')): ?>
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'<?php echo e(Session::get('error')); ?>'" v-cloak></flash_messages>
            </div>
        <?php endif; ?>
        <section class="wt-haslayout wt-dbsectionspace">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-6 float-left">
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2><?php echo e(trans('lang.edit_package')); ?></h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            <?php echo Form::open(['url' => url('admin/packages/update/'.$package->slug.''), 'class' =>'wt-formtheme wt-formprojectinfo wt-formcategory',
                            'id' => 'packages'] ); ?>

                                <fieldset>
                                    <div class="form-group">
                                        <?php echo Form::text( 'package_title', e($package->title), ['class' =>'form-control'.($errors->has('package_title') ? ' is-invalid' : ''), 'placeholder' => trans('lang.ph_pkg_title')]); ?>

                                        <?php if($errors->has('package_title')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('package_title')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::text( 'package_subtitle', e($package->subtitle), ['class' =>'form-control'.($errors->has('package_subtitle') ? ' is-invalid' : ''), 'placeholder' => trans('lang.ph_pkg_subtitle')]); ?>

                                        <?php if($errors->has('package_subtitle')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('package_subtitle')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::number( 'package_price', e($package->cost), ['class' =>'form-control '.($errors->has('package_price') ? ' is-invalid' : ''), 'placeholder' => trans('lang.ph_pkg_price')]); ?>

                                        <?php if($errors->has('package_price')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('package_price')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($package->role_id == 2): ?>
                                        <div class="form-group">
                                            <?php echo Form::text('employer[jobs]', e($options['jobs']), array('class' => 'form-control', 'placeholder' => trans('lang.no_of_jobs'))); ?>

                                            <?php if($errors->has('employer[jobs]')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('employer[jobs]')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo Form::text('employer[featured_jobs]', e($options['featured_jobs']), array('class' => 'form-control', 'placeholder' => trans('lang.no_of_featuredjobs'))); ?>

                                            <?php if($errors->has('employer[featured_jobs]')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('employer[featured_jobs]')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group <?php echo e($errors->has('employer[duration]') ? ' is-invalid' : ''); ?>">
                                            <span class="wt-select">
                                                <select name="employer[duration]">
                                                    <option value="" disabled=""><?php echo e(trans('lang.select_duration')); ?></option>
                                                    <?php $__currentLoopData = $durations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $duration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $selected = $package_duration == $key ? 'selected' : ''; ?>
                                                        <option value="<?php echo e($key); ?>" <?php echo e($selected); ?>><?php echo e(Helper::getPackageDurationList($key)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </span>
                                            <?php if($errors->has('employer[duration]')): ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('employer[duration]')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <switch_button v-model="banner_option"><?php echo e(trans('lang.show_banner_opt')); ?></switch_button>
                                            <input type="hidden" :value="banner_option" name="employer[banner_option]">
                                        </div>
                                        <div class="form-group">
                                            <switch_button v-model="private_chat"><?php echo e(trans('lang.enabale_disable_pvt_chat')); ?></switch_button>
                                            <input type="hidden" :value="private_chat" name="employer[private_chat]">
                                        </div>
                                        <?php if($employer_trial->count() == 0): ?>
                                            <div class="form-group">
                                                <span class="wt-checkbox">
                                                    <input id="trial" type="checkbox" name="trial">
                                                    <label for="trial"><span><?php echo e(trans('lang.enable_trial')); ?></span></label>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                        
                                    <?php elseif($package->role_id == 3): ?>
                                        <div class="form-group">
                                            <?php echo Form::number('freelancer[no_of_connects]', e($options['no_of_connects']), array('class' => 'form-control', 'placeholder'
                                            => trans('lang.no_of_connects'))); ?>

                                        </div>
                                        <div class="form-group">
                                            <?php echo Form::number('freelancer[no_of_skills]', e($options['no_of_skills']), array('class' => 'form-control', 'placeholder'
                                            => trans('lang.no_of_skills'))); ?>

                                        </div>
                                        <div class="form-group">
                                            <?php echo Form::number( 'freelancer[no_of_services]', e($no_of_services), ['class' =>'form-control ', 'placeholder' => trans('lang.freelancer_pkg_opt.no_of_services')] ); ?>

                                        </div>
                                        <div class="form-group">
                                            <?php echo Form::number( 'freelancer[no_of_featured_services]', e($no_of_featured_services), ['class' =>'form-control ', 'placeholder' => trans('lang.freelancer_pkg_opt.no_of_featured_services')] ); ?>

                                        </div>
                                        <div class="form-group">
                                            <span class="wt-select">
                                                <select name="freelancer[duration]">
                                                    <option value="" disabled=""><?php echo e(trans('lang.select_duration')); ?></option>
                                                    <?php $__currentLoopData = $durations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $duration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>"><?php echo e(Helper::getPackageDurationList($key)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </span>
                                        </div>
                                        <?php if($package->trial != 1): ?>
                                            <div class="form-group">
                                                <span class="wt-select">
                                                    <?php echo Form::select('freelancer[badge]', $badges, $package->badge_id, array('placeholder' => trans('lang.select_badge'))); ?>

                                                </span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <switch_button v-model="banner_option"><?php echo e(trans('lang.show_banner_opt')); ?></switch_button>
                                            <input type="hidden" :value="banner_option" name="freelancer[banner_option]">
                                        </div>
                                        <div class="form-group">
                                            <switch_button v-model="private_chat"><?php echo e(trans('lang.enabale_disable_pvt_chat')); ?></switch_button>
                                            <input type="hidden" :value="private_chat" name="freelancer[private_chat]">
                                        </div>
                                        <?php if($freelancer_trial->count() == 0): ?>
                                            <div class="form-group">
                                                <span class="wt-checkbox">
                                                    <input id="trial" type="checkbox" name="trial">
                                                    <label for="trial"><span><?php echo e(trans('lang.enable_trial')); ?></span></label>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <input type="hidden" value="<?php echo e($package->role_id); ?>" name="roles">
                                    <div class="form-group wt-btnarea">
                                        <?php echo Form::submit(trans('lang.update_package'), ['class' => 'wt-btn']); ?>

                                    </div>
                                </fieldset>
                            <?php echo Form::close();; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>