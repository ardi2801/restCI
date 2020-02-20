<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" id="view-section">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
			  <h6 class="m-0 font-weight-bold text-primary">Customer</h6>
				<button class="btn btn-primary" id="addData" type="button">Add Data</button>			  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                <table class="table table-bordered" width="100%" cellspacing="0">					
                  <thead>
                    <tr>
						<th>No</th>
						<th>Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Married</th>
						<th>Address</th>                      
						<th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
						<th>No</th>
						<th>Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Married</th>
						<th>Address</th>
						<th>Aksi</th>						
                    </tr>
                  </tfoot>
                  <tbody id="table-content">

                  </tbody>
                </table>
              </div>
            </div>
          </div>

		</div>
		
		<div class="container-fluid" id="form-section" style="display:none;">
			<input class="form-control" type="hidden" id="id">
			<input class="form-control" type="hidden" id="crud">			
			<div class="col-md-6">					
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" id="f_name">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" id="f_email">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="text" class="form-control" id="f_password">
				</div>				
				<div class="form-group">
					<label>Gender</label>
					<input type="text" class="form-control" id="f_gender">
				</div>				
				<div class="form-group">
					<label>Married Status</label>
					<input type="text" class="form-control" id="f_married">
				</div>				
				<div class="form-group">
					<label>Address</label>
					<input type="text" class="form-control" id="f_address">
				</div>				
			</div>			
			<div class="box-footer">
				<a class="btn btn-success pull-right" id="btn-trigger-controll"><i class="fa fa-save"></i>&nbsp; Save</a>
			</div>			
		</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="<?php echo base_url();?>assets/js/demo/datatables-demo.js"></script>
  <script>
 
	get_data();
 function get_data() {
    $.ajax({
        url :"<?php echo base_url()?>index.php/welcome/get_data/",		
        type:"post",
        success:function(msg){
			var obj = jQuery.parseJSON (msg);
			if (obj.status.code == '200') 
			{
				tr_insert = "";
				for (i=0 ;i<obj.result.length;i++) {
					console.log(obj.result[i])								
					tr_insert += '<tr>'+
								'<td>'+(i +1)+'</td>'+
								'<td>'+obj.result[i].name+'</td>'+
								'<td>'+obj.result[i].email+'</td>'+
								'<td>'+obj.result[i].gender+'</td>'+
								'<td>'+obj.result[i].is_married+'</td>'+
								'<td>'+obj.result[i].address+'</td>'+
								'<td>'+
								'<button class="btn btn-danger" onclick="deleteData('+obj.result[i].id+')" type="button">Delete Data</button>'+
								'<button class="btn btn-warning" onclick="detailData('+obj.result[i].id+')" type="button">Update Data</button>'+																
								'</td>'+																																																
								// '<td>'+obj.results[i].pangkat+'</td>'+
								// '<td>'+obj.results[i].tmt_pangkat+'</td>'+
							'</tr>';                                          
				}  
				$("#table-content").html(tr_insert);				
			}

        },
        error:function(jqXHR,exception) {
            // ajax_catch(jqXHR,exception);					
        }
    })    
}

function deleteData(id) {
	$.ajax({
		url :"<?php echo base_url()?>index.php/customerapi/delete/",		
		type: "post",
		data: {id:id},
		success:function(msg){
			alert(msg.status.message)
			if (msg.status.code == 200) {
				setTimeout(function(){
					location.reload();
				}, 500);						
			}
		}
	})
}

function detailData(id) {
	$.ajax({
		url :"<?php echo base_url()?>index.php/customerapi/detail/"+id,		
		type: "get",
		success:function(msg){
			if (msg.status.code == 200) {
				console.log(msg.result[0].id)
				$(".form-control").val('');
				$("#form-section").css({"display": ""})
				$("#view-section").css({"display": "none"})
				$("#crud").val('update');	
				$("#id").val(id)
				$("#f_name").val(msg.result[0].name)
				$("#f_email").val(msg.result[0].email)											
				$("#f_password").val(msg.result[0].password)
				$("#f_gender").val(msg.result[0].gender)
				$("#f_married").val(msg.result[0].is_married)
				$("#f_address").val(msg.result[0].address)																
			}
		}
	})	
}

$(document).ready(function(){
	$("#addData").click(function()
	{
		$(".form-control").val('');
		$("#form-section").css({"display": ""})
		$("#view-section").css({"display": "none"})
		$("#crud").val('insert');
	})

	$("#btn-trigger-controll").click(function() {
		var oid         = $("#id").val();
		var crud        = $("#crud").val();		
		var f_name         = $("#f_name").val();
		var f_email         = $("#f_email").val();
		var f_password         = $("#f_password").val();
		var f_gender         = $("#f_gender").val();
		var f_married         = $("#f_married").val();
		var f_address         = $("#f_address").val();

		if (crud == 'insert') {
			$.ajax({
				url :"<?php echo base_url()?>index.php/customerapi/insert/",		
				type: "post",
				data: {name:f_name,email:f_email,password:f_password,gender:f_gender,married:f_married,address:f_address},
				success:function(msg){
					alert(msg.status.message)
					if (msg.status.code == 200) {
						setTimeout(function(){
							location.reload();
						}, 500);						
					}
				}
			})			
		}
		else if(crud == 'update')
		{
			$.ajax({
				url :"<?php echo base_url()?>index.php/customerapi/update/",		
				type: "post",
				data: {name:f_name,email:f_email,password:f_password,gender:f_gender,married:f_married,address:f_address,id:oid},
				success:function(msg){
					alert(msg.status.message)
					if (msg.status.code == 200) {
						setTimeout(function(){
							location.reload();
						}, 500);						
					}
				}
			})
		}
	})
})	
 
</script>

</body>

</html>
