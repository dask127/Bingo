<?php

class CardAlgorithm
{

    function __construct()
    {}

    function createCard()
    {

        $carton = null;
        $anterior = null;

        //arranco el array
        for ($i = 0; $i < 3; $i++) {
            $espacios[$i] = null;
        }

        //nota: el rand hace de tal a tal numero INCLUSIVE
        for ($i = 0; $i <  3; $i++) {

            for ($j = 0; $j < 9; $j++) {

                $retorno = null;

                switch ($j) {
                    case '0':
                        $retorno = rand(1, 9);
                        break;

                    case '1':
                        $retorno = rand(10, 19);
                        break;

                    case '2':
                        $retorno = rand(20, 29);
                        break;

                    case '3':
                        $retorno = rand(30, 39);
                        break;

                    case '4':
                        $retorno = rand(40, 49);
                        break;


                    case '5':
                        $retorno = rand(50, 59);
                        break;


                    case '6':
                        $retorno = rand(60, 69);
                        break;


                    case '7':
                        $retorno = rand(70, 79);
                        break;


                    case '8':
                        $retorno = rand(80, 89);
                        break;
                }

                //si todavia no llego al tope...
                if ($espacios[$i] < 4) {

                    $espacio = rand(0, 1);

                    //si el anterior no era null...(para darle variedad)
                    if ($anterior != null) {

                        if ($espacio == 1) {
                            $espacios[$i]++;
                            $retorno = null;
                        }
                    }
                }
                $anterior = $retorno;

                $carton[$i][$j] = $retorno;
            }
        }

        //pongo los espacios vacios que falten. PUEDE que falte 1 espacio en ocaciones. pero por ahora piola
        //pd: recorro por fila
        for ($i = 0; $i < 3; $i++) {

            //si no cumplio el tope, lo hago hasta que llegue
            if ($espacios[$i] < 4) {
                for ($j = $espacios[$i]; $j < 4; $j++) {

                    $offset = rand(0, 8);

                    //si en el que cae es null, busco otro de vuelta
                    if ($carton[$i][$offset] == null) {

                        $offset = rand(0, 8);

                        //mientras que encuentre un null siga haciendo rand (asi me garantizo que esten los 4)
                        while ($carton[$i][$offset] == null) {
                            $offset = rand(0, 8);
                        }

                        //y bueno, si este tambien era null jodete
                        $carton[$i][$offset] = null;
                    } else $carton[$i][$offset] = null;
                }
            }
        }

        //pa sacar repetidos
        for ($i = 0; $i < 9; $i++) {

            $base = $carton[1][$i];

            if ($carton[2][$i] == $base && $base != null) {
                $carton[2][$i]++;
            }
            if ($carton[0][$i] == $base && $base != null) {
                $carton[0][$i]++;
            }
        }


        $string = null;

        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 9; $j++) {
                $numero = $carton[$i][$j];

                if ($j == 8) {
                    if ($numero == null) {
                        $string .= "null//";
                    } else {
                        $string .= $numero . "//";
                    }
                } else {
                    if ($numero == null) {
                        $string .= "null/";
                    } else {
                        $string .= $numero . "/";
                    }
                }
            }
        }

        return $string;
    }
}
