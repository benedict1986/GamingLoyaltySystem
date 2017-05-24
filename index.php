<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="global.css" rel="stylesheet"/>
    </head>
    <body>
        <div id="top"></div>
        <div class="container-fluid">
            <header class="page-header">
                <h1>Gaming Loyalty System</h1>
                <h2><small>Design & Developed by Saiyi Li</small></h2>
            </header>
        </div>

        <nav id="navbar-main" class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#top"></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#section1">File Upload</a></li>
                        <li><a href="#section2">Top Ten Pratons</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
        <section id="section1" class="container-fluid">
            <h2>Please import your data here.</h2>
            <form class="form-group" action="FileUploadController.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" class="form-control" />
                <input type="submit" class="btn btn-primary" />
            </form>
        </section>
        <hr/>
        <section id="section2" class="container-fluid">
            <div class="table-responsive">
            <?php require_once 'TopTenPatronsController.php';?>
                <table class="table table-striped table-hover">
                    <thead>
                    <th>Patron ID</th>
                    <th>Total Turnover</th>
                    <th>Games</th>
                    </thead>
                    <?php if (sizeof($loyalties) == 0) {?>
                        <tr><td colspan="3">There is no record in database</td></tr>
                    <?php } else {?>>
                    <?php foreach ($loyalties as $loyalty) {?>
                    <tr><td><?php echo $loyalty->patron_id;?></td>
                    <td><?php echo $loyalty->total_turnover;?></td>
                    <td><?php echo $loyalty->games;?></td></tr>
                    <?php } }?>
                </table>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery-offset-scroller.js"></script>
    <script src="jquery.sticky.js"></script>
    <script src="global.js"></script>
</body>
</html>
