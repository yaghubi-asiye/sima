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
                    <h4 class="modal-title" id="myModalLabel17"> افزودن دستورالعمل  </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post"
                          action="instructions" class="form form-horizontal form-bordered striped-rows">
                        <?php echo csrf_field(); ?>


                        <div style="font-family:byekan" class="form-body">


                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">عنوان  </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="title">

                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="number">فایل </label>
                                <div class="col-md-9">
                                    <input type="file"  class="form-control" name="file">
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


    <?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phoneBook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="font-family:Byekan" class="modal fade text-left" id="ReferralsTdl<?php echo e($phoneBook->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($phoneBook->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div style="text-align: center!important;" class="modal-header">
                        <h4 style="text-align: center!important;" class="modal-title" id="ReferralsTdl<?php echo e($phoneBook->id); ?>">دستورالعمل </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div  style=" direction: rtl;" class="modal-body">


                        <form style="vertical-align:center;text-align:center" method="post" action="instruction/update/<?php echo e($phoneBook->id); ?>"  enctype="multipart/form-data" class="form form-horizontal form-bordered striped-rows">
                            <?php echo csrf_field(); ?>
                            <div class="form-body">

                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id"> عنوان</label>
                                    <div class="col-md-9">
                                        <input type="text"  value="<?php echo e($phoneBook->title); ?>" class="form-control" name="title" >
                                    </div>
                                </div>


                                <div  class="form-group row">
                                    <label class="col-md-3 label-control" for="id">فایل</label>
                                    <div class="col-md-9">
                                        <input type="file"  class="form-control" name="file" >
                                    </div>
                                </div>


                            </div>



                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check-square-o"></i> بروزرسانی
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                <h4 class="card-title">  دستورالعمل ها</h4>
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
                                <button  style="float: left;margin-left: 40px!important;"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addUser" data-toggle="modal" ><span class="ladda-label">  <i class="ft-plus"></i> افزودن </span></button>

                                <div class="card-body card-dashboard">
                                    <table style="font-family: Byekan;text-align: center; width: 100%"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead style="text-align:center">
                                        <tr style="text-align:center">
                                            <th> ردیف</th>
                                            <th> عنوان</th>
                                            <th> تاریخ بارگذاری</th>
                                            <th> ثبت کننده</th>
                                            <th> فایل</th>
                                            <?php if(auth()->user()->id == 36 || auth()->user()->id == 6 || auth()->user()->id == 48): ?>
                                                <th>عملیات</th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td style="white-space: normal;"><?php echo e($loop->iteration); ?></td>
                                                <td>
                                                    <?php echo e($archive->title); ?>

                                                </td>
                                                <td style="direction: ltr;"><?php echo e(jdate($archive->created_at)); ?></td>


                                                <td>
                                                    <?php echo e($archive->user->name . " " . $archive->user->family); ?>

                                                </td>

                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA; " >
                                                    <a target="_blank" href="<?php echo e($archive->file); ?>"> <?php echo $archive->file !== "storage/regulations/nothing" ? "<i class='ft-file-text' ></i>" : ""; ?> </a>
                                                </td>


                                                <?php if(auth()->user()->id == 36 || auth()->user()->id == 6 || auth()->user()->id == 48): ?>

                                                <td style="text-align:center;color: #3BAFDA">
                                                    <a data-toggle="modal" data-target="#ReferralsTdl<?php echo e($archive->id); ?>" ><i style="font-size: 20px" class="ft-external-link"></i></a>




                                                    <a onclick="return confirm('آیا برای حذف اطمینان دارید؟');"
                                                       href="instruction/delete/<?php echo e($archive->id); ?> "><i
                                                                style="font-size: 20px" class="ft-x-square danger"></i>
                                                    </a>
                                                </td>
                                                <?php endif; ?>
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