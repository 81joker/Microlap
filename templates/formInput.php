<?php
session_start();
ob_start();
require_once('config/config.php');
include('include/herlFull.php');

if (!is_logged_in()) {
    login_error_redirect();
}
?>
<style>
    /* ovrider this class from scss nehad */
    .form-control {
        font-size: 15px !important;
    }
</style>
<div class="alert_messagediv alert alert-success fade hide">
    <span class="alert_messagetext"></span>
    <button class="close closebtnalert" type="button">&times;</button>
</div>
<div class="border-black">
    <form action="include/crud_action.php" id="saveForm" method="post" class="row g-3 needs-validation p-2" novalidate>
        <div class="col-md-3">
            <label for="datum" class="form-label">datum(TT/MM/YYYY)</label><br />
            <div class="block">
                <input type="number" min="1" max="31" id="dattag" name="dattag" class="form-control" style="width:60px;display:inline-block;" placeholder="DD" />
                <input type="number" min="1" max="12" id="datmonat" name="datmonat" class="form-control" style="width:60px;display:inline-block;" placeholder="MM" />
                <input type="number" min="2024" max="2100" id="datyear" name="datyear" class="form-control" style="width:60px;display:inline-block;" placeholder="YYYY" />
            </div>
        </div>

        <div class="col-md-4 mx-md-3">
            <label for="desc" class="form-label">Bezeeichung</label>
            <input type="text" class="form-control" id="desc" name="desc" required>
        </div>
        <div class="col-md-4">
            <label for="ernnerung" class="form-label">Ernnerung</label>
            <select id="ernnerung" class="form-control form-select" name="ernnerung">
                <option selected>-bitte auswählen-</option>
                <option value="1 Tag">1_Tag</option>
                <option value="2 Tag">2_Tag</option>
                <option value="3 Tag">3_Tag</option>
                <option value="1 Woche">1_Woche</option>
                <option value="2 Woche">2_Woche</option>
            </select>
        </div>
        <div class="col-12">
            <button class="btn border-0  btn-outline-dark float-right mb-1 mt-0" type="submit">SPEICHERN</button>
        </div>
    </form>
</div>
<?php
echo ob_get_clean();
?>