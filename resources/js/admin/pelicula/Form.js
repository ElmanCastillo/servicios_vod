import AppForm from '../app-components/Form/AppForm';

Vue.component('pelicula-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                descripcion:  '' ,
                duracion:  '' ,
                url:  '' ,
                thumb:  '' ,
                genero_id:  '' ,
                director_id:  '' ,
                
            }
        }
    }

});