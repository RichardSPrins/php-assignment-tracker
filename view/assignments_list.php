<?php include('header.php') ?>
<section id="list" class="list">
  <header class="list__row list__header">
    <h1>Assignments</h1>
    <form action="." method="get" id="list__header_select" class="list__header_select">
      <input type="hidden" name="action" value="list_assignments" />
      <select required name="course_id">
        <option value="0">View All</option>
        <?php foreach ($courses as $course) : ?>
          <?php if ($course_id == $course['courseID']) { ?>
            <option value="<?= $course['courseID'] ?>" selected>
            <?php } else { ?>
            <option value="<?= $course['courseID'] ?>">
            <?php } ?>
            <?= $course["course_name"] ?>
            </option>
          <?php endforeach; ?>
      </select>
      <button class="add-button bold">Go</button>
    </form>
  </header>
  <?php if ($assignments) { ?>
    <?php foreach ($asssignments as $assignment) : ?>
      <div class="list__row">
        <div class="list__item">
          <p class="bold"><?= $assignment['course_name'] ?></p>
          <p><?= $assignment['Description'] ?></p>
        </div>
        <div class="list__removeItem">
          <form action="." method="post">
            <input type="hidden" name="action" value="delete_assignment" />
            <input type="hidden" name="assignment_id" value="<?= $assignment["ID"] ?>" />
            <button class="remove_button">✖</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  <?php } else { ?>
    <br>
    <?php if ($course_id) { ?>
      <p>No assignments exist for this course yet.</p>
    <?php } else { ?>
      <p>No assignments exist yet.</p>
    <?php } ?>
    <br>
  <?php } ?>
</section>
<?php include('footer.php') ?>