<?php
  //verifica sessão, se está logado 
//session_start();
//if (!isset($_SESSION['user'])) //AND (!isset($_SESSION[nome])) ) 
//Header("Location: index.html");

require_once '../conexao.php';
$con = open_conexao(); 
//selectDb(); 
   //recuperar valor passado por get
$id = trim($_REQUEST['idv']);
    //buscar no banco de dados
$rs = mysqli_query($con, "select * from vendas WHERE idv=".$id);

$row = mysqli_fetch_array($rs); 
$cli = $row['cliente']; 
$desc = $row['descricaov'];
$val = $row['valor']; 
$data = $row['datavenda'];
$tipo = $row['tipovenda'];
require_once '../verifica.php';
$usuario= $_SESSION['user'];
$rs5 = mysqli_query($con,"select nome from usuarios where usuario ='$usuario';");
$row5 = mysqli_fetch_array($rs5);
$user = $row5['nome'];
close_conexao($con);

?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema - Nucci</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </head>

  <body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">


  <!-- Navbar Search -->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <div class="input-group">
      
      </div>
    </div>
  </form>

  <!-- Navbar -->
  <ul class="navbar-nav ml-auto ml-md-0">
  <li class="nav-item dropdown no-arrow mx-1">
    
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user-circle fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
    <a class="dropdown-item">Olá <?php echo $user; ?></a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
    </div>
  </li>
</ul>

</nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../clientes/clientes.php">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Clientes</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../estoque/estoque.php">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Estoque</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../os/os.php">
            <i class="fas fa-fw fa-tags"></i>
            <span>Ordens de Serviço</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="vendas.php">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Vendas</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../caixa/caixa.php">
              <i class="fas fa-money-bill-alt"></i>
            <span>Lançamentos</span></a>
        </li>
        <button type="button" class="btn btn-dark" data-toggle="collapse" data-target="#demo">Relatórios</button>
  <div id="demo" class="collapse">
  <hr color=white>
        <li class="nav-item">
          <a class="nav-link" href="../relatorios/rel_clientes.php">
              <i class="fas fa-user-alt"></i>
            <span>Clientes</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../relatorios/rel_estoque.php">
              <i class="fas fa-fw fa-boxes"></i>
            <span>Estoque</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../relatorios/rel_os.php">
              <i class="fas fa-fw fa-tags"></i>
            <span>OS's</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../relatorios/rel_vendas.php">
              <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Vendas</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../relatorios/rel_lanc.php">
              <i class="fas fa-money-bill-alt"></i>
            <span>Lançamentos</span></a>
        </li>
        <hr color=white>
  </div>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
            <a href="vendas.php">Vendas</a>
            </li>
            <li class="breadcrumb-item active">Excluir venda</li>
          </ol>

                      
          <!-- DataTables Example -->
          <form data-toggle="validator" method="post" action="ValRemVend.php">
          <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-shopping-cart"></i>
              Excluir venda</div>
            <div class="card-body">
              <div class="table-responsive">
                  <thead>
         
                  <input type="hidden" name="id"  value="<?php echo $id?>">
                  
                  <div class="col-sm-4">
                      <label>Cliente/Fornecedor</label>
                      <input type="text" class="form-control" name="idDesc" value="<?php echo $cli?>" disabled>
                    </div>
                    <hr>
                    <div class="col-sm-4">
                        <label>Descrição</label>
                        <input type="text" class="form-control" name="idComp" value="<?php echo $desc?>" disabled>
                      </div>
                      <hr>
                      <div class="col-sm-4">
                        <label>Valor</label>
                        <input type="text" class="form-control" name="idVend" value="R$<?php echo $val?>,00" disabled>
                      </div>
                      <hr>
                      <div class="col-sm-4">
                        <label>Data da venda</label>
                        <input type="text" class="form-control" name="idQtd" value="<?php echo $data?>" disabled>
                      </div>
                      <hr>
                      <div class="col-sm-4">
                        <label>Tipo da venda</label>
                        <input type="text" class="form-control" name="idQtd" value="<?php echo $tipo?>" disabled>
                      </div>
                      <br>
                      <input type="submit" class="btn btn-outline-danger" value="Excluir"/>
                    </form>
         
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"> </div>
          </div>

         

        

                    

      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione sim para sair do sistema</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Não</button>
          <a class="btn btn-primary" href="../sair.php">Sim</a>
        </div>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
