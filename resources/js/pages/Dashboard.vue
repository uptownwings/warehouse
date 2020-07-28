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
                                <th>type</th>
                            </tr>
                            <tr v-for="row in laravelData.data">
                                <td>{{ row.id }}</td>
                                <td>{{ row.name }}</td>
                                <td>{{ row.type }}</td>
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
                laravelData: {},
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

                axios.get('/warehouse/index?page=' + page)
                    .then((response) => {
                    this.laravelData = response.data;
                });
            }
        }
    }
</script>
