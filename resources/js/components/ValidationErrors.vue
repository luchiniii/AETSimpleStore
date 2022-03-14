<template>
    <div v-if="errors.length > 0" class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    <ul>
                        <li v-for="(error, index) in errors">
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "validation-errors",
    data(){
        return {};
    },
    props: ['errors']
}
</script>
