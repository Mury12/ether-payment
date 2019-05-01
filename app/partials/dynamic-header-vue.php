<section class="container d-flex justify-content-center bg-parallax" id="main-header" style="<?=$this->getHeaderImage()?>">
    <div class="row align-self-center" id="header">
        <div class="col-12 text-center">
            <h1 class="t-shadow parallax-right hideOnScroll" data-speed="3">
                <div v-if="!editingHeaderTitle">
                    {{header.title}}
                    <i class="fas fa-pencil-alt t-black pointer font-24px" @click="editingHeaderTitle = true, currHeaderTitle = header.title" v-if="isAuth"></i>
                </div>
                <div v-else>
                    <input type="text" class="text-center font-36px f-concert-one" v-model="currHeaderTitle">
                    <i class="fas fa-check t-green pointer font-24px" @click="changeHeaderTitle()"></i>
                    <i class="fas fa-times t-orange pointer font-24px" @click="editingHeaderTitle = false"></i>
                </div>
            </h1>
            <h3 class="t-shadow text-lighter parallax-left hideOnScroll" data-speed="3">
                <div v-if="!editingHeaderSubtitle">
                    {{header.subtitle}}
                    <i class="fas fa-pencil-alt font-24px t-black pointer" @click="editingHeaderSubtitle = true, currHeaderSubtitle = header.subtitle" v-if="isAuth"></i>
                </div>
                <div v-else>
                    <input type="text" class="text-center font-24px f-concert-one" v-model="currHeaderSubtitle">
                    <i class="fas fa-check t-green font-24px t-orange pointer " @click="changeHeaderSubtitle()"></i>
                    <i class="fas fa-times font-24px t-orange pointer " @click="editingHeaderSubtitle = false"></i>
                </div>
            </h3>

            <?php if($this->isBodyButtonEnabled()): ?>
            <div class="fixed-bottom mb-2 f-center d-flex justify-content-center hideOnScroll">
                <p class="pointer d-flex align-items-end">
                    <i class="fas fa-chevron-down scroll fa-2x oscilator" data-scroll-to="main"></i>
                </p>
            </div>
            <?php endif; ?>

        </div>
    </div>
    </div>
</section>
<?php
    if($this->isNavEnabled()):
?>
<nav class="menu mt-4">
    <div class="container">
        <div class="row">
            <?php $this->getNav(); ?>
        </div>
    </div>
</nav>
<?php endif;