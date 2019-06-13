<template>
    <div>
        <form>
            <b-form-input v-model="search" placeholder="Search a question..."></b-form-input>
        </form>

        <b-table
            hover
            :items="items"
            :fields="fields"
            :sort-by.sync="sortBy"
            :sort-desc.sync="sortDesc"
            :filter="search">

            <template slot="is_enabled" slot-scope="row">
                {{ row.value ? 'Yes' : 'No' }}
            </template>

            <template slot="actions" slot-scope="row">
                <b-button size="sm" @click="edit(row.item, row.index, $event.target)" class="px-4 mr-1">
                    Edit
                </b-button>
            </template>
        </b-table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                sortBy: 'updated_at',
                sortDesc: true,
                items: [],
                search: '',
                fields: [
                    { key: 'id', sortable: true},
                    { key: 'question', sortable: true},
                    { key: 'difficulty', sortable: true},
                    { key: 'is_enabled', sortable: true},
                    { key: 'category.category', label: 'Category', sortable: true},
                    { key: 'created_at', sortable: true},
                    { key: 'updated_at', sortable: true},
                    { key: 'actions', label: 'Actions'},
                ]
            }
        },
        mounted() {
            axios.get('/api/v3/question')
                .then((response) => this.items = response.data.data);
        },
        methods: {
            edit(item, index, button) {
                console.log(item)
            }
        }
    }
</script>
