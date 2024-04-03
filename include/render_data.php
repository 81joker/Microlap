<?php

function render_data()
{
  require('config/config.php');
  $sql_return = "SELECT * FROM `Kalender` ORDER BY id DESC";
  $result_data = mysqli_query($db, $sql_return);
  if ($result_data) {
    while ($row = mysqli_fetch_assoc($result_data)) {
      echo '<tr class="row_' . $row['id'] . '">
             <td>' . $row['dattag'] . '.' . $row['datum'] . '</td>
             <td>' . $row['description'] . '</td>
             <td>' . $row['erinnerung'] . '</td>
             <td><a href="update_data.php?month=' . $row['datum'] . '&day=' . $row['dattag'] . '&year=' . $row['datyear'] . '&desc=' . $row['description'] .
        '&tag=' . $row['erinnerung'] . '&rowid=' . $row['id'] .  '" data-id="' .
        $row['id'] . '" data-row="row_' . $row['id'] . '" class="btn btn-default shadow-none fixed100">bearbeiten</a>
             <button onclick="deleteDataFunction(event)" data-id="' . $row['id'] . '" class="btn btn-default shadow-none fixed100">löschen</button>
            </td>
         </tr>';
    };
  }
};
