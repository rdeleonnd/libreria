<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">megalibros.com, los mejores libros</a>
        <!-- Menu for mobile devices -->
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div id="navbar-main" class="navbar-collapse collapse in" style="height: auto;">
        <ul class="nav navbar-nav">
            <li><a href="book/index">Libros</a></li>
            <li><a href="order/index">Pedidos</a></li>
            <li class="dropdown">
                <a id="download" href="#" data-toggle="dropdown" class="dropdown-toggle">Mi cuenta<span class="caret"></span></a>
                <ul aria-labelledby="download" class="dropdown-menu">
                    <li><a href="user/edit">Configuración</a></li>                        
                    <li class="divider"></li>
                    <li><a id="logout" href="#">Salir</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</div>