<!-- Este menu é personalizado para pagina única e utiliza um script para listar os nomes 
     das seções e programar o smooth scrool até elas. Caso saiba o que fazer e deseje modificar
     o script, acesse assets/js/partials/section-list-menu.js. Entenda que, para utilizar deste menu
     deve-se seguir o modelo da página contida em app/pages/section-list.php-->
<ul class="menu m-0 d-none d-sm-flex pt-5 py-sm-0 px-0 px-sm-3 align-items-center list-sections">

    <?php if(is_home()):  ?>
    <li class="menu-item p-3 scroll highlight" data-scroll-to="home">Início</li>
    <?php else : ?>
    <li class="menu-item p-3"><a href="/">Início</a></li>
    <?php endif; ?>
    <?php 
        if(sizeof($this->getExtraNavItems()) > 0){
            foreach($this->getExtraNavItems() as $item){
                echo '<li class="menu-item p-3 scroll"><a href="'.$item['link'].'">'.$item['name'].'</a></li>';
            }
        }
        if(isLoginEnabled()){
            getLoginSection();
        }
    ?>

</ul>