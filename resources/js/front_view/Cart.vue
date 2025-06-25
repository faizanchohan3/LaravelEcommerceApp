<template>
    <Layout >
        <template v-slot:content="SlotProps">
            <!-- breadcrumb-area -->
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="../assets/img/bg/breadcrumb_bg03.jpg"  style="
                            background-image: url('front_assets/img/bg/breadcrumb_bg03.jpg');
                        ">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <h2>Cart Page</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- cart-area -->
            <div class="cart-area pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="cart-wrapper">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail"></th>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">QUANTITY</th>
                                                <th class="product-subtotal">SUBTOTAL</th>
                                                <th class="product-delete"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in SlotProps.CartProduct" :key="item.id">
                                                <td class="product-thumbnail"><a href="shop-details.html"><img src="../assets/img/product/cart_img01.jpg" alt=""></a></td>
                                                <td class="product-name">
                                                    <h4><a href="shop-details.html"> {{ item.products[0].name }}</a></h4>
                                                </td>
                                                <td class="product-price">Rs: {{ item.products[0].product_attr[0].price }}</td>
                                                <td class="product-quantity">
                                                    <div class="cart-plus-minus">
                                                        <form action="#" class="num-block">
                                                            <input type="text" class="in-num" :value="item.qty" readonly="">
                                                            <div class="qtybutton-box">
                                                                <span v-on:click="SlotProps.addtotdata(item.products[0].id, 1, item.products[0].product_attr[0].id)" class="qty-btn plus">+</span>
                                                                <span @click="SlotProps.removecartdata(item.products[0].id, 1, item.products[0].product_attr[0].id)" class="qty-btn minus">-</span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span>{{ item.products[0].product_attr[0].price * item.qty }}</span></td>
                                                <td class="product-delete"><a href="javascript:void(0)" @click="SlotProps.removecartdata(item.products[0].id,item.qty,item.products[0].product_attr[0].id)"><i class="flaticon-trash"></i></a></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="shop-cart-bottom mt-20">
                                    <div class="cart-coupon">
                                        <form action="#">
                                            <input type="text" placeholder="Enter Coupon Code...">
                                            <button class="btn">Apply Coupon</button>
                                        </form>
                                    </div>
                                    <div class="continue-shopping">
                                        <a href="shop.html" class="btn">update shopping</a>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-total pt-95">
                                <h3 class="title">CART TOTALS</h3>
                                <div class="shop-cart-widget">
                                    <form action="#">
                                        <ul>

                                            <li class="sub-total"><span>SUBTOTAL</span> Rs  {{ SlotProps.cartTotal }}</li>
                                            <li>
                                                <span>SHIPPING</span>
                                                <div class="shop-check-wrap">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">FLAT RATE: $15</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">FREE SHIPPING</label>
                                                    </div>
                                                    <a href="#" class="calculate">Calculate shipping</a>
                                                </div>
                                            </li>
                                            <li class="cart-total-amount"><span>TOTAL</span> <span class="amount">$ 151.00</span></li>
                                        </ul>
                                        <a href="checkout.html" class="btn">PROCEED TO CHECKOUT</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart-area-end -->

            <!-- breadcrumb-area-end -->


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
      token:'',
      products:[],
        };
    },

    mounted() {
this.getcartdata();
    },
methods:{
    async getcartdata(){
        if (localStorage.getItem("user_info")) {
                var user = localStorage.getItem("user_info");
                console.log("ds", testUser);
                var testUser = JSON.parse(user);
                this.token = testUser.user_id;
        }
            try {


            let data=await axios.post(getheadercate().getcartdata,{

                'token':this.token,
            });
            if(data.status==200){
               this.products=data.data.data.data;
            }

        } catch (error) {

            }
        },
}
};
</script>
<style>
.qty-btn {
  cursor: pointer;
  padding: 0 8px;
  font-weight: bold;
  user-select: none;
}
.qty-value {
  margin: 0 5px;
}
</style>