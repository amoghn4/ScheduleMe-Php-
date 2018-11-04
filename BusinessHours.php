<?php
/**
 * Created by PhpStorm.
 * User: amoghnagalla
 * Date: 10/22/18
 * Time: 4:42 PM
 */

require "Head.php";

if ($_POST["action"] == "SaveBusinessHours"){

    $week = Business::getBusiness()->getBusinessHours();
    foreach($_POST["TimeBlocks"] as $blockData){
        $week->addTimeBlock(new TimeBlock($blockData));
    }

    Business::getBusiness()->sync();

    header("Location: BusinessHours.php");

    /*
     foreach ($_POST["AvailabilityBlocks"] as $blockData)
        (new TimeBlock($blockData))->setEmployee($_SESSION["session"]->getUser())->sync();
    header("Location: AvailabilityForm.php");
    */
}
?>

<h1>Business Hours</h1>
<form method='post'>
    <input type='hidden' name='action' value='SaveBusinessHours'>
    <?php
        $businessHours = Business::getBusiness()->getBusinessHours();
        $formCount = 0;
        //Util::dump($businessHours);
        if($businessHours){
            //Util::dump($block);
            foreach ($businessHours->getTimeBlocks() as $block) {
               // Util::dump($block);
                (new TimeBlockForm())->dayOfWeek($block->getDayOfWeek())->label("we're open from")->timeBlock($block)->echo();
                $formCount++;
            }
        }
        for($formCount; $formCount < 7; $formCount++) {
            (new TimeBlockForm())->echo();
        }
    ?>

    <div class='form-group'>
        <button class='btn btn-primary'>Save</button>
    </div>
</form>

<?php require "Foot.php";