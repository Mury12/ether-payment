<section id="pages_pane" class="bg-stripped-brand-dark vh-min-100 b-shadow z-2 p-rel pt-5">
    <div class="container p-5" id="wwdo">

        <div class="row">

            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange">Nova Página</h2>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>
                <div class="row align-items-center justify-content-center" id="new_page_form">
                    <input type="text" v-model="pageRoute" placeholder="minha/rota" @keyup="replaceWhiteSpaces($event)">
                    <input type="text" v-model="pageTitle" placeholder="Título da Página" class="mx-2">
                    <input type="text" v-model="pageSubtitle" placeholder="Subtítulo da Página">
                    <i @click="createPage()" class="fas fa-check-circle text-success pointer fa-2x ml-2"></i>
                    <i @click="resetForm()" class="fas fa-times-circle text-warning pointer fa-2x ml-2"></i>
                </div>
            </div>

            <div class="col-12 ml-2 mt-5 text-center">
                <h2 class="t-orange">Páginas Criadas</h2>
                <input type="text" v-model="pageSearch" placeholder="Buscar página">
                <div class="divisor bg-brand-light mb-5 mt-3"></div>
                <div class="row align-items-top justify-content-left" id="new_page_form">
                    <div class="col-4 text-right" v-for="page in pages">
                        <div class="row">

                            <span class="text-success col-8">
                                {{page.route}} -> {{page.title}}
                            </span>
                            <a :href="page.route" class="text-success created-pages-info col-1 mx-1" target="_blank">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                            <i class="fas fa-times-circle pointer text-danger col-1" @click="removePage(page.id)"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<section id="album_pane" class="bg-stripped-brand-dark vh-min-100 b-shadow z-2 p-rel pt-5">
    <div class="container p-5 bg-black-a-0" id="wwdo">

        <div class="row border-bottom">

            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange">Gerenciar Fotos</h2>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>
                <div class="row">
                    <div class="col-4" v-for="(album,idx) in albums">
                        <button type="button" class="btn btn-link pointer" @click="getPhotos(idx)" :class="{'bg-white': curAlbum.idx == idx}">{{album.name}}</button>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="curAlbum != 'none'">

            <div id="album-name" v-if="editingAlbumTitle != curAlbum.idx">
                <h4 v-if="curAlbum" class="text-center mt-3">
                    {{curAlbum.name}}
                    <i class="fas fa-pencil-alt pointer" @click="editingAlbumTitle = curAlbum.idx"></i>
                </h4>

            </div>
            <div id="album-name" v-else>
                <h4 class="text-center mt-3"><input type="text" v-model="curAlbum.name">

                    <i class="fas fa-check text-success pointer" @click="saveTitle"></i>
                    <i class="fas fa-times text-danger pointer ml-3" @click="editingAlbumTitle = 'none'"></i>
                </h4>
            </div>

            <div id="album-thumbnail" class="d-flex justify-content-center  adm-thumbnail">
                <label class="rounded 10px pointer d-flex justify-content-center align-items-center">
                    <input type="file" name="thumb" hidden @change="updateThumbnail($event)">
                    <div class="action-icon text-center">
                        <i class="fas fa-camera fa-2x"></i><br />
                        <div class="text">Trocar foto</div>
                    </div>
                    <img :src="curAlbum.thumb" width=300 class="rounded-10px">
                </label>
            </div>

            <div id="album-description" v-if="editingAlbumDescription != curAlbum.idx" class="row justify-content-center">
                <div v-if="curAlbum" class="text-center mt-3 col-4 offset-1" v-html="curAlbum.desc">
                </div>
                <i class="fas fa-pencil-alt pointer col-1 mt-3 " @click="editingAlbumDescription = curAlbum.idx"></i>

            </div>
            <div id="album-description" v-else>
                <p class="text-center mt-3"><input type="text" v-model="curAlbum.desc">

                    <i class="fas fa-check text-success pointer" @click="updateAlbumDescription"></i>
                    <i class="fas fa-times text-danger pointer ml-3" @click="editingAlbumDescription = 'none'"></i>
                </p>
            </div>


        </div>
        <div class="row">
            <div class=" col-sm-4 col-12 py-3 position-relative t-section text-center  showcase-album adm-thumbnail"
                v-for="(p, idx) in photos">
                <div class="divisor bg-brand-light mb-3"></div>

                <label class="rounded 10px pointer d-flex justify-content-center align-items-center" style="min-height:300px">
                    <div class="action-icon text-center" v-if="p.id != null">
                        <i class="fas fa-trash pointer fa-2x" @click="cookedDeletion = idx" onclick="$('#album_modal').modal('show')"></i>
                        <div class="text t-danger">Excluir foto</div>
                    </div>
                    <img class="rounded-10px pointer no-hover" data-target="#photoLightbox" :src="p.url.replace('JPG', 'jpg')">
                </label>

                <br />
                <div class="mt-3 pt-2 border b-top">

                    <span v-if="editingPhotoIdx != idx">
                        {{p.desc}}
                        <i class="fas fa-pencil-alt pointer" @click="editingPhotoIdx = idx, editingPhotoText = p.desc"
                            v-if="p.id != null"></i>
                    </span>
                    <span v-else>
                        <textarea v-model="editingPhotoText" style="height: 150px"></textarea>
                        <i class="fas fa-check text-success pointer" @click="saveDescription"></i>
                        <i class="fas fa-times text-danger pointer ml-3" @click="editingPhotoIdx = 'none', editingPhotoText = ''"></i>
                    </span>
                    <br /><br />
                </div>

            </div>
            <form id="fileUpload" class='text-center' v-if="curAlbum != 'none'" style="position: fixed;bottom: 25px;left: 25px;">
                <label class="btn btn-success" v-for='(f,idx) in fileInputs'>
                    <input type="file" :name="'photo_'+idx" class="d-none" @change="addPhotoToCurrentAlbum($event)">
                    <i class="fas fa-plus fa-2x symbol"></i>
                    <p class="texto">Adicionar foto</p>
                </label>
                <button type="button" class="btn btn-info" v-if="fileInputs.length > 1" @click="insertPhotosToAlbum($event)">
                    <i class="fas fa-chevron-right fa-2x symbol"></i>
                    <p>Enviar Fotos</p>
                </button>
                <input type="hidden" name="albumId" v-model="curAlbum.id">
                <input type="hidden" name="exec" value="add_photo_to_album">
                <input type="hidden" name="amount" :value="fileInputs.length-1">
            </form>
        </div>
    </div>
</section>
<div class="modal fade f-concert-one" tabindex="-1" role="dialog" id="album_modal">
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
                    <div class="col-auto" id="page_loader">
                        Tem certeza que deseja excluir esta foto? <br />Esta ação não poderá ser desfeita.
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-warning" @click="deletePhoto" onclick="$('#album_modal').modal('hide')">Sim,
                    tenho certeza</button>
                <button class="btn btn-info" onclick="$('#album_modal').modal('hide')">Não.. me enganei</button>
            </div>
        </div>

    </div>
</div>
<div class="modal fade f-concert-one" tabindex="-1" role="dialog" id="confirm_change">
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
                    <div class="col-auto" id="page_loader">
                        Se mudar de álbum perderá as alterações. <br />Para que isso não aconteça, envie suas fotos.
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-warning" @click="resetForm" onclick="$('#confirm_change').modal('hide')">Sim,
                    tenho certeza</button>
                <button class="btn btn-info" onclick="$('#confirm_change').modal('hide')">Não.. me enganei</button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade f-concert-one" tabindex="-1" role="dialog" id="page_editing_modal">
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
                    <div class="col-auto" id="page_loader">

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-info" onclick="$('#page_ediging_modal').modal('hide')">Concluir</button>
            </div>
        </div>

    </div>
</div>