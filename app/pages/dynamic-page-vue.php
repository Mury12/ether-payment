<div id="dynamic-page">

    <section :id="'board_'+section.id" class="bg-stripped-brand-dark vh-min-100 b-shadow z-2 p-rel pt-5 list-me" v-for="(section, idx) in sections">
        <i class="fas fa-times t-orange pointer fa-3x top-right-btn" alt="Deletar Seção" @click="deleteSection(idx)"
            v-if="isAuth"></i>
            <div class="change-section-position w-100 text-center" v-if="isAuth && idx>0">
                <i class="fas fa-arrow-circle-up t-orange pointer " @click="swapSections(idx)"></i>
            </div>
        <div class="container p-5" :id="'section'+section.id">
            <div class="row">
                <div class="col-12 ml-2 text-center">

                    <h2 class="t-orange">

                        <div v-if="sectionEditing !=section.id">
                            {{section.name}}
                            <i class="fas fa-pencil-alt font-24px t-gray pointer font-18px" @click="sectionEditing = section.id, currSectionTitle = section.name"
                                v-if="isAuth"></i>
                        </div>

                        <div v-else>
                            <input type="text" v-model="currSectionTitle">
                            <i class="fas fa-check font-24px t-green pointer" @click="changeSectionTitle(idx)"></i>
                            <i class="fas fa-times font-24px pointer" @click="sectionEditing = false"></i>
                        </div>

                    </h2>
                    <p hidden class="menu-title">{{section.name}}</p>
                    <div class="divisor bg-brand-light mb-5 mt-3"></div>

                    <div class="subsection position-relative py-3 my-5" :id="'subsection_'+s.id" v-for="(s, ids) in section.subsections">
                        <h4 class="t-orange mb-4">

                            <div v-if="subsectionTitleEditing != s.id">
                                {{s.title}}
                                <i class="fas fa-pencil-alt font-24px t-gray pointer font-16px" @click="subsectionTitleEditing = s.id, currSubsectionTitle = s.title"
                                    v-if="isAuth"></i>
                                <i class="fas fa-times font-24px pointer top-right-btn" @click="deleteSubsection(idx, ids)"
                                    v-if="isAuth"></i>
                            </div>

                            <div v-else>
                                <input type="text" v-model="currSubsectionTitle">
                                <i class="fas fa-check font-24px t-green pointer" @click="changeSubsectionTitle(idx, ids)"></i>
                                <i class="fas fa-times font-24px pointer" @click="subsectionTitleEditing = false"></i>
                            </div>

                        </h4>

                        <div v-if="subsectionContentEditing != s.id">
                            <p class="f-concert-one t-white">
                                <span v-html="s.content"></span>
                                <i class="fas fa-pencil-alt font-24px t-gray pointer font-16px" @click="subsectionContentEditing = s.id, currSubsectionContent = s.content, tinyMCE('start')"
                                    v-if="isAuth"></i>
                            </p>

                        </div>

                        <div v-else>
                            <i class="w-100 fas  fa-cog fa-spin fa-3x" :id="'txa_'+s.id"></i>
                            <i class="fas fa-check t-green font-24px t-orange pointer f-18px mt-3" @click="changeSubsectionContent(idx, ids)"></i>
                            <i class="fas fa-times t-orange font-24px pointer" @click=" tinyMCE('finish')"></i>
                        </div>

                    </div>

<!-- Subsection add -->
                    <div class="subsection position-relative py-3 my-5" id="new-subsection" v-if="isAuth">
                        <div class="row text-center justify-content-center align-items-center bg-transparent mr-1 w-100" id="new_subsection_el">
                            <div id="new-section-symbol" class="w-20 text-center pointer" @click="addSubsection(idx)">
                                <i class="fas fa-plus-circle t-green fa-3x pointer symbol"></i>
                                <div class="t-orange texto f-concert-one h5">Adicionar Subseção</div>
                            </div>
                        </div>
                        <div id="new_subsection_container">
                        <h4 class="t-orange mb-4">
                            <div>
                                Título da Subseção
                        </h4>
                        <div>
                            <p class="t-white f-concert-one">
                                Conteúdo da subseção
                        </div>
</div>
                    </div>
<!-- end subsection add -->
                </div>
            </div>
        </div>
    </section>

    <section id="new-section" class="bg-brand-dark text-success b-shadow z-2 p-rel py-5 text-center" v-if="isAuth">

        <div class="row text-center justify-content-center align-items-center" id="new_section_el">
            <div id="new-section-symbol" class="w-20 text-center pointer" @click="addSection()">
                <i class="fas fa-plus-circle fa-5x pointer symbol"></i>
                <div class="t-orange texto f-concert-one h4">Adicionar Seção</div>
            </div>
        </div>

        <div id="new_section_container" class="container p-5">
            <div class="row">

                <div class="col-12 ml-2 text-center">
                    <h2 class="t-orange">
                        <div>
                            Nova Seção
                    </h2>
                    <p class="" hidden="hidden">Nova Seção</p>
                    <div class="divisor bg-brand-light mb-5 mt-3"></div>
                    <div id="" class="subsection position-relative py-3 my-5">
                        <h4 class="t-orange mb-4">
                            <div>
                                Título da Subseção
                        </h4>
                        <div>
                            <p class="t-white f-concert-one">
                                Conteúdo da subseção
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade confirm f-concert-one" tabindex="-1" role="dialog" id="confirm_modal" v-if="isAuth">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tem certeza?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            Tem certeza que deseja excluir este item?<br />
                            <button class="btn btn-warning" @click="deleteSection(currDeleting, true)">Sim, tenho
                                certeza</button>
                            <button class="btn btn-info" onclick="$('#confirm_modal').modal('hide')">Não, me enganei</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade confirm f-concert-one" tabindex="-1" role="dialog" id="confirm_subsection_modal" v-if="isAuth">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tem certeza?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            Tem certeza que deseja excluir este item? Não poderá recuperá-lo depois!<br />
                            <button class="btn btn-warning" @click="deleteSubsection(currDeleting, currSubsectionDeleting, true)">Sim, tenho
                                certeza</button>
                            <button class="btn btn-info" onclick="$('#confirm_subsection_modal').modal('hide')">Não, me enganei</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script async src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>