<?php
    require_once('db-mysqli.php');
    
    $request = $_REQUEST;

    $medico = isset($request['m']);
    $id_usuario = $medico? (int) $request['m']: (isset($request['s'])? (int) $request['s'] : 0);
    
    $id_cita = isset($request['c'])? (int) $request['c']:0;
    
    $baseLink = '?'.($medico? 'm':'s').'='.$id_usuario;
    
    //usuarioTitulo
    $usuarioTitulo = 'Bienvenido(a) '.usuario_get($id_usuario, $medico);
    
    $citaCurrent = ['titulo' => 'Cita'];
    
    //citaList
    $citaListResult = cita_list_get($medico, $id_usuario);
    $citaList = [];
    while($cita = $citaListResult->fetch_assoc()){
        $fecha = new DateTime($cita['fecha'].' '.$cita['hora']);
        $fecha = $fecha->format('d/m/Y g:i A');
        $link = $baseLink.'&c='.$cita['id_cita'];
        $active = ($id_cita == $cita['id_cita'])? ' active':'';
        $paciente = $cita['apellidos'].', '.$cita['nombre'];
        $titulo = $fecha.' - '.$paciente;
        $citaList[] = '<button class="list-group-item list-group-item-action list-group-item-secondary'.$active.'" onclick="location.href=\''.$link.'\';">'.$titulo.'</button>';
        
        $cita['titulo'] = $titulo;
        $cita['paciente'] = $paciente;
        $cita['fechahora'] = $fecha;
        if($active) $citaCurrent = $cita;
    }
    $citaList = '<ul class="list-group">'.implode('', $citaList).'</ul>';
    
    function citaGet($field){
        global $citaCurrent;        
        return isset($citaCurrent[$field])? $citaCurrent[$field]:'';
    }
        
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Clínica Médica ASI</title>
        
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/historia.css?sd=fdr">
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="js/historia.js"></script>

    </head>
    <body>
        
        <div class="container-fluid bg-light">
            <div class="row">
                <div id="usuarioTitulo" class="col">
                    <div class="card text-white bg-dark mb-3">
                        <h3 class="card-header"><?= $usuarioTitulo ?></h3>
                    </div>                    
                </div>
            </div>
            <div class="row">
                <div id="citaListBox" class="col-sm-4">
                    <div class="card text-white bg-secondary mb-3">
                        <h5 class="card-header">Citas</h5>
                        <div class="card-body">
                            <?= $citaList ?>
                        </div>                    
                    </div>
                </div>
                <div id="citaBox" class="col-sm-8">             
                    <div class="card text-white bg-info mb-3">
                        <h5 class="card-header"><?= citaGet('titulo') ?></h5>
                        <div class="card-body">                       
                            <form>
                              <div class="form-group">
                                <label for="id_cita">ID</label>
                                <input type="text" class="form-control" id="id_cita" disabled="true" value="<?= citaGet('id_cita') ?>">
                              </div>
                              <div class="form-group">
                                <label for="fechahora">Fecha</label>
                                <input type="text" class="form-control" id="fechahora" disabled="true" value="<?= citaGet('fechahora') ?>">
                              </div>
                              <div class="form-group">
                                <label for="paciente">Paciente</label>
                                <input type="text" class="form-control" id="paciente" disabled="true" value="<?= citaGet('paciente') ?>">
                              </div>
                            </form>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        
        <?= '';/*$contenido*/ ?>
        
    </body>
    
</html>