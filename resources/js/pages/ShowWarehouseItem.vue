<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Warehouse Item: {{ itemData.name }}</div>

                    <div class="card-body">
                        <table>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>EAN</th>
                                <th>type</th>
                                <th>weight</th>
                                <th>color</th>
                                <th>quantity</th>
                                <th>price</th>
                            </tr>
                            <tr>
                                <td>{{ itemData.id }}</td>
                                <td>{{ itemData.name }}</td>
                                <td>{{ itemData.EAN }}</td>
                                <td>{{ itemData.type }}</td>
                                <td class="text-right">{{ itemData.weight }} kg</td>
                                <td>{{ itemData.color }}</td>
                                <td>{{ itemData.quantity }}</td>
                                <td class="text-right">{{ itemData.price | toCurrency }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-header">Price history</div>
                    <div class="card-body">
                        <line-chart :data="itemHistoryData" :curve="false"></line-chart>
                    </div>
                    <div class="card-header">Quantity history</div>
                    <div class="card-body">
                        <line-chart :data="itemQuantityData" :curve="false"></line-chart>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
        },
        data() {
            return {
                itemData: {},
                itemHistoryData: [],
                itemQuantityData: []
            }
        },
        created() {
            this.getItemData();
        },
        methods: {
            getItemData() {
                axios.get('/warehouse/item?itemId=' + this.$route.params.id).then(
                    (response) => {
                        this.itemData = response.data
                    },
                    (error) => {
                        console.log(error);
                    }
                )
                axios.get('/warehouse/pricehistory/item?itemId=' + this.$route.params.id).then(
                    (response) => {
                        let i = 1
                        response.data.forEach(obj => {
                            this.itemHistoryData.push([obj.created_at, parseFloat(obj.price)]);
                            i++
                        })
                    },
                    (error) => {
                        console.log(error)
                    }
                )
                axios.get('/warehouse/quantityhistory/item?itemId=' + this.$route.params.id).then(
                    (response) => {
                        let i = 1
                        response.data.forEach(obj => {
                            this.itemQuantityData.push([obj.created_at, parseFloat(obj.quantity)]);
                            i++
                        })
                    },
                    (error) => {
                        console.log(error)
                    }
                )
            }
        }
    }
</script>
