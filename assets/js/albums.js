import galleryView from "./vue.components/gallery.vue"

window.onload = function(){};
let photoGallery = {
    photos: []

}

let gallery = {
    albums: []
}


let aco = new Vue({
    el: "#gallery",
    data: gallery,
    components:{
        galleryView: galleryView
    },
    methods: {
        setAlbum: function (id) {
            if (onRequest) return false;
            onRequest = true;
            if (id != null && id != undefined) {
                $.post('api/albums', {
                    exec: "get_album",
                    albumId: id
                },null, 'json').then(function (r) {
                    photoGallery.photos = r;
                    console.log(gallery.albums);
                    requestRelease();
                })
            }
        },
        getAlbums: function()
        {
            if(onRequest) return false;
            onRequest = true;
            $.post('api/albums', {
                exec: 'get_all_albums'
            }, null, 'json').then(function(r){
                gallery.albums = r;
                requestRelease();
            });
        }
    },
    created: function () {
        this.getAlbums();
    }
})

let gal = new Vue({
    el: "#photoLightbox",
    data: photoGallery,

    methods: {
        releaseAlbum: function () {
            this.photos = [];
        }
    },
    created: function () {
        $(window).on('hidden.bs.modal', function () {
            setTimeout(function () {
                gal.releaseAlbum();
            }, 100)
        })
    }
})