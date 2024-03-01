<!--  The view should expect an associative array called $applicant and should display their first name, last name, their years of experience, their level (jr, mid, senior, etc...), and their skills.  -->
<?php

$app = new Applicant($applicant);


?>



<div class="applicant">
    <p> Name: <?php echo $app->get_FirstName() . $app->get_lastName() ?></p>
    <p> Experience :<?php echo $app->get_exp() ?></p>
    <p> Level :<?php echo $app->get_level() ?></p>
    <p> Skills : <?php print_r($app->get_skills()) ?></p>
</div>
