<?php
    require_once "db.php";


    $query = $db->prepare("SELECT * FROM `dadosclientes` WHERE id = :id");
    $query->bindParam(":id", $_GET['id']);

    $query->execute();
    if($query->rowCount() == 0){

        die("Erro de leitura de ID");
    }else{

        $data = $query->fetch();
    }

    if(isset($_POST['submit'])){

    
        $nome = htmlentities($_POST['nome']);
        $email = htmlentities($_POST['email']);
        $cpf = htmlentities($_POST['cpf']);
        $telefone = htmlentities($_POST['telefone']);


        $query = $db->prepare("UPDATE `dadosclientes` SET `nome`=:nome,`email`=:email,`cpf`=:cpf,`telefone`=:telefone WHERE id=:id");
        $query->bindParam(":nome", $nome);
        $query->bindParam(":email", $email);
        $query->bindParam(":cpf", $cpf);
        $query->bindParam(":telefone", $telefone);
        $query->bindParam(":id", $_GET['id']);

        $query->execute();

        header("location: index.php");
    }
?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>CRUD</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
</style>

</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2> <b>Gerenciamento de Clientes</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Cadastrar Cliente</span></a>					
					</div>
				</div>
            </div>
              
			<table class="table table-striped table-hover">
		
           <form method="post">
               				<tbody>
					<tr>
                    <div class="modal-body">		    
                    <div class="form-group">
						<label style="margin-right: 24px;">ID </label>
						<input required type="text" name="id"  class="form-control"  placeholder="ID" value="<?php echo $data['id'] ?>"/>
                    </div>
                    <div class="form-group">
						<label>Nome</label>
						<input required type="text"  class="form-control"  name="nome" placeholder="Nome" value="<?php echo $data['nome'] ?>"/>
                    </div>
                    <div class="form-group">
						<label style="margin-right: 4px;">Email</label>
						<input required type="text"  class="form-control"  name="email" placeholder="Email" value="<?php echo $data['email'] ?>"/>
                    </div>
                    <div class="form-group">
						<label style="margin-right: 10px;">CPF</label>
						<input required type="text"  class="form-control"  name="cpf" placeholder="CPF" value="<?php echo $data['cpf'] ?>"/>
                    </div>
                    <div class="form-group">
						<label>Telefone</label>
						<input type="text" name="telefone"   class="form-control" placeholder="Telefone" value="<?php echo $data['telefone'] ?>"/>
                    </div>
                    
                    <div class="modal-footer">
					<a href="index.php">  <input type="button" class="btn btn-default" data-dismiss="modal" value="Voltar"></a>
					<input type="submit" class="btn btn-info" name="submit" value="Salvar">
				</div>
                    </div>            
                    
                    </form>

               
                    
                    
                  
				
					
                </tbody>
              
			</table>









              
   




					
			<div class="clearfix">
				
		</div>
	</div>        
</div>




</body>
</html>







