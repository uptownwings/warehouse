<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>{{ $t('dashboard.welcome') }}</h2></div>
                    <router-link :to="{name: 'warehouse.create'}" tag="button">{{ $t('dashboard.createbutton') }}</router-link>
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
                                <th>{{ $t('dashboard.action') }}</th>
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
                                        {{ $t('dashboard.viewbutton') }}
                                    </router-link>
                                    <router-link :to="{name: 'warehouse.edit', params: { id: row.id }}" tag="button">
                                        {{ $t('dashboard.editbutton') }}
                                    </router-link>
                                    <button @click="deleteWarehouseItem(row.id)">{{ $t('dashboard.deletebutton') }}</button>
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
    name: 'dashboard',
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
                    message: this.$t('dashboard.deletemsg'),
                    button: {
                        no: this.$t('dashboard.no'),
                        yes: this.$t('dashboard.yes')
                    },
                    callback: confirm => {
                        if (confirm) {
                            axios.delete('/warehouse/delete?id=' + id).then(
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
