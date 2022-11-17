function edit_row(no)
{
    var first_name=document.getElementById("first_name"+no);
    var last_name=document.getElementById("last_name"+no);
    var email=document.getElementById("Email"+no);
        
    var first_name_data=first_name.innerHTML;
    var last_name_data=last_name.innerHTML;
    var Email_data=email.innerHTML;
    
    first_name.innerHTML=`<input type='text' id='first_name_text${no}' value='${first_name_data}'>`;
    last_name.innerHTML=`<input type='text' id='last_name_text${no}' value='${last_name_data}'>`;
    email.innerHTML=`<input type='text' id='Email_text${no}' value='${Email_data}'>`;

    document.getElementById("edit_button"+no).disabled = true;
}

function save_row(no)
{
    var first_name_val=document.getElementById("first_name_text"+no).value;
    var last_name_val=document.getElementById("last_name_text"+no).value;
    var Email_val=document.getElementById("Email_text"+no).value;

    if (!validEmail(Email_val)) {
        UI.showAlert('Invalid email!','danger')
    } else {
        document.getElementById("first_name"+no).innerHTML=first_name_val;
        document.getElementById("last_name"+no).innerHTML=last_name_val;
        document.getElementById("Email"+no).innerHTML=Email_val;

        document.getElementById("edit_button"+no).disabled = false;
    }
}

function delete_row(no)
{
    document.getElementById(`row${no}`).outerHTML="";
}

function add_row()
{
    var new_first_name=document.getElementById("new_first_name").value;
    var new_last_name=document.getElementById("new_last_name").value;
    var new_Email=document.getElementById("new_Email").value;

    // Validate
    if (new_first_name === '' || new_last_name === '' || new_Email === ''){
        document.getElementById("add_button").disabled = true;
        UI.showAlert('Please fill in all fields','danger')

        setTimeout(() => document.getElementById("add_button").disabled = false, 3000)
    } 
    else if (!validEmail(new_Email)) {
        document.getElementById("add_button").disabled = true;
        UI.showAlert('Invalid email!','danger')

        setTimeout(() => document.getElementById("add_button").disabled = false, 3000)
        
    }
    else {
        var table=document.getElementById("data_table");
        var table_len=(table.rows.length)-1;
        table.insertRow(table_len).outerHTML=`
            <tr id='row${table_len}'>
                <td id='first_name${table_len}'>${new_first_name}</td>
                <td id='last_name${table_len}'>${new_last_name}</td>
                <td id='Email${table_len}'>${new_Email}</td>
                <td class='updates'>
                    <input type='button' id='edit_button${table_len}' value='Edit' class='btn btn-primary' onclick='edit_row(${table_len})' onmouseup="this.blur()"> 
                    <input type='button' id='save_button${table_len}' value='Save' class='btn btn-primary' onclick='save_row(${table_len})' onmouseup="this.blur()"> 
                    <input type='button' value='Delete' class='btn btn-primary' onclick='delete_row(${table_len})' onmouseup="this.blur()">
                </td>
            </tr>`;


        document.getElementById("new_first_name").value="";
        document.getElementById("new_last_name").value="";
        document.getElementById("new_Email").value="";

        document.getElementById("add_button").disabled = false;
    }
	

}

// Validates email address of course.
function validEmail(e) {
    var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
    return String(e).search (filter) != -1;
}

// UI Class: Handle UI Tasks
class UI {

    static showAlert(message, className){
        const div = document.createElement('div');
        div.className = `alert alert-${className}`;
        div.appendChild(document.createTextNode(message));
        const container = document.querySelector('.container');
        const form = document.querySelector('#user-form');
        container.insertBefore(div, form);

        // Vanish in 3 seconds
        setTimeout(() => document.querySelector('.alert').remove(), 3000)

    }
}