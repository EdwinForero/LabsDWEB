var x_data = []; // Array para los valores de x
var y_data = []; // Array para los MB recibidos
var y1_data = []; // Array para los MB enviados

var ctx = document.getElementById('myChart').getContext('2d');

var data1 = {
    label: "MB recibidos",
    data: y_data,
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgba(255, 99, 132, 1)',
    borderWidth: 1
};

// Datos del segundo conjunto de datos (línea)
var data2 = {
    label: "MB enviados",
    data: y1_data,
    type: 'line',
    fill: true,
    borderColor: 'rgba(58, 56, 217, 1)',
    backgroundColor: 'rgba(6, 2, 231, 0.2)',    
borderWidth: 1
};

// Configuración del gráfico
var config = {
    type: 'line',
    data: {
        labels: x_data,
        datasets: [data1, data2]
    },
    options: {
        responsive: true,
	scales: {
	        xAxes: [{
			            
		    scaleLabel: {
 	                display: true,
	                labelString: 'Hora'
	            },
		    ticks: {
			min: 0,
			max: 22		    
		    }
	        }],
	        yAxes: [{
	            ticks: {
	                min: 0,
			max: 400,
			stepSize: 40
	            },
	            scaleLabel: {
	                display: true,
	                labelString: 'Megabytes'
	            }
	        }]
	}
    
    }
};

// Crear el gráfico
var myChart = new Chart(document.getElementById('myChart'), config);

// Agregar valores a la gráfica
function updateTX() {
	let xhr = new XMLHttpRequest();
	xhr.open('GET', 'DWEB_tx.txt', true);
	xhr.onreadystatechange = function() {
	  if (xhr.readyState === 4 && xhr.status === 200) {
	    let contenido = xhr.responseText;
	    let lineas = contenido.split('\n');
	    for (let i = 0; i < lineas.length-1; i++) {
	      	let partes = lineas[i].split('-');
	      	let t_tx = partes[0];
	      	let tx = partes[1];
	      	
		y1_data.push(tx)

	      	//console.log('tx ',t_tx, tx);
	    }
	  }
	};
	xhr.send();
  
}
// Agregar valores a la gráfica
function updateRX() {
	let xhr = new XMLHttpRequest();
	xhr.open('GET', 'DWEB_rx.txt', true);
	xhr.onreadystatechange = function() {
	  if (xhr.readyState === 4 && xhr.status === 200) {
	    let contenido = xhr.responseText;
	    let lineas = contenido.split('\n');
	    for (let i = 0; i < lineas.length-1; i++) {
	      	let partes = lineas[i].split('-');
	      	let t_rx = partes[0];
	      	let rx = partes[1];
	      	
		x_data.push(t_rx)
		y_data.push(rx)

	      	//console.log(t_rx, rx);
	    }
	  }
	};
	xhr.send();
  
}


function updateChart(){
	updateRX()
	updateTX()
}

setInterval(updateChart(),5000)

$(document).ready( function() {
	myChart.update()

} )

