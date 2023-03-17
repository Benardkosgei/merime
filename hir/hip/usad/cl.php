<?php
  session_start();
if (!isset($_SESSION['userid'])){
    require "../redirect.php";
}else{
    $now=time();
    if ($now > $_SESSION['expire']){
        session_destroy();
        require "../redirect.php"; 
    }else{        
    }
}
?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>
<?php include('../head_css.php'); ?>
<style type="text/css">
	.icon {
		width: 30px;
		padding-right: 10px;
	}

	.iconb {
		width: 30px;
		padding-right: 10px;
	}

	.icon:hover {
		transition: 0.3s;
		/*box-shadow: 2px 0px 20px rgba(0, 0, 0, 0.8);*/
	}

	.sidebar-menu .cl {
		background-color: #009999;
	}

</style>
<script>
		$(document).ready(function() {
			$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
				localStorage.setItem('activeTab', $(e.target).attr('href'));
			});
			var activeTab = localStorage.getItem('activeTab');
			if (activeTab) {
				$('#myTab a[href="' + activeTab + '"]').tab('show');
			}
		});

	</script>
<body class="skin-black">
	<!-- header logo: style can be found in header.less -->
	<?php 
        include "../connection.php";
        ?>
	<?php include('../header.php'); ?>
	<script>
		$(document).ready(function() {
			$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
				localStorage.setItem('activeTab', $(e.target).attr('href'));
			});
			var activeTab = localStorage.getItem('activeTab');
			if (activeTab) {
				$('#myTab a[href="' + activeTab + '"]').tab('show');
			}
		});

	</script>
	<?php
	//DELETE SELECTED CUSTOMERS
	
	    if(isset($_POST['submit_delete']))
	    {
			if(empty($_POST['chk_delete'])){
				echo'<script>alert("Select Customer(s) to delete!");</script>';
			}else{
	        foreach($_POST['chk_delete'] as $value)
	        {
	            $deletee = mysqli_query($con,"DELETE from tblcustomers where id = '$value' ") or die( 'Error: ' . mysqli_error($con));
	                    
	            if($deletee == true)
	            {
	                $_SESSION['delete'] = 1;
	                header("location: ".$_SERVER['REQUEST_URI']);
	            }
	        }
	    }
		}
	//DELETE LEADS
	if(isset($_POST['submit_leads']))
	    {
			if(empty($_POST['chk_delete'])){
				echo'<script>alert("Select Leads to delete!");</script>';
			}else{
	        foreach($_POST['chk_delete'] as $value)
	        {
	            $deletee = mysqli_query($con,"DELETE from tblcustomers where id = '$value' ") or die('Error: ' . mysqli_error($con));
	                    
	            if($deletee == true)
	            {
	                $_SESSION['delete'] = 1;
	                header("location: ".$_SERVER['REQUEST_URI']);
	            }
	        }
	    }
		}
							?>
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<!-- Left side column. contains the logo and sidebar -->
		<?php include('../sidebar-left.php'); ?>

		<!-- Right side column. Contains the navbar and content of the page -->
		<aside class="right-side">
			<!-- Content Header (Page header) -->
			<section class="content-header" style="border-style:;border:1px solid #dedede;">
				<a href="javascript:void(0)" title="Go Back" onclick="goBack()"><i class="fa fa-angle-double-left" aria-hidden="true" title="Go Back"></i> Back</a>&nbsp;&nbsp;&nbsp;

				<a href="c" title="Add new customers"><i class="fa fa-plus" aria-hidden="true" title="Go home"></i> Add new customers</a>&nbsp;&nbsp;&nbsp;

				<a href="cuEx" target="_blank"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export to Excel</a>&nbsp;&nbsp;&nbsp;
				<a href="clprev" title=""><i class="fa fa-print" aria-hidden="true" title="Lease item"></i> Print preview</a>&nbsp;&nbsp;&nbsp;
				<?php
				$sem1=mysqli_query($con,"SELECT * FROM customer_comments WHERE company='$compan' AND customer_progress!='Completed'");
                          if($sem1){
							  
							  $newdate=date('Y-m-d', strtotime($thix_date. ' -2 days'));
							  $newnew=date('Y-m-d',strtotime($thix_date. ' +2 days '));
							  $sol=mysqli_query($con,"SELECT * FROM customer_comments WHERE company='$compan' AND customer_progress!='Completed' AND customer_date >= '$newdate' AND customer_date <= '$newnew'");
							  if($sol){
								  $num1=mysqli_num_rows($sol);
								  $numspan='<span class="pull-left" style"color:#FFBF00; font-size:14px;"><strong>NEW</strong></span>';
							  }
						  }
							  ?>

				<a href="followups" title=""><i class="fas fa-comments" aria-hidden="true" title="Comments"></i> Followup Comments <span class="badge" style="font-family:fangsong!important; background-color:#32cd32!important;"><?php echo $num1; ?></span></a>&nbsp;&nbsp;&nbsp;



				<a href="text" style="float:right;color:green;" title=""><i class="fa fa-sms" aria-hidden="true" title="Send Message"></i> Send Message</a>


			</section>


			<!-- Main content -->
			<section class="content">
                <?php
                 $admin = mysqli_query($con,"SELECT * from tblstaff where id =' ".$_SESSION['userid']."' ");
                    while($row = mysqli_fetch_array($admin)){
                        $package=$row['package'];
                        if($package!=4){
				echo '<a href="add-item" title="Lease item" class="btn btn-info btn-sm" style="margin-bottom:10px;"> Lease Items</a>&nbsp;&nbsp;&nbsp;
				<a href="quotation-list" title="Quotation list" class="btn btn-success btn-sm" style="margin-bottom:10px;margin-left:20px;"> Quotations</a>';
		          	}
						}
						?>
				<!-- <div class="row"> -->
				<!-- <div class="box"> -->

				<!-- left column -->
				<div class="box-body table-responsive">
					<p>Registered Customers</p>
					<form method="post">
						<?php echo $msger; ?>
						<ul class="nav nav-tabs" id="myTab">
							<li class="active"><a data-toggle="tab" href="#home">Clients</a></li>
							<li><a data-toggle="tab" href="#menu1">Leads</a></li>

						 </ul>

						<div class="tab-content">
							<div id="home" class="tab-pane fade in active">



								<button type="submit" onclick="return confirm('Are you sure you want to delete these clients?')" name="submit_delete" style="margin-top:10px!important; float:right;  margin-bottom:10px!important" class="btn btn-danger btn-sm ">Delete clients <i class="fas fa-users"></i></button><br>
								<table id="table" class="table table-striped">
									<div class="box-body table-responsive">
										<thead>


											<tr>
												<th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" />
													<!--th style="width: 100px !important;">ID N<sub>o</sub></th-->
												<th>Customer Name</th>
												<!--<th>Gender</th>-->
												<!--th>Business / Company</th-->
												<th>Contact</th>
												<th>Comments</th>
												<th>Text</th>
												<th>View</th>
												<th>Edit</th>

												<!-- <th>Edit</th> -->
												<!--														<th style="width:20px !important;">Delete</th>-->
												<!--th style="width: 20px !important;">Print</th-->
											</tr>
										</thead>
										<tbody>
											<?php
                                            $c=1;
                                            $squery = mysqli_query($con, "select * from tblcustomers where company='".$_SESSION['company']."' and  state = '1' ORDER BY id DESC");
                                            while($row = mysqli_fetch_array($squery))
                                            {  
												$customer_id = $row['id'];
                                                //<td>'.ucwords($row['gender']).'</td>
                                                echo '
                                            <tr>
                                                <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td> 
                                                <!--td>'.$row['identity'].'</td-->
                                                <td>'.ucwords($row['fname']).' '.ucwords($row['mname']).' '.ucwords($row['lname']).'</td>
                                               
                                                <!--td>'.ucwords($row['b_c_name']).'</td-->   
                                                <td>'.ucwords($row['fcontact']).'</td> 
												<td><a href="comments.php?id='.$customer_id.'"><i class="fa fa-comments" aria-hidden="true" title="Send Message"></i></a></td>
                                                 <td><a href="text?id='.$customer_id.'"><i class="fa fa-sms" aria-hidden="true" title="Send Message"></i></a></td>
                                                  <!--td> <input type="checkbox" id="leases" data-toggle="toggle" data-on="Client" data-off="Lead"  name="leases" data-size="sm"  data-onstyle="success" data-offstyle="danger">
                                                <input type="hidden" name="lease" id="lease" value="hj"></td-->

												 <!--td><a  data-target="#viewCustomerModal'.$row['id'].'"  data-toggle="modal"  ><i class="fas fa-eye"></i></a></td--> 
                                         <td><a href="viewcustomer.php?id='.$row['id'].'" ><img src="https://merimevents-run.com/hir/images/icons/eye.png" class="iconb"></a></td> 
                                                <td><a data-target="#editModal'.$row['id'].'" data-toggle="modal"><img src="../../images/icons/edit.png" title="Edit this record" class="iconb"></a></td> 
                                                <!--td><center><a href=../reports/ocrr?cus='.$row['id'].' target="_blank"><img src="../../images/icons/printer.png" title="Print this record" class="iconb"></a></center></td-->  
												
												
												
                                                ';?>
											<!--													<td><a onclick="return confirm('Are you sure you want to delete this customer?')" class="btn btn-danger" href="delete_customer.php?id=<?php echo $customer_id; ?>"><i class="fas fa-trash"></i></a></td>-->
											<?php
												
												
                                               '</tr>';
                                              
                                                include "editModal.php";
												include "viewModal.php";
												
                                            }
                                            ?>
										</tbody>

									</div>
								</table>
							</div>
							<div id="menu1" class="tab-pane fade">

								<button type="submit" onclick="return confirm('Are you sure you want to delete these leads?')" name="submit_leads" style="margin-top:10px!important; float:right; margin-bottom:10px!important" class="btn btn-danger btn-sm ">Delete leads <i class="fas fa-users"></i></button><br>

								<!--										<button type="submit" onclick="return confirm('Are you sure you want to delete these leads?')" name="submit_leads" style="margin-top:10px!important; float:right; " class="btn btn-danger btn-sm ">Delete selected Leads <i class="fas fa-users"></i></button>-->

								<table class="table table-striped" id="datatable">
									<div class="box-body table-responsive">
										<thead>
											<tr>
												<th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" />
													<!--th style="width: 100px !important;">ID N<sub>o</sub></th-->
												<th>Customer Name</th>
												<!--<th>Gender</th>-->
												<th>Contact</th>
												<th>Interested in</th>
												<th>Comments</th>
												<th>Text</th>
												<th>View</th>
												<th>Edit</th>
												<!-- <th>Edit</th> -->
												<!--														<th style="width:20px !important;">Delete</th>-->
												<!--th style="width: 20px !important;">Print</th-->
											</tr>
										</thead>
										<tbody>
											<?php
                                            $c=1;
                                            $squery = mysqli_query($con, "select * from tblcustomers where company='".$_SESSION['company']."' and state ='0' ORDER BY id DESC");
                                            while($row = mysqli_fetch_array($squery))
                                            {  

                                            	if(!empty($row['interested_in'])){
                                            	 $interested = $row['interested_in'];
                                            	}else{
                                            	$interested = "Nill";
                                            	}

												$customer_id = $row['id'];
                                                //<td>'.ucwords($row['gender']).'</td>
                                                echo '
                                            	
                                            <tr  id="myTable2">
                                                <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['id'].'" /></td> 
                                                <!--td>'.$row['identity'].'</td-->
                                                <td>'.ucwords($row['fname']).' '.ucwords($row['mname']).' '.ucwords($row['lname']).'</td>
                                               
                                                  
                                                <td>'.ucwords($row['fcontact']).'</td>
                                                 <td>'.ucwords($interested).'</td> 
												<td><a href="comments.php?id='.$customer_id.'"><i class="fas fa-comments" aria-hidden="true" title="Send Message"></i></a></td>
												<td><a href="text?id='.$customer_id.'"><i class="fa fa-sms" aria-hidden="true" title="Send Message"></i></a></td>
                                                 
                                                  <!--td> <input type="checkbox" id="leases" data-toggle="toggle" data-on="Client" data-off="Lead"  name="leases" data-size="sm"  data-onstyle="success" data-offstyle="danger">
                                                <input type="hidden" name="lease" id="lease" value="hj"></td-->

												   <td><a href="viewcustomer.php?id='.$row['id'].'" ><img src="https://merimevents-run.com/hir/images/icons/eye.png" class="iconb"></td>
                                        
                                                <td><a data-target="#editModal'.$row['id'].'" data-toggle="modal"><img src="../../images/icons/edit.png" title="Edit this record" class="iconb"></a></td> 
                                                <!--td><center><a href=../reports/ocrr?cus='.$row['id'].' target="_blank"><img src="../../images/icons/printer.png" title="Print this record" class="iconb"></a></center></td-->  
												
												
												
                                                ';?>
											<!--													<td><a onclick="return confirm('Are you sure you want to delete this customer?')" class="btn btn-danger" href="delete_customer.php?id=<?php echo $customer_id; ?>"><i class="fas fa-trash"></i></a></td>-->
											<?php
												
												
                                               '</tr>';
                                              
                                                include "editModal.php";
												include "viewModal.php";
												
                                            }
                                            ?>

										</tbody>

									</div>
								</table>
							</div>

						</div>


						<?php include "../deleteModal.php"; ?>

					</form>
					<!-- </div> -->
					<!-- /.box-body -->
					<!-- </div>/.box -->

					<?php include "../notification.php"; ?>

					<?php include "../addModal.php"; ?>

					<!--?php include " ../addfunction.php"; ?-->
					<?php include "editfunction.php"; ?>
					<?php include "deletefunction.php"; ?>

					<!-- </div> -->
				</div> <!-- /.row -->
			</section><!-- /.content -->
		</aside><!-- /.right-side -->

	</div><!-- ./wrapper -->
	<!-- jQuery 2.0.2 -->
	<?php include "../footer.php"; ?>
	<script>
		$(document).ready(function() {
			$("#myInput2").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable2 ").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});

	</script>
	<script type="text/javascript">
		function goBack() {
			window.history.back();
		}
		$(function() {
			$("#table").dataTable({
				"aoColumnDefs": [{
					"bSortable": false,
					"aTargets": [0, 2]
				}],
				"aaSorting": []
			});
		});

	</script>
	<script>
		$(document).ready(function() {
			var table = $('#datatable').DataTable({
				responsive: true
			});

			new $.fn.dataTable.FixedHeader(table);
		});

	</script>
</body>

</html>
