<?php $__env->startSection('content'); ?>
   

     <!--  Start Edit items -->
     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div class="modal fade text-left" id="EditSloat<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="EditOtherTask<?php echo e($item->id); ?>" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
             <div   class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title" id="myModalLabel17">تایید به روزرسانی  شناورها </h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div style="font-family:Byekan; direction: rtl" class="modal-body">

                     <form  style="vertical-align:center;text-align:center" method="post" enctype="multipart/form-data" action="<?php echo e(route('sfloat.statusUpdate', $item->id)); ?>" class="form form-horizontal form-bordered striped-rows">
                         <?php echo csrf_field(); ?>
                         <?php echo method_field('put'); ?>
                         <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="name">نام</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" disabled value="<?php echo e($item->name); ?>" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">ماهواره </label>
                                <div class="col-md-9">
                                    <select id="saderKonandeh" class="form-control"  name="satellite_id" disabled>
                                        <option>انتخاب کنید</option>
                                        <?php $__currentLoopData = $satellites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($itemvalue->id == $item->satellite_id ? 'selected' : ''); ?> value="<?php echo e($itemvalue->id); ?>"><?php echo e($itemvalue->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <input value="<?php echo e($item->id); ?>" name="parent_id" type="hidden" />
                            <input value="<?php echo e($item->name); ?>" name="name" type="hidden" />
                            <input value="<?php echo e($item->satellite_id); ?>" name="satellite_id" type="hidden" />
                            <input value="<?php echo e($filter); ?>" name="status" type="hidden" />

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="date_start">تاریخ آغاز</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" disabled class="form-control" value="<?php echo e(jdate($item->date_start)->format('Y/m/d')); ?>"  placeholder="کلیک کنید" name="date_start" type="text" id="input1"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="date_start">تاریخ اتمام</label>
                                <div class="col-md-9">
                                    <input style="font-family:Byekan" disabled class="form-control" value="<?php echo e(jdate($item->date_end)->format('Y/m/d')); ?>"   placeholder="کلیک کنید" name="date_end" type="text" id="input1"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">کل پهنای باند </label>
                                <div class="col-md-9">
                                    <input type="text" id="saderKonandeh" disabled class="form-control" value="<?php echo e($item->hole_band); ?>"  name="hole_band">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">upload </label>
                                <div class="col-md-9">
                                    <input type="text" id="saderKonandeh" disabled class="form-control" value="<?php echo e($item->upload); ?>" name="upload">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="saderKonandeh">download </label>
                                <div class="col-md-9">
                                    <input type="text" id="saderKonandeh" disabled class="form-control" value="<?php echo e($item->download); ?>"  name="download">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 label-control" for=""> نام سرویس دهنده</label>
                                <div class="col-md-9">
                                    <input type="text" id="" disabled class="form-control" value="<?php echo e($item->name_service); ?>" name="name_service">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for=""> مراحل تایید</label>
                                <div class="col-md-9">
                                    <p class="form-control">شناور -> مالی -> فنی -> مدیریت</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control">وضعیت </label>
                                <div class="col-md-9">
                                    <select class="form-control"  name="active">
                                        <option>انتخاب کنید</option>
                                        <option value="1">تایید</option>
                                        <option value="0">عدم تایید</option>
                                    </select>
                                </div>
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
 <!--  End Edit item -->


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="">لیست   تغییرات شناورهایی که باید توسط شما تایید شود</h1>
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
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                              
                                                <td style="white-space: normal">
                                                    <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                                                        <div class="card">
                                                            <div id="heading1"  class="card-header">
                                                                <a data-toggle="collapse" data-parent="#accordionWrapa1" href="#accordion1" aria-expanded="true" aria-controls="accordion1" class="card-title lead">
                                                                    <?php echo e($item->name); ?>

                                                                </a>
                                                            </div>
                                                            <?php $__currentLoopData = $item->parent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div id="accordion1" role="tabpanel" aria-labelledby="heading1" class="card-collapse collapse in" aria-expanded="true">
                                                                    <div class="card-body">
                                                                        <div class="card-block">
                                                                           <h6 style="white-space: nowrap">
                                                                                <?php echo e($value->id); ?>, <?php echo e($value->status); ?> , <?php echo e($value->download); ?>, <?php echo e($value->name_service); ?>

                                                                                <?php if($value->status != 'مالی'): ?>
                                                                                    <p style="text-align: center;vertical-align: center;font-size: 20px;color: #3BAFDA;" >
                                                                                        <a data-toggle="modal" data-target="#EditSloat<?php echo e($item->id); ?>">
                                                                                            <i style="font-size: 20px" class="ft-edit"></i>
                                                                                        </a>
                                                                                    </p>
                                                                                <?php endif; ?>
                                                                            </h6> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                                <td><?php echo e(jdate($item->date_start)->format('Y/m/d')); ?></td>
                                                <td><?php echo e(jdate($item->date_end)->format('Y/m/d')); ?></td>
                                                <td style="white-space: normal"><?php echo e($item->hole_band); ?></td>
                                                <td style="white-space: normal"><?php echo e($item->upload); ?></td>
                                                <td style="white-space: normal"><?php echo e($item->download); ?></td>
                                                <td style="white-space: normal"><?php echo e($item->name_service); ?></td>
                                                <td><?php echo e(jdate($item->updated_at)->format('Y/m/d')); ?></td>
                                                

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