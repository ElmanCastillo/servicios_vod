import AppForm from '../app-components/Form/AppForm';

Vue.component('listapelicula-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                pelicula_id:  '' ,
                venta_id:  '' ,
                
            }
        }
    }

});