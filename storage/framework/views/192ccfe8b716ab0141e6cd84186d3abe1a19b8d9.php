<?php $__env->startSection('headerscripts'); ?>
<link rel="stylesheet" type="text/css" href="/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="/vendors/css/forms/toggle/switchery.min.css">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="modal fade text-left" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">افزودن کاربر</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">


                  <form style="vertical-align:center;text-align:center" method="post" action="users/addUser" class="form form-horizontal form-bordered striped-rows">
                    <?php echo csrf_field(); ?>
                  <div class="form-body">
                    <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                    <div class="form-group row">
                          <label class="col-md-3 label-control" for="name"> Name</label>
                          <div class="col-md-9">
                            <input type="text" id="name" class="form-control" placeholder=" Name" name="name">
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="family">family Name</label>
                        <div class="col-md-9">
                          <input type="text" id="family" class="form-control" placeholder="family" name="family">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="family"> nationalCode</label>
                        <div class="col-md-9">
                          <input type="text" id="nationalCode" class="form-control" placeholder="nationalCode" name="nationalCode">
                        </div>
                    </div>

                      <div class="form-group row">
                          <label class="col-md-3 label-control" for="email">Email Address</label>
                            <div class="col-md-9">
                            <input type="text" id="email" class="form-control" placeholder="Email Address" name="email">
                          </div>
                      </div>


                      <div class="form-group row">
                          <label class="col-md-3 label-control" for="password">Password</label>
                            <div class="col-md-9">
                            <input type="password" id="password" class="form-control" placeholder="Passowrd" name="password">
                          </div>
                      </div>





                      <div class="form-group row last">
                          <label class="col-md-3 label-control" for="Position">Position</label>
                          <div class="col-md-9">
                            <input type="text" id="Position" class="form-control" placeholder="Position" name="position">
                          </div>
                      </div>

                      <div class="form-group row last">
                        <label class="col-md-3 label-control" for="groupName">groupName</label>
                        <div class="col-md-9">
                          <input type="text" id="groupName" class="form-control" placeholder="groupName" name="groupName">
                        </div>
                    </div>




                      <div class="form-group row last">
                          <label class="col-md-3 label-control" for="Mobile Number">Mobile Number</label>
                          <div class="col-md-9">
                            <input type="text" id="Mobile Number" class="form-control" placeholder="Mobile Number" name="mobileNumber">
                          </div>
                      </div>


                      <div class="form-group row last">
                          <label class="col-md-3 label-control" for="User Administrator">User Administrator ?</label>
                          <div class="col-md-9">
                            <fieldset>
                                <div class="float-left">
                                  <input type="checkbox" name="isAdmin" value="1" class="switch"   >

                                </div>
                            </fieldset>
                          </div>
                      </div>
                      <div class="form-group row last">
                          <label class="col-md-3 label-control" name="isDataEntry" for="UserDataEntry">User Data Entry ?</label>
                          <div class="col-md-9">
                            <fieldset>
                                <div class="float-left">
                                  <input type="checkbox" name="isDataEntry" value="1" class="switch" >
                                </div>
                            </fieldset>
                          </div>
                      </div>
                      <div class="form-group row last">
                          <label class="col-md-3 label-control" for="User Activation">User Activation ?</label>
                          <div class="col-md-9">
                            <fieldset>
                                <div class="float-left">
                                  <input type="checkbox" name="Active" value="1" class="switch" >
                                </div>
                            </fieldset>
                          </div>
                      </div>






                   </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                          <i class="ft-x"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Save
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



          <section>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">لیست تمامی کاربران سامانه</h4>
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
                              <button  style="float: left;margin-left: 40px!important;font-family:Byekan!important"   class="btn btn-success btn-min-width mr-1 mb-1 ladda-button"  data-target="#addUser" data-toggle="modal" ><span class="ladda-label">  <i class="ft-plus"></i>  افزودن کاربر به سیستم  </span></button>
                                <div class="card-body card-dashboard">
                                  <table style="font-family:Byekan;width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal file-export ">
                                        <thead>
                                            <tr>
                                                <th>نام</th>

                                                <th>ایمیل</th>
                                                <th>کد ملی</th>
                                                <th>واحد</th>
                                                <th>سمت</th>
                                                <th>شماره موبایل</th>
                                                <th>آخرین ورود</th>
                                                <th>آخرین فعالیت</th>
                                                <th>ویرایش</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                            <td>
                                                <a href="/Newtdl/getTdlsAssignedToOther/<?php echo e($user->id); ?>">
                                                    <?php echo e($user->name . " " . $user->family ?? ''); ?>

                                                </a>
                                            </td>

                                            <td style="font-family:Arial; direction: ltr; text-align: left" ><?php echo e($user->email); ?></td>
                                            <td><?php echo e($user->nationalCode); ?></td>
                                            <td><?php echo e($user->groupName); ?></td>
                                            <td style="white-space: normal"><?php echo e($user->position); ?></td>
                                            <td><?php echo e($user->mobileNumber); ?></td>
                                            <td style="direction: ltr" ><?php echo e($user->lastLogin == 0 ? "عدم ورود" : jdate( $user->lastLogin)); ?></td>
                                            <td style="direction: ltr" > <?php echo e($user->lastAction == 0 ? "عدم فعالیت" : jdate( $user->lastAction)); ?></td>
                                            <td style="text-align:center;color: #3BAFDA">
                                                <a data-toggle="modal" data-target="#editUser<?php echo e($user->id); ?>">
                                                    <i style="font-size: 20px" class="ft-edit"></i>
                                                </a>
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




              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="modal fade text-left" id="editUser<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo e($user->id); ?>" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel<?php echo e($user->id); ?>">Change User Settings</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">


                                  <form style="vertical-align:center;text-align:center" method="post" action="/users/editUser" class="form form-horizontal form-bordered striped-rows">
                                    <?php echo csrf_field(); ?>
                                  <div class="form-body">
                                    <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                                    <div class="form-group row">
                                          <label class="col-md-3 label-control" for="Name"> Name</label>
                                          <div class="col-md-9">
                                            <input type="text" id="Name" value="<?php echo e($user->name); ?>" class="form-control" placeholder=" Name" name="name">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-md-3 label-control" for="family">Family</label>
                                        <div class="col-md-9">
                                          <input type="text" id="family" value="<?php echo e($user->family); ?>" class="form-control" placeholder="family" name="family">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="nationalCode">Full Name</label>
                                        <div class="col-md-9">
                                          <input type="text" id="nationalCode" value="<?php echo e($user->nationalCode); ?>" class="form-control" placeholder="nationalCode" name="nationalCode">
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                          <label class="col-md-3 label-control" for="email">Email Address</label>
                                            <div class="col-md-9">
                                            <input type="text" id="email" value="<?php echo e($user->email); ?>" class="form-control" placeholder="Email Address" name="email">
                                          </div>
                                      </div>




                                      <div class="form-group row last">
                                        <label class="col-md-3 label-control" for="groupName">groupName</label>
                                        <div class="col-md-9">
                                          <input type="text" id="groupName" class="form-control" value="<?php echo e($user->groupName); ?>" placeholder="groupName" name="groupName">
                                        </div>
                                    </div>
                                      <div class="form-group row last">
                                          <label class="col-md-3 label-control" for="Position">Position</label>
                                          <div class="col-md-9">
                                            <input type="text" id="Position" class="form-control" value="<?php echo e($user->position); ?>" placeholder="Position" name="position">
                                          </div>
                                      </div>



                                      <div class="form-group row last">
                                          <label class="col-md-3 label-control" for="Mobile Number">Mobile Number</label>
                                          <div class="col-md-9">
                                            <input type="text" id="Mobile Number" value="<?php echo e($user->mobileNumber); ?>" class="form-control" placeholder="Mobile Number" name="mobileNumber">
                                          </div>
                                      </div>


                                      <div class="form-group row last">
                                          <label class="col-md-3 label-control" for="User Administrator">User Administrator ?</label>
                                          <div class="col-md-9">
                                            <fieldset>
                                                <div class="float-left">
                                                  <input type="checkbox" name="isAdmin" value="1" class="switch"  <?php echo e($user->isAdmin == 1 ? "checked" : ""); ?> >
                                                </div>
                                            </fieldset>
                                          </div>
                                      </div>
                                      <div class="form-group row last">
                                          <label class="col-md-3 label-control" for="UserDataEntry">User Data Entry ?</label>
                                          <div class="col-md-9">
                                            <fieldset>
                                                <div class="float-left">
                                                  <input type="checkbox" name="isDataEntry" value="1" class="switch" <?php echo e($user->isDataEntry == 1 ? "checked" : ""); ?> >
                                                </div>
                                            </fieldset>
                                          </div>
                                      </div>
                                      <div class="form-group row last">
                                          <label class="col-md-3 label-control" for="User Activation">User Activation ?</label>
                                          <div class="col-md-9">
                                            <fieldset>
                                                <div class="float-left">
                                                  <input type="checkbox" name="Active" value="1" class="switch" <?php echo e($user->Active == 1 ? "checked" : ""); ?>>
                                                </div>
                                            </fieldset>
                                          </div>
                                      </div>






                                     </div>

                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                                          <i class="ft-x"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary" >
                                            <i class="fa fa-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </form>


                          </div>
                      </div>
                </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </section>

        </div>
      </div>
    </div>











<?php $__env->stopSection(); ?>



<?php $__env->startSection('footerscripts'); ?>
<script src="/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="/vendors/js/forms/toggle/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>
<script src="/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="/js/scripts/forms/switch.js" type="text/javascript"></script>



<?php if($errors->has('groupName') or $errors->has('Type')): ?>
<script type="text/javascript">$(window).on('load',function(){$('#show').modal('show');});</script>
<?php endif; ?>


<?php if(session('toastr')): ?>
<script type="text/javascript">$(window).on('load',function(){toastr.success('<?php echo e(session('toastr')); ?>');});</script>
<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>