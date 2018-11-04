<?php require "Head.php";

if ($_POST["action"] == "SaveShiftHours") {

    $week = Business::getBusiness()->getShiftHours();
    foreach ($_POST["TimeBlocks"] as $blockData) {
        $week->addTimeBlock(new TimeBlock($blockData));
    }

    Business::getBusiness()->sync();

    header("Location: DefineShiftHours.php");
}
	echo "<h1>Define Shift Hours</h1>

<form method='post'>
<input type = 'hidden'
name = 'action'
value = 'SaveShiftHours'>

";
	foreach (Business::getBusiness()->getShiftHours()->getTimeBlocks() as $timeBlock) {

        (new TimeBlockForm())->timeBlock($timeBlock)->label("ShiftHours")->echo()

        ;
    }
        (new TimeBlockForm())->label("ShiftHours")->echo();
		echo"<button type='submit' class='btn btn-primary'>Submit</button>";






echo "</form>";


require "Foot.php"
?>