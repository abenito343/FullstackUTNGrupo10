function downloadPdf(id, fecha, total) {
    var nombre_archivo = 'Detalle factura ' + id;
    console.log(fecha);
    var fecha_venta = 'Fecha: ' + fecha;

    var docDefinition = {
        language: "es",
        styles: {
            tipoFactura: {
                fontSize: 50,
                color: 'black',
                margin: [0, 10]
            },
            seccion: {
                margin: [0, 10]
            },
		    tableHeader: {
                background: 'whitesmoke',
                fontSize: 13,
                color: 'black',
                margin: [0, 10]
		    }
        },
        content: [
            {
                style: 'tipoFactura',
                table: {
                    widths: ['*', 'auto', '*'],
                    body: [
                        [' ', {text: 'B', alignment: 'center', fillColor: 'whitesmoke'}, ' ']
                    ]
			    },
                layout: 'noBorders'
            },
            {
                style: 'seccion',
                table: {
                    widths: ['*', 'auto'],
                    body: [
                        ['Dirección: Calle Falsa 123, Ciudad, País, CP:1234', fecha_venta],    
                        ['Correo electrónico: contacto@empresa.com', 'CUIT Empresa'],
                        ['Teléfono: +123 456 7890', 'Razon social Empresa'],
                        ['IVA RESPONSABLE INSCRIPTO', 'Otros datos Empresa']
                    ]
			    },
                layout: 'noBorders'
            },
            {
                style: 'seccion',
                table: {
                    headerRows: 1,
                    widths: ['*', 'auto'],
                    body: [
                        ['Informacion del cliente', 'Informacion de la venta'],
                        ['Cliente: nombre cliente', 'Condicion de venta: contado'],
                        ['Direccion: direccion cliente', 'Tipo: productos'],
                        ['DNI: DNI cliente', 'Nro factura: 1'],
                        ['Email: email cliente',''],
                        ['condicion: Consumidor Final','']
                    ]
                },
                layout: 'headerLineOnly'
            },
            'Conceptos de la venta',
            {
                style: 'seccion',
                table: {
                    headerRows: 1,
                    widths: ['*', '*', '*', '*', '*'],
                    body: [
                        ['Codigo', 'Nombre', 'Cantidad', 'Precio unitario', 'Subtotal'],
                        ['1', 'nom', '2', '$25', '$50'],
                        ['', '', '', 'TOTAL', '$'+total]
                    ]
                },
                layout: {
                    fillColor: 'whitesmoke'
                }
            }
		]
    };

    pdfMake.createPdf(docDefinition).download(nombre_archivo);
}