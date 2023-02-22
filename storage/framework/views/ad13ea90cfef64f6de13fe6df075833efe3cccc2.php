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

    <!--  Start Edit Suggestions -->
    <?php $__currentLoopData = $suggestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade text-left" id="EditSuggestion<?php echo e($suggestion->id); ?>" tabindex="-1" role="dialog" aria-labelledby="EditOtherTask<?php echo e($suggestion->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div   class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div style="font-family:Byekan; direction: rtl" class="modal-body">

                        <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="/Suggestions/update" class="form form-horizontal form-bordered striped-rows">
                            <?php echo csrf_field(); ?>
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> طرح درخواست</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">نوع:</label>
                                            <select class="form-control" name="scope">
                                                <option <?php echo e($suggestion->scope == 'پیشنهاد' ? 'selected' : ''); ?>  value="پیشنهاد">پیشنهاد</option>
                                                <option <?php echo e($suggestion->scope == 'انتقاد' ? 'selected' : ''); ?>  value="انتقاد">انتقاد</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if($suggestion->addedById == \Auth::user()->id): ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">درخواست از:</label>
                                                <select class="form-control" name="requestedFrom">
                                                    <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e($suggestion->requestedFrom == $manager->position ? 'selected' : ''); ?>  value="<?php echo e($manager->position); ?>"><?php echo e($manager->position); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>


                                <br><br><h4 class="form-section"><i class="fa fa-file-text-o"></i> شرح انتقاد /
                                    پیشنهاد </h4>

                                <div class="form-group">

                                    <label style="float: right; padding: 10px;" for="">شرح درخواست (توسط ایجاد کننده):</label>
                                    <textarea id="description" rows="3" class="form-control"
                                              name="description" ><?php echo e($suggestion->description); ?></textarea>

                                    <label style="float: right; padding: 10px;" for="">توضیحات متولی (توسط متولی):</label>
                                    <textarea id="description" rows="3" class="form-control"
                                              name="description" ><?php echo e($suggestion->description); ?></textarea>


                                </div>

                                <div style="" class="col-md-12">
                                    <fieldset class="form-group">
                                        <br><h4 class="form-section"><i class="fa fa-paperclip"></i>  آپلود
                                            فایل ضمیمه </h4>
                                        <div class="form-group row last">

                                            <div class="col-md-12">
                                                <input type="file" id="attachment" class="form-control"
                                                       name="attachment">
                                            </div>
                                        </div>


                                    </fieldset>
                                </div>


                            </div>


                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check-square-o"></i> بروز رسانی
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
    <!--  End Edit Suggestion -->




    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- project stats -->


                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">لیست اطلاعیه ها </h4>
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
                                    <table style="font-family: Byekan;text-align: center"
                                           class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead style="text-align:center">
                                        <tr style="text-align:center">
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>توضیحات</th>
                                            <th>وضعیت</th>
                                            <th>ثبت کننده</th>
                                            <th>فایل ضمیمه</th>
                                            <th>تاریخ ایجاد</th>

                                            <th>تغییرات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $suggestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td><?php echo e($suggestion->id); ?></td>
                                                <td><?php echo e($suggestion->title); ?></td>
                                                <td><?php echo e($suggestion->description); ?></td>
                                                <td><?php echo e($suggestion->status); ?></td>
                                                <td><?php echo e($suggestion->addedByName); ?></td>
                                                <?php if($suggestion->file == "storage/Baners/Nothing"): ?>
                                                <td style="text-align:center;color: #808080"><i
                                                            style="font-size: 20px" class="ft-file-text"></i></td>
                                            <?php else: ?>
                                                <td style="text-align:center;color: #3BAFDA"><a
                                                            target="_blank"
                                                            href="<?php echo e($suggestion->file); ?>"><i
                                                                style="font-size: 20px"
                                                                class="ft-file-text"></i></a></td>
                                            <?php endif; ?>

                                                <td style="direction: ltr;"><?php echo e(jdate($suggestion->created_at)); ?></td>
                                                
                                                <td style="text-align:center;color: #3BAFDA">
                                                        

                                                    <a href="Baner/delete/<?php echo e($suggestion->id); ?> "><i
                                                                style="font-size: 20px" class="ft-x-square danger"></i>
                                                    </a></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
















                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">ثبت  اطلاعیه  </h4>
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
                                <div class="card-body">
                                    <div class="card-text">
                                        
                                    </div>
                                    <form style="font-family:Byekan" action="/Baner" enctype="multipart/form-data"
                                          method="post" class="form">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> ثبت اطلاعیه</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">عنوان:</label>
                                                        <input class="form-control" name="title" required>

                                                    </div>
                                                </div>
                                                
                                            </div>


                                            <h4 class="form-section"><i class="fa fa-paperclip"></i> شرح اطلاعیه
                                                 </h4>

                                            <div class="form-group">
                                                <label for="description">خواهشمنداست شرح کاملی از اطلاعیه
                                                     در سیستم وارد نمایید.:</label>
                                                <textarea id="description" rows="3" class="form-control"
                                                          name="description" placeholder="توضیحات" required></textarea>
                                            </div>

                                            <div style="" class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label for="attachment">ضمیمه فایل:</label>

                                                    <div class="form-group row last">
                                                        <label class="col-md-3 label-control" for="file">آپلود
                                                            فایل ضمیمه</label>
                                                        <div class="col-md-9">
                                                            <input type="file" id="file" class="form-control"
                                                                   name="file">
                                                        </div>
                                                    </div>


                                                </fieldset>
                                            </div>


                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-check-square-o"></i> ثبت
                                            </button>
                                        </div>
                                        
                                    </form>
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