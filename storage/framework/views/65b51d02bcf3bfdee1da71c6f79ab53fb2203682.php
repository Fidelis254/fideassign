<table class="wt-tablecategories" style="font-family:'Poppins', Arial, Helvetica, sans-serif;">
        <thead>
            <tr style="background: #fcfcfc;">
                <th style="font-weight: 500;border-top: 1px solid #eff2f5;color: #323232;font-size: 15px;line-height: 20px;text-align: left;padding: 15px 20px;"><?php echo e(trans('lang.user_name')); ?></th>
                <th style="font-weight: 500;border-top: 1px solid #eff2f5;color: #323232;font-size: 15px;line-height: 20px;text-align: left;padding: 15px 20px;"><?php echo e(trans('lang.amount')); ?></th>
                <th style="font-weight: 500;border-top: 1px solid #eff2f5;color: #323232;font-size: 15px;line-height: 20px;text-align: left;padding: 15px 20px;"><?php echo e(trans('lang.payment_method')); ?></th>
                <th style="font-weight: 500;border-top: 1px solid #eff2f5;color: #323232;font-size: 15px;line-height: 20px;text-align: left;padding: 15px 20px;"><?php echo e(trans('lang.ph_email')); ?></th>
                <th style="font-weight: 500;border-top: 1px solid #eff2f5;color: #323232;font-size: 15px;line-height: 20px;text-align: left;padding: 15px 20px;"><?php echo e(trans('lang.processing_date')); ?></th>
            </tr>
        </thead>
        <?php if($payouts->count() > 0): ?>
            <tbody>
                <?php $__currentLoopData = $payouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="border-top: 1px solid #eff2f5;color: #767676;font-size: 13px;line-height: 20px;padding: 10px 20px;text-align: left;"><?php echo e(Helper::getUserName($payout->user_id)); ?></td>
                        <td style="border-top: 1px solid #eff2f5;color: #767676;font-size: 13px;line-height: 20px;padding: 10px 20px;text-align: left;"><?php echo e(Helper::currencyList($payout->currency)['symbol']); ?><?php echo e($payout->amount); ?></td>
                        <td style="border-top: 1px solid #eff2f5;color: #767676;font-size: 13px;line-height: 20px;padding: 10px 20px;text-align: left;"><?php echo e($payout->payment_method); ?></td>
                        <?php if(Schema::hasColumn('payouts', 'email')): ?>
                            <td style="border-top: 1px solid #eff2f5;color: #767676;font-size: 13px;line-height: 20px;padding: 10px 20px;text-align: left;"><?php echo e($payout->email); ?></td>
                        <?php elseif(Schema::hasColumn('payouts', 'paypal_id')): ?>
                            <td style="border-top: 1px solid #eff2f5;color: #767676;font-size: 13px;line-height: 20px;padding: 10px 20px;text-align: left;"><?php echo e($payout->paypal_id); ?></td>
                        <?php endif; ?>
                        <td style="border-top: 1px solid #eff2f5;color: #767676;font-size: 13px;line-height: 20px;padding: 10px 20px;text-align: left;"><?php echo e(\Carbon\Carbon::parse($payout->created_at)->format('M d, Y')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        <?php endif; ?>
    </table>
