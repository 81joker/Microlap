<?php
session_start();
ob_start();
require_once('config/config.php');
include('include/herlFull.php');

if (!is_logged_in()) {
    login_error_redirect();
}
?>
<div class="alert_messagediv alert alert-success fade hide">
    <span class="alert_messagetext"></span>
    <button class="close closebtnalert" type="button">&times;</button>
</div>
<div class="border-black">
    <form action="include/crud_action.php" id="saveForm" method="post" class="row g-3 needs-validation p-2" novalidate>
        <input type="hidden" name="_token" value="generated_csrf_token_here">
        <div class="col-md-3">
            <label for="datum" class="form-label">datum(TT/MM/YYYY)</label><br />
            <div class="block">
                <input type="text" min="1" max="31" id="dattag" name="dattag" class="form-control" style="width:60px;display:inline-block;" placeholder="DD" required />
                <input type="text" min="1" max="12" id="datmonat" name="datmonat" class="form-control" style="width:60px;display:inline-block;" placeholder="MM" required />
                <input type="text" min="2024" max="2100" id="datyear" name="datyear" class="form-control" style="width:60px;display:inline-block;" placeholder="YYYY" required />
            </div>
            <div id="error_day" class="text-danger"></div>
            <div id="error_month" class="text-danger"></div>
            <div id="error_year" class="text-danger"></div>
        </div>
        <div class="col-md-4 mx-md-3">
            <label for="desc" class="form-label">Bezeeichung</label>
            <input type="text" class="form-control" id="desc" name="desc" required>
            <div id="error_desc" class="text-danger"></div>
        </div>
        <div class="col-md-4">
            <label for="ernnerung" class="form-label">Ernnerung</label>
            <select id="ernnerung" class="form-control" name="ernnerung" required>
                <option selected value="">-bitte auswählen-</option>
                <option value="1 Tag">1_Tag</option>
                <option value="2 Tag">2_Tag</option>
                <option value="3 Tag">3_Tag</option>
                <option value="1 Woche">1_Woche</option>
                <option value="2 Woche">2_Woche</option>
            </select>
            <span id="error_ernnerung" class="text-danger"></span>
        </div>
        <div class="col-12">
            <button class="btn border-0  btn-outline-dark float-right mb-1 mt-0" type="submit">SPEICHERN</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#saveForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Validate the form manually
            var descInput = $('#desc');
            var datmonatInput = $('#datmonat');
            var dattagInput = $('#dattag');
            var datyearInput = $('#datyear');
            var ernnerungInput = $('#ernnerung');

            var errorDay = $('#error_day');
            var errorMonth = $('#error_month');
            var errorYear = $('#error_year');
            var errorDesc = $('#error_desc');
            var errorErnnerung = $('#error_ernnerung');

            if (!descInput.val()) {
                errorDesc.text('Description is required.');
                descInput.addClass('is-invalid');
            } else {
                errorDesc.text('');
                descInput.removeClass('is-invalid');
            }
            if (!datmonatInput.val()) {
                errorMonth.text('Monthe is required.');
                datmonatInput.addClass('is-invalid');
            } else {
                errorMonth.text('');
                datmonatInput.removeClass('is-invalid');
            }

            if (!dattagInput.val()) {
                errorDay.text('Day is required.');
                dattagInput.addClass('is-invalid');
            } else {
                errorDay.text('');
                dattagInput.removeClass('is-invalid');
            }

            if (!datyearInput.val()) {
                errorYear.text('Year is required.');
                datyearInput.addClass('is-invalid');
            } else {
                errorYear.text('');
                datyearInput.removeClass('is-invalid');
            }
            if (!ernnerungInput.val()) {
                errorErnnerung.text('Ernnerung is required.');
                ernnerungInput.addClass('is-invalid');
            } else {
                errorErnnerung.text('');
                ernnerungInput.removeClass('is-invalid');
            }
        });
    });
</script>
<?php
echo ob_get_clean();
?>