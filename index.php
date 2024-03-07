<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>:: Modelo Index ::</title>

        <link href='libs/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
        <script src='libs/jquery/jquery.js' type='text/javascript'></script>
        <script src='libs/bootstrap/js/bootstrap.min.js' type='text/javascript'></script>

    </head>
    <body>
        <div id="app" class="container-fluid">

        <?php
          try {
            
            include_once "TFormUsuarios.php";
            $fmUsuarios = new TFormUsuarios();

            $fmUsuarios->addJS("\r\n"
                . "$(function() { \r\n"
                . "  $('#btnAdicionarUsuario').click(function(){ \r\n"
                . "     alert('Botão Novo Usuário Pressionado.'); \r\n"
                . "  }); \r\n"
                . "  $('#btnConsultarUsuario').click(function(){ \r\n"
                . "     alert('Botão Consultar Pressionado.'); \r\n"
                . "  }); \r\n"
                . "  $('#btnFechar').click(function(){ \r\n"
                . "     alert('Botão Fechar Pressionado.'); \r\n"
                . "  }); \r\n"
                . "}); \r\n");

            $fmUsuarios->prepare();
            $fmUsuarios->open();

          } catch (Exception $e) {
            echo $e->getMessage();
          }

        ?>

        </div>
    </body>
</html>