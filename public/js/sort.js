let flag = "dsc";

function sortTable(sTableID) {
    var Table = document.getElementById('tabela');
    var Body = Table.tBodies[0];
    var colDataRows = Body.rows;
    var a = new Array;

    for (var i = 0; i < colDataRows.length; i++) {
        a[i] = colDataRows[i];
    }
    if (flag == "dsc") {
        a.sort(function (a, b) {
            return a - b
        });
        flag = "asc";
    } else {
        a.sort(function (a, b) {
            return b - a
        });
        flag = "dsc";
    }


    var pom = document.createDocumentFragment();
    for (var i = 0; i < a.length; i++) {
        pom.appendChild(a[i]);
    }

    Body.appendChild(pom);

}
