function lookForNumber(numero, matrix) {

    //le pongo un index a ubication para guardar las coordenadas necesarias, va a sumar por cada
    //coordenada agregada
    let for_ubication_index = 0;

    //arranco el array que va a tener las coordenadas
    let ubication = [];

    //este for significa: por cada clave en la matriz...
    for (let mini_matrix_key in matrix) {

        //guardo el carton que tiene esa clave para usarlo como referencia (a falta del foreach de php...)
        let mini_matrix = matrix[mini_matrix_key];

        //recorro el carton
        for (let i = 0; i < 3; i++) {
            for (let j = 0; j < 9; j++) {

                //si esa posicion tiene ese numero...
                if (mini_matrix[i][j] == numero) {

                    //guarda la coordenada en string
                    ubication[for_ubication_index] = mini_matrix_key + "," + i + "," + j;
                    for_ubication_index++;
                }
            }
        }
    };


    //aca iria todo el algoritmo de comprobar los patrones y eso. paja porque no se las reglas.
    //HACERRRRRRRRR

    //me transforma de coordenadas en string a un numero que se traslada a id
    translateToDOM(ubication);
}

//lo comento asi no me pierdo na
function translateToDOM(coordenadas) {

    //por cada coordenada traida en string
    coordenadas.forEach(coordenada => {
        //la paso a array
        let aux = coordenada.split(",");
        let resultado = 0;
        parseInt(resultado);

        //si el carton era el primero, no sumo nada
        if (aux[0] != "1") {

            //si en cambio era el segundo carton, le sumo 27 del primero
            if (aux[0] == "2") {
                resultado += 27;
            } else {
                //y si ya no es ninguno de esos, multiplico la cantidad de cartones anteriores al actual * 27
                resultado = (aux[0] - 1) * 27;
            }
        }

        //si la fila esta en 0, no pasa na
        switch (aux[1]) {

            //si esta en la segunda fila, le sumo los 9 de la primera fila
            case "1":
                resultado += 9;
                break;

            //si esta en la ultima fila, le sumo los 18 de las anteriores
            case "2":
                resultado += 18;
                break;
        }

        //y finalmente le sumo la columna
        resultado += parseInt(aux[2]);

        console.log(resultado);

    });
}



