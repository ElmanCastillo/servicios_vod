import AppForm from '../app-components/Form/AppForm';

Vue.component('venta-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                valor:  '' ,
                fecha:  '' ,
                estado:  '' ,
                users_id:  '' ,
                tipopagos_id:  '' ,
                
            }
        }
    }

});