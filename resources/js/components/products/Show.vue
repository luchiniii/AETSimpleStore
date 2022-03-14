<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ product.category.name }}</div>
                    <img src="/images/no-image.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ product.name }}</h5>
                        <p class="card-text">{{ product.description }}</p>
                        <p class="card-text"><strong>Price: </strong> {{ product.price }}</p>
                        <p class="card-text"><small class="text-muted">Vendor: {{ product.vendor.name }}</small></p>
                        <p class="card-text">
                            <strong>Ratings: </strong>
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-start" v-for="rating in product.rating" :key="rating.id">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{ rating.user.name }}</div>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">{{ rating.rating }}</span>
                                </li>
                            </ol>
                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Rating:
                            {{ product.rating_avg_rating ? parseFloat(product.rating_avg_rating).toFixed(2) : 0 }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "show-product",
        props: ['productId', 'vendorId'],
        data() {
            return {
                product: {
                    name: null,
                    description: null,
                    price: null,
                    category: {
                        name: null
                    },
                    vendor: {
                        name: null
                    },
                    rating_avg_rating: null
                },
            }
        },
        mounted() {
            console.log('montado');
            this.getProduct();
        },
        methods: {
            async getProduct() {
                console.log(this.productId);
                await this.axios.get(`/api/product/${this.productId}`).then(response => {
                        this.product = response.data
                    })
                    .catch(error => console.log(error));
            }
        }
    };
</script>
