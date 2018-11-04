<?php require "Head.php";
$staff = $_SESSION["session"]->getUser();

if($_GET["action"] == "edit"){
	$temp = new Employee($_GET);
	$temp->update();
   // header("Location: Employee.php");
}

	echo "<h1>Employee</h1>
			<a class='btn btn-primary' href='AvailabilityForm.php' role='button'>Submit Availability</a>
			<a class='btn btn-primary' href='AvailabilityForm.php' role='button'>View Schedule</a>
			<a class='btn btn-primary' href='AvailabilityForm.php' role='button'>Take Time Off</a>
			<button class='btn btn-primary' role='button' data-toggle='modal' data-target='#editPModal{$staff->getEmployeeID()}' >
				Edit Information
			</button>
			<div class='modal fade' id='editPModal{$staff->getEmployeeID()}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				<div class='modal-dialog' role='document'>
					<form class='modal-content'>
						<div class='modal-header'>
							<h5 class='modal-title' id='AddEmployee'>Edit Information</h5>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
						</div>
						<div class='modal-body'>
		
							<div class='form-group'>
								<label for='FirstName'>First Name</label>
								<input name='FirstName' type='text' class='form-control' id='FirstName' value='{$staff->getFirstName()}'>
		
							</div>
							<div class='form-group'>
								<label for='LastName'>Last Name</label>
								<input name='LastName' type='text' class='form-control' id='LastName' value='{$staff->getLastName()}'>
							</div>
							   <div class='form-group'>
								<label for='Password'>Password</label>
								<input name='Password' type='password' class='form-control' id='Password' value='{$staff->getPassword()}'>
							</div>
						
						  
							<input type='hidden' name='action' value='edit'>
							<input type='hidden' name=EmployeeID value='{$staff->getEmployeeID()}'>
						</div>
						<div class='modal-footer'>
							<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
							<button type='submit' class='btn btn-primary'>Save changes</button>
						</div>
					</form>
				</div>
			</div>
		";
 require "Foot.php"; ?>

