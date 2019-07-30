
<?php $__env->startSection('content'); ?>
    <section class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class=" col-sm-12 col-md-8 push-md-2 col-lg-8 push-lg-2" id="packages">
                <div class="preloader-section" v-if="loading" v-cloak>
                    <div class="preloader-holder">
                        <div class="loader"></div>
                    </div>
                </div>
                <div class="wt-dashboardbox">
                <?php if(Session::has('message')): ?>
                    <div class="flash_msg">
                        <flash_messages :message_class="'success'" :time ='5' :message="'<?php echo e(Session::get('message')); ?>'" v-cloak></flash_messages>
                    </div>
                    <?php session()->forget('message') ?>;
                <?php elseif(Session::has('error')): ?>
                    <div class="flash_msg">
                        <flash_messages :message_class="'danger'" :time ='5' :message="'<?php echo e(str_replace("'s", " ", Session::get('error'))); ?>'" v-cloak></flash_messages>
                    </div>
                    <?php session()->forget('error'); ?>
                <?php endif; ?>
                <div class="sj-checkoutjournal">
                    <div class="sj-title">
                        <h3><?php echo e(trans('lang.checkout')); ?></h3>
                    </div>
                    <?php
                        $options = unserialize($package->options);
                        $banner = $options['banner_option'] = 1 ? 'ti-check' : 'ti-na';
                        $chat = $options['private_chat'] = 1 ? 'ti-check' : 'ti-na';
                        session()->put(['product_id' => e($package->id)]);
                        session()->put(['product_title' => e($package->title)]);
                        session()->put(['product_price' => e($package->cost)]);
                        session()->put(['type' => 'package']);
                    ?>
                    <table class="sj-checkouttable">
                         <thead>
                              <tr>
                                <th><?php echo e(trans('lang.item_title')); ?></th>
                                <th><?php echo e(trans('lang.details')); ?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                    <div class="sj-producttitle">
                                        <div class="sj-checkpaydetails">
                                            <h4><?php echo e($package->title); ?></h4>
                                            <span><?php echo e($package->subtitle); ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo e(!empty($symbol['symbol']) ? $symbol['symbol'] : '$'); ?><?php echo e($package->cost); ?></td>
                                  </tr>
                                  <tr>
                                    <td><?php echo e(trans('lang.duration')); ?></td>
                                    <td><?php echo e(Helper::getPackageDurationList($options['duration'])); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(trans('lang.total')); ?></td>
                                    <td><?php echo e(!empty($symbol['symbol']) ? $symbol['symbol'] : '$'); ?><?php echo e($package->cost); ?></td>
                                </tr>
                                </tbody>
                        </table>
                    </div>
                    <?php if(!empty($payment_gateway)): ?>
                        <div class="sj-checkpaymentmethod">
                            <div class="sj-title">
                                <h3><?php echo e(trans('lang.select_pay_method')); ?></h3>
                            </div>
                            <ul class="sj-paymentmethod">
                                <?php $__currentLoopData = $payment_gateway; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gatway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <?php if($gatway == "Mpesa"): ?>
                                            <a href="<?php echo e(url('send')); ?>">
                                                <i class="fa fa-Mpesa"></i>
                                                <span><em><?php echo e(trans('lang.pay_amount_via')); ?></em> <?php echo e(Helper::getPaymentMethodList($gatway)['title']); ?> <?php echo e(trans('lang.pay_gateway')); ?></span>
                                            </a>
                                        <?php elseif($gatway == "stripe"): ?>
                                            <a href="javascrip:void(0);" v-on:click.prevent="getStriprForm">
                                                <i class="fab fa-stripe-s"></i>
                                                <span><em><?php echo e(trans('lang.pay_amount_via')); ?></em> <?php echo e(Helper::getPaymentMethodList($gatway)['title']); ?> <?php echo e(trans('lang.pay_gateway')); ?></span>
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
                <b-modal ref="myModalRef" hide-footer title="Stripe Payment" class="la-pay-stripe">
                    <div class="d-block text-center">
                        <form class="wt-formtheme wt-form-paycard" method="POST" id="stripe-payment-form" role="form" action="" @submit.prevent='submitStripeFrom'>
                            <?php echo e(csrf_field()); ?>

                            <fieldset>
                                <div class="form-group wt-inputwithicon <?php echo e($errors->has('card_no') ? ' has-error' : ''); ?>">
                                    <label><?php echo e(trans('lang.card_no')); ?></label>
                                    <img src="<?php echo e(asset('images/pay-icon.png')); ?>">
                                    <input id="card_no" type="text" class="form-control" name="card_no" value="<?php echo e(old('card_no')); ?>" autofocus>
                                    <?php if($errors->has('card_no')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('card_no')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group <?php echo e($errors->has('ccExpiryMonth') ? ' has-error' : ''); ?>">
                                    <label><?php echo e(trans('lang.expiry_month')); ?></label>
                                    <input id="ccExpiryMonth" type="number" class="form-control" name="ccExpiryMonth" value="<?php echo e(old('ccExpiryMonth')); ?>" min="1" max="12" autofocus>
                                    <?php if($errors->has('ccExpiryMonth')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('ccExpiryMonth')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group <?php echo e($errors->has('ccExpiryYear') ? ' has-error' : ''); ?>">
                                    <label><?php echo e(trans('lang.expiry_year')); ?></label>
                                    <input id="ccExpiryYear" type="text" class="form-control" name="ccExpiryYear" value="<?php echo e(old('ccExpiryYear')); ?>" autofocus>
                                    <?php if($errors->has('ccExpiryYear')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('ccExpiryYear')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group wt-inputwithicon <?php echo e($errors->has('cvvNumber') ? ' has-error' : ''); ?>">
                                    <label><?php echo e(trans('lang.cvc_no')); ?></label>
                                    <img src="<?php echo e(asset('images/pay-img.png')); ?>">
                                    <input id="cvvNumber" type="text" class="form-control" name="cvvNumber" value="<?php echo e(old('cvvNumber')); ?>" autofocus>
                                    <?php if($errors->has('cvvNumber')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('cvvNumber')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group wt-btnarea">
                                    <input type="submit" name="button" class="wt-btn" value="Pay <?php echo e(!empty($symbol['symbol']) ? $symbol['symbol'] : '$'); ?><?php echo e($package->cost); ?>">
                                </div>
                            </fieldset>
                        </form>
                    </b-modal>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>