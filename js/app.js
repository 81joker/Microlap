// global vars
let alertMessage = document.querySelector('.alert_messagediv');
let alertMessageText = document.querySelector('.alert_messagetext');
let alertclose = document.querySelector('.closebtnalert');
let dataTable = document.getElementById('displaytable');

alertclose.addEventListener('click', ()=> {alertMessage.classList.add('hide'); alertMessage.classList.remove('show');} ) ;


function displayMessage(message) {
   alertMessage.classList.add('show');
   alertMessageText.innerText = message;
   // select the message success or falid no repeat
};
// function to delete
function deleteDataFunction(event){
      let targetid = event.target.getAttribute('data-id');

      let parentTbody = event.target.parentElement.parentElement.parentElement;
      $.ajax({
          data: {rowid: targetid},
          type: 'POST',
          url: 'include/remove_date.php',
          success: (data)=> {
               if (data.success){
                  parentTbody.removeChild(event.target.parentElement.parentElement);
                  displayMessage('successfully Deleted');
                }
              else {
                 displayMessage('Element Not Deleted', false);
               };
             },
          error: (data)=> {console.log(data)},
          dataType: 'json'
      });

};

$(document).ready(function() {


    // start function to save the submited data

    $('#saveForm').submit(function() {
        $.ajax({
            data: $(this).serialize(),
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            success: AJAXSuccessSubmitSave,
            error: AJAXErrorSubmitSave,
            dataType: 'json',
            timeout: 3000
        });

        return false;

    });

    function AJAXSuccessSubmitSave(data){
        //alert('congrats we send email successfully' + data.mail);
         console.log(data.dataneeded);
         console.log(data);
         let request_result = data.success;
         if (request_result) {
            let tboadyinsert = document.getElementById("data_insert");
            tboadyinsert.innerHTML = '';
            let updatedData = data.data;
            let fragment = document.createDocumentFragment();
            updatedData.forEach( (item, index)=> {

              let newTr = document.createElement("tr");
              newTr.classList.add(`row_${item.id}`);
              // date td
              let newtd1 = document.createElement("td");
              // description td
              let newtd2 = document.createElement("td");

              // this class will fix description long text if any
              //newtd2.classList.add('description_class');

              // tag td
              let newtd3 = document.createElement("td");

              // update/delete links td
              let newtd4 = document.createElement("td");
              let updateBtn = document.createElement("a");
              let deleteBtn = document.createElement("button");
              updateBtn.classList.add('btn', 'btn-default', 'shadow-none', 'fixed100', 'jsmargin');
              deleteBtn.classList.add('btn', 'btn-default', 'shadow-none', 'fixed100');

              // set update href
              updateBtn.setAttribute('href', `month=${item.month}&day=${item.day}&year=${item.year}&desc=${item.description}&tag=${item.erinnerung}&rowid=${item.id}`);

              // event listener for delete
              deleteBtn.addEventListener('click', deleteDataFunction);

              // add texts
              newtd1.innerText = `${item.day}.${item.month}`;
              newtd2.innerText = `${item.desc}`;
              newtd3.innerText = `${item.erinnerung}`;
              updateBtn.innerText = 'bearbeiten';
              deleteBtn.innerText = 'löschen';

              updateBtn.setAttribute('data-id', item.id);
              updateBtn.setAttribute('data-row', `row_${item.id}`);
              deleteBtn.setAttribute('data-id', item.id);


              //append part
              newtd4.appendChild(updateBtn);
              newtd4.appendChild(deleteBtn);
              newTr.appendChild(newtd1);
              newTr.appendChild(newtd2);
              newTr.appendChild(newtd3);
              newTr.appendChild(newtd4);
              fragment.appendChild(newTr);
            });
        tboadyinsert.appendChild(fragment);
    };


    // send email


    $.ajax({
        data: {
        day: data.dataneeded[0],
        month: data.dataneeded[1],
        description: data.dataneeded[2],
        Erinnerung: data.dataneeded[3],
        fulldate: data.dataneeded[4],
        email:data.dataneeded[5]
      },
        type: 'POST',
        url: 'include/updatedmail.php',
        success: AJAXSuccessEmail,
        error: AJAXErrorEmail,
        dataType: 'json',
    });
   function AJAXSuccessEmail() {
     displayMessage("Mail Sent Successfully");
   };
   function AJAXErrorEmail() {
     displayMessage("We could not sent mail");
   };
  };

    function AJAXErrorSubmitSave(data){
      displayMessage("Could not add the data");
    };


    // end of save

    // edit function

    // start function to save the submited data

    $('#editForm').submit(function() {
        $.ajax({
            data: $(this).serialize(),
            type: $(this).attr('method'),
            url:  $(this).attr('action'),
            success: AJAXSuccessSubmitEdit,
            error: AJAXErrorSubmitEdit,
            dataType: 'json'
        });

        return false;

    });

    function AJAXSuccessSubmitEdit(data){
      displayMessage(data.message);
    }
    function AJAXErrorSubmitEdit(data){
      console.log(data);
    }

    $('#my-form').submit(function() {
        $.ajax({
            data: $(this).serialize(),
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            success: function(data) {
                $('#get_content').html(data);
            }
        });

        return false;

    });


});

var editData = function(id){
    $('#table-container').load('update-form.php')

     $.ajax({
         type: "GET",
         url: "update-data.php",
         data:{"editId":id},
         dataType: "html",
         success: function(data){

           var userData=JSON.parse(data);
           $("input[name='id']").val(userData.id);
           $("input[name='description']").val(userData.description);
           $("input[name='erinnerung']").val(userData.erinnerung);


         }

     });
 };
