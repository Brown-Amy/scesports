<?php 
	// This is the GamesController

	// include the database connection
	require('../config/db.php');
	// include the ParentsVolunteerModel
	require('../models/parent_volunteers_model.php');
	// include the GamesModel
	require('../models/games_model.php');

	// determine the view to load by action POST param.
	$action = filter_input(INPUT_POST, 'action');

	switch ($action) {
		case 'add':
			break;

		case 'edit':
			break;

		case 'delete':
			break;

		case 'list':
			break;
		
		default:
			// query the table for all the games
			$games = get_games();
			// load the register view
			include('../views/volunteer/register.php');
			break;
	}
?>