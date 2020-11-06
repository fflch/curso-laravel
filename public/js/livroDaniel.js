$(document).ready(function(){
    $(".navbar").empty();
    $(".navbar").html('<a class="navbar-brand" href="http://localhost:8000/livros_daniel"> <strong>Laravel</strong></a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="navbarNav"><div class="navbar-nav mr-auto"><a class="nav-link nav-item " href="http://localhost:8000/livros_daniel" title=" Home" target=""><svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path></svg><!-- <i class="fas fa-home"></i> --> Home</a><a class="nav-link nav-item " href="http://localhost:8000/livros_daniel/create" title="Cadastrar livro" target="">Cadastrar livro</a><a class="nav-link nav-item " href="/livros_daniel" title="Acervo" target="">Acervo</a>                  </div></div>');
    
    $(".isbn").mask('000-00-000-0000-0');

    $('.preco').keyup(function () { 
        this.value = this.value.replace(/[^0-9\,]/g,'');
    });
    
});

