<section id="first-board" class="bg-stripped-brand-dark vh-min-100 b-shadow z-2 p-rel pt-5 list-me">
    <div class="container p-5" id="tipog">
        <div class="row">
            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange menu-title">Tipografia</h2>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1>Heading 1</h1>
                <h2>Heading 2</h2>
                <h3>Heading 3</h3>
                <h4>Heading 4</h4>
                <h5>Heading 5</h5>
                <h6>Heading 6</h6>
            </div>
            <div class="col-12 col-md-6">
                <span class="font-12px t-orange ">.font-12px .t-orange</span>
                <span class="font-14px t-white">.font-14px .t-white</span>
                <span class="font-16px t-grey">.font-16px .t-grey</span>
                <span class="font-18px t-brand">.font-18px .t-brand</span>
                <span class="font-24px t-orange">.font-24px .t-orange</span>
                <span class="font-36px t-white f-concert-one">.font-36px .t-white</span>
                <span class="font-18px t-orange text-strong">.font-18px .t-strong</span>
            </div>
        </div>
    </div>
</section>

<section id="third-board" style="backgrounc-color: #d5e49b" class="vh-min-100 b-shadow z-2 p-rel pt-5 list-me">
    <div class="container p-5" id="color_pallette">
        <div class="row">
            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange menu-title">Paleta de Cores</h2>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>
            </div>
        </div>
        <div class="row justify-content-center b b-dashed">
            <div class="col-1 bg-brand-light t-black">
                .bg-brand-light
            </div>
            <div class="col-1 bg-grey">
                .bg-grey
            </div>
            <div class="col-1 bg-brand-dark">
                .bg-brand-dark
            </div>
            <div class="col-1 bg-purple">
                .bg-purple
            </div>
            <div class="col-1 bg-black">
                .bg-black
            </div>
            <div class="col-1 bg-white">
                .bg-white
            </div>
        </div>
        <div class="row justify-content-center b b-dashed">
            <div class="col-1 bg-stripped-brand-dark">.bg-stripped-brand-dark</div>
            <div class="col-1 bg-stripped-brand-dark">.bg-stripped-brand-dark</div>
            <div class="col-1 bg-stripped-brand-dark">.bg-stripped-brand-dark</div>
            <div class="col-1 bg-stripped-brand-dark">.bg-stripped-brand-dark</div>
            <div class="col-1 bg-stripped-brand-dark">.bg-stripped-brand-dark</div>
            <div class="col-1 bg-stripped-brand-dark">.bg-stripped-brand-dark</div>
            <div class="col-6 bg-gradient">.bg-gradient</div>

        </div>
    </div>
</section>
<section id="second-board" class="bg-stripped-brand-dark vh-min-100 b-shadow z-2 p-rel pt-5 list-me">
    <div class="container p-5" id="alerts">
        <div class="row">
            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange menu-title">Alertas!</h2>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>

                <p class="t-white f-concert-one">
                    Alguns componentes personalizados do <span class="t-orange text-strong">MyMini</span>.<br />
                    Os componentes assim como a integralidade do framework utiliza o Bootstrap 4 para auxiliar na
                    estilização dessas belas páginas.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <h4 class="t-orange">Alertas com <code>JavaScript</code></h4>
                <button type="button" class="btn btn-success" onclick="simpleAlert.show({message: 'Este é o alerta de Sucesso!', type: 'success'})">Tipo
                    Success</button>
                <button type="button" class="btn btn-danger" onclick="simpleAlert.show({message: 'Este é o alerta de Erro!', type: 'danger'})">Tipo
                    Danger</button>
                <button type="button" class="btn btn-warning" onclick="simpleAlert.show({message: 'Este é o alerta de Aviso!', type: 'warn'})">Tipo
                    Warn</button>
            </div>
        </div>
        <div class="row justify-content-center mt-5" id="vueExample">
            <div class="col-6">
                <h4 class="t-orange">Alertas com <code>VueJS</code></h4>
                <button type="button" class="btn btn-success" @click="callSuccess()">Tipo
                    Success</button>
                <button type="button" class="btn btn-danger" @click="callDanger()">Tipo
                    Danger</button>
                <button type="button" class="btn btn-warning" @click="callWarning()">Tipo
                    Warn</button>
            </div>
        </div>
        <div class="row justify-content-center mt-5" id="customAlert">
            <div class="col-12">
                <h4 class="t-orange">Alertas Customizados</h4>
                <p>É possível inserir um novo alerta ao instante de sua instanciação ou criar novos alertas a partir
                do arquivo .js correto. A forma mais simples é modificar na instanciação, utilizando as classes de cores 
                e ícones do fontAwesome.</p>
                <button type="button" @click="callCustomBtn()" class="btn bg-orange">Alerta Custom</button>
                <pre>
                    <code class="language-js sim-fcontrol t-white" data-lang="javascript"> 
                        simpleAlert.show({
                            message: '<input type="text" class="" v-model="options.message" @keydown="resize" style="width: 243px">', 
                            type: '<input type="text" class="" v-model="options.type" @keydown="resize" style="width: 60px">' 
                            icon: '<input type="text" class="" v-model="options.icon" @keydown="resize" style="width: 60px">',
                            fontColor: '<input type="text" class="" v-model="options.fontColor" @keydown="resize" style="width: 60px">',
                            dismissable: <input type="text" class="" v-model="options.dismissable" @keydown="resize" style="width: 50px">,
                            ttl: <input type="text" class="" v-model="options.ttl" @keydown="resize" style="width: 53px">,
                            gloss: {
                                in: '<input type="text" class="" v-model="options.gloss.in" @keydown="resize" style="width: 60px">',
                                out: '<input type="text" class="" v-model="options.gloss.out" @keydown="resize" style="width: 60px">'
                            }
                        })
                    </code>
                </pre>
            </div>
        </div>
    </div>
</section>

<section id="fourth-board" class="bg-stripped-brand-dark vh-min-100 b-shadow z-2 p-rel pt-5 list-me">
    <div class="container p-5" id="buttons">
        <div class="row">
            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange menu-title">Botões</h2>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>

                <p class="t-white f-concert-one">
                    Os botões são padrões do Bootstrap 4, podendo ser concatenados às cores de background e
                    fonte que existem disponíveis.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <h4 class="t-orange">Alertas com <code>JavaScript</code></h4>
                <button type="button" class="btn btn-success">.btn-success</button>
                <button type="button" class="btn btn-info">.btn-info</button>
                <button type="button" class="btn btn-warning">.btn-warning</button>
                <button type="button" class="btn btn-primary">.btn-primary</button>
                <button type="button" class="btn btn-secondary">.btn-secondary</button>
                <button type="button" class="btn btn-light">.btn-light</button>
                <button type="button" class="btn btn-dark">.btn-dark</button>
                <button type="button" class="btn bg-orange">.bg-orange</button>
                <button type="button" class="btn bg-grey">.bg-grey</button>
                <button type="button" class="btn bg-gradient">.bg-gradient</button>
                <button type="button" class="btn bg-stripped-brand-dark">stripped</button>
                <button type="button" class="btn bg-stripped-brand-dark">stripped</button>
                <button type="button" class="btn bg-black">.bg-black</button>
                <button type="button" class="btn bg-purple">.bg-purple</button>
                <button type="button" class="btn bg-white">.bg-white</button>
            </div>
        </div>
    </div>
</section>