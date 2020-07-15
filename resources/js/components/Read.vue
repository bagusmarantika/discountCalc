<template>
<section id="data" class="data">
    <div>
        <div class="row">
            <div class="col-md-12">
                <br>
                <br>
                <div class="row">
                    <div class="col-md-10">
                        <h4>Persons</h4>
                    </div>
                    <div class="col-md-2">
                        <!-- push router ke form membuat data -->
                        <router-link class="btn btn-primary w-100" to="/create">+ Tambah</router-link>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <form>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select name="barang_id" id="barang_id" class="form-control" v-for="barang in barangs" :key="barang.id" 
                                required width="100%">
                                    <option value="">Pilih</option>
                                    <option value="barang.id">{{ barang.nama_barang }} - {{ barang.tipe_barang }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="number" class="form-control" name="qty" id="qty" min="1" placeholder="Input Quantity" required>
                            </div>
                            <button class="btn btn-primary">+ Tambah</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <div v-if="barang.nama_barang">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Discount Code</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Refundable</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Menampilkan data ke table -->
                                    <tr>
                                        <td style="width:40%">{{ barang.nama_barang }}</td>
                                        <td style="width:40%">{{ barang.discount_code_barang }}</td>
                                        <td style="width:40%">{{ barang.type_barang }}</td>
                                        <td style="width:40%">{{ barang.refundable }}</td>
                                        <td style="width:40%">{{ barang.price_barang }}</td>
                                        <td style="width:40%">-</td>
                                        <td style="width:40%">-</td>
                                        <td style="width:20%">
                                            <!-- <router-link class="btn btn-warning" :to="'/detail/' + person.id">Update</router-link> -->
                                            <button class="btn btn-danger" v-on:click="deleteData(person.id)">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
    

export default {
    data() {
        return {
            //variable array utk menampung data dari api
            barangs: []
        };
    },
    created(){
        this.loadData();
    },
    methods: {
        loadData() {
            //fetch data dari api menggunakan axios
            axios.get("http://localhost:8000/api/barang").then(response => {
                //mengirim data hasil fetch ke variable array persons
                this.barangs = response.data;
            });
        },
        deleteData(id) {
            //delete data
            axios.delete("http://localhost:8000/api/barang/" + id).then(response => {
                this.loadData();
            });
        }
    }
};
</script>