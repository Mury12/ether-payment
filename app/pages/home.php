<section id="first-board" class="bg-white vh-min-100 list-me z-2 p-rel pt-5 reveal l-fade-scroll">
    <div class="container p-5" id="quem_somos">

        <div class="row">
            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange menu-title">Nossa proposta</h2>
                <div class="divisor bg-grey mb-5 mt-3"></div>

                <!-- BEGIN MARKET JUMBOTRON-->
                <div class="row mt-5 justify-content-center">
                    <div class="col-sm-10 col-12 py-5 ">
                        <div class="f-concert-one t-gray font-18px">
                            Nosso software oferece uma interação única entre cliente e advogado, onde ambos
                            poderão consultar e acompanhar os processos que são relacionados, deixando o cliente
                            mais confortável e inteirado sobre a real situação do seu processo, aumentando a
                            produtividade do profissional de direito permitindo-o um trabalho mais fluido.
                        </div>
                    </div>
                </div>
                <!-- BEGIN MARKET JUMBOTRON HIGHLIGHTS-->
                <div class="row text-center">
                    <div class="col-4 py-5 ">
                        <p class="h2 t-brand-light">+<span class="countup" data-count="12000">0</span></p>
                        <div class="f-concert-one t-gray text-lighter">
                            ADVOGADOS
                        </div>
                    </div>
                    <div class="col-4 py-5">
                        <p class="h2 t-brand-light text-strong">+<span class="countup" data-count="100">0</span> <span class="font-18px text-lighter">milhões</span></p>
                        <div class=" f-concert-one t-gray">
                            EM ATUALIZAÇÕES<br />DOS TRIBUNAIS
                        </div>
                    </div>
                    <div class="col-4 py-5">
                        <p class="h2 t-brand-light">+<span class="countup" data-count="950000">0</span></p>
                        <div class=" f-concert-one t-gray text-lighter">
                            PROCESSOS<br />AUTOMATIZADOS
                        </div>
                    </div>
                </div>
                <!-- BEGIN MARKET JUMBOTRON HIGHLIGHTS-->
                <div class="row text-center">
                    <div class="col-4 py-5 ">
                        <p class="t-brand-light"><i class="fas fa-gavel fa-3x"></i></p>
                        <div class="f-concert-one t-gray text-lighter">
                            INTEGRADO COM<br />TRIBUNAIS
                        </div>
                    </div>
                    <div class="col-4 py-5 ">
                        <p class="t-brand-light"><i class="fas fa-desktop fa-3x"></i></p>
                        <div class="f-concert-one t-gray text-lighter">
                            ONLINE<br />E FÁCIL DE USAR
                        </div>
                    </div>
                    <div class="col-4 py-5 ">
                        <p class="t-brand-light"><i class="fas fa-mobile-alt fa-3x"></i></p>
                        <div class="f-concert-one t-gray text-lighter">
                            OTIMIZADO<br />PARA MOBILE
                        </div>
                    </div>

                </div>
                <!-- BEGIN MARKET JUMBOTRON-->

            </div>
        </div>

    </div>
</section>

<section id="second-board" class="vh-min-100 list-me z-2 p-rel pt-5 reveal l-fade-scroll bg-fixed">
    <div class="container p-5" id="examples">
        <div class="row">
            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange menu-title">Exemplos</h2>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>

                <div class="row mt-5">
                    <div class=" col-sm-4 col-12 py-5  t-section text-center showcase-album">
                        <i class="fas fa-laptop fa-10x"></i><br />
                    </div>

                    <div class="col-sm-8 col-12 py-5 ">
                        <h4 class="text-left">Sistema de interatividade único!</h4>
                        <div class="text-left f-concert-one t-highlight-dark">
                            Nosso software oferece uma interação única entre cliente e advogado, onde ambos
                            poderão consultar e acompanhar os processos que são relacionados, deixando o cliente
                            mais confortável e inteirado sobre a real situação do seu processo, aumentando a
                            produtividade do profissional de direito permitindo-o um trabalho mais fluido.
                        </div>
                    </div>
                </div>
                <!-- BEGIN MARKET JUMBOTRON-->
                <div class="row mt-5">
                    <div class="order-2 col-sm-4 col-12 py-5  t-section text-center showcase-album">
                        <i class="fas fa-laptop fa-10x"></i><br />
                    </div>

                    <div class="col-sm-8 col-12 py-5 ">
                        <h4 class="text-left">Sistema de interatividade único!</h4>
                        <div class="text-left f-concert-one t-highlight-dark">
                            Nosso software oferece uma interação única entre cliente e advogado, onde ambos
                            poderão consultar e acompanhar os processos que são relacionados, deixando o cliente
                            mais confortável e inteirado sobre a real situação do seu processo, aumentando a
                            produtividade do profissional de direito permitindo-o um trabalho mais fluido.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="section-mask"></div>
</section>

<section id="gallery-board" class="bg-white vh-min-100  list-me z-2 p-rel pt-5 reveal l-fade-scroll lazy">
    <div class="container py-2 px-5" id="gallery">
        <div class="row">
            
            <gallery-view :title="a.name" :thumb="a.thumb" :desc="a.desc"
            @click.native="setAlbum(a.id)" v-for="a in albums" :key="a.id"></gallery-view>
        </div>

</section>

<section class="bg-white vh-min-100 list-me z-2 p-rel pt-5 reveal l-fade-scroll">
    <div class="container p-5" id="plans">
        <div class="row">
            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange">Conheça nossos planos!</h2>
                <p hidden class="menu-title"></p>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>
                <div class="row">
                    <p class="font-18px t-gray mb-5 col-12 col-sm-8 offset-2">
                        Oferecemos planos para advogados individuais e empresa. Nossa plataforma garante a você, 
                            advogado ou escritório, o melhor e mais interativo gerenciamento de processos e 
                            clientes do mercado.
                    </p>
                </div>
                <div class="row justify-content-between">

                    <plan-box v-for="p in plans" :key="p.id" 
                    :name="p.name" :price="p.val" :benefits="p.benefits"></plan-box>

                </div>
                <p class="t-gray mt-5 text-left font-14px">
                    *Você pode utilizar nossa plataforma no modo sandbox por até 20 dias.<br/>
                    **Valor PER CAPTA válido ATÉ 5 profissionais. Planos para mais profissionais, favor entrar em contato com a equipe de vendas.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white vh-min-100 list-me z-2 p-rel pt-5 reveal l-fade-scroll">
    <div class="container p-5" id="scraps">
        <div class="row">
            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange">O que dizem nossos clientes?</h2>
                <p hidden class="menu-title"></p>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>
                <div class="row">

                    <user-comment name="Thalita Mendes" comment="Esse aplicativo é sensacional! Me ajuda relacionar os processos entre
                            mim e meus clientes, facilitando muito nossa comunicação! Obrigado!!!" 
                            pic="assets/img/thumb/hillary.png">
                    </user-comment>

                    <user-comment name="Jorge Rezende" comment="Meu escritório nunca foi tão produtivo e com tantos clientes, realmente, é o melhor
                            aplicativo para gerenciamento do mercado. Pagaria em dobro se pudesse!!" 
                            pic="assets/img/thumb/jorjao.jpg">
                    </user-comment>

                    <user-comment name="Vinícius Lima" comment="Fantástico! Tanto para meu escritório quanto para meus particulares, me ajudou demais!
                             Recomendo!!" 
                            pic="assets/img/thumb/igor.png">
                    </user-comment>
                
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark t-white vh-min-100 list-me z-2 p-rel pt-5 reveal l-fade-scroll">
    <div class="container p-5" id="contact">
        <div class="row justify-content-center">
            <div class="col-8 ml-2 text-center">
                <h2 class="t-orange">Quer entrar em contato?</h2>
                <p hidden class="menu-title">Contato</p>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>

                <p class=" f-concert-one">
                    Este é apenas um campo de contato genérico que pode ser aplicado em seu site.
                    Fique à vontade para mudá-lo conforme as suas necessidades, mesmo porque este aqui está ó!
                </p>
                
                <form class="d-flex mt-5 justify-content-center">
                    <div class="form-group t-orange f-concert-one d-flex flex-column vw-30 text-left">
                        <label>Seu nome: <br />
                            <input class="form-control shadow-none my-1" type="text">
                        </label>
                        <label>Telefone: <br />
                            <input class="form-control shadow-none my-1" type="tel">
                        </label>
                        <label>E-mail: <br />
                            <input class="form-control shadow-none my-1" type="email">
                        </label>
                        <label>Sua mensagem: <br />
                            <textarea class="form-control shadow-none my-1"></textarea>
                        </label><br />
                        <button class="btn btn-success">Enviar!</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<section class="bg-white vh-min-100 list-me z-2 p-rel pt-5 reveal l-fade-scroll">
    <div class="container p-5" id="blog">
        <div class="row">
            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange">Nosso Blog</h2>
                <p hidden class="menu-title">Blog</p>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>

                <p class=" f-concert-one">
                    Nosso blog utiliza a plataforma Wordpress e conta com um tema pré montado, para que você possa
                    fazê-lo como bem entender.
                </p>
                <p class=" f-concert-one">
                    Ao acessar seu blog, será solicitada sua instalação, portanto, crie em seu SGBD um banco que
                    refere-se ao Wordpress e insira-o nas conigurações. Para que o blog funcione corretamente,
                    é necessário criar o arquivo <code>wp-config.php</code> que leva o mesmo conteúdo do arquivo
                    <code>wp-config-sample.php</code>, portanto, copie-o, renomeie e prossiga com as configurações
                    que constam dentro do arquivo. Se você não tem conhecimento em PHP, não se preocupe, o arquivo
                    está documentado e é só seguir as instruções. Você pode abrir com um bloco de notas comum.
                </p>
                <a href="/blog" class="btn btn-warning ml-0">Acessar Blog</a>
                <a href="/blog/wp-admin/" class="btn btn-warning ml-0">Acessar Painel</a>
            </div>
        </div>
    </div>
</section>

<section class="bg-white vh-min-100 z-2 p-rel pt-3">
    <div class="container p-5">
        <div class="row">
            <div class="col-12 ml-2">
                Components
                <div class="row">
                    <div class="col-12">
                        <label class="radio-btn">Checkmark
                            <input type="radio">
                            <span class="checkmark check-success"></span>
                        </label>
                        <label class="checkbox-btn check-warn">Checkmark
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="photoLightbox" class="modal fade lazy">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" onclick="$('#photoLightbox').modal('hide')">
                    <i class="fas fa-times mr-3 mt-3 "></i>
                </button>
                <div id="the_photos_carousel" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item text-center" v-for="(p, idx) in photos" :class="{'active': idx == 0}">
                            <img class="d-inline-block" :src="p.url" alt="First slide">
                            <div class="photo-description  t-strong f-concert-one mt-1 b-dashed b-top d-inline-block w-50">{{p.desc}}</span>
                            </div>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#the_photos_carousel" role="button" data-slide="prev" v-if="photos.length > 1">
                        <span class="prev-icon-mm chevron-icon-mm" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#the_photos_carousel" role="button" data-slide="next" v-if="photos.length > 1">
                        <span class="next-icon-mm chevron-icon-mm" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>