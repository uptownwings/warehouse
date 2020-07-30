<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Warehouse Item: '{{ item.name }}' (id: {{ item.id }})</div>
                    <div class="card-body">
                        <form @submit.prevent="updateWarehouseItem">
                            <div class="form-group">
                                <label for="name">Product name:</label>
                                <input type="text" id="name" class="form-control"
                                       v-model="item.name" required>
                            </div>
                            <div class="form-group">
                                <label for="EAN">EAN Number:</label>
                                <input type="number" id="EAN" class="form-control"
                                       v-model="item.EAN" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Product type:</label>
                                <input type="number" id="type" class="form-control"
                                       v-model="item.type" required>
                            </div>
                            <div class="form-group">
                                <label for="weight">Product weight:</label>
                                <input type="number" step="0.01" id="weight" class="form-control"
                                       v-model="item.weight" required>
                            </div>
                            <div class="form-group">
                                <label for="color">Product color:</label>
                                <input type="text" id="color" class="form-control"
                                       v-model="item.color" required>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity" class="form-control"
                                       v-model="item.quantity" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Product name:</label>
                                <input type="number" step="0.01" id="price" class="form-control"
                                       v-model="item.price" required>
                            </div>
                            <div class="form-group">
                                <label for="active">Active:</label>
                                <input type="checkbox" id="active" class="form-control"
                                       v-model="item.active" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                item: {}
            }
        },
        created () {
            this.getItem();
        },
        methods: {
            getItem() {
                axios.get('/warehouse/item?itemId=' + this.$route.params.id).then(
                    (response) => {
                        this.item = response.data
                    },
                    (error) => {
                        console.log(error);
                    }
                )
            },
            updateWarehouseItem() {
                axios.post('/warehouse/update', this.item).then(
                    (response) => {
                        this.$router.push({name: 'dashboard'})
                    },
                    (error) => {
                        console.log(error)
                    }
                )
            }
        }
    }
</script>
