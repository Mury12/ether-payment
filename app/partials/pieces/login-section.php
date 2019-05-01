<div id="login_btns">
    <li class="menu-item p-3 login-task bg-info" v-if="!this.auth" data-toggle="modal" data-target="#login_modal"
    v-if="!this.auth" >
        <a  class="" id="btnLogin">
            Entrar
        </a>
    </li>

    <li class="menu-item p-3 login-task" onclick="location.href='/admin'" v-if="this.auth">
        <a  class="" id="btnLogout" style="" href="/admin">
            Painel
        </a>
    </li>

    <li  class="menu-item p-3 login-task bg-info" v-if="this.auth">
        <a  class="" id="btnLogout" @click="logOut" style="">
            Sair
        </a>
    </li>
</div>