<ul class="menu m-0 d-sm-flex pt-5 py-sm-0 px-0 px-sm-3 align-items-center">

    <?php if(is_home()):  ?>
    <li class="menu-item p-3 scroll highlight" data-scroll-to="home">Início</li>
    <?php else : ?>
    <li class="menu-item p-3"><a href="/">Início</a></li>
    <?php endif; 
        if(isLoginEnabled()){
            getLoginSection();
        }
    ?>

    <li class="menu-item p-3 scroll" data-scroll-to="wwdo">O que fazemos</li>
    <li class="menu-item p-3 scroll" data-scroll-to="aboutus">Quem Somos</li>
    <li class="menu-item p-3 scroll" data-scroll-to="portfolio">Portfolio</li>
    <li class="menu-item p-3 scroll" data-scroll-to="contact">Contato</li>
    <li class="menu-item p-3 scroll" onclick="location.href='blog'"><a href="blog" class="no-decoration">Blog</a></li>
</ul>