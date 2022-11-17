function deleted(num) {
    num = num - 1;
    document.getElementById("myTable").deleteRow(num);
}

function confirmDel(num) {

    if (confirm("Are you sure you want to delete the category?")) {
        deleted(num)
    }
}

function resetForm(){
    document.getElementById("form").reset();
}