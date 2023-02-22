<?php $__env->startSection('content'); ?>
    <div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">شناورها</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo $__env->make('components.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <form style="vertical-align:center;text-align:center" enctype="multipart/form-data" method="post" action="<?php echo e(route('sfloat.store')); ?>" class="form form-horizontal form-bordered striped-rows">
                        <?php echo csrf_field(); ?>
                        <div style="font-family:byekan" class="form-body">
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="name">نام   </label>
                                <div class="col-md-9">
                                    <input type="text" id="name" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">ماهواره </label>
                                <div class="col-md-9">
                                    <select id="saderKonandeh" class="form-control"  name="satellite_id">
                                        <option>انتخاب کنید</option>
                                        <?php $__currentLoopData = $satellites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="date_start">تاریخ آغاز</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" name="date_start" type="text" id="input1"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="date_start">تاریخ اتمام</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" class="form-control" style="" placeholder="کلیک کنید" name="date_end" type="text" id="input1"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">کل پهنای باند </label>
                                <div class="col-md-9">
                                    <input type="text" id="saderKonandeh" class="form-control"  name="hole_band">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">upload </label>
                                <div class="col-md-9">
                                    <input type="text" id="saderKonandeh" class="form-control"  name="upload">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">download </label>
                                <div class="col-md-9">
                                    <input type="text" id="saderKonandeh" class="form-control"  name="download">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh"> نام سرویس دهنده</label>
                                <div class="col-md-9">
                                    <input type="text" id="saderKonandeh" class="form-control"  name="name_service">
                                </div>
                            </div>
                        </div>

                        <div style="font-family:Byekan" class="form-actions">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check-square-o"></i> افزودن
                            </button>

                            <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                                <i class="ft-x"></i> لغو
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="">لیست   شناورها</h1>
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
                                <div class="card-body card-dashboard"><br><br>
                                    <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                        <thead>
                                        <tr style="text-align: center" >
                                            <th>نام</th>
                                            <th>تاریخ آغاز </th>
                                            <th>تاریخ اتمام</th>
                                            <th>کل پهنای باند</th>
                                            <th>upload</th>
                                            <th>download</th>
                                            <th>نام سرویس دهنده</th>
                                            <th>آخرین درخواست تغییر</th>
                                            <th>ویرایش</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td style="white-space: normal"><?php echo e($item->name); ?></td>
                                                <td><?php echo e(jdate($item->date_start)->format('Y/m/d')); ?></td>
                                                <td><?php echo e(jdate($item->date_end)->format('Y/m/d')); ?></td>
                                                <td style="white-space: normal"><?php echo e($item->hole_band); ?></td>
                                                <td style="white-space: normal"><?php echo e($item->upload); ?></td>
                                                <td style="white-space: normal"><?php echo e($item->download); ?></td>
                                                <td style="white-space: normal"><?php echo e($item->name_service); ?></td>
                                                <td><?php echo e(jdate($item->updated_at)->format('Y/m/d')); ?></td>
                                                <td style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;" >
                                                    <a target="_blank"> <i class="ft-file-text" ></i> </a>
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



<?php $__env->startSection('footerscripts'); ?>
    <script src="/js/scripts/pages/dashboard-project.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>