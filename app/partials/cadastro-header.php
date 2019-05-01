<section class="container d-flex justify-content-center bg-parallax" id="main-header" style="<?=$this->getHeaderImage()?>">
    <div class="row align-self-center" id="header">
        <div class="col-12 text-center">
            <h1 class="t-shadow parallax-right hideOnScroll" data-speed="3">
                <?= $this->getHeaderTitle() ?>
            </h1>
            <h3 class="t-shadow text-lighter parallax-left hideOnScroll" data-speed="3">
                <?= $this->getHeadersubTitle() ?>
            </h3>
            <div class="row justify-content-center">
                <div class="col-auto hideOnScroll">
                    <form class="t-white text-left" id="signup">
                        <label>Seu nome:<br />
                            <input type="text" v-model="name" placeholder="Quellyane Matsuk Shitzer">
                        </label><br />

                        <label>Seu e-mail:<br />
                            <input type="email" v-model="email" placeholder="quelly.mastsuk@mmfw.com">
                        </label><br />

                        <label>Sua senha:<br />
                            <input type="password" v-model="pwd" placeholder="M8uLaksj)d11.#">
                        </label>
                        <br />
                        <button type="button" class="btn btn-block m-0 btn-success" @click="signUp">Cadastrar</button>
                    </form>

                </div>
            </div>

            <?php if($this->isBodyButtonEnabled()): ?>
            <div class="fixed-bottom mb-2 f-center d-flex justify-content-center hideOnScroll">
                <p class="pointer d-flex align-items-end">
                    <i class="fas fa-chevron-down scroll fa-2x oscilator" data-scroll-to="main"></i>
                </p>
            </div>
            <?php endif; ?>
            
        </div>
    </div>
    <div class="mask"></div>

</section>
<?php
    if($this->isNavEnabled()):
?>
<nav>
    <div class="container">
        <div class="row">
            <div class="col-12 p-0 m-0">
                <?php $this->getNav(); ?>
            </div>
        </div>
    </div>
</nav>
<?php endif;