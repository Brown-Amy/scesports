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
	        $parents = get_parents();
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
    		$parents = get_parents();
    		$games = get_games();
    		include ('../views/games/gamelist.php');
    	break;

    	case 'assign_parent':
			$parent_volunteer_id = filter_input(INPUT_POST, 'parent_id', 
            FILTER_VALIDATE_INT);
            $game_id = filter_input(INPUT_POST, 'game_id', 
            FILTER_VALIDATE_INT);
            if ($game_id == NULL || $game_id == FALSE || $parent_volunteer_id == NULL || $parent_volunteer_id == FALSE){
            $error = "Please select a game";
            include('../errors/error.php');
            }else {
            assign_parent($parent_volunteer_id, $game_id);
            $parents = get_parents();
            $games = get_games();
            include ('../views/games/gamelist.php');
            }
		
		default:
			// query the table for all the games
			$games = get_games();
			$parents = get_parents();
			// load the games view
			include('../views/games/gamelist.php');
		break;
	}
?>