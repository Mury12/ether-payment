<section id="first-board" class="bg-brand-dark vh-min-100 b-shadow z-2 p-rel pt-5 list-me">
    <div class="container p-5" id="cadastro">
        <div class="row">
            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange menu-title">Cadastre-se!</h2>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <form class="t-white text-left"  id="signup">
                            <label>Seu nome:<br />
                                <input type="text" v-model="name" placeholder="Seu nome">
                            </label><br />
                            
                            <label>Seu e-mail:<br />
                                <input type="email" v-model="email" placeholder="Seu e-mail">
                            </label><br />

                            <label>Sua senha:<br />
                                <input type="password" v-model="pwd" placeholder="Sua snha">
                            </label>
                            <br />
                            <button type="button" class="btn btn-block m-0 btn-success" @click="signUp">Cadastrar</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>