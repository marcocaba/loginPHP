<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
    </script>
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
		            <h2 class="pull-left">Empleados</h2>
                <a href="create.php" class="btn btn-success pull-right" data-toggle="modal" data-target="#create-item">Agregar nuevo empleado</a>
		        </div>
		    </div>
		</div>
		<table class='table table-bordered table-striped'>
			<thead>
			    <tr>
					<th>#</th>
					<th>Nombre</th>
                    <th>Dirección</th>
                    <th>Sueldo</th>
					<th>Acción</th>
			    </tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<!--<ul id="pagination" class="pagination-sm"></ul>-->

	    <!-- Create Item Modal -->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear usuario</h4>
		      </div>
		      <div class="modal-body">
	      		<form data-toggle="validator" action="api/create.php" method="POST">
	      			<div class="form-group">
						<label class="control-label" for="title">Name:</label>
						<input type="text" name="name" class="form-control" data-error="Please enter title." required />
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<label class="control-label" for="title">Address:</label>
						<input type="text" name="address" class="form-control" data-error="Please enter title." required />
						<div class="help-block with-errors"></div>
					</div><div class="form-group">
						<label class="control-label" for="title">Salary:</label>
						<input type="number" name="salary" class="form-control" data-error="Please enter title." required />
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn crud-submit btn-success">Submit</button>
					</div>
		      	</form>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Edit Item Modal -->
		<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
		      </div>
		      <div class="modal-body">
	      		<form data-toggle="validator" action="api/update.php" method="put">
	      			<input type="hidden" name="id" class="edit-id">
	      			<div class="form-group">
						<label class="control-label" for="title">Name:</label>
						<input type="text" name="name" class="form-control" data-error="Please enter name." required />
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<label class="control-label" for="title">Address:</label>
						<input type="text" name="address" class="form-control" data-error="Please enter title." required />
						<div class="help-block with-errors"></div>
					</div>
                    <div class="form-group">
						<label class="control-label" for="title">Salary:</label>
						<input type="text" name="salary" class="form-control" data-error="Please enter title." required />
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
					</div>
	      		</form>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
    	 var url = "http://localhost/examenHTML1DAM/";
    </script>
    <script src="js/item-ajax.js"></script>
</body>
</html>