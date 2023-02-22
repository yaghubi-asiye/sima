<?php $__env->startSection('headerscripts'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">جزییات قرارداد های جاری <?php echo e($contract->id); ?></h4>
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
                                <div class="card-body card-dashboard"><br><br>


                                    <div class="text-left" >
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel17">جزییات قرارداد های جاری</h4>

                                                </div>
                                                <div class="modal-body">
                                                    <?php if($errors->any()): ?>
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><?php echo e($error); ?></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>


                                                    <div class="form-body">


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="description">ردیف  </label>
                                                            <div class="col-md-9">
                                                                <?php echo e($contract->id ?? ''); ?>

                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="description">  عنوان قرارداد </label>
                                                            <div class="col-md-9">
                                                                <?php echo e($contract->onvan ?? ''); ?>


                                                            </div>
                                                        </div>


                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">موضوع قرارداد  </label>
                                                            <div class="col-md-9">
                                                                <?php echo e($contract->mozoo ?? ''); ?>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">نام پیمانکار </label>
                                                            <div class="col-md-9">
                                                                <?php echo e($contract->peymankar ?? ''); ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour"> مبلغ قرارداد </label>
                                                            <div class="col-md-9">
                                                                <?php echo e($contract->mablagh ?? ''); ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour"> نحوه پرداخت  </label>
                                                            <div class="col-md-9">
                                                               <?php echo e($contract->pardakht); ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">مدت قرارداد   </label>
                                                            <div class="col-md-9">
                                                                <?php echo e($contract->moddat); ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">تاریخ شروع  </label>
                                                            <div class="col-md-9">
                                                                <?php echo e($contract->from ?? ''); ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">تاریخ پایان   </label>
                                                            <div class="col-md-9">
                                                                <?php echo e($contract->to ?? ''); ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">نوع تضمین  </label>
                                                            <div class="col-md-9">
                                                                <?php echo e($contract->tazmin ?? ''); ?>

                                                            </div>
                                                        </div>





                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="startHour">ناظر قرارداد </label>
                                                            <div class="col-md-9">
                                                                <?php echo e($contract->nazer ?? ''); ?>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control"  for="endHour">توضیحات  </label>
                                                            <div class="col-md-9">
                                                                <?php echo e($contract->description ?? ''); ?>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-3 label-control" for="result"> فایل</label>
                                                            <div class="col-md-9">
                                                                <a target="_blank" href="<?php echo e($contract->contractorFile); ?>"> <i class="ft-file-text" ></i> </a>
                                                            </div>
                                                        </div>



                                                    </div>




                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>