<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Warehouse Dashboard</div>

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
                                <th>action</th>
                            </tr>
                            <tr v-for="row in laravelData.data">
                                <td>{{ row.id }}</td>
                                <td>{{ row.name }}</td>
                                <td>{{ row.EAN }}</td>
                                <td>{{ row.type }}</td>
                                <td class="text-right">{{ row.weight }} kg</td>
                                <td>{{ row.color }}</td>
                                <td>{{ row.quantity }}</td>
                                <td class="text-right">{{ row.price | toCurrency }}</td>
                                <td>
                                    <router-link :to="{name: 'warehouse.show', params: { id: row.id }}" tag="button">
                                        View
                                    </router-link>
                                    <router-link :to="{name: 'warehouse.edit', params: { id: row.id }}" tag="button">
                                        Edit
                                    </router-link>
                                    <button @click="deleteWarehouseItem(row.id)">Delete</button>
                                </td>
                            </tr>
                        </table>
                        <pagination :data="laravelData" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            laravelData: {}
        }
    },
    created() {
        this.getResults();
    },
    methods: {
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            axios.get('/warehouse/index?page=' + page).then(
                (response) => {
                    this.laravelData = response.data;
                }, (error) => {
                    console.log(error);
                }
            );
        },
        deleteWarehouseItem(id) {
            this.$confirm(
                {
                    message: 'This will delete this warehouse item and related data. Are you sure?',
                    button: {
                        no: 'No',
                        yes: 'Yes'
                    },
                    callback: confirm => {
                        if (confirm) {
                            axios.delete('/warehouse/item?id=' + id).then(
                                (response) => {
                                    this.getResults();
                                }
                            )
                        }
                    }
                }
            )
        }
    }
}
</script>
<style>
    table {
        width: 100%;
    }

    table, th, td {
        border: 1px solid black;
        padding: 3px;
    }
</style>
