let CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
Dropzone.autoDiscover = false;
let myDropzone = new Dropzone(".dropzone", {
    maxFilesize: 500, 
    acceptedFiles: ".jpeg,.jpg,.png,.pdf,.txt,.zip",
    disablePreviews: true,
});
myDropzone.on("sending", function (file, xhr, formData) {
    let table = document.getElementById("tabela");
    let row = table.insertRow(table.rows.length);
    row.setAttribute("id", file.name);
    let cell1 = row.insertCell(0);
    let cell2 = row.insertCell(1);
    let cell3 = row.insertCell(2);
    let cell4 = row.insertCell(3);
    let cell5 = row.insertCell(4);
    const date = new Date(file.lastModified);
    cell1.innerHTML = file.name;
    cell2.innerHTML = file.name.split('.').pop();
    cell3.innerHTML = (file.size / 1024).toFixed(2) + " KB";
    cell4.innerHTML = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
    cell5.innerHTML = '<a href="#" class="btn btn-danger deletebtn">Usuń</a> <a href="download/'+file.name+'" class="btn  btn-primary">Pobierz</a>';
    formData.append("_token", CSRF_TOKEN);
    sortTable("tabela");

});
