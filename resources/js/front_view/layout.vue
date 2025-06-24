<template>
    <!-- preloader end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header class="header-style-two">
        <div
            id="sticky-header"
            class="main-header transparent-header menu-area"
        >
            <div class="container custom-container-two">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler">
                            <i class="fas fa-bars"></i>
                        </div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="logo">
                                    <a href="index.html" class="main-logo"
                                        ><img
                                            src="../assets/img/logo/fw_logo.png"
                                            alt="Logo"
                                    /></a>
                                    <a href="index.html" class="sticky-logo"
                                        ><img
                                            src="../assets/img/logo/logo.png"
                                            alt="Logo"
                                    /></a>
                                </div>
                                <div
                                    class="navbar-wrap main-menu d-none d-lg-flex"
                                >
                                    <ul class="navigation">
                                        <li
                                            v-for="item in headercategories.category"
                                            :key="item.id"
                                            class="has--mega--menu"
                                        >
                                            <router-link
                                                :to="`/category/` + item.slug"
                                                >{{ item.name }}</router-link
                                            >
                                            <ul class="mega-menu">
                                                <li class="mega-menu-wrap">
                                                    <ul class="mega-menu-col">
                                                        <li
                                                            v-for="childitem in headercategories.sub_category.filter(
                                                                (sub) =>
                                                                    sub.parent_id ===
                                                                    item.id
                                                            )"
                                                            class="mega-title"
                                                        >
                                                            <router-link
                                                                :to="
                                                                    `/category/` +
                                                                    childitem.slug
                                                                "
                                                                >{{
                                                                    childitem.name
                                                                }}</router-link
                                                            >
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <li class="header-search">
                                            <a
                                                href="#"
                                                data-toggle="modal"
                                                data-target="#search-modal"
                                                ><i class="flaticon-search"></i
                                            ></a>
                                        </li>
                                        <li class="header-shop-cart">
                                            <a href="#"
                                                ><i
                                                    class="flaticon-shopping-bag"
                                                ></i
                                                ><span>{{ CartCount }}</span></a
                                            >
                                            <ul class="minicart">
                                                <li
                                                    class="d-flex align-items-start"

                                                v-if="CartCount > 0" v-for="items in CartProduct" :key="items.id"
                                                    >
                                                    <div class="cart-img">
                                                        <a href="#"
                                                            ><img
                                                                src="../assets/img/product/cart_p01.jpg"
                                                                alt=""
                                                        /></a>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h4>
                                                            <a href="#"
                                                                >{{ items.products[0].name }}</a
                                                            >
                                                        </h4>
                                                        <div class="cart-price">
                                                            <span class="new"
                                                                >Rs {{ items.products[0].product_attr[0].price }}</span
                                                            >
                                                            <span
                                                                ><del
                                                                    >{{ items.products[0].product_attr[0].mrp }}</del
                                                                ></span
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="del-icon">
                                                        <a href="javascript:void(0)"  @click="removecartdata(items.products[0].id,1,items.products[0].product_attr[0].id)"><i
                                                                class="far fa-trash-alt"
                                                            ></i
                                                        ></a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="total-price">
                                                        <span class="f-left"
                                                            >Total:</span
                                                        >
                                                        <span class="f-right"
                                                            > Rs: {{ cartTotal }}</span
                                                        >
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkout-link">
                                                        <router-link to="/cart">sjopping</router-link>
                                                        <a
                                                            class="black-color"
                                                            href="#"
                                                            >Checkout</a
                                                        >
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="header-profile">
                                            <a href="#"
                                                ><i
                                                    class="flaticon-user-profile"
                                                ></i
                                            ></a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <div class="close-btn">
                                <i class="flaticon-targeting-cross"></i>
                            </div>
                            <nav class="menu-box">
                                <div class="nav-logo">
                                    <a href="index.html"
                                        ><img
                                            src="../assets/img/logo/logo.png"
                                            alt=""
                                            title=""
                                    /></a>
                                </div>
                                <div class="menu-outer">
                                    <ul class="navigation">
                                        <li
                                            class="active menu-item-has-children"
                                        >
                                            <a href="#">Home</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="index.html"
                                                        >Home One</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="index-2.html"
                                                        >Home Two</a
                                                    >
                                                </li>
                                                <li class="active">
                                                    <a href="index-3.html"
                                                        >Home Three</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="index-4.html"
                                                        >Home Four</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="index-5.html"
                                                        >Home Five</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="index-6.html"
                                                        >Home Six</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="index-7.html"
                                                        >Home Seven</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="index-8.html"
                                                        >Home Eight</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="index-9.html"
                                                        >Home Nine</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="shop.html"
                                                        >Shop Page</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="shop-sidebar.html"
                                                        >Shop Sidebar</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="shop-details.html"
                                                        >Shop Details</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="cart.html"
                                                        >Cart Page</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="cart.html"
                                                        >Checkout Page</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="about-us.html">About Us</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">blog</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="blog.html"
                                                        >Our Blog</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="blog-details.html"
                                                        >Blog Details</a
                                                    >
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.html"
                                                >Contact Us</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <li>
                                            <a href="#"
                                                ><span
                                                    class="fab fa-twitter"
                                                ></span
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><span
                                                    class="fab fa-facebook-square"
                                                ></span
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><span
                                                    class="fab fa-pinterest-p"
                                                ></span
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><span
                                                    class="fab fa-instagram"
                                                ></span
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><span
                                                    class="fab fa-youtube"
                                                ></span
                                            ></a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Search -->
        <div
            class="modal fade"
            id="search-modal"
            tabindex="-1"
            role="dialog"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <input type="text" placeholder="Search here..." />
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Search-end -->

        <!-- off-canvas-start -->
        <div class="sidebar-toggle-btn">
            <a href="#" class="navSidebar-button"
                ><img src="../assets/img/icon/sidebar_toggle_icon.png" alt=""
            /></a>
        </div>
        <div class="sidebar-off-canvas info-group">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-widget scroll">
                <div class="sidebar-widget-container">
                    <div class="off-canvas-heading">
                        <a href="#" class="close-side-widget">
                            <span class="flaticon-targeting-cross"></span>
                        </a>
                    </div>
                    <div class="sidebar-textwidget">
                        <div class="sidebar-info-contents">
                            <div class="content-inner">
                                <div class="logo mb-30">
                                    <a href="index.html"
                                        ><img
                                            src="../assets/img/logo/logo.png"
                                            alt=""
                                    /></a>
                                </div>
                                <div class="content-box">
                                    <p>
                                        WooCommerce and WordPress are both free,
                                        open source software reasons many ...
                                    </p>
                                </div>
                                <div class="contact-info">
                                    <h4 class="title">CONTACT US</h4>
                                    <ul>
                                        <li>
                                            <span
                                                class="flaticon-phone-call"
                                            ></span
                                            ><a href="tel:123456789"
                                                >+9 325 444 0000</a
                                            >
                                        </li>
                                        <li>
                                            <span class="flaticon-email"></span
                                            ><a href="mailto:adara@info.com"
                                                >adara@info.com</a
                                            >
                                        </li>
                                        <li>
                                            <span class="flaticon-place"></span
                                            >71 Park Lan Street 2355 NY
                                        </li>
                                    </ul>
                                </div>
                                <div class="oc-newsletter">
                                    <h4 class="title">NEWSLETTER</h4>
                                    <p>
                                        Fill your email below to subscribe to my
                                        newsletter
                                    </p>
                                    <form action="#">
                                        <input
                                            type="email"
                                            placeholder="Email..."
                                        />
                                        <button class="btn">Subscribe</button>
                                    </form>
                                </div>
                                <div class="oc-social">
                                    <ul>
                                        <li>
                                            <a href="#"
                                                ><i
                                                    class="fab fa-facebook-f"
                                                ></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i class="fab fa-twitter"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i class="fab fa-youtube"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i class="fab fa-instagram"></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i
                                                    class="fab fa-linkedin-in"
                                                ></i
                                            ></a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                ><i class="fab fa-google"></i
                                            ></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="oc-bottom">
                                    <div class="currency">
                                        <form action="#">
                                            <label>Currency</label>
                                            <select name="select">
                                                <option value="">USD</option>
                                                <option value="">AUE</option>
                                                <option value="">SAR</option>
                                                <option value="">INR</option>
                                                <option value="">BDT</option>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="language">
                                        <form action="#">
                                            <label>Language</label>
                                            <select name="select">
                                                <option value="">
                                                    English
                                                </option>
                                                <option value="">
                                                    Spanish
                                                </option>
                                                <option value="">
                                                    Turkish
                                                </option>
                                                <option value="">
                                                    Russian
                                                </option>
                                                <option value="">
                                                    Chinese
                                                </option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area-end -->

    <!-- main-area -->
    <main>
        <slot name="content"  :addtotdata="addtotdata" :CartProduct="CartProduct" :cartTotal="cartTotal" ></slot>
    </main>
    <!-- footer-area -->
    <footer class="dark-bg pt-55 pb-80" style="padding-bottom: 0rem">
        <div class="container">
            <div class="footer-top-wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-logo">
                            <a href="index.html"
                                ><img
                                    src="../assets/img/logo/w_logo.png"
                                    alt=""
                            /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-middle-wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-link-wrap">
                            <nav class="menu-links">
                                <ul>
                                    <li>
                                        <a href="about-us.html">About us</a>
                                    </li>
                                    <li>
                                        <a href="shop-sidebar.html">Store</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Locations</a>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="contact.html">Support</a></li>
                                    <li><a href="#">Policy</a></li>
                                    <li><a href="#">Faqs</a></li>
                                </ul>
                            </nav>
                            <div class="footer-social">
                                <ul>
                                    <li>
                                        <a href="#"
                                            ><i class="fab fa-facebook-f"></i
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><i class="fab fa-twitter"></i
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><i class="fab fa-youtube"></i
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><i class="fab fa-instagram"></i
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><i class="fab fa-linkedin-in"></i
                                        ></a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            ><i class="fab fa-google"></i
                                        ></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="copyright-text">
                            <p>
                                &copy; 2021 <a href="index.html">adara</a>. All
                                Rights Reserved | Ph (+09) 456 457869
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pay-method-img">
                            <img
                                src="../assets/img/images/payment_method_img.png"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="scripts"></div>
</template>
<script>
import axios from "axios";
import getheadercate from "./providers";
import { RouterLink } from "vue-router";
export default {
    name: "layout",
    props: {
  addtotdata: {
    type: Function,
    default: () => {}
  }
},

    data() {
        return {
            headercategories: [],
            CartCount: 0,
            CartTotal: 0,
            CartProduct: [],
            user_info: {
                user_id: "",
                auth: false,
            },
        };
    },
    watch:{
  CartProduct(val){
    this.cartTotal = 0;
    for(var item in val){
      this.cartTotal += val[item].qty *  val[item].products[0].product_attr[0].price;
    }
console.log(this.cartTotal);
  }

},
    mounted() {
        var src = [
            "../front_assets/js/main.js",
            "../front_assets/js/popper.min.js",
            "../front_assets/js/bootstrap.min.js",
            "../front_assets/js/isotope.pkgd.min.js",
            "../front_assets/js/imagesloaded.pkgd.min.js",
            "../front_assets/js/jquery.magnific-popup.min.js",
            "../front_assets/js/jquery.mCustomScrollbar.concat.min.js",
            "../front_assets/js/bootstrap-datepicker.min.js",
        ];
        for (var i = 0; i < src.length; i++) {
            var script = document.createElement("script");
            script.src = src[i];
            document.getElementById("scripts").appendChild(script);
        }
        this.getcategories();
        this.getuser();
this.getcartdata();
    },
    methods: {
        async removecartdata(product_id,qty,product_attr_id){
try {

let data=await axios.post(getheadercate().removecart,{
'token':this.user_info.user_id,
'product_id':product_id,
'qty':qty,
'product_attr_id':product_attr_id,
});
if(data.status=200){
    this.getcartdata();
}
} catch (error) {

}

        },
        async addtotdata(product_id,qty,product_attr_id){
            try {


            let data=await axios.post(getheadercate().addtocart,{

                'token':this.user_info.user_id,
                'auth':this.user_info.auth,
                'product_id':product_id,
                'qty':qty,
                'product_attr_id':product_attr_id,
            });
            if(data.status==200){
this.getcartdata();
            }

        } catch (error) {

            }
        },
        async getcartdata(){
            try {


            let data=await axios.post(getheadercate().getcartdata,{

                'token':this.user_info.user_id,
            });
            if(data.status==200){
this.CartCount=data.data.data.data.length;
console.log(this.CartCount);
this.CartProduct=data.data.data.data;
console.log('sa',this.CartProduct[0].qty);
            }

        } catch (error) {

            }
        },
        async getuser() {
            if (localStorage.getItem("user_info")) {
                var user = localStorage.getItem("user_info");
                console.log("ds", testUser);
                var testUser = JSON.parse(user);
                this.user_info.user_id = testUser.user_id;

                this.getUserData();
            } else {
                this.getUserData();
            }
        },

        async getUserData() {
            try {
                let data = await axios.post(getheadercate().getUserData, {
                    token: this.user_info.user_id,
                });
                if (data.status == 200) {
                    if (data.data.data.data.user_type == 1) {
                        this.user_info.auth = true;
                        this.user_info.user_id = data.data.data.data.token;
                        localStorage.setItem(
                            "user_info",
                            JSON.stringify(this.user_info)
                        );
                    } else {
                        this.user_info.auth = false;
                        this.user_info.user_id = data.data.data.data.token;
                        localStorage.setItem(
                            "user_info",
                            JSON.stringify(this.user_info)
                        );
                    }
                } else {
                    console.log("data not found");
                }
            } catch (error) {}
        },

        async getcategories() {
            try {
                let data = await axios.get(
                    getheadercate().getheaderCateforyData
                );

                this.headercategories = data.data.data.data;
            } catch (error) {
                console.log(error);
            }
        },
    },
};
</script>
