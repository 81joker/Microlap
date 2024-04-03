<?php
session_start();
ob_start();
require_once('config/config.php');
include('include/header.php');
include('include/herlFull.php');

if (!is_logged_in()) {
  login_error_redirect();
}


function showId()
{
  if (isset($_GET['rowid'])) {
    echo $_GET['rowid'];
  } else {
    echo '';
  }
};

function showDay()
{
  if (isset($_GET['day'])) {
    echo $_GET['day'];
  } else {
    echo '';
  }
};

function showMonth()
{
  if (isset($_GET['month'])) {
    echo $_GET['month'];
  } else {
    echo '';
  }
};

function showYear()
{
  if (isset($_GET['year'])) {
    echo $_GET['year'];
  } else {
    echo '';
  }
};


function showDes()
{
  if (isset($_GET['desc'])) {
    echo $_GET['desc'];
  } else {
    echo '';
  }
};


function showTag($option)
{
  if (isset($_GET['tag'])) {

    if ($option == $_GET['tag']) {
      echo "selected";
    };
  };
};
?>
<div class="alert_messagediv alert alert-success fade hide">
  <span class="alert_messagetext"></span>
  <button class="close closebtnalert" type="button">&times;</button>
</div>
<div class="border border-dark">
  <form action="include/crud_action.php" id="editForm" method="post" class="row g-3 needs-validation p-2" novalidate>
    <div class="col-md-3">
      <label for="datum" class="form-label">datum(TT/MM/YYYY)</label><br />
      <div class="block">
        <input style="display:none;" type="hidden" name="rowid" id="rowid" value="<?php showId(); ?>">
        <input type="text" id="edit_dattag" value="<?php showDay(); ?>" name="edit_dattag" class="form-control" style="width:60px;display:inline-block;" placeholder="DD" />
        <input type="text" id="edit_datmonat" value="<?php showMonth(); ?>" name="edit_datmonat" class="form-control" style="width:60px;display:inline-block;" placeholder="MM" />
        <input type="text" id="edit_datyear" value="<?php showYear(); ?>" name="edit_datyear" class="form-control" style="width:60px;display:inline-block;" placeholder="YYYY" />
      </div>
    </div>

    <div class="col-md-4 mx-md-3">
      <label for="edit_desc" class="form-label">Bezeeichung</label>
      <input type="text" class="form-control" id="edit_desc" name="edit_desc" value="<?php showDes(); ?>">

      <!-- <div class="valid-feedback">
            Looks good!
        </div> -->
    </div>
    <div class="col-md-4">
      <label for="edit_ernnerung" class="form-label">Ernnerung</label>
      <select id="edit_ernnerung" class="form-control form-select" name="edit_ernnerung" value="">
        <option selected>-bitte auswählen-</option>
        <option <?php showTag("1 Tag"); ?> value="1 Tag">1_Tag</option>
        <option <?php showTag("2 Tag"); ?> value="2 Tag">2_Tag</option>
        <option <?php showTag("3 Tag"); ?> value="3 Tag">3_Tag</option>
        <option <?php showTag("1 Woche"); ?> value="1 Woche">1_Woche</option>
        <option <?php showTag("2 Woche"); ?> value="2 Woche">2_Woche</option>
      </select>
    </div>
    <div class="col-12">
      <button class="btn border-0  btn-outline-dark float-right mb-1 mt-0" type="submit">SPEICHERN</button>
    </div>
  </form>
</div>
<?php
include('include/footer.php');
echo ob_get_clean();
?>