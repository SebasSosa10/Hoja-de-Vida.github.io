<?php
include('conexion.php');

$entidad = $_GET['entidad'] ?? null;
$numeroDocumento = $_GET['numeroDocumento'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoEducacion = $_POST['tipoEducacion'] ?? '';
    $titulo = $_POST['nombreTitulo'] ?? '';
    $mesEducacionBasica = $_POST['mesTitulo'] ?? '';
    $anioEducacionBasica = $_POST['anioTitulo'] ?? '';
    $modalidad = $_POST['modalidad'] ?? '';
    $numeroSemestre = $_POST['semestre'] ?? '';
    $graduado = $_POST['graduado'] ?? '';
    $nombreEstudio = $_POST['nombreEstudios'] ?? '';
    $mesEducacionSuperior = $_POST['mesEstudio'] ?? '';
    $anioEducacionSuperior = $_POST['anioEstudio'] ?? '';
    $tarjetaProfesional = $_POST['numeroTarjeta'] ?? '';
    $idioma = $_POST['idioma'] ?? '';
    $loHabla = $_POST['loHabla'] ?? '';
    $loLee = $_POST['loLee'] ?? '';
    $loEscribe = $_POST['loEscribe'] ?? '';

    $sql = "INSERT INTO formacion_academica (
                tipoEducacion, titulo, mesEducacionBasica, anioEducacionBasica, modalidad, numeroSemestre, 
                graduado, nombreEstudio, mesEducacionSuperior, anioEducacionSuperior, tarjetaProfesional, 
                idioma, loHabla, loLee, loEscribe, idPersona
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "ssssssssssssssss",
            $tipoEducacion,
            $titulo,
            $mesEducacionBasica,
            $anioEducacionBasica,
            $modalidad,
            $numeroSemestre,
            $graduado,
            $nombreEstudio,
            $mesEducacionSuperior,
            $anioEducacionSuperior,
            $tarjetaProfesional,
            $idioma,
            $loHabla,
            $loLee,
            $loEscribe,
            $numeroDocumento
        );

        if ($stmt->execute()) {
            header("Location: Experiencia_Laboral.php?entidad=" . urlencode($entidad) . "&numeroDocumento=" . urlencode($numeroDocumento));
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error al guardar los datos: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Error en la preparación de la consulta: " . $conn->error . "</div>";
    }
}

$conn->close();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hoja de vida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Stile.css">
    <script src="JavaScrpit/javaScript2.js" defer></script>
</head>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-3">
                <img class="img-responsive" src="imagen/logo.jpeg" width="200">
            </div>
            <div class="col-sm-4">
                <p align="center">
                    FORMATO UNICO
                </p>
                <h1 align="center">
                    HOJA DE VIDA
                </h1>
                <p align="center">
                    Persona Natural
                </p>
                <p align="center">
                    (Leyes 190 de 1995, 489 y 443 de 1998)
                </p>
            </div>
            <div class="col-sm-3">
                <label for="comment">ENTIDAD RECEPTORA:</label>
                <input type="text" class="form-control" id="entiti">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="bannermenu">
                <a href="index.php" class="menu">Datos Personales</a>
                <a href="Formacion_Academica.php" class="menu">Formacion Academica</a>
                <a href="Experiencia_Laboral.php" class="menu">Experiencia Laboral</a>
                <a href="Tiempo_Total_De_Experiencia.php" class="menu">Tiempo Total De Experiencia</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-5">
                <h3>
                    2. FORMACION ACADEMICA
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="text2">
                    <h5>
                        EDUCACIÓN BÁSICA Y MEDIA
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11">
                <div class="text2">
                    <p>
                        MARQUE CON UNA X EL ÚLTIMO GRADO APROBADO ( LOS GRADOS DE 1° A 6° DE BACHILLERATO EQUIVALEN A
                        LOS
                        GRADOS 6° A 11° DE
                        EDUCACIÓN BÁSICA SECUNDARIA Y MEDIA )
                    </p>
                </div>
            </div>
        </div>
        <form method="POST"
            action="Formacion_Academica.php?entidad=<?php echo urlencode($entidad); ?>&numeroDocumento=<?php echo urlencode($numeroDocumento); ?>">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="text2">
                        <h5>
                            EDUCACIÓN BÁSICA
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-1"></div>
                <div class="col-sm-3 text-center">
                    <h6>PRIMARIA</h6>
                    <div>
                        <label class="radio-inline"><input type="radio" name="tipoEducacion">1</label>
                        <label class="radio-inline"><input type="radio" name="tipoEducacion">2</label>
                        <label class="radio-inline"><input type="radio" name="tipoEducacion">3</label>
                        <label class="radio-inline"><input type="radio" name="tipoEducacion">4</label>
                        <label class="radio-inline"><input type="radio" name="tipoEducacion">5</label>
                    </div>
                </div>
                <div class="col-sm-3 text-center">
                    <h6>SECUNDARIA</h6>
                    <div>
                        <label class="radio-inline"><input type="radio" name="tipoEducacion">6</label>
                        <label class="radio-inline"><input type="radio" name="tipoEducacion">7</label>
                        <label class="radio-inline"><input type="radio" name="tipoEducacion">8</label>
                        <label class="radio-inline"><input type="radio" name="tipoEducacion">9</label>
                    </div>
                </div>
                <div class="col-sm-3 text-center">
                    <h6>MEDIA</h6>
                    <div>
                        <label class="radio-inline"><input type="radio" name="tipoEducacion"
                                id="tipoEducacion">10</label>
                        <label class="radio-inline"><input type="radio" name="tipoEducacion"
                                id="tipoEducacion">11</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="usr">TÍTULO OBTENIDO:</label>
                        <input type="text" class="form-control" id="nombreTitulo" name="nombreTitulo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <label for="mesTitulo">MES:</label>
                    <select class="form-control" id="mesTitulo" name="mesTitulo">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="anioTitulo">AÑO:</label>
                    <select class="form-control" id="anioTitulo" name="anioTitulo">
                        <option value="" disabled selected>Selecciona</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="text2">
                        <h5>
                            EDUCACION SUPERIOR (PREGRADO Y POSTGRADO)
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="text2">
                        <p>
                            DILIGENCIE ESTE PUNTO EN ESTRICTO ORDEN CRONOLÓGICO, EN MODALIDAD ACADÉMICA ESCRIBA:
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="text2">
                        <p>
                            <strong>TC</strong> (TÉCNICA), <strong>TL</strong> (TECNOLÓGICA), <strong>TE</strong>
                            (TECNOLÓGICA ESPECIALIZADA), <strong>UN</strong> (UNIVERSITARIA),
                            <strong>ES</strong> (ESPECIALIZACIÓN), <strong>MG</strong> (MAESTRÍA O MAGISTER),
                            <strong>DOC</strong> (DOCTORADO O PHD),
                            RELACIONE AL FRENTE EL NÚMERO DE LA TARJETA PROFESIONAL (SI ÉSTA HA SIDO PREVISTA EN UNA
                            LEY).
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="formatodate">
                        <div class="date">
                            <div class="col-xs-2">
                                <label for="modalidad" style="margin-right: 5px;">MODALIDAD ACADÉMICA</label>
                                <select class="form-control" id="modalidad" name="modalidad">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="tecnica">TC</option>
                                    <option value="tecnologico">TL</option>
                                    <option value="tecnologico expecial">TE</option>
                                    <option value="universitario">UN</option>
                                    <option value="especializacion">ES</option>
                                    <option value="maestria">MG</option>
                                    <option value="doctorado">DOC</option>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <label for="semestre" style="margin-right: 5px;">No.SEMESTRES APROBADOS</label>
                                <select class="form-control" id="semestre" name="semestre">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <label for="graduado" style="margin-right: 5px;">GRADUADO</label>
                                <select class="form-control" id="graduado" name="graduado">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="nombreEstudios"> NOMBRE DE LOS ESTUDIOS O TÍTULO OBTENIDO:</label>
                        <input type="text" class="form-control" id="nombreEstudios" name="nombreEstudios">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <label for="mesEstudio">MES:</label>
                    <select class="form-control" id="mesEstudio" name="mesEstudio">
                        <option value="" disabled selected>Selecciona</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="anioEstudio">AÑO:</label>
                    <select class="form-control" id="anioEstudio" name="anioEstudio">
                        <option value="" disabled selected>Selecciona</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="numeroTarjeta">No. DE TARJETA PROFESIONAL:</label>
                        <input type="text" class="form-control" id="numeroTarjeta" name="numeroTarjeta"
                            oninput="validarSoloNumeros(this)">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="text2">
                        <label for="usr"> ESPECÍFIQUE LOS IDIOMAS DIFERENTES AL ESPAÑOL QUE: HABLA, LEE, ESCRIBE DE
                            FORMA,
                            REGULAR <strong>(R)</strong>, BIEN <strong>(B)</strong> O MUY BIEN
                            <strong>(MB)</strong></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <label for="idioma">IDIOMA</label>
                        <input type="text" class="form-control" id="idioma" name="idioma">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-11">
                    <div class="formatodate">
                        <label for="fecha"
                            style="margin-right: 10px; margin-top: 10px;"><strong>TERMINACION:</strong></label>
                        <div class="date">
                            <div class="col-xs-2">
                                <label for="loHabla" style="margin-right: 5px; text-align: center;">LO HABLA:</label>
                                <select class="form-control" id="loHabla" name="loHabla">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="REGULAR">R</option>
                                    <option value="BIEN">B</option>
                                    <option value="MUY BIEN">MB</option>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <label for="loLee" style="margin-right: 5px; text-align: center;">LO LEE:</label>
                                <select class="form-control" id="loLee" name="loLee">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="REGULAR">R</option>
                                    <option value="BIEN">B</option>
                                    <option value="MUY BIEN">MB</option>
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <label for="loEscribe" style="margin-right: 5px; text-align: center;"> LO
                                    ESCRIBE:</label>
                                <select class="form-control" id="loEscribe" name="loEscribe">
                                    <option value="" disabled selected>Selecciona</option>
                                    <option value="REGULAR">R</option>
                                    <option value="BIEN">B</option>
                                    <option value="MUY BIEN">MB</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="entidad" value="<?php echo htmlspecialchars($entidad); ?>">
            <input type="hidden" name="numeroDocumento" value="<?php echo htmlspecialchars($numeroDocumento); ?>">
            <div class="row mt-4">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Siguiente</button>
                </div>
            </div>
        </form>
        <script>
            function validarSoloNumeros(input) {
                input.value = input.value.replace(/[^0-9]/g, '');
            }
        </script>
    </div>
</body>

</html>