<?php

	require "Head.php";

	if ($_POST["action"] == "SaveAvailability") {
		$defaultSchedule = $_SESSION["session"]->getUser()->getDefaultWeek();
		foreach ($_POST["TimeBlock"] as $blockData)
			(new TimeBlock($blockData))->setEmployee($_SESSION["session"]->getUser())->sync();
		header("Location: AvailabilityForm.php");
	}

?>
<h1>Default Availability Form</h1>
<form method='post'>
	<input type='hidden' name='action' value='SaveAvailability'>
	<?php
		$defaultSchedule = $_SESSION["session"]->getUser()->getDefaultSchedule();
		if ($defaultSchedule)
			foreach ($defaultSchedule->getTimeBlocks() as $block)
				(new TimeBlockForm())->timeBlock($block)->echo();
		(new TimeBlockForm())->echo();
	?>
	<div class='form-group'>
		<button class='btn btn-primary'>Save</button>
	</div><!-- /.form-group -->
</form>

<?php require "Foot.php"; ?>
