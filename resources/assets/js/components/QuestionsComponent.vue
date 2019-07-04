<template>
    <div>
        <form>
            <b-form-input class="mb-3" v-model="search.filter" @input="onSearch" placeholder="Filter questions..."></b-form-input>
        </form>

        <b-table
            hover
            :items="items"
            :fields="fields"
            :per-page="perPage"
            :sort-by.sync="sortBy"
            :sort-desc.sync="sortDesc"
            @filtered="onFiltered">

            <template slot="is_enabled" slot-scope="row">
                {{ row.value ? 'Yes' : 'No' }}
            </template>

            <template slot="actions" slot-scope="row">
                <b-button size="sm" @click="edit(row.item, row.index, $event.target)" class="px-4 mr-1">
                    Edit
                </b-button>
            </template>
        </b-table>

        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          @change="onPageChange"
        ></b-pagination>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                sortBy: 'updated_at',
                sortDesc: true,
                items: [],
                totalRows: 1,
                currentPage: 1,
                perPage: 30,
                search: {
                    filter: '',
                    page: 1
                },
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
            this.run()
        },
        methods: {
            edit(item, index, button) {
                console.log(item)
            },
            onSearch() {
                this.run()
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },
            onPageChange(page) {
                this.search.page = page
                this.run()
            },
            run() {
                let query = {
                    params: this.search
                }

                axios.get('/api/v3/question', query)
                    .then((response) => {
                        this.items = response.data.data
                        this.currentPage = response.data.meta.current_page
                        this.perPage = response.data.meta.per_page
                        this.totalRows = response.data.meta.total
                    });
            }
        }
    }
</script>
