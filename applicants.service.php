<?php
//this file  mocks an applicanst service that is responsible for all methods relating to 
//fetching, filtering, and modifying applicants;

//this is a safety feature.  ABS_PATH is defined in the index.php file.  Once defined a global
//is available everywhere.  If someone gets to this file without having ABS_PATH set, it means
//they tried to access it directly.  Which is a no no.
if (!defined('ABS_PATH')) {
	die;
}

require_once('./db.service.php');



function retLevel(string $level): array
{
	$users = get_users_from_database();
	return array_filter($users, function ($user) use ($level) {
		return $user['level'] === $level;
	});
}

class applicantsservice
{

	private $_db;

	public function __construct($users_array)
	{
		$this->_db = $users_array;
	}

	function get_users_from_database(): array
	{
		//simply returns an unfiltered list of users from applicants.json
		return $this->_db;
	}

	function userLevelCallbac($user): bool
	{
		return $user['level'] === "entry";
	}

	function get_selected_users(string $level, int $experience, array $skills): array
	{
		return array_filter($this->_db, fn($user) => $user["level"] == $level
			&& $user["experience"] >= $experience
			&& count(array_intersect($user['skills'], $skills)) > 0);
	}
}
