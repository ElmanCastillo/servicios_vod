import AppForm from '../app-components/Form/AppForm';

Vue.component('reparto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                actors_id:  '' ,
                peliculas_id:  '' ,
                
            }
        }
    }

});