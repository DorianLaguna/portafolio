import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube tu imagen aqui',
    acceptedFiles: ".png, .jpg, .jpeg",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,
})

dropzone.on('removedfile', function(){
    document.querySelector('[name="imagen"]').value = '';
    // fetch(`/imagenes/eliminar`)
    //     .then((res) => res.json());
})

dropzone.on('success', function(file, response){
    document.querySelector('[name="imagen"]').value = response.imagen;
})
