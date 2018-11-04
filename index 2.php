<?php require "Head.php";
if($_GET["action"]== "Login")
{

    new Session($_GET["UserName"],$_GET["Password"]);
}

?>


	<h1>ScheduleMe</h1>


	<form>
        <input type="hidden"
               name="action"
               value="Login"
               >

		<div class="form-group">
			<label for="exampleInputEmail1">User Name</label>
			<input name="UserName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input name = "Password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

<?php require "Foot.php"; ?>