<template>
    <div class="container">
            <form @submit.prevent="searchProducts" class="row gy-2 gx-3 align-items-center">
                <div class="col-auto">
                    <input type="text" id="byProductName" name="byProductName" class="form-control" placeholder="search by product name" v-model.trim="filters.name">
                </div>
                <div class="col-auto">
                    <select name="byProductCategory" id="byProductCategory" class="form-select" v-model="filters.category_id">
                        <option :value="null" selected>-- Select a product category --</option>
                        <option v-for="category in categories" :value="category.id" :key="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                </div>
                <div class="col-auto">
                    <input type="text" id="byVendorName" name="byVendorName" class="form-control" placeholder="search by vendor name" v-model.trim="filters.vendor_name">
                </div>
                <div class="col-auto">
                    <select name="sortByPrice" id="sortByPrice" class="form-select" v-model="filters.sort_price">
                        <option :value="null" selected>-- order by price --</option>
                        <option value="asc">asc</option>
                        <option value="desc">desc</option>
                    </select>
                </div>
                <div class="col-auto">
                    <select name="sortByName" id="sortByName" class="form-select" v-model="filters.sort_name">
                        <option :value="null" selected>-- order by name --</option>
                        <option value="asc">asc</option>
                        <option value="desc">desc</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>

        <div class="row row-cols-1 row-cols-md-4 g-4 mt-2">
            <div class="col" v-for="product in products" :key="product.id">
                <div class="card h-100">
                    <div class="card-header">{{ product.category.name }}</div>
                    <img src="/images/no-image.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ product.name }}</h5>
                        <p class="card-text">{{ product.description }}</p>
                        <p class="card-text"><strong>Price: </strong> {{ product.price }}</p>
                        <p class="card-text"><small class="text-muted">Vendor: {{ product.vendor.name }}</small></p>
                        <a :href="!vendorId ? `/public/product/show/${product.id}` : `/vendor/${vendorId}/product/show/${product.id}`" class="btn btn-primary">Go to product</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Rating: {{ product.rating_avg_rating ? parseFloat(product.rating_avg_rating).toFixed(2) : 0 }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li :class="'page-item ' + (link.active ? 'active' : '') + (link.url === null ? 'disabled' : '')" v-for="link in links">
                            <a class="page-link" @click.prevent="getProducts(link.url)" :href="link.url !== null ? link.url : '#'" v-html="link.label"></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "index-product",
    props: ['vendorId'],
    data() {
        return {
            products: [],
            links: [],
            categories: [],
            filters: {
                name: null,
                category_id: null,
                vendor_name: null,
                vendor_id: this.vendorId,
                sort_price: null,
                sort_name: null
            }
        }
    },
    mounted() {
        this.getProducts('/api/product');
        this.getProductsCategories();
    },
    methods: {
        async getProducts(url) {
            await this.axios.get(url, {params : this.filters}).then(response => {
                this.products = response.data.data;
                this.links = response.data.links;
            })
                .catch(error => console.log(error));
        },
        async getProductsCategories() {
            await this.axios.get('/api/product-category').then(response => this.categories = response.data)
                .catch(error => console.log(error));
        },
        async searchProducts() {
            this.getProducts('/api/product');
        }
    }
};
</script>
