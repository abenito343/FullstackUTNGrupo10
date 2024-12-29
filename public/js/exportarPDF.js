function downloadPdf(detalles) {
    var head = detalles[0];

    var nombre_archivo = 'Detalle factura ' + head.factura;
    var fecha_venta = 'Fecha: ' + head.fecha;

    var body_conceptos = [
        ['Codigo', 'Nombre', 'Cantidad', 'Precio unitario', 'Subtotal']
    ]

    detalles.forEach(d => {
        let fila = [d.codigo, d.nombre, d.cantidad, '$'+d.precio, '$'+d.subtotal];

        body_conceptos.push(fila);        
    });
    
    body_conceptos.push(['', '', '', 'TOTAL', '$'+head.total]);

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
            tabla: {
                margin: [0, 50],
                alignment: 'center'
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
                        ['DNI: DNI cliente', 'Nro factura: '+head.factura],
                        ['Email: email cliente',''],
                        ['condicion: Consumidor Final','']
                    ]
                },
                layout: 'headerLineOnly'
            },
            'Conceptos de la venta',
            {
                style: 'tabla',
                table: {
                    headerRows: 1,
                    widths: ['*', '*', '*', '*', '*'],
                    body: body_conceptos
                },
                layout: {
                    fillColor: 'whitesmoke'
                }
            }
		]
    };

    pdfMake.createPdf(docDefinition).download(nombre_archivo);
}