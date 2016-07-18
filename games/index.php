<?php 
	// This is the GamesController

	// include the database connection
	require('../config/db.php');
	// include the GamesModel
	require('../models/games_model.php');
		// include the ParentsVolunteerModel
	require('../models/parent_volunteers_model.php');

	// determine the view to load by action GET param.
	if (!empty(filter_input(INPUT_GET, 'action'))){
		$action = filter_input(INPUT_GET, 'action');
	}else if (!empty(filter_input(INPUT_POST, 'action'))){
		$action = filter_input(INPUT_POST, 'action');
	}else{
		$action = '';
	}


	switch ($action) {
		case 'add_game':
		  	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    
    		if ($name == NULL || $name == FALSE) {
        	$error = 'Please provide a name';
        	include('../errors/error.php');
    		} else {
	        add_game($name);
	        $games = get_games();
	        include ('../views/games/gamelist.php');
	    	}
	    break;

		case 'add_game_form':
		include ('../views/games/addgame.php');
		break;

		case 'show_edit_form';
		$id = filter_input(INPUT_POST, 'id', 
            FILTER_VALIDATE_INT);
		$name = filter_input(INPUT_POST, 'name', 
            FILTER_SANITIZE_STRING);
		include ('../views/games/edit_game.php');
		break;

		case 'edit_game':
			$id = filter_input(INPUT_POST, 'id', 
            FILTER_VALIDATE_INT);
    
    		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  
		    if ($id == NULL || $id == FALSE || $name == NULL || $name == FALSE)  {
		        $error = "Please enter the name of the game.";
		    include('../errors/error.php');
		    } else { 
		        edit_game($id, $name);
		        $games = get_games();
	        	include ('../views/games/gamelist.php');
		    }
		break;

		case 'delete_game':
   			$id = filter_input(INPUT_POST, 'id', 
            FILTER_VALIDATE_INT);
    
    		if ($id == NULL || $id == FALSE) {
	        $error = 'Missing ID';
	        include('../errors/error.php');
    		} else {
        	delete_game($id);
         	header('Location: .?action=list_games');
			}
		break;

		case 'list_games':
    		$games = get_games();
    		include ('../views/games/gamelist.php');
    	break;

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
    		$parents = get_parents();
    		print_r ($parents->fetchAll());
    		

    		//$first_name = $parents['first_name'];
    		//$last_name = $parents['last_name'];
			//$name = $first_name . ' ' . $last_name;

			if (isset($mentor)) {
            	$mentor_request = 'Yes';
    		} else if (!isset($mentor)){
           		 $mentor_request = 'No';
    		}
    		include ('../views/volunteer/parentlist.php');
//Trying to figure out how to display the parent information to the administrator view. 
			break;
    	
		
		default:
			// query the table for all the games
			$games = get_games();
			print_r($games->fetchAll());
			// load the games view
			include('../views/games/gamelist.php');
		break;
	}
?>