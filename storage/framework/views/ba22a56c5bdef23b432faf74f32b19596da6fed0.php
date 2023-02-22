<?php echo $__env->make('components.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
               <?php echo $__env->make('components.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">لیست   تایم شیت من در پروژه آزادگان جنوبی </h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <a  style="float: left;margin-left: 40px!important;" target="_blank"  class="btn btn-success btn-min-width mr-1 mb-1"  href="<?php echo e(route('sheet.create')); ?>"><span class="ladda-label">  <i class="ft-plus"></i> افزودن </span></a>
                                <div class="card-body card-dashboard"><br><br>
                                    <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                        <thead>
                                        <tr style="text-align: center" >
                                            <th>ردیف</th>
                                            <th>  روز </th>
                                            <th>تاریخ </th>
                                            <th>  ساعت شروع</th>
                                            <th>ساعت خاتمه </th>
                                            <th>مدت زمان صرف شده </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($item->day); ?></td>
                                                <td><?php echo e(jdate($item->date)->format('Y/m/d')); ?></td>
                                                <td><?php echo e($item->start_time); ?></td>
                                                <td><?php echo e($item->end_time); ?></td>
                                                <td>
                                                    <?php
                                                        $startTime = \Carbon\Carbon::parse($item->start_time);
                                                        $endTime = \Carbon\Carbon::parse($item->end_time);

                                                        $totalDuration =  $startTime->diff($endTime)->format('%H:%I:%S');
                                                       ?>
                                                    <?php echo e($totalDuration); ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('components.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>