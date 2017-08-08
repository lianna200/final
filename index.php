<?php
//get todo array from POST
$todo_list = filter_input(INPUT_POST, 'todolist', FILTER_DEFAULT,
        FILTER_REQUIRE_ARRAY);
if ($todo_list === NULL) {
    $todo_list = array();
     $todo_list[] = 'Get grosseries';
     $todo_list[] = 'Clean house';
     $todo_list[] = 'other';
}
//get action variable from POST
$action = filter_input(INPUT_POST, 'action');
//initialize error messages array
$errors = array();
//process
switch( $action ) {
    case 'Add ToDo':
            $new_todo = filter_input(INPUT_POST, 'newtodo');
	     if (empty($new_todo)) {
	     $errors[] = 'The new todo cannot be empty.';
	      } else {
	       // $todo_list[] = $new_todo;
	        array_push($todo_list, $new_todo);
}
 break;
  case 'Delete Todo':
   $todo_index = filter_input(INPUT_POST, 'todoid', FILTER_VALIDATE_INT);
    $todo_index = filter_input(INPUT_POST, 'todoid', FILTER_VALIDATE_INT);
            if ($todo_index === NULL || $todo_index === FALSE) {
	    $errors[] = 'The todo cannot be deleted.';
	     } else {
	     unset($todo_list[$todo_index]);
	     $todo_list = array_values($todo_list);
	     }
	   break;
	   case 'Edit ToDo':
	 $todo_index = filter_input(INPUT_POST, 'todoid', FILTER_VALIDATE_INT);
	 if ($todo_index === NULL || $todo_index === FALSE) {
	 $errors[] = 'The todo cannot be modified.';
	 } else {
	 $todo_to_modify = $todo_list[$todo_index];
	 }
	  break;
	  case 'Save Changes':
	  $i = filter_input(INPUT_POST, 'modifiedtodoid', FILTER_VALIDATE_INT);
	  $modified_todo = filter_input(INPUT_POST, 'modifiedtodo');
	  if (empty($modified_todo)) {
	  $errors[] = 'The modified todo cannot be empty.';
} elseif($i === NULL || $i === FALSE) {
 $errors[] = 'The todo cannot be modified.';
 } else {
 $todo_list[$i] = $modified_todo;
 $modified_todo = '';
 }
 break;
 case 'Cancel Changes':
 $modified_todo = '';
 break;
 }
 include('todo_list.php');
 ?>
