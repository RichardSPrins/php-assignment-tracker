<?php


// READ All Courses
  function get_all_courses() {
    global $db;
    $query = 'SELECT * FROM courses ORDER BY courseID';
    $statement = $db->prepare($query);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement ->closeCursor();
    return $courses;
  }

  // READ Fetch Course Name
  function get_course_name ($course_id) {
    if (!$course_id) {
      return "All Courses";
    } 
    global $db;
    $query = 'SELECT * FROM courses WHERE courseID = :courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $course_id);
    $statement->execute();
    $course = $statement->fetch();
    $statement ->closeCursor();
    $course_name = $course['course_name'];
    return $course_name;
  }

  // DELETE Course by ID
  function delete_course ($course_id) {
    global $db;
    $query = 'DELETE FROM courses WHERE courseID = :courseID';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseID', $course_id);
    $statement->execute();
    $statement ->closeCursor();
  }

  // CREATE New Course

  function create_course ($course_name) {
    global $db;
    $query = 'INSERT INTO courses (course_name) VALUES (:course_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':course_name', $course_name);
    $statement->execute();
    $statement ->closeCursor();
  }