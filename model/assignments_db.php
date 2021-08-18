<?php

  // READ All Assignments

  function get_assignments_by_course ($course_id) {
    global $db;
    if($course_id){
      $query = 'SELECT A.ID, A.Description, C.course_name from assignments A LEFT JOIN courses C ON A.courseID=C.courseID WHERE A.courseID = :course_id ORDER BY ID';
      $statement = $db->prepare($query);
      $statement->bindValue(':course_id', $course_id, PDO::PARAM_STR);

    } else {
      $query = 'SELECT A.ID, A.Description, C.course_name from assignments A LEFT JOIN courses C ON A.courseID=C.courseID ORDER BY C.courseID';
      $statement = $db->prepare($query);
    };
    $statement->execute();
    $assignments = $statement->fetchAll();
    $statement->closeCursor();
    return $assignments;
  }

  // CREATE New Assignment

  function create_new_assignment ($course_id, $description) {
    global $db;
    $query = 'INSERT INTO assignments (Description, courseID) VALUES(:descr, :courseID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':descr', $description);
    $statement->bindValue(':courseID', $course_id);
    $statement->execute();
    $statement->closeCursor();
  }

  // DELETE Assignment by ID

  function delete_assignment ($assignment_id) {
    global $db;
    $query = 'DELETE FROM assignments WHERE ID = :assignment_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':assignment_id', $assignment_id);
    $statement->execute();
    $statement->closeCursor();
  }