<!DOCTYPE html>
<html>
<head>
  <title>To Do List Manager</title>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<header>
<h1>To Do list Manager</h1>
</header>
<main>
<p><?php print_r($todo_list); ?></p>
<!-- part 1: the errors -->
<?php if (count($errors) > 0):?>
<h2>Errors:</h2>								            <ul>
<?php foreach($errors as $error):?>
<li><?php echo $error;?></li>
<?php endforeach;?>

</ul>
<?phpendif;?>
<!-- part  2:the  todo	 -->																	         <h2>Tasks:</h2>																	<?php if(count($todo_list) ==0):?>
<p>There are no todo in	the todo list.</p>					<?php else:?>
<ul>
<?php foreach ($todo_list as $id=>$todo ) :?>
<li><?php echo $id + 1 .'.'.$todo;?></li>
<?php endforeach;?>
</ul>
<?php endif; ?>
<br>
<!-- part 3 : the add form-->
<h2> Add ToDo </h2>
<form action="."method="post">
<?php foreach($todo_list as $todo ) :?>
<input type="hidden" name="todolist[]"
value="<?php echo &todo;?>">
<?php endforeach;?>
<label> ToDo:</label>
<input type="text" name="newtodo" id="newtodo"> <br>
<label>&nbsp;</label>
<input type="submit" name="action value"="Add ToDo">
</form>
<br>
<!-- part 4: the modify/delete form -->
 <?php if (count($todo_list) > 0 && empty($todo_to_modify)) : ?>
  <h2>Select ToDo:</h2>
   <form action="." method="post" >
    <?php foreach( $todo_list as $todo ) : ?>
    <input type="hidden" name="todolist[]"
    value="<?php echo $todo; ?>">
<?php endforeach; ?>
  <label> ToDo:</label>
   <select name="todoid">
   <?php foreach( $todo_list as $id => $todo ) : ?>
     <option value="<?php echo $id; ?>">
      <?php echo $todo; ?>
      </option>
      <?php endforeach; ?>
      </select>
      <br>
      <label>&nbsp;</label>
      <input type="submit" name="action" value="Modify ToDo">
      <input type="submit" name="action" value="Delete ToDo">
      <br>
       <label>&nbsp;</label>
        </form>
	 <?php endif; ?>
 <!-- part 5: the modify form -->
 <?php if (!empty($todo_to_modify)) : ?>
 <h2>ToDo to Modify:</h2>
 <form action="." method="post" 
  <?php foreach( $todo_list as $todo ) : ?>
  <input type="hidden" name="todolist[]" value="<?php echo$todo; ?>">
<?php endforeach; ?>
<label>ToDo:</label>
<input type="hidden" name="modifiedtodoid" value="<?php  echo $todo_index; ?>">
<input type="text" name="modifiedtodo" value="<?php echo $todo_to_modify; ?>"><br>
<label>&nbsp;</label>
<input type="submit" name="action" value="Save Changes">
 <input type="submit" name="action" value="Cancel Changes">
 </form>
 <?php endif; ?>
 </main>
 </body>
 </html>
