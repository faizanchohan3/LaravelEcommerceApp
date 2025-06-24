<template>
    <Layout>
        <template v-slot:content>
            <section
                class="breadcrumb-area breadcrumb-bg"
                data-background="/front_assets/img/bg/breadcrumb_bg01.jpg"
            >
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <h2>Shop Sidebar</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.html">Home</a>
                                        </li>
                                        <li
                                            class="breadcrumb-item active"
                                            aria-current="page"
                                        >
                                            Shop
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- shop-area -->
            <section class="shop-area pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="shop-top-meta mb-35">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="shop-top-left">
                                            <ul>
                                                <li>
                                                    <a href="#"
                                                        ><i
                                                            class="flaticon-menu"
                                                        ></i>
                                                        FILTER</a
                                                    >
                                                </li>
                                                <li>
                                                    Showing 1–9 of 80 results
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="shop-top-right">
                                            <form action="#">
                                                <select name="select">
                                                    <option value="">
                                                        Sort by newness
                                                    </option>
                                                    <option>
                                                        Free Shipping
                                                    </option>
                                                    <option>Best Match</option>
                                                    <option>Newest Item</option>
                                                    <option>Size A - Z</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div
                                    v-for="item in allproduct"
                                    :key="item.id"
                                    class="col-xl-4 col-sm-6"
                                >
                                    <div
                                        class="new-arrival-item text-center mb-50"
                                    >
                                        <div class="thumb mb-25">
                                            <a href="shop-details.html"
                                                ><img
                                                    src="../assets/img/product/n_arrival_product01.jpg"
                                                    alt=""
                                            /></a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li>
                                                        <a href="cart.html"
                                                            ><i
                                                                class="far fa-heart"
                                                            ></i
                                                        ></a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="shop-details.html"
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
                                                <a href="shop-details.html">{{
                                                    item.name
                                                }}</a>
                                            </h5>
                                            <span class="price"
                                                >$
                                                {{
                                                    item.product__attr &&
                                                    item.product__attr.length >
                                                        0
                                                        ? item.product__attr[0]
                                                              .price
                                                        : "0.00"
                                                }}</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-wrap">
                                <ul>
                                    <li class="prev"><a href="#">Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li class="next"><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <aside class="shop-sidebar">
                                <div class="widget side-search-bar">
                                    <form action="#">
                                        <input type="text" />
                                        <button>
                                            <i class="flaticon-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">
                                        Product Categories
                                    </h4>
                                    <div class="shop-cat-list">
                                        <ul>
                                            <li
                                                v-for="item in sub_category.cat"
                                                :key="item.id"
                                            >
                                                <router-link
                                                    :to="
                                                        `/category/` + item.slug
                                                    "
                                                    >{{
                                                        item.name
                                                    }}</router-link
                                                ><span> </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Price Filter</h4>
                                    <div class="price_filter">
                                        <div id="slider-range"></div>
                                        <div class="price_slider_amount">
                                            <span>Price :</span>
                                            <input
                                                type="text"
ref="lowprice"
                                                id="lowprice"
                                                placeholder="Add Your Price"
                                            />
                                               <input
                                                type="text"
ref="highprice"

                                                id="highprice"

                                                placeholder="Add Your Price"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Product Brand</h4>
                                    <div class="sidebar-brand-list">
                                        <ul>
                                            <li
                                                v-for="items in brands"
                                                :key="items.id"
                                                v-on:click="
                                                    adddatatog(
                                                        'brand',
                                                        items.id
                                                    )
                                                "
                                            >
                                                <a href="javascript:void(0)"
                                                :class="this.brand.includes(items.id) ?brandcolor:' '"
                                                >{{ items.text }}
                                                    <i
                                                        class="fas fa-angle-double-right"
                                                    ></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Product Attributes</h4>
                                    <div class="sidebar-brand-list">
                                        <ul>
                                            <li
                                                v-for="items in attributesdata"
                                                :key="items.id"
                                                v-on:click="
                                                    adddatatog(
                                                        'Attribute',
                                                        items.id
                                                    )
                                                "
                                            >
                                                <a href="javascript:void(0)"
                                                :class="this.Attribute.includes(items.id) ?brandcolor:' '"
                                                >{{ items.attribute.values }}
                                                    <i
                                                        class="fas fa-angle-double-right"
                                                    ></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget has-border">
                                    <div class="sidebar-product-size mb-30">
                                        <h4 class="widget-title">
                                            Product Size
                                        </h4>
                                        <div class="shop-size-list">
                                            <ul>
                                                <li
                                                    v-for="item in sub_category.size"
                                                    :key="item.id"
                                                     v-on:click="
                                                    adddatatog(
                                                        'size',
                                                        item.id
                                                    )
                                                "
                                                >
                                                    <a
                                                        href="javascript:void(0)"
                                                        :class="this.size.includes(item.id) ?sizecolor:' '"
                                                        >{{ item.text }}</a
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="sidebar-product-color">
                                        <h4 class="widget-title">Color</h4>
                                        <div class="shop-color-list">
                                            <ul>
                                                <li
                                                    v-for="item in sub_category.color"
                                                    :key="item.id"

                                                v-on:click="
                                                    adddatatog(
                                                        'color',
                                                        item.id
                                                    )
                                                "
:class="this.color.includes(item.id) ?colorcolor:' '"
                                                    :style="{
                                                        backgroundColor:
                                                            item.value,
                                                    }"
                                                ></li>
                                            </ul>
                                        </div>

                                        <div class="filter-button-container">
                                            <button  type="button"    class="filter-btn" @click="getdata">
                                                Filter

                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <h4 class="widget-title">Top Items</h4>
                                    <div class="sidebar-product-list">
                                        <ul>
                                            <li>
                                                <div
                                                    class="sidebar-product-thumb"
                                                >
                                                    <a href="#"
                                                        ><img
                                                            src="img/product/sidebar_product01.jpg"
                                                            alt=""
                                                    /></a>
                                                </div>
                                                <div
                                                    class="sidebar-product-content"
                                                >
                                                    <div class="rating">
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                    </div>
                                                    <h5>
                                                        <a href="#"
                                                            >Woman T-shirt</a
                                                        >
                                                    </h5>
                                                    <span>$ 39.00</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="sidebar-product-thumb"
                                                >
                                                    <a href="#"
                                                        ><img
                                                            src="img/product/sidebar_product02.jpg"
                                                            alt=""
                                                    /></a>
                                                </div>
                                                <div
                                                    class="sidebar-product-content"
                                                >
                                                    <div class="rating">
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                    </div>
                                                    <h5>
                                                        <a href="#"
                                                            >Slim Fit Cotton</a
                                                        >
                                                    </h5>
                                                    <span>$ 39.00</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="sidebar-product-thumb"
                                                >
                                                    <a href="#"
                                                        ><img
                                                            src="img/product/sidebar_product03.jpg"
                                                            alt=""
                                                    /></a>
                                                </div>
                                                <div
                                                    class="sidebar-product-content"
                                                >
                                                    <div class="rating">
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                        <i
                                                            class="fas fa-star"
                                                        ></i>
                                                    </div>
                                                    <h5>
                                                        <a href="#"
                                                            >Fashion T-shirt</a
                                                        >
                                                    </h5>
                                                    <span>$ 39.00</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </aside>
                        </div>
                    </div>
                </div>


            </section>
            <!-- shop-area-end -->
        </template>
    </Layout>
</template>
<script>
import Layout from "./layout.vue";
import axios from "axios";
import getheadercate from "./providers.js";

export default {
    name: "Category",
    data() {
        return {
            getcategory: [],
            allproduct: [],
            sub_category: [],
            highprice: "",
            lowprice: "",
            pricerange: "",
            brands: [],
           brand:[],
           color:[],
           size:[],
           brandcolor:'brandcolor',
           sizecolor:'sizecolor',
           colorcolor:'colorcolor',
           Attrcolor:'Attrcolor',
           attributesdata:[],
           Attribute: [],
           selectedAttributes:[],
        };
    },
components: {
    Layout,
},
    watch: {
        $route() {
            this.getdata();
        },
    },
    mounted() {
        this.getdata();
},
    methods: {
        adddatatog(type, value) {
            if (type == 'brand') {
                if (this.checkdata(type, value)) {
                    this.brand.splice(this.brand.indexOf(value), 1);
                } else {
                    this.brand.push(value);
                }
                console.log(this.brand);
            } else if (type == 'size') {
                if (this.checkdata(type, value)) {
                    this.size.splice(this.size.indexOf(value), 1);
                } else {
                    this.size.push(value);
                }
            } else if (type == 'color') {
                if (this.checkdata(type, value)) {
                    this.color.splice(this.color.indexOf(value), 1);
                } else {
                    this.color.push(value);
                }
            }
            else if (type == 'Attribute') {
                if (this.checkdata(type, value)) {
                    this.Attribute.splice(this.Attribute.indexOf(value), 1);
                } else {
                    this.Attribute.push(value);
                }
                console.log('Selected attributes:', this.Attribute);
            }
        },
        checkdata(type, value) {
            if (type == 'brand') {
                return this.brand.includes(value);
            } else if (type == 'size') {
                return this.size.includes(value);
            } else if (type == 'color') {
                return this.color.includes(value);
            } else if (type == 'Attribute') {
                return this.Attribute.includes(value);
            }
        },
        async getdata() {
            this.slug = this.$route.params.slug;

            // Debug: Log the data being sent
            console.log('Sending data to API:', {
                slug: this.slug,
                attribute: this.Attribute,
                lowprice: this.$refs.lowprice.value,
                highprice: this.$refs.highprice.value,
                brand: this.brand,
                size: this.size,
                color: this.color
            });

            let data = await axios.post(
                getheadercate().getcategorydata ,{
"slug":this.slug,
"attribute":this.Attribute,
"lowprice":this.$refs.lowprice.value,
"highprice":this.$refs.highprice.value,
"brand":this.brand,
"size":this.size,
"color":this.color
                }
            );

            this.lowprice = data.data.data.data.lowprice;
            this.highprice = data.data.data.data.highprice;


            // Expose values to global scope for JavaScript access
            window.vueLowPrice = this.lowprice;
            window.vueHighPrice = this.highprice;

            this.getcategory = data.data.data.data.category.data;
            this.sub_category = data.data.data.data;

            this.brands = data.data.data.data.brand;
            this.$refs.lowprice.value=data.data.data.data.lowprice;
            this.$refs.highprice.value=data.data.data.data.highprice;
            this.allproduct = this.getcategory[0].product;
            this.attributesdata=data.data.data.data.categoryatribute;
                       console.log(this.attributesdata);
        },
        applyFilters() {
console.log(this.$refs.lowprice.value);
console.log(this.$refs.highprice.value)
console.log('brand',this.brand);
console.log('ddd', this.color);
            // Handle filter logic here
            console.log('Applying filters...');
            console.log('Selected brands:', this.brand);
            console.log('Selected sizes:', this.size);
            console.log('Selected colors:', this.color);
            console.log('Price range:', this.pricerange);
            console.log('Selected attributes:', this.Attribute);

            // You can implement the actual filtering logic here
            // For example, make an API call with the selected filters
        },

    },
    computed: {
        selectedFiltersCount() {
            let count = 0;
            if (this.brand.length > 0) count++;
            if (this.size.length > 0) count++;
            if (this.color.length > 0) count++;
            if (this.pricerange) count++;
            if (this.Attribute.length > 0) count++;
            return count;
        },
        selectedBrandsText() {
            if (this.brand.length === 0) return '';
            return this.brands
                .filter(b => this.brand.includes(b.id))
                .map(b => b.text)
                .join(', ');
        },
        selectedSizesText() {
            if (this.size.length === 0) return '';
            return this.sub_category.size
                .filter(s => this.size.includes(s.id))
                .map(s => s.text)
                .join(', ');
        },
        selectedColorsText() {
            if (this.color.length === 0) return '';
            return this.sub_category.color
                .filter(c => this.color.includes(c.id))
                .map(c => c.text)
                .join(', ');
        },
        selectedAttributesText() {
            if (this.Attribute.length === 0) return '';

            return this.attributesdata
                .filter(c => this.Attribute.includes(c.id))
                .map(c => c.name)
                .join(', ');



        }
    },
};
</script>
<style>
.brandcolor::before{
    background-color: #ff5400;
}
.sizecolor{
    background-color: #ff5400;
    color: #ffff;
}
.colorcolor::before{
    content: '\2713';
display: inline-block;
padding: 0 6px 0 0;
color: #ff5400;

}
.filter-button-container {
    margin-top: 20px;
    text-align: center;
}
.filter-btn {
    background-color: #ff5400;
    color: white;
    border: none;
    padding: 10px 25px;
    border-radius: 5px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.filter-btn:hover {
    background-color: #e64a00;
}
.filter-count {
    margin-left: 5px;
    font-size: 12px;
    opacity: 0.9;
}
.selected-filters {
    margin-top: 15px;
    padding: 10px;
    background-color: #f8f9fa;
    border-radius: 5px;
    border: 1px solid #e9ecef;
}
.filter-item {
    margin-bottom: 8px;
    font-size: 12px;
    color: #666;
}
.filter-item:last-child {
    margin-bottom: 0;
}


</style>
