<!-- Show The Info -->
<div class="table mt-2" style="border: 2px solid #000;">

    <table class=" table table-borderless" id="displaytable">
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
            <!--
                        <tr>

                            <th>01.01</th>
                            <td class="description_class">Terminhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</td>
                            <td>1 Woche</td>
                            <td><a href="#" class="btn btn-warning shadow-none fixed100">bearbeiten</a>
                              <a href="#" class="btn btn-danger shadow-none fixed100">löschen</a>
                            </td>
                        </tr>
                      -->

        </tbody>
    </table>
</div>
</div>
<div class="col-md-3 bg-black"></div>
</div>