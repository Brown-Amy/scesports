<?php 
	// This is the AdminController

	// include the database connection
	require('../config/db.php');
	// include the ParentsVolunteerModel
	require('../models/parent_volunteers_model.php');
	// include the GamesModel
	require('../models/games_model.php');

	// determine the view to load by action GET param.
	if (!empty(filter_input(INPUT_GET, 'action'))){
		$action = filter_input(INPUT_GET, 'action');
	}else if (!empty(filter_input(INPUT_POST, 'action'))){
		$action = filter_input(INPUT_POST, 'action');
	}else{
		$action = '';
	}
	switch ($action) {
		case ('get_mentors');
		$mentors = get_mentors();
		
		
		break;
	default:
			// query the table for all the games
			$games = get_games();
			$parents = get_parents();
			// load the register view
			include('../views/site/admin.php');
			break;
	}