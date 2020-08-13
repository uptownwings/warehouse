<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>{{ $t('show.title') }}: {{ itemData.name }}</h2></div>

                    <div class="card-body">
                        <table>
                            <tr>
                                <th>{{ $t('data.id') }}</th>
                                <th>{{ $t('data.name') }}</th>
                                <th>{{ $t('data.EAN') }}</th>
                                <th>{{ $t('data.type') }}</th>
                                <th>{{ $t('data.weight') }}</th>
                                <th>{{ $t('data.color') }}</th>
                                <th>{{ $t('data.quantity') }}</th>
                                <th>{{ $t('data.price') }}</th>
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
                    <div class="card-header"><h3>{{ $t('show.pricehistory') }}</h3></div>
                    <div class="card-body">
                        <line-chart :data="itemHistoryData" :curve="false"></line-chart>
                    </div>
                    <div class="card-header"><h3>{{ $t('show.quantityhistory') }}</h3></div>
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
                axios.get('/warehouse/showWithHistory?itemId=' + this.$route.params.id).then(
                    (response) => {
                        this.itemData = response.data
                        let i = 1
                        response.data.price_history.forEach(obj => {
                            this.itemHistoryData.push([obj.created_at, parseFloat(obj.price)]);
                            i++
                        })
                        i = 1
                        response.data.quantity_history.forEach(obj => {
                            this.itemQuantityData.push([obj.created_at, parseFloat(obj.quantity)]);
                            i++
                        })
                    },
                    (error) => {
                        console.log(error);
                    }
                )
            }
        }
    }
</script>
