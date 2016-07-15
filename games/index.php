<?php 
	// This is the GamesController

	// include the database connection
	require('../config/db.php');
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
	echo $action; ?>
	post
	<pre>
		<?php print_r($_POST);
		?>
	</pre>
	get
	<pre>
		<?php print_r($_GET);
		?>
	</pre>

	<?php
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
    
    		$name = filter_input(INPUT_POST, 'name');
   
 
		    if ($id == NULL || $id == FALSE || $name == NULL || $name == FALSE)  {
		        $error = "Invalid product data. Check all fields and try again.";
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
		
		default:
			// query the table for all the games
			$games = get_games();
			// load the games view
			include('../views/games/gamelist.php');
		break;
	}
?>