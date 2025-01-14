<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">

            <header class="panel-heading">
                <i class="fa fa-user"></i>   <?php echo lang('patient'); ?> <?php echo lang('database'); ?>
            </header>
            <div class="panel-body">

                <div class="adv-table editable-table " >
                    <div class=" no-print">
                        <a data-toggle="modal" href="<?php echo site_url(); ?>patient/addNew">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                    <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?>
                                </button>
                            </div>
                        </a>
                        <button class="export no-print" onclick="javascript:window.print();"><?php echo lang('print'); ?></button>  
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th><?php echo 'Date'; ?></th>
                                <th><?php echo 'Project'; ?></th>
                                <th><?php echo lang('doctor'); ?></th>
                                <th><?php echo lang('name'); ?></th>
                                <th><?php echo lang('animal_identification'); ?></th>
                                <th><?php echo lang('breed'); ?></th>
                                <th><?php echo lang('color'); ?></th>

                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Doctor'))) { ?>
                                    <th><?php echo lang('image'); ?></th>
                                <?php } ?>

                            </tr>
                        </thead>
                        <tbody>
                        <style>
                            .img_url{
                                height:20px;
                                width:20px;
                                background-size: contain; 
                                max-height:20px;
                                border-radius: 100px;
                            }
                        </style>


                        <?php foreach ($patients as $patient) { ?>
                            <?php $patient_info = $this->db->get_where('patient', array('id' => $patient->name))->row(); ?>
                            
                            <tr class="">
                                <td>
                                    <?php echo $patient->add_date; ?>
                                </td>

                                <td>
                             <?php echo $patient->project; ?>
                                </td>

                                <td>
                                    <?php echo $patient->doctor; ?>
                                </td>

                                <td>
                                <?php echo $patient->name;  ?>
                                </td>

                                <td>
                                 <?php  echo $patient->chip;  ?>
                                </td>

                                <td>
                                 <?php  echo $patient->breed;  ?>
                                </td>

                                <td>
                                 <?php  echo $patient->color;  ?>
                                </td>

                                <td>
                                 <?php  echo '<img src="' . $patient->img_url . '" " width="150px" height="100px">';  ?>
                                    <br><br>
                                <?php  echo '<a class="btn btn-info btn-xs" href="' . $patient->img_url . '" download> ' . lang('download') . ' </a>'; ?>
                                </td>
                                <!--  <td class="no-print">
                            <?php if ($this->ion_auth->in_group(array('admin', 'Receptionist', 'Doctor'))) { ?>
                                <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="<?php echo $patient->id; ?>"><i class="fa fa-edit"></i>  <?php echo lang('edit'); ?></button>

                            <?php } ?> --->

                          <!--  <td>    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                    <a class="btn btn-info btn-xs delete_button"  href="<?php  echo site_url();?>patient/delete?id=<?php echo $patient->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i> <?php echo lang('delete'); ?></a>
                                <?php } ?></td> -->

                            </tr>
                        <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->



<!-- Add Patient Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('register_new_patient'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="<?php  echo site_url() . 'patient/addNew';?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">     
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3 payment_label"> 
                                    <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                                </div>
                                <div class="col-md-9"> 
                                    <select class="form-control m-bot15 js-example-basic-single"  name="doctor" value=''> 
                                        <option value=""> </option>
                                        <?php foreach ($doctors as $doctor) { ?>                                        
                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->name; ?> </option>
                                        <?php } ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    

                     <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('chip'); ?></label>
                        <input type="text" class="form-control" name="chip" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('breed'); ?></label>
                        <input type="text" class="form-control" name="breed" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('color'); ?></label>
                        <input type="text" class="form-control" name="color" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                    </div> -->

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
                        <select class="form-control m-bot15" name="sex" value=''>

                            <option value="Male" <?php
                            if (!empty($patient->sex)) {
                                if ($patient->sex == 'Male') {
                                    echo 'selected';
                                }
                            }
                            ?> > Male </option>
                            <option value="Female" <?php
                            if (!empty($patient->sex)) {
                                if ($patient->sex == 'Female') {
                                    echo 'selected';
                                }
                            }
                            ?> > Female </option>
                            <option value="Others" <?php
                            if (!empty($patient->sex)) {
                                if ($patient->sex == 'Others') {
                                    echo 'selected';
                                }
                            }
                            ?> > Others </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?php echo lang('birth_date'); ?></label>
                        <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="" placeholder="">      
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('blood_group'); ?></label>
                        <select class="form-control m-bot15" name="bloodgroup" value=''>
                            <?php foreach ($groups as $group) { ?>
                                <option value="<?php echo $group->group; ?>" <?php
                                if (!empty($patient->bloodgroup)) {
                                    if ($group->group == $patient->bloodgroup) {
                                        echo 'selected';
                                    }
                                }
                                ?> > <?php echo $group->group; ?> </option>
                                    <?php } ?> 
                        </select>
                    </div>



                    <div class="form-group last col-md-6">
                        <label class="control-label">Image Upload</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="default" name="img_url"/>
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="form-group last col-md-6">
                        <div style="text-align:center;">
                            <video id="video" width="200" height="200" autoplay></video>
                            <div class="snap" id="snap">Capture Photo</div>
                            <canvas id="canvas" width="200" height="200"></canvas>
                             Right click on the captured image and save. Then select the saved image from the left side's Select Image button.
                        </div>
                    </div>


                    <script>
                    

                        var video = document.getElementById('video');
// Get access to the camera!
                        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                        // Not adding `{ audio: true }` since we only want video now
                        navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
                        video.src = window.URL.createObjectURL(stream);
                        video.play();
                        });
                        }

                        // Elements for taking the snapshot
                        var canvas = document.getElementById('canvas');
                        var context = canvas.getContext('2d');
                        var video = document.getElementById('video');
// Trigger photo take
                        document.getElementById("snap").addEventListener("click", function() {
                        context.drawImage(video, 0, 0, 200, 200);
                        });
                    </script>






                    <div class="form-group">
                        <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>
                    </div>

                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="p_id" value='<?php
                    if (!empty($patient->patient_id)) {
                        echo $patient->patient_id;
                    }
                    ?>'>





                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->







<!-- Edit Patient Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> <?php echo lang('edit_patient'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editPatientForm" action="<?php  echo site_url() . 'patient/addNew';?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-12">     
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3 payment_label"> 
                                    <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                                </div>
                                <div class="col-md-9"> 
                                    <select class="form-control m-bot15 js-example-basic-single doctor" name="doctor" value=''>  
                                        <option value=""> </option> 
                                        <?php foreach ($doctors as $doctor) { ?>
                                            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->name; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                  
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    
                  <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('chip'); ?></label>
                        <input type="text" class="form-control" name="chip" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('breed'); ?></label>
                        <input type="text" class="form-control" name="breed" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('color'); ?></label>
                        <input type="text" class="form-control" name="color" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                    </div> -->

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
                        <select class="form-control m-bot15" name="sex" value=''>

                            <option value="Male" <?php
                            if (!empty($patient->sex)) {
                                if ($patient->sex == 'Male') {
                                    echo 'selected';
                                }
                            }
                            ?> > Male </option>
                            <option value="Female" <?php
                            if (!empty($patient->sex)) {
                                if ($patient->sex == 'Female') {
                                    echo 'selected';
                                }
                            }
                            ?> > Female </option>
                            <option value="Others" <?php
                            if (!empty($patient->sex)) {
                                if ($patient->sex == 'Others') {
                                    echo 'selected';
                                }
                            }
                            ?> > Others </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?php echo lang('birth_date'); ?></label>
                        <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="<?php
                        if (!empty($patient->birthdate)) {
                            echo $patient->birthdate;
                        }
                        ?>" placeholder="">      
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('blood_group'); ?></label>
                        <select class="form-control m-bot15" name="bloodgroup" value=''>
                            <?php foreach ($groups as $group) { ?>
                                <option value="<?php echo $group->group; ?>" <?php
                                if (!empty($patient->bloodgroup)) {
                                    if ($group->group == $patient->bloodgroup) {
                                        echo 'selected';
                                    }
                                }
                                ?> > <?php echo $group->group; ?> </option>
                                    <?php } ?> 
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                        <input type="file" name="img_url">
                    </div>

                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="p_id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Patient Modal-->

<script src="common/js/codearistos.min.js"></script>



<script type="text/javascript">

                        $(".table").on("click", ".editbutton", function(){
                        //    e.preventDefault(e);
                        // Get the record's ID via attribute
                        var iid = $(this).attr('data-id');
                        $('#editPatientForm').trigger("reset");
                        $('#myModal2').modal('show');
                        $.ajax({
                        url: 'patient/editPatientByJason?id=' + iid,
                                method: 'GET',
                                data: '',
                                dataType: 'json',
                        }).success(function (response) {
                        // Populate the form fields with the data returned from server

                        $('#editPatientForm').find('[name="id"]').val(response.patient.id).end()
                                $('#editPatientForm').find('[name="name"]').val(response.patient.name).end()
                                $('#editPatientForm').find('[name="email"]').val(response.patient.email).end()
                                $('#editPatientForm').find('[name="chip"]').val(response.patient.chip).end()
                                $('#editPatientForm').find('[name="breed"]').val(response.patient.breed).end()
                                $('#editPatientForm').find('[name="color"]').val(response.patient.color).end()
                                $('#editPatientForm').find('[name="address"]').val(response.patient.address).end()
                                $('#editPatientForm').find('[name="phone"]').val(response.patient.phone).end()
                                $('#editPatientForm').find('[name="sex"]').val(response.patient.sex).end()
                                $('#editPatientForm').find('[name="birthdate"]').val(response.patient.birthdate).end()
                                $('#editPatientForm').find('[name="bloodgroup"]').val(response.patient.bloodgroup).end()
                                $('#editPatientForm').find('[name="p_id"]').val(response.patient.patient_id).end()

                                $('.js-example-basic-single.doctor').val(response.patient.doctor).trigger('change');
                        });
                        });</script>




<script>


    $(document).ready(function () {
    $('#editable-sample').DataTable({
    responsive: true,
            //   dom: 'lfrBtip',

          //  "processing": true,
           // "serverSide": true,
          //  "searchable": true,
         //   "ajax": {
          //  url : "patient/getPatient",
          //          type : 'POST',
          //  },
           // scroller: {
          //  loadingIndicator: true
          //  },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
            {
            extend: 'print',
                    exportOptions: {
                    columns: [1, 2, 3],
                    }
            },
            ],
            aLengthMenu: [
            [5, 10, 25, 50, 100, - 1],
            [5, 10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 5,
            "order": [[ 0, "desc" ]],
<?php if ($this->router->fetch_method() == 'sent') { ?>
        "order": [[ 0, "asc" ]],
<?php } ?>
<?php if ($this->router->fetch_method() == 'upcoming') { ?>
        "order": [[ 0, "asc" ]],
<?php } ?>

    "language": {
    "lengthMenu": "_MENU_ records per page",
    }





    });
    });</script>





<script>
    $(document).ready(function () {
    $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>



