<template>
    <div class="user-delete">
        <button
            type="button"
            class="btn btn-danger px-4"

            @click="warn"

        ><slot></slot></button>

        <form ref="deleteForm" method="post" :action="action">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="_token" :value="csrf">
        </form>
    </div>
</template>

<style scoped>
.user-delete {
    display: inline-block;
}
</style>

<script>
    export default {
        props: ['action', 'csrf'],
        data() {
            return {
                csrf: '',
            }
        },
        mounted() {
            this.csrf = this.$props.csrf;
        },
        methods: {
            warn() {


                if(confirm('Oletko varma, että haluat poistaa käyttäjän?')) {
                    this.$refs.deleteForm.submit();
                }

            }
        }
    }
</script>
