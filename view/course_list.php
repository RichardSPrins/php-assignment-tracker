<?php include('header.php') ?>

<?php if ($courses) { ?>
  <section id="list" class="list">
    <header class="px-2 bg-primary list__row list__header">
      <h1 class="fw-bold text-white">Course List</h1>
    </header>
    <?php foreach ($courses as $course) : ?>
      <div class=" border-bottom border-dark d-flex p-2 justify-content-between align-items-center list__row">
        <div class="list__item">
          <p class="bold"><?= $course['course_name'] ?></p>
        </div>
        <div class="list__removeItem">
          <form action="." method="post">
                <input type="hidden" name="action" value="delete_course">
                <input type="hidden" name="course_id" value="<?= $course['courseID']; ?>">
                <button class="btn btn-light remove-button">❌</button>
            </form>
        </div>
      </div>
    <?php endforeach ?>
  </section>
<?php } else { ?>
  <p>No courses exist yet</p>
<?php } ?>

<section class="px-2 add" id="add">
  <h2 class="fw-bold text-warning">Add Course</h2>
  <form action="." method="post" id="add__form" class="add__form"> 
    <input type="hidden" name="action" value="add_course">
    <div class="add__inputs">
      <label class="d-none">Name:</label>
      <input style="width: 100%" type="text" name="course_name" maxlength="50" placeholder="Name" autofocus required>
    </div>
    <div class="add__addItem">
      <button style="width: 100%" class="mt-2 btn btn-primary btn-sm add-button bold">Add</button>
    </div>
  </form> 
</section>
<br>
<p style="text-align: center"><a href=".">View &amp; Add Assignments</a></p>
<?php include('footer.php') ?>