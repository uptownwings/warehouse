<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Warehouse Item '{{ item.name }}' (id: {{ item.id }})</div>
                    <div class="card-body">

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
            }
        }
    }
</script>
