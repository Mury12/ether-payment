<div class="col-6 d-flex align-items-center">
    <ul id="menu_left" class="m-0 d-sm-flex pt-5 py-sm-0 px-0 px-sm-3 align-items-center">
        <?php if(is_home()):  ?>
        <li class="menu-item p-3 scroll" data-scroll-to="home">Início</li>
        <?php else : ?>
        <li class="menu-item p-3"><a href="/">Início</a></li>
        <?php endif; ?>
        <li class="menu-item p-3 scroll" onclick="location.href='blog'"><a href="blog" class="no-decoration">Blog</a></li>

    </ul>
</div>
<div class="col-6 d-flex align-items-center">
    <ul id="menu_right" class="m-0 d-sm-flex pt-5 py-sm-0 px-0 px-sm-3 align-items-center">
        <?php 
        if(isLoginEnabled()){
            getLoginSection();
        }
    ?>
        <li id="compressed-menu" class="menu-item p-3 scroll float-right"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
        </li>
        <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
    </ul>
</div>