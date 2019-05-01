<!-- Este é um exemplo do menu com submenus. -->
<ul class="menu m-0 d-sm-flex pt-5 py-sm-0 px-0 px-sm-3 align-items-center list-sections">

    <?php if(is_home()):  ?>
    <li class="menu-item p-3 scroll highlight" data-scroll-to="home">Início</li>
    <?php else : ?>
    <li class="menu-item p-3"><a href="/">Início</a></li>
    <?php endif; 
        if(isLoginEnabled()){
            getLoginSection();
        }
    ?>

    <li class="menu-item p-3 scroll">Father
        <ul class="sub-menu">
            <li class="menu-item p-3">Daughter Father
                <ul class="sub-menu">
                    <li class="menu-item p-3">Child</li>
                    <li class="menu-item p-3">Child</li>
                </ul>
            </li>
            <li class="menu-item p-3">Child Father
                <ul class="sub-menu">
                    <li class="menu-item p-3">Child</li>
                    <li class="menu-item p-3">Daughter Father
                        <ul class="sub-menu">
                            <li class="menu-item p-3">Child</li>
                            <li class="menu-item p-3">Daughter Father
                                <ul class="sub-menu">
                                <li class="menu-item p-3">Child</li>
                                    <li class="menu-item p-3">Child Father
                                        <ul class="sub-menu">
                                            <li class="menu-item p-3">Child</li>
                                            <li class="menu-item p-3">Sibling</li>
                                        </ul>
                                    </li>
                                    <li class="menu-item p-3">Child</li>
                                    <li class="menu-item p-3">Child Father
                                        <ul class="sub-menu">
                                            <li class="menu-item p-3">Child</li>
                                            <li class="menu-item p-3">Sibling</li>
                                        </ul>
                                    </li>
                                    <li class="menu-item p-3">Child</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>