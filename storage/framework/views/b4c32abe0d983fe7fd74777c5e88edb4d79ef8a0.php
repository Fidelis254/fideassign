<?php $__env->startSection('content'); ?>
<div class="wt-haslayout wt-dbsectionspace">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 float-left" id="post_job">
            <?php if(Session::has('payment_message')): ?>
                <?php $response = Session::get('payment_message') ?>
                <div class="flash_msg">
                    <flash_messages :message_class="'<?php echo e($response['code']); ?>'" :time ='5' :message="'<?php echo e($response['message']); ?>'" v-cloak></flash_messages>
                </div>
            <?php endif; ?>
            <?php if(session()->has('type')): ?>
                <?php session()->forget('type'); ?>
            <?php endif; ?>
            <div class="preloader-section" v-if="loading" v-cloak>
                <div class="preloader-holder">
                    <div class="loader"></div>
                </div>
            </div>
            <div class="wt-haslayout wt-post-job-wrap">
                <?php echo Form::open(['url' => url('job/post-job'), 'class' =>'post-job-form wt-haslayout', 'id' => 'post_job_form',  '@submit.prevent'=>'submitJob']); ?>

                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle">
                            <h2><?php echo e(trans('lang.post_job')); ?></h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            <div class="wt-jobdescription wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2><?php echo e(trans('lang.job_desc')); ?></h2>
                                </div>
                                <div class="wt-formtheme wt-userform wt-userformvtwo">
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" placeholder="<?php echo e(trans('lang.job_title')); ?>" v-model="title">
                                        </div>
                                        <div class="form-group form-group-half wt-formwithlabel">
                                            <span class="wt-select">
                                                <?php echo Form::select('project_levels', $project_levels, null, array('class' => '', 'placeholder' => trans('lang.select_project_level'), 'v-model'=>'project_level')); ?>

                                            </span>
                                        </div>
                                        <div class="form-group form-group-half wt-formwithlabel">
                                            <span class="wt-select">
                                                <?php echo Form::select('job_duration', $job_duration, null, array('class' => '', 'placeholder' => trans('lang.select_job_duration'), 'v-model'=>'job_duration')); ?>

                                            </span>
                                        </div>
                                        <div class="form-group form-group-half wt-formwithlabel">
                                            <span class="wt-select">
                                                <?php echo Form::select('freelancer_type', $freelancer_level, null, array('placeholder' => trans('lang.select_freelancer_level'), 'class' => '', 'v-model'=>'freelancer_level')); ?>

                                            </span>
                                        </div>
                                        <div class="form-group form-group-half wt-formwithlabel">
                                            <span class="wt-select">
                                                <?php echo Form::select('english_level', $english_levels, null, array('class' => '', 'placeholder' => trans('lang.select_english_level'), 'v-model'=>'english_level')); ?>

                                            </span>
                                        </div>
                                        <div class="form-group form-group-half wt-formwithlabel job-cost-input">
                                            <?php echo Form::number('project_cost', null, array('class' => '', 'placeholder' => trans('lang.project_cost'))); ?>

                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="wt-jobcategories wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2><?php echo e(trans('lang.job_cats')); ?></h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        <span class="wt-select">
                                            <?php echo Form::select('categories[]', $categories, null, array('class' => 'chosen-select', 'multiple', 'data-placeholder' => trans('lang.select_job_cats'))); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="wt-languages-holder wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2><?php echo e(trans('lang.langs')); ?></h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        <span class="wt-select">
                                            <?php echo Form::select('languages[]', $languages, null, array('class' => 'chosen-select', 'multiple', 'data-placeholder' => trans('lang.select_lang'))); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="wt-jobdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2><?php echo e(trans('lang.job_dtl')); ?></h2>
                                </div>
                                <div class="wt-formtheme wt-userform wt-userformvtwo">
                                    <?php echo Form::textarea('description', null, ['class' => 'wt-tinymceeditor', 'id' => 'wt-tinymceeditor', 'placeholder' => trans('lang.job_dtl_note')]); ?>

                                </div>
                            </div>
                            <div class="wt-jobskills wt-jobskills-holder wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2><?php echo e(trans('lang.skills_req')); ?></h2>
                                </div>
                                <job_skills :placeholder="'skills already selected'"></job_skills>
                            </div>
                            <div class="wt-joblocation wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2><?php echo e(trans('lang.your_loc')); ?></h2>
                                </div>
                                <div class="wt-formtheme wt-userform">
                                    <fieldset>
                                        <div class="form-group form-group-half">
                                            <span class="wt-select">
                                                <?php echo Form::select('locations', $locations, null, array('class' => 'skill-dynamic-field', 'placeholder' => trans('lang.select_locations'))); ?>

                                            </span>
                                        </div>
                                        <div class="form-group form-group-half">
                                            <?php echo Form::text( 'address', null, ['class' =>'form-control', 'placeholder' => trans('lang.your_address')] ); ?>

                                        </div>
                                        <?php if(!empty($longitude) && !empty($latitude)): ?>
                                            <div class="form-group wt-formmap">
                                                <div class="wt-locationmap">
                                                    <custom-map :latitude="<?php echo e($latitude); ?>" :longitude="<?php echo e($longitude); ?>"></custom-map>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group form-group-half">
                                            <?php echo Form::text( 'longitude', null, ['class' =>'form-control', 'placeholder' => trans('lang.enter_logitude')]); ?>

                                        </div>
                                        <div class="form-group form-group-half">
                                            <?php echo Form::text( 'latitude', null, ['class' =>'form-control', 'placeholder' => trans('lang.enter_latitude')]); ?>

                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="wt-featuredholder wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2><?php echo e(trans('lang.is_featured')); ?></h2>
                                    <div class="wt-rightarea">
                                        <div class="wt-on-off float-right">
                                            <switch_button v-model="is_featured"><?php echo e(trans('lang.is_featured')); ?></switch_button>
                                            <input type="hidden" :value="is_featured" name="is_featured">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wt-attachmentsholder">
                                <div class="lara-attachment-files">
                                    <div class="wt-tabscontenttitle">
                                        <h2><?php echo e(trans('lang.attachments')); ?></h2>
                                        <div class="wt-rightarea">
                                            <div class="wt-on-off float-right">
                                                <switch_button v-model="show_attachments"><?php echo e(trans('lang.attachments_note')); ?></switch_button>
                                                <input type="hidden" :value="show_attachments" name="show_attachments">
                                            </div>
                                        </div>
                                    </div>
                                    <job_attachments :temp_url="'<?php echo e(url('job/upload-temp-image')); ?>'"></job_attachments>
                                    <div class="form-group input-preview">
                                        <ul class="wt-attachfile dropzone-previews">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wt-updatall">
                        <i class="ti-announcement"></i>
                        <span><?php echo e(trans('lang.save_changes_note')); ?></span>
                        <?php echo Form::submit(trans('lang.post_job'), ['class' => 'wt-btn', 'id'=>'submit-profile']); ?>

                    </div>
                <?php echo form::close();; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>