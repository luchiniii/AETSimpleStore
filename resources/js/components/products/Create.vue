<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new Product</div>

                    <div class="card-body">
                        <form @submit.prevent="create">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="productName" v-model.trim="product.name" required/>
                            </div>
                            <div class="mb-3">
                                <label for="productCategory" class="form-label">Category</label>
                                <select name="productCategory" id="productCategory" v-model="product.category_id" class="form-select" required>
                                    <option value="" disabled>-- Select a product category --</option>
                                    <option v-for="category in categories" :value="category.id" :key="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">Description</label>
                                <input type="text" class="form-control" id="productDescription"
                                    v-model.trim="product.description"/>
                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">Price</label>
                                <input type="number" min="1" max="9" class="form-control" id="productPrice"
                                    v-model.number="product.price" />
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="saved" class="row justify-content-center mt-3">
            <div class="col-md-8">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <div>
                        Product saved!
                    </div>
                </div>
            </div>
         </div>
        <validation-errors :errors="errors"></validation-errors>
    </div>
</template>

<script>
export default {
    name: "create-product",
    props: ['vendorId'],
    data() {
        return {
            product: {
                name: "",
                description: null,
                price: 0,
                category_id: null,
                user_id: this.vendorId
            },
            categories: [],
            errors: [],
            saved: false
        }
    },
    mounted() {
        console.log(this.vendorId);
        this.getProductsCategories();
    },
    methods: {
        async create() {
            this.errors = [];
            this.saved = false;
            await this.axios.post('/api/product', this.product).then(response => this.saved = true)
                .catch(error => {
                    if (error.response) {
                        this.errors = Object.values(error.response.data.errors).flat();
                    }
                });
        },
        async getProductsCategories() {
            await this.axios.get('/api/product-category').then(response => this.categories = response.data)
                .catch(error => console.log(error));
        }
    }
};
</script>
