<?php
	require "Head.php";

	$allStaff = Staff::getAll();
	if ($_GET["deleteID"]) {
		// delete the employee...
			$staff = $allStaff[$_GET["deleteID"]];
			if ($staff) {
				$staff->remove();
				unset($allStaff[$_GET["deleteID"]]);
				header("Location: EmployeeList.php");

			}
	}
	if($_GET["action"] == "edit"){

		if($_GET["StaffType"]=="Employer")
		{
			$temp = new Employer($_GET);

		} else{

			$temp = new Employee($_GET);
		}

		$temp->update();
		header("Location: EmployeeList.php");
	}
	if($_GET["action"]=="create")
	{

	   if($_GET["StaffType"]=="Employer")
	   {
		   $temp = new Employer($_GET);

	   } else{

		   $temp = new Employee($_GET);
	   }

		$temp->insert();
		header("Location: EmployeeList.php");
	}

?>
<h1>All Employees</h1>
<div class="form-group">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmpModal">
		Add Employee
	</button>

	<!-- Modal -->
	<div class="modal fade" id="AddEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="AddEmployee">Add Employee</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

						<div class="form-group">
							<label for="FirstName">First Name</label>
							<input name="FirstName" type="text" class="form-control" id="FirstName">

						</div>
						<div class="form-group">
							<label for="LastName">Last Name</label>
							<input name="LastName" type="text" class="form-control" id="LastName">
						</div>
						<div class="form-group">
							<label for="StaffType">Type</label>
							<select name ="StaffType" class="form-control" id="StaffType">
								<option>Employee</option>
								<option>Employer</option>
							</select>
						</div>
					<input type="hidden" name="action" value="create">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
	echo "
		<table class='table'>
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Staff Type</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
	";


	foreach (Staff::getAll() as $staff) {

		echo "
			<tr>
				<td>" . $staff->getFirstName() . "</td>
				<td>" . $staff->getLastName() . "</td>
				<td>" . $staff->getStaffType() . "</td>
				<td>
					 <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editModal{$staff->getEmployeeID()}' >
						Edit
					 </button>
						<div class='modal fade' id='editModal{$staff->getEmployeeID()}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
							<div class='modal-dialog' role='document'>
								<form class='modal-content'>
									<div class='modal-header'>
										<h5 class='modal-title' id='AddEmployee'>Edit Employee</h5>
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
												<label for='StaffType'>Type</label>
												<select name ='StaffType' class='form-control' id='StaffType' >
													<option " . ($staff->getStaffType() == StaffType::EMPLOYEE ? " selected" : "") . ">Employee</option>
													<option " . ($staff->getStaffType() == StaffType::EMPLOYER ? " selected" : "") . ">Employer</option>
												</select>
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
					  
					<a href='?deleteID=" . $staff->getEmployeeID() . "' class='btn btn-danger'>Delete</a>
				</td>
			</tr>
		";
	}
	echo "
			</tbody>
		</table>
	";
	require "Foot.php";
?>
