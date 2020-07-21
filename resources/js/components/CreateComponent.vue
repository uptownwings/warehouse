<template>
    <div>
        <h1>Create a new Warehouse Item</h1>
        <form @submit.prevent="addPost">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Item name:</label>
                        <input type="text" class="form-control" v-model="name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Item Description:</label>
                        <textarea class="form-control" v-model="description" rows="5"></textarea>
                    </div>
                </div>
            </div><br />
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                name: '',
                description: '',
                post:{}
            }
        },
        methods: {
            addPost(){
                console.log(this.post);
            }
        }
    }
</script>
