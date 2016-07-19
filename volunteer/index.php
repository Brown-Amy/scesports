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
		$game = filter_input(INPUT_POST, 'game', FILTER_VALIDATE_INT);
		$mentor = 0; //default value
		if (isset($_POST['mentor'])) {
			$mentor = 1;
		}
		$comment = filter_input(INPUT_POST, 'comment',FILTER_SANITIZE_STRING);
    
    	//validate form
    		if ($first_name === NULL || $first_name == FALSE || $last_name == NULL || $last_name == FALSE || $email == NULL || $email == FALSE || $phone == NULL || $phone == FALSE || $child_name == NULL || $child_name == FALSE ||$game == FALSE || $game == NULL) {
        	$error = 'Missing information, look over form and fill out all the required fields.';
        	include('../errors/error.php');
    		} else {
	        add_parent($id, $first_name, $last_name, $email, $phone, $child_name, $game, $mentor, $comment);
	        include ('../views/volunteer/confirmation.php');
	    	}

			break;

			case 'list_parents':
    		$parents = get_parents();
    		include ('../views/volunteer/parentlist.php');
			break;

		case 'delete_parent':
   			$id = filter_input(INPUT_POST, 'id', 
            FILTER_VALIDATE_INT);
    
    		if ($id == NULL || $id == FALSE) {
	        $error = 'Missing ID';
	        include('../errors/error.php');
    		} else {
        	delete_parent($id);
         	header('Location: .?action=list_parents');
			}
		break;

		case 'show_edit_form';
		$id = filter_input(INPUT_POST, 'id', 
            FILTER_VALIDATE_INT);
		$parent = get_parent($id);
		print_r($parent);
		$games =get_games();
		include ('../views/volunteer/edit_parent.php');
		break;

		case 'edit_parent':
			$id = filter_input(INPUT_POST, 'id', 
            FILTER_VALIDATE_INT);
    		$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
			$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$phone = filter_input(INPUT_POST, 'phone', 	FILTER_SANITIZE_NUMBER_INT);
			$child_name = filter_input(INPUT_POST, 'child_name', FILTER_SANITIZE_STRING);
			$game = filter_input(INPUT_POST, 'game', FILTER_VALIDATE_INT);
			$mentor = 0; //default value
			if (isset($_POST['mentor'])) {
			$mentor = 1;
			}
			$comment = filter_input(INPUT_POST, 'comment',FILTER_SANITIZE_STRING);
  	//validate form
    		if ($first_name === NULL || $first_name == FALSE || $last_name == NULL || $last_name == FALSE || $email == NULL || $email == FALSE || $phone == NULL || $phone == FALSE || $child_name == NULL || $child_name == FALSE ||$game == FALSE || $game == NULL) {
        	$error = 'Missing information, look over form and fill out all the required fields.';
        	include('../errors/error.php');
    		} else {
	        edit_parent($id, $first_name, $last_name, $email, $phone, $child_name, $game, $mentor, $comment);
	        include ('../views/volunteer/parentlist.php');
	    	}

			break;

			case 'list_parents':
    		$parents = get_parents();
    		include ('../views/volunteer/parentlist.php');
			break;

		default:
			// query the table for all the games
			$games = get_games();
			// load the register view
			include('../views/volunteer/register.php');
			break;
	}