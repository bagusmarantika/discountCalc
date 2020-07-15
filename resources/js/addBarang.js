import Vue from 'vue'
import axios from 'axios'
​
Vue.filter('price_barang', function (money) {
    return accounting.formatMoney(money, "Rp ", 2, ".", ",")
})
new Vue({
    el: '#data',
    data: {
        barang: {
            id: '',
            nama_barang: '',
            tipe_barang: '',
            refundable: '',
            price_barang: '',
            discount_code_barang: ''
        }
    },
    watch: {
        //apabila nilai dari product > id berubah maka
        'barang.id': function() {
            //mengecek jika nilai dari product > id ada
            if (this.barang.id) {
                //maka akan menjalankan methods getProduct
                this.getProduct()
            }
        }
    },
    //menggunakan library select2 ketika file ini di-load
    mounted() {
        $('#barang_id').select2({
            width: '100%'
        }).on('change', () => {
            //apabila terjadi perubahan nilai yg dipilih maka nilai tersebut 
            //akan disimpan di dalam var product > id
            this.barang.id = $('#barang_id').val();
        });
    },
    methods: {
        getBarang() {
            //fetch ke server menggunakan axios dengan mengirimkan parameter id
            //dengan url /api/product/{id}
            axios.get(`/api/barang/${this.barang.id}`)
            .then((response) => {
                //assign data yang diterima dari server ke var product
                this.barang = response.data
            })
        }
    }
})