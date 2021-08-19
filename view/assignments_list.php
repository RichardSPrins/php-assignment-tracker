<?php include('header.php') ?>
<section style="overflow-y: scroll" id="list" class="list">
  <header class="px-2 bg-primary d-flex flex-column flex-sm-row flex-wrap justify-content-between align-items-center list__row list__header">
    <h1 class="fw-bold text-white">Assignments</h1>
    <form action="." method="get" id="list__header_select" class=" list__header_select">
      <input type="hidden" name="action" value="list_assignments" />
      <select style="width: 100%" required name="course_id">
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
      <button class="btn btn-success btn-sm add-button bold">Go</button>
    </form>
  </header>
  <?php if ($assignments) { ?>
    <?php foreach ($assignments as $assignment) : ?>
      <div class="py-2 bodrer border-bottom border-dark px-2 d-flex justify-content-between align-items-center list__row">
        <div class="list__item">
          <p class="m-0 fw-bold"><?= $assignment['course_name'] ?></p>
          <p class="m-0"><?= $assignment['Description'] ?></p>
        </div>
        <div class="list__removeItem">
          <form action="." method="post">
            <input type="hidden" name="action" value="delete_assignment" />
            <input type="hidden" name="assignment_id" value="<?= $assignment["ID"] ?>" />
            <button class="btn btn-danger btn-sm remove_button">✖</button>
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

<section id="add" class="px-2 add">
  <h2 class="fw-bold text-warning">Add Assignment</h2>
  <form action="." method="post" id="add__form" class="add__form">
    <input type="hidden" name="action" value="add_assignment" />
    <div class="add__inputs">
      <label class="d-none">Course:</label>
      <select style="width: 100%" required name="course_id">
        <option value="">Please Select</option>
        <?php foreach ($courses as $course) : ?>
          <option value="<?= $course['courseID']; ?>">
            <?= $course['course_name'] ?>
          </option>
        <?php endforeach ?>
      </select>
      <label class="d-none">Description:</label>
      <input style="width: 100%" type="text" name="description" maxlength="120" placeholder="Description" required>
    </div>
    <div class="mt-2 add__addItem">
      <button style="width: 100%" class="btn btn-primary btn-sm add-button bold">Add</button>
    </div>
  </form>
</section>
<br>

<p style="text-align: center"><a href=".?action=list_courses">View/Edit Courses</a></p>
<?php include('footer.php') ?>