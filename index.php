<?php

define('ABS_PATH', __DIR__);


include_once(ABS_PATH . '/views/head.view.php');
include_once(ABS_PATH . '/views/welcome.view.php');
include_once(ABS_PATH . '/views/form.view.php');
require_once(ABS_PATH . '/db.service.php');
require_once('./applicants.service.php');
class Applicant
{

    private $firstName;
    private $lastName;
    private $level;
    private $exp;
    private $skills;

    public function __construct($applicant)
    {
        $this->firstName = $applicant['firstName'];
        $this->lastName = $applicant['lastName'];
        $this->level = $applicant['experience'];
        $this->exp = $applicant['level'];
        $this->skils = $applicant['skills'];
    }

    public function get_FirstName()
    {
        return $this->firstName;
    }
    public function get_lastName()
    {
        return $this->lastName;
    }
    public function get_exp()
    {
        return $this->exp;
    }
    public function get_level()
    {
        return $this->level;
    }
    public function get_skills()
    {
        return $this->skills;
    }

}

$jobTitle = (isset($_GET['jobTitle'])) ? $_GET['jobTitle'] : '';
$experience = (isset($_GET['experienceNeeded'])) ? $_GET['experienceNeeded'] : '';
$level = (isset($_GET['positionLevel'])) ? $_GET['positionLevel'] : '';
$skills = [];
for ($i = 1; $i <= 3; $i++) {
    if (isset($_GET['skill' . $i])) {
        $skills[] = $_GET['skill' . $i];
    }
}

$db = new databaseservice();
$a_service = new applicantsservice($db->get_users());

$users = $a_service->get_selected_users($level, (int) $experience, $skills);


// $users = get_users_from_database();



foreach ($users as $applicant) {
    include(ABS_PATH . "/views/applicant-summary.view.php");
}

include_once(ABS_PATH . '/views/footer.view.php');