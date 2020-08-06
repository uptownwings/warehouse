<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>{{ $t('create.title') }}:</h2></div>
                    <div class="card-body">
                        <form @submit.prevent="updateWarehouseItem">
                            <div class="form-group">
                                <label for="name">{{ $t('create.name') }}:</label>
                                <input type="text" id="name" class="form-control"
                                       v-model="item.name" required>
                            </div>
                            <div class="form-group">
                                <label for="EAN">{{ $t('create.ean') }}:</label>
                                <input type="number" id="EAN" class="form-control"
                                       v-model="item.EAN" required>
                            </div>
                            <div class="form-group">
                                <label for="type">{{ $t('create.type') }}:</label>
                                <input type="number" id="type" class="form-control"
                                       v-model="item.type" required>
                            </div>
                            <div class="form-group">
                                <label for="weight">{{ $t('create.weight') }}:</label>
                                <input type="number" step="0.01" id="weight" class="form-control"
                                       v-model="item.weight" required>
                            </div>
                            <div class="form-group">
                                <label for="color">{{ $t('create.color') }}:</label>
                                <input type="text" id="color" class="form-control"
                                       v-model="item.color" required>
                            </div>
                            <div class="form-group">
                                <label for="quantity">{{ $t('create.quantity') }}:</label>
                                <input type="number" id="quantity" class="form-control"
                                       v-model="item.quantity" required>
                            </div>
                            <div class="form-group">
                                <label for="price">{{ $t('create.price') }}:</label>
                                <input type="number" step="0.01" id="price" class="form-control"
                                       v-model="item.price" required>
                            </div>
                            <div class="form-group">
                                <label for="active">{{ $t('create.active') }}:</label>
                                <input type="checkbox" id="active" class="form-control"
                                       v-model="item.active" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ $t('create.submit') }}</button>
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
        methods: {
            updateWarehouseItem() {
                axios.post('/warehouse/create', this.item).then(
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
