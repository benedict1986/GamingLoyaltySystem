<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Gaming Loyalty System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
        <link href="global.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
        <script src="https://d3js.org/d3.v4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
        <script src="global.js"></script>
    </head>
    <body>
        <div id="body" class="container">
            <header>
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Gaming Loyalty System</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active" onclick="menuClick('FileUpload')"><a>File Upload</a></li>
                                <li onclick="menuClick('Loyalty')"><a>Loyalty</a></li>
                                <li onclick="menuClick('EGM')"><a>EGM</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="file_upload" class="tabs">
                <h1>Please drag and drop data file in the following section</h1>
                <!--<form action="file_upload.php" method="POST" class="dropzone" enctype="multipart/form-data"> </form>-->
                <form action="file_upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="file" />
  <input type="submit" />
</form>
            </div>
            <div id="loyalty" class="tabs">
                <?php require_once 'TopTenWebApi.php';?>
                <table class="table table-striped table-hover">
                    <thead>
                    <th>Patron ID</th>
                    <th>Total Turnover</th>
                    <th>Games</th>
                    </thead>
                    <?php foreach ($rows as $row) {?>
                    <tr><td><?php echo $row['patron_id'];?></td>
                    <td><?php echo $row['total_turnover'];?></td>
                    <td><?php echo $row['floor_positions'];?></td></tr>
                    <?php }?>
                </table>
            </div>

            <div id="egm" class="tabs">
                egm
            </div>
        </div>
    </body>
</html>
