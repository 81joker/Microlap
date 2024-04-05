<!-- Show The Info -->
<div class=" mt-2 border-black table-responsive ">
    <table class="table table-borderless table-hover" id="displaytable">
        <thead>
            <tr>
                <th scope="col">Datum</th>
                <th scope="col">Bezeichung</th>
                <th scope="col">Erinnerung</th>
                <th scope="col">Aktion</th>
            </tr>
        </thead>
        <tbody id="data_insert">
            <?php include('include/render_data.php');
            render_data();  ?>
        </tbody>
    </table>
</div>
</div>
<div class="col-md-3 bg-black"></div>
</div>