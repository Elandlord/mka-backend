<template>
    <div>
        <div class="table-responsive" v-if="objects != null">
            <table class="table table-striped">
                <tr v-for="(object, key) in objects" :key="key">{{ object.name }}</tr>
            </table>
        </div>

    </div>
</template>
<script type="text/javascript">

    export default {
        props: {
            objects: null,
        },

        mounted() {
            console.log(this.objects, "Arriba");
        }
    }
</script>