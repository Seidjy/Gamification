<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NyPyme</title>
    <!-- stylesheets -->
    <link rel="stylesheet" href="/css/boots/bootstrap.min.css">
    <!-- Google Font  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <!-- Font Icons -->
    <link rel="stylesheet" href="/css/fonts/css/font-awesome.min.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
    
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="/">NyPyme</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                <!--    <li><a href="logar.php">Logar</a></li>
                    <li><a href="registrar.php">Registrar</a></li> -->
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    
    @yield('conteudo')


    <div class="container">
        <footer class="navbar navbar-default navbar-fixed-bottom">
            <p><span>NyPyme</span> - Desenvolvido Por: Nathália Adriele, Seidjy e Tamara</p>
        </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>