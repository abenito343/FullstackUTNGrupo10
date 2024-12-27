
function convertirTablaACSV(filename) {
    let csv_data = [];
    
    let filas = document.getElementsByTagName('tr');
    for (let i = 0; i < filas.length; i++) {

        let cols = filas[i].querySelectorAll('td,th');

        let csvrow = [];
        for (let j = 0; j < cols.length-2; j++) {
            csvrow.push(cols[j].innerHTML);
        }

        csv_data.push(csvrow.join(";"));
    }
    csv_data = csv_data.join('\n');
    descargarCSV(csv_data, filename);
}

function convertirUsuariosACSV() {
    let csv_data = [];
    
    let filas = document.getElementsByTagName('tr');
    for (let i = 0; i < filas.length; i++) {

        let cols = filas[i].querySelectorAll('td,th');

        let csvrow = [];
        for (let j = 0; j < cols.length-3; j++) {
            csvrow.push(cols[j].innerHTML);
        }

        csv_data.push(csvrow.join(";"));
    }
    csv_data = csv_data.join('\n');
    descargarCSV(csv_data, "usuarios.csv");
}

function convertirVentasACSV() {
    let csv_data = [];
    
    let filas = document.getElementsByTagName('tr');
    for (let i = 0; i < filas.length; i++) {

        let cols = filas[i].querySelectorAll('td,th');

        let csvrow = [];
        for (let j = 1; j < cols.length-2; j++) {
            csvrow.push(cols[j].innerHTML);
        }

        csv_data.push(csvrow.join(";"));
    }
    csv_data = csv_data.join('\n');
    descargarCSV(csv_data, "ventas.csv");
}

function descargarCSV(csv_data, filename) {
    let bom = "\uFEFF";
    let CSVFile = new Blob([bom + csv_data], {type: "text/csv;charset=utf-8;"});

    let temp_link = document.createElement('a');
    let url = URL.createObjectURL(CSVFile);
    
    temp_link.setAttribute("href", url);
    temp_link.setAttribute("download", filename);

    temp_link.style.display = "none";
    document.body.appendChild(temp_link);

    temp_link.click();
    document.body.removeChild(temp_link);
}