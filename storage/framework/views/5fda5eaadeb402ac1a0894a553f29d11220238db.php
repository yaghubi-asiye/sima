<?php $__env->startSection('headerscripts'); ?>


    <style media="screen">

        .amcharts-legend-value {
            font-size: 20px !important;
            font-weight: bold !important;
        }

        .amcharts-legend-label {
            font-weight: bold !important;
        }

        .swal-title {
            font-family: Byekan !important;
        }

        .swal-text {
            font-family: Byekan !important;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!--  Start add Suggestion -->
    <div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17"> افزودن  کار امروز </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="<?php echo e(route('dailyWork.store')); ?>" class="form form-horizontal form-bordered striped-rows">
                        <?php echo csrf_field(); ?>


                        <div style="font-family:byekan" class="form-body">

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="start_time"> ساعت شروع </label>
                                <div class="col-md-9">
                                    <input type="time" class="form-control" name="start_time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="end_time">ساعت خاتمه </label>
                                <div class="col-md-9">
                                    <input type="time" class="form-control" name="end_time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="time">مدت زمان انجام (به دقیقه ) </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="time">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="assignment">مربوط به کجا </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="assignment">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="description">شرح فعالیت </label>
                                <div class="col-md-9">
                                    <textarea name="description" class="form-control" rows="3" cols="80"></textarea>

                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="result">نتیجه </label>
                                <div class="col-md-9">
                                    <textarea name="result" class="form-control" rows="3" cols="80"></textarea>

                                    
                                </div>
                            </div>








                        </div>

                        <div style="font-family:Byekan" class="form-actions">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check-square-o"></i> افزودن
                            </button>

                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> لغو
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <!--  End add Suggestion -->


    <!--  Start Edit $phoneBooks -->


    

    <!--  End Edit $phoneBooks -->



    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> کارهای روزانه همه کارکنان  </h4>
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
                                

                                <div class="card-body card-dashboard">
                                    <table style="font-family: Byekan;text-align: center; width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead style="text-align:center">
                                        <tr style="text-align:center">
                                            <th> ردیف</th>
                                            <th> نام</th>

                                            <th>  تاریخ</th>
                                            <th> ساعت شروع</th>
                                            <th> ساعت خاتمه</th>
                                            <th>  شرح فعالیت</th>
                                            <th>مربوط به کجا</th>
                                            <th>نتیجه</th>
                                            <th>مدت زمان صرف شده</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td style="white-space: normal;"><?php echo e($loop->iteration); ?></td>
                                                <td>
                                                    <?php echo e(\App\User::where('id', $archive->user_id)->get()->pluck('name')->first() . ' ' . \App\User::where('id', $archive->user_id)->get()->pluck('family')->first()); ?>


                                                </td>
                                                <td>
                                                    <?php echo e(jdate($archive->created_at)->format('l j F   Y')); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($archive->start_time); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($archive->end_time); ?>

                                                </td>
                                                <td><?php echo e($archive->description); ?></td>
                                                <td><?php echo e($archive->assignment); ?></td>
                                                <td><?php echo e($archive->result); ?></td>

                                                <td><?php echo e($archive->time); ?></td>


                                                
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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


<?php $__env->startSection('footerscripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>