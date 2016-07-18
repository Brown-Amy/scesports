<?php 
	// This is the GamesController

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
		case 'add_parent':
		$id = null;
		$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
		$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
		$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
		$child_name = filter_input(INPUT_POST, 'child_name', FILTER_SANITIZE_STRING);
		$game = filter_input(INPUT_POST, 'game');
		$mentor = isset($_POST['mentor']);
		$comment = filter_input(INPUT_POST, 'comment');
    
    	//validate form
    		if ($first_name === NULL || $first_name == FALSE || $last_name == NULL || $last_name == FALSE || $email == NULL || $email == FALSE || $phone == NULL || $phone == FALSE || $child_name == NULL || $child_name == FALSE ) {
        	$error = 'Missing information, look over form and fill out all the required fields.';
        	include('../errors/error.php');
    		} else {
	        add_parent($id, $first_name, $last_name, $email, $phone, $child_name, $game, $mentor, $comment);
	        include ('../views/volunteer/confirmation.php');
	    	}

			break;

			case 'list_parents':
    		$parent = get_parents();
    		print_r ($parent);
			$name = $first_name . ' ' . $last_name;

			if (isset($mentor)) {
            	$mentor_request = 'Yes';
    		} else if (!isset($mentor)){
           		 $mentor_request = 'No';
    		}
    		include ('../views/volunteer/parentlist.php');
//Trying to figure out how to display the parent information to the administrator view. 
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