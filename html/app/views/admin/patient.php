<?php require_once APPROOT . '/views/includes/headn.html'; ?>

<?php include 'headd.html';
$cnt = 0; ?>



<section class="au-breadcrumb m-t-0">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="#">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">Patients Data</li>
                            </ul>
                        </div>
                         <div class="au-breadcrumb-left">
                            <button type="button" class="au-btn au-btn-icon btn-primary" data-toggle="modal" data-target="#addPatient"><i class="zmdi zmdi-plus"></i>Add Patient</button>
                            <button type="button" class="au-btn au-btn-icon au-btn--green" data-toggle="modal" data-target="#bulkupload"><i class="zmdi zmdi-plus"></i>Patients Bulk Upload</button>
                            <!---a href="<?php echo URLROOT; ?>Patient/updateData" class="au-btn au-btn-icon au-btn--green">
                                <i class="zmdi zmdi-plus"></i>Update Patients Data</a--->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">

    <div class="page-content--bgf7 ">


        <div class="card-body card-block">
            <form action="patient/loadSearch" method="post" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search" type="submit"></i> Search
                                </button>
                            </div>
                            <input type="text" id="input1-group2" name="search" placeholder="Patient ID" class="form-control">
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-0">
                    <table id="tableid" class="table table-top-campaign text-center">
                        <thead>
                            <tr>
                                <th>SN.</th>
                                <th>PatientID</th>
                                <th>Status</th>
                                <th>District</th>
                                <th>Date Updated</th>
                                <th>Delete</th>
                                <th>Edit</th>
                                <th style="display:none;">Nationality</th>
                                <th style="display:none;">city</th>
                                <th style="display:none;">notes</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($data['Table'] as $entity) {
					if(strtolower($entity->type)=="patient"){
                                echo ' 
                            <tr>
                                <td>' . ++$cnt . '</td>
                                <td ><a id="' . $entity->patientnumber . '" class="clicker" data-toggle="modal" data-target="#largeModal">' . $entity->patientnumber . '</a></td>
                                <td ><a data-toggle="modal" data-target="#largeModal">' . $entity->currentstatus . '</a></td>
                                <td >' . $entity->district . '</td>
                                <td class="text-center">' . $entity->dateannounced . '</td>
                                <td><button type="button" class="btn btn-danger deletebtn"><i class="fas fa-trash"></i><button></td>
                                <td><button type="button" class="btn btn-success editbtn"><i class="fas fa-edit"></i><button></td>
                                <td style="display:none;" >'.$entity->nationality.'</td>
                                <td style="display:none;" >'.$entity->city.'</td>
                                <td style="display:none;" >'.$entity->notes.'</td>
                                <td style="display:none;" >'.$entity->latitude.'</td>
                                <td style="display:none;" >'.$entity->longitude.'</td>
                            </tr>';}
                            } ?>

                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE                  -->
            </div>
        </div>
    </div>


    <div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Patient Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">


                    <h1>Patient ID : <span id='PatientID'></span></h1>
                    <hr>
                    <div class="row">
                        <div class="col col-md-4">
                            <img src="images/profile.svg">
                        </div>
                        <div class="col col-md-8">
                            <div class="table-responsive table--no-card m-b-10">
                                <table class="table table-borderless table-data3">

                                    <tbody>
                                        <tr>
                                            <td>
                                                <h4>Patient ID</h4>
                                            </td>
                                            <td><span id="pid"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Gender</h4>
                                            </td>
                                            <td><span id="gender"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Nationality</h4>
                                            </td>
                                            <td><span id="nation"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Status</h4>
                                            </td>
                                            <td><span id="status"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Status Change Date</h4>
                                            </td>
                                            <td><span id="scd"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>City</h4>
                                            </td>
                                            <td><span id="city">txt</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>District</h4>
                                            </td>
                                            <td><span id="district"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>State</h4>
                                            </td>
                                            <td><span id="state"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Date Detected</h4>
                                            </td>
                                            <td><span id="ddate"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Notes</h4>
                                            </td>
                                            <td><span id="notes"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Backup Notes</h4>
                                            </td>
                                            <td><span id="bnotes"></span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>Transmission Type</h4>
                                            </td>
                                            <td><span id="transmission"></span></td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="bulkupload" tabindex="-1" role="dialog" aria-labelledby="bulkuploadTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="bulkuploadTitle">Add Patient Data</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="patient/bulkUploadData" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <label for="file">Only csv file allowed</label>
                                <input type="file" name="patientfile" value="file" required />
                            </div>
                            <div class="col">
                                <label for="importSubmit"></label>
                                <input type="submit" class="btn btn-primary" name="importSubmit" value="Upload">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

<!-- DELETE MODAL -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Subscriber</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo URLROOT;?>/Patient/deleteData" method="post">
          <div class="modal-body">
                      <input type="hidden" id="deleteid" class="form-control" name="id">
                      <input type="hidden"id="statusid" class="form-control" name="status">
                      <input type="hidden" id="districtid" class="form-control" name="district">
                      <h6>Are you sure you want to delete data?</h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
            <button type="submit" name="deletedata" class="btn btn-primary">YES</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Add patient Modal -->
      <div class="modal fade" id="addPatient" tabindex="-1" role="dialog" aria-labelledby="addPatientTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="addPatientTitle">Add Patient Data</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="patient/addPatient">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Patient Number*</label>
                                <input type="text" class="form-control" id="inputEmail4" name="patientnumber" placeholder="Patient Number" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputgender4">Gender</label>
                                <select id="inputgender4" name="gender" class="form-control" required>
                                    <option value="" selected></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Nationality">Nationality</label>
                                <input type="text" class="form-control" name="nationality" id="nationality" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">State</label>
                                <input type="text" class="form-control" name="state" id="state" required>

                            </div>
            
                        </div>
        
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputDistrict">Detected District</label>
                                <input type="text" class="form-control" name="district" id="inputdistrict" required>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputCity">Detected City</label>
                                <input type="text" class="form-control" name="city" id="inputCity" required>
                            </div>
    
                            <div class="form-group col-md-2">
                                <label for="dateannounced">Date</label>
                                <input type="date" id="dateannounced" name="dateannounced" class="form-control" min="2020-01-01" required >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputDistrict">Latitude</label>
                                <input type="text" class="form-control" name="latitude" id="inputlatitude" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDistrict">Longitude</label>
                                <input type="text" class="form-control" name="longitude" id="inputlongitude" required>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="inputnotes">Notes</label>
                                <input type="text" class="form-control" name="notes" id="inputnotes">
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputtransmissiontype">Transmission Type</label>
                                <input type="text" class="form-control" name="transmissiontype" id="inputtransmissiontype" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputstatus">Status</label>
                        <select id="inputstatus4" name="status" class="form-control" required>
                                    <option value="" selected></option>
                                    <option value="Active">Active</option>
                                    <option value="Recovered">Recovered</option>
                                    <option value="Deceased">Deceased</option>
                                </select>                         </div>
                        </div>
                        <div class="text-center">
                        <button type="submit"  class="btn btn-primary">ADD</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>



<!-- EDIT PATIENT MODAL -->
<div class="modal fade" id="editpatient" tabindex="-1" role="dialog" aria-labelledby="addPatientTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="addPatientTitle">Edit Patient Data</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="patient/editPatient">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="patientnumberid">Patient Number*</label>
                                <input type="text"  class="form-control patientnumberid"  style="border: none; outline: none; background-color: transparent;" disabled>
                                <input type="text"  class="form-control patientnumberid" name="patientnumber" style="display:none" >

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Nationalityid">Nationality</label>
                                <input type="text" class="form-control" name="nationality" id="Nationalityid" required>
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputDistrictid">Detected District</label>
                                <input type="text" class="form-control inputDistrictid" style="border: none; outline: none; background-color: transparent;" disabled>
                                <input type="text" class="form-control inputDistrictid" name="district" style="display:none;">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputCityid">Detected City</label>
                                <input type="text" class="form-control" name="city" id="inputCityid" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dateannounced">Date</label>
                                <input type="date" id="date" name="date" class="form-control" min="2020-01-01" required >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputlatitudeid">Latitude</label>
                                <input type="text" class="form-control" name="latitude" id="inputlatitudeid" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputlongitudeid">Longitude</label>
                                <input type="text" class="form-control" name="longitude" id="inputlongitudeid" required>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="inputnotesid">Notes</label>
                                <input type="text" class="form-control" name="notes" id="inputnotesid">
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputstatusid">Status</label>
                        <select id="inputstatusid" name="status" class="form-control" required>
                                    <option value="" ></option>
                                    <option value="Active">Active</option>
                                    <option value="Recovered">Recovered</option>
                                    <option value="Deceased">Deceased</option>
                                </select>                         </div>
                        </div>
                        <div class="text-center">
                        <button type="submit"  class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>


    <script>
        var deaths = 0,
            active = 0,
            recovered = 0;
        $(document).ready(function() {

            $('.clicker').click(function() {

                var userid = $(this).attr('id');

                // AJAX request
                $.ajax({
                    url: 'CovidNearYou/loadPatientModal',
                    type: 'post',
                    data: {
                        userid: userid
                    },
                    success: function(response) {
                        // Add response in Modal body

                        var obj = JSON.parse(response);

                        //$('#PatientID').html(response.patientnumber);

                        console.log(obj.backnotes);
                        $('#bnotes').html(obj.backnotes);
                        $('#notes').html(obj.notes);
                        if (obj.gender == 'M')
                            obj.gender = "Male";
                        else
                            obj.gender = "Female";
                        $('#gender').html(obj.gender);

                        $('#pid').html(obj.patientnumber);

                        if (obj.nationality == "")
                            obj.nationality = "Unknown";
                        $('#nation').html(obj.nationality);

                        if (obj.currentstatus == "")
                            obj.currentstatus = "Unknown";
                        $('#status').html(obj.currentstatus);

                        if (obj.statuschangedate == "")
                            obj.statuschangedate = "Unknown";
                        $('#scd').html(obj.statuschangedate);


                        if (obj.city == "")
                            obj.city = "Unknown";
                        $('#city').html(obj.city);


                        if (obj.district == "")
                            obj.district = "Unknown";
                        $('#district').html(obj.district);

                        if (obj.state == "")
                            obj.state = "Unknown";
                        $('#state').html(obj.state);


                        if (obj.dateannounced == "")
                            obj.dateannounced = "Unknown";
                        $('#ddate').html(obj.dateannounced);

                        if (obj.dateannounced == "")
                            obj.dateannounced = "Unknown";
                        $('#ddate').html(obj.dateannounced);

                        if (obj.transmissiontype == "")
                            obj.transmissiontype = "Unknown";
                        $('#transmission').html(obj.transmissiontype);



                        // Display Modal
                        $('#patientModal').modal('show');




                    }
                });
            });
        });
    </script>



<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    

    <script type="text/javascript" src="<?php echo URLROOT; ?>vendor/jquery.dataTables.min.js"></script>
    <!-- <script type="text/javascript" src="vendor/dataTables.bootstrap.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.table').DataTable({
                'paging': true,
                "iDisplayLength": 25,
                'responsive': true,
                'language': {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Records"
                },
                'columnDefs': [{
                    "targets": [0, 4, 5],
                    "searchable": false
                }]
            });
        });
    </script>
   
<!-- DELETE DATA SCRIPT -->
   <script type="text/javascript">
$(document).ready(function () {
   $('#tableid').on('click','.deletebtn',function () {
       $('#deletemodal').modal('show');
       $tr=$(this).closest('tr');
       var data=$tr.children("td").map(function(){
         return $(this).text();
       }).get();
       
    //    console.log(data);
       $('#deleteid').val(data[1]);
       $('#statusid').val(data[2]);
       $('#districtid').val(data[3]);
   });
});
</script>



<!-- EDIT DATA SCRIPT -->

<script type="text/javascript">
$(document).ready(function () {
   $('#tableid').on('click','.editbtn',function () {
       $('#editpatient').modal('show');
       $tr=$(this).closest('tr');
       var data=$tr.children("td").map(function(){
         return $(this).text();
       }).get();
       
       console.log(data);
       $('.patientnumberid').val(data[1]);
       $('#inputstatusid').val(data[2]);
       $('.inputDistrictid').val(data[3]);
       $('#Nationalityid').val(data[7]);
       $('#inputCityid').val(data[8]);
       $('#inputnotesid').val(data[9]);
       $('#inputlatitudeid').val(data[10]);
       $('#inputlongitudeid').val(data[11]);
   });
});
</script>




    <?php require_once APPROOT . '/views/includes/footer.php'; ?>
