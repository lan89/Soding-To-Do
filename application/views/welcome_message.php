<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="<?php echo $this->security->get_csrf_token_name();?>" content="<?php echo $this->security->get_csrf_hash();?>">
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico">
    <title>Soding To-Do</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/style.css" rel="stylesheet">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Soding To-Do</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo site_url(); ?>">Home</a></li>
          </ul>
        </div>
      </div>
    </nav>

    
	<div class="container" style="margin-top:20px">

		<div class="row">
			<div class="col-lg-12 margin-tb">
			  <div class="pull-left">
				<h4>Task Lists</h4>
			  </div>
			  
			</div>
		</div>

		<table class="table table-bordered">

			<thead>
				<tr>
					  <th>Description</th>
					  <th>Status</th>
					  <th width="200px">Action</th>
				</tr>
			</thead>

			<tbody>
			</tbody>

		</table>
		
		<div class="text-center">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-task"> Create New Task</button>
		</div>

		<div class="modal fade" id="create-task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

		  <div class="modal-dialog" role="document">
			<div class="modal-content">

			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Create Task</h4>
			  </div>
			  <div class="modal-body">
					<form data-toggle="validator" action="<?php echo site_url(); ?>/todos/create" method="POST">
						<div class="form-group">
							<label class="control-label" for="description">Description:</label>
							<input type="text" name="description" class="form-control" data-error="Please enter description" required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn ajax-submit btn-success">Submit</button>
						</div>

					</form>
			  </div>

			</div>
		  </div>
		</div>

		<div class="modal fade" id="edit-task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

		  <div class="modal-dialog" role="document">
			<div class="modal-content">

			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Task</h4>
			  </div>

			  <div class="modal-body">

					<form data-toggle="validator" action="" method="put">

						<div class="form-group">
							<label class="control-label" for="description">Description:</label>
							<input type="text" name="description" class="form-control" data-error="Please enter description" required />
							<div class="help-block with-errors"></div>
						</div>
						
						<div class="form-group">
							<label class="control-label" for="status">Status:</label>
							<select name="status" class="form-control" required>
							<option value="0">Incompleted</option>
							<option value="1">Completed</option>
							</select>
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success ajax-submit-edit">Submit</button>
						</div>

					</form>

			  </div>
			</div>
		  </div>
		</div>

	</div>
		
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	<script type="text/javascript">
		var url = "<?php echo site_url(); ?>/todos";
	</script>

	<script src="<?php echo base_url(); ?>assets/js/common.js"></script> 
  </body>
</html>
