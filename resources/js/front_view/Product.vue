<template>
    <Layout :addtotdata="addtotdata">
        <template v-slot:content="{ addtotdata }">
            <!-- breadcrumb-area -->
            <div
                class="breadcrumb-area breadcrumb-style-two"
                data-background="img/bg/s_breadcrumb_bg01.jpg"
            >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 d-none d-lg-block">
                            <div class="previous-product">
                                <a href="shop-details.html"
                                    ><i class="fas fa-angle-left"></i> previous
                                    product</a
                                >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="breadcrumb-content">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="shop.html">Winter 20</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="shop.html">Women</a>
                                        </li>
                                        <li
                                            class="breadcrumb-item active"
                                            aria-current="page"
                                        >
                                            Tracker Jacket
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 d-none d-lg-block">
                            <div class="next-product">
                                <a href="shop-details.html"
                                    >Next product
                                    <i class="fas fa-angle-right"></i
                                ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- shop-details-area -->
            <section class="shop-details-area pt-100 pb-95">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="shop-details-flex-wrap">
                                <div class="shop-details-nav-wrap">
                                    <ul
                                        class="nav nav-tabs"
                                        id="myTab"
                                        role="tablist"
                                    >
                                        <li
                                            class="nav-item"
                                            role="presentation"
                                        >
                                            <a
                                                class="nav-link active"
                                                id="item-one-tab"
                                                data-toggle="tab"
                                                href="#item-one"
                                                role="tab"
                                                aria-controls="item-one"
                                                aria-selected="true"
                                                ><img
                                                    src="img/product/sd_nav_img01.jpg"
                                                    alt=""
                                            /></a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="shop-details-img-wrap">
                                    <div class="tab-content" id="myTabContent">
                                        <div
                                            class="tab-pane fade show active"
                                            id="item-one"
                                            role="tabpanel"
                                            aria-labelledby="item-one-tab"
                                        >
                                            <div class="shop-details-img">
                                                <img
                                                    src="img/product/shop_details_img01.jpg"
                                                    alt=""
                                                />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="shop-details-content">
                                <a href="#" class="product-cat"
                                    ></a
                                >
                                <h3 class="title">{{ product.name }}</h3>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="style-name">
                                    Style Name : {{product.item_code}}
                                </p>
                                <div class="price">Price :{{ price   }}</div>
                                <div class="product-details-info">
                                    <span>Size <a href="#">Guide</a></span>
                                    <div class="sidebar-product-size mb-30">
                                        <h4 class="widget-title">
                                            Product Size
                                        </h4>
                                        <div class="shop-size-list">
                                            <ul>
                                                <li><a href="#">{{ sizes  }}</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="sidebar-product-color">
                                        <h4 class="widget-title">Color</h4>
                                        <div class="shop-color-list">
                                            <ul>
                                                <li>{{ color }}</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="perched-info">
                                    <div class="cart-plus-minus">
                                        <form action="#" class="num-block">
                                            <input
                                                type="text"
                                                class="in-num"
                                                value="{{ qty }}"
                                                readonly=""
                                                v-model="qty"
                                            />
                                            <div class="qtybutton-box">
                                                <span class="plus"  v-on:click="qty+=1"
                                                    ><img
                                                        src="img/icon/plus.png"
                                                        alt=""
                                                /></span>
                                                <span class="minus dis" v-on:click="qty-= 1"
                                                    ><img
                                                        src="img/icon/minus.png"
                                                        alt=""
                                                /></span>
                                            </div>
                                        </form>
                                    </div>
                                    <a href="javascript:void(0)" @click="addtotdata(product.id,qty,product.product_attr[0].id)" class="btn">add to cart</a>
                                    <div class="wishlist-compare">
                                        <ul>
                                            <li>
                                                <a href="#"
                                                    ><i
                                                        class="far fa-heart"
                                                    ></i>
                                                    Add to Wishlist</a
                                                >
                                            </li>
                                            <li>
                                                <a href="#"
                                                    ><i
                                                        class="fas fa-retweet"
                                                    ></i>
                                                    Add to Compare List</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details-share">
                                    <ul>
                                        <li>Share :</li>
                                        <li>
                                            <a href="#"
                                                ><i
                                                    class="fab fa-facebook-f"
                                                ></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i class="fab fa-instagram"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i class="fab fa-twitter"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i
                                                    class="fab fa-pinterest-p"
                                                ></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i
                                                    class="fab fa-linkedin-in"
                                                ></i
                                            ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-desc-wrap">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a
                                            class="nav-link active"
                                            id="description-tab"
                                            data-toggle="tab"
                                            href="#description"
                                            role="tab"
                                            aria-controls="description"
                                            aria-selected="true"
                                            >Description Guide</a
                                        >
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a
                                            class="nav-link"
                                            id="reviews-tab"
                                            data-toggle="tab"
                                            href="#reviews"
                                            role="tab"
                                            aria-controls="reviews"
                                            aria-selected="false"
                                            >Reviews</a
                                        >
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div
                                        class="tab-pane fade show active"
                                        id="description"
                                        role="tabpanel"
                                        aria-labelledby="description-tab"
                                    >
                                        <div class="product-desc-title mb-30">
                                            <h4 class="title">
                                                Additional information :
                                            </h4>
                                        </div>
                                        <p>
                                           {{ product.description }}
                                        </p>
                                        <div class="color-size-info">
                                            <ul>
                                                <li>
                                                    <span>COLOR :</span> Black,
                                                    Gray
                                                </li>
                                                <li>
                                                    <span>SIZE :</span> XS, S,
                                                    M, L
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="additional-table">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-bordered"
                                                >
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">
                                                                Size Name
                                                            </th>
                                                            <td>28</td>
                                                            <td>49</td>
                                                            <td>36</td>
                                                            <td>55</td>
                                                            <td>44</td>
                                                            <td>34</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Waist Stretch
                                                            </th>
                                                            <td>19</td>
                                                            <td>38</td>
                                                            <td>31</td>
                                                            <td>55</td>
                                                            <td>44</td>
                                                            <td>34</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                Hip (7½” below
                                                                from waist)
                                                            </th>
                                                            <td>11</td>
                                                            <td>18</td>
                                                            <td>21</td>
                                                            <td>55</td>
                                                            <td>44</td>
                                                            <td>34</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                length (Out
                                                                seam)
                                                            </th>
                                                            <td>28</td>
                                                            <td>31</td>
                                                            <td>19</td>
                                                            <td>55</td>
                                                            <td>44</td>
                                                            <td>34</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <p>
                                            The purpose of lorem ipsum is to
                                            create a natural looking block of
                                            text (sentence, paragraph, page,
                                            etc.) that doesn't distract from the
                                            layout. A practice not without
                                            controversy, laying out pages with
                                            meaningless filler text can be very
                                            useful when the focus is meant to be
                                            on design, not content.
                                        </p>
                                    </div>
                                    <div
                                        class="tab-pane fade"
                                        id="reviews"
                                        role="tabpanel"
                                        aria-labelledby="reviews-tab"
                                    >
                                        <div class="product-desc-title mb-30">
                                            <h4 class="title">Reviews (0) :</h4>
                                        </div>
                                        <p>
                                            Your email address will not be
                                            published. Required fields are
                                            marked
                                        </p>
                                        <p class="adara-review-title">
                                            Be the first to review “Adara”
                                        </p>
                                        <div class="review-rating">
                                            <span>Your rating *</span>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                        <form
                                            action="#"
                                            class="comment-form review-form"
                                        >
                                            <span>Your review *</span>
                                            <textarea
                                                name="message"
                                                id="comment-message"
                                                placeholder="Your Comment"
                                            ></textarea>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        placeholder="Your Name*"
                                                    />
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="email"
                                                        placeholder="Your Email*"
                                                    />
                                                </div>
                                            </div>
                                            <div class="comment-check-box">
                                                <input
                                                    type="checkbox"
                                                    id="comment-check"
                                                />
                                                <label for="comment-check"
                                                    >Save my name and email in
                                                    this browser for the next
                                                    time I comment.</label
                                                >
                                            </div>
                                            <button class="btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="related-product-wrap">
                        <div class="row">
                            <div class="col-12">
                                <div class="related-product-title">
                                    <h4 class="title">You May Also Like...</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row related-product-active">
                            <div v-for="item in otherproduct"      :key="item.id"      class="col-xl-3">
                                <div class="new-arrival-item text-center">
                                    <div class="thumb mb-25">
                                        <a href="shop-details.html"
                                            ><img
                                                src="img/product/n_arrival_product01.jpg"
                                                alt=""
                                        /></a>
                                        <div class="product-overlay-action">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)"
@click="addtotdata(item.id,1,item.product_attr[0].id)"                                                        ><i
                                                            class="far fa-heart"


                                                            ></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a href="shop-details.html"
                                                        ><i
                                                            class="far fa-eye"
                                                        ></i
                                                    ></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5>
                                            <a href="shop-details.html"
                                                >{{ item.name }}</a
                                            >
                                        </h5>
                                        <span v-if="item.product_attr.length>0"   class="price"> {{ item.product_attr[0].price }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- shop-details-area-end -->
        </template>
    </Layout>
</template>
<script>
import layout from "./layout.vue";
import axios from "axios";
import getheadercate from "./providers";
import Layout from "./layout.vue";

export default {
    name: "Product",
    components: {
        Layout,
    },
    data() {
        return {
            slug: '',
            item_code: '',
            product:[],
            price:'',
            sizes:[],
            color:[],
            qty:1,
otherproduct:[]
        };
    },
    watch: {
        $route() {
            this.getproduct();
        },
    },
    mounted() {
        console.log('dsds')
        this.getproduct();
    },
    methods: {
        async getproduct() {
            this.slug = this.$route.params.slug;
            this.item_code=this.$route.params.item_code;
            console.log(this.slug);

            let data = await axios.get(
                getheadercate().getproduct +
                    '/' +
                    this.item_code +
                    '/'+
                    this.slug
            );

            if (data.status == 200) {
                this.product=data.data.data.data;
                console.log(this.product);
                this.otherproduct=data.data.data.data.otherproduct;
                for(var item in this.product.product_attr){
                    for( var items in this.product.product_attr[item].sizes){

                        this.sizes=this.product.product_attr[item].sizes.text;


                    }
                    for(var itemss in this.product.product_attr[item].colors){
                this.color=this.product.product_attr[item].colors.value;


               }
                }


                this.price=data.data.data.data.product_attr[0].price;


            }
        },
    },
};
</script>
