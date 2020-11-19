import "lazysizes";
import $ from "jquery";
import ContactForm from "./components/ContactForm";
import LoadMore from "./components/LoadMore";
import SiteHeader from "./components/SiteHeader";
import TextInputContainer from "./components/TextInputContainer";
import SortDropdown from "./components/SortDropdown";
import WooCommerceAccount from "./components/WooCommerceAccount";
import FilterDropdown from "./components/FilterDropdown";

$(".site-header").each((index, element) => new SiteHeader(element));
$(".load-more").each((index, element) => new LoadMore(element));
$(".text-input-container").each(
  (index, element) => new TextInputContainer(element)
);

$(".section-contact-form").each((index, element) => new ContactForm(element));

$(".woocommerce-ordering--variant").each(
  (index, element) => new SortDropdown(element)
);

// $(".woocommerce-account").each(
//   (index, element) => new WooCommerceAccount(element)
// );

$(".woocommerce-loop-product__link img").wrap(
  "<div class='wp-post-image--container'></div>"
);

$("form.woocommerce-widget-layered-nav-dropdown").each(
  (index, element) => new FilterDropdown(element)
);


if ($('.woocommerce-MyAccount-navigation-link--my-pre-orders').length > 0) {
  $('.woocommerce-MyAccount-navigation-link--my-pre-orders').find('a').text('Pre-Orders');
  if ($('.woocommerce-MyAccount-navigation-link--my-pre-orders.is-active')) {
    $('.woocommerce-MyAccount-content').find('h1:first').text('Pre-Orders')

  }
}


if ($('.woocommerce-MyAccount-navigation-link--woocommerce-waitlist').length > 0) {
  $('.woocommerce-MyAccount-navigation-link--woocommerce-waitlist').find('a').text('Waitlists');
  if ($('.woocommerce-MyAccount-navigation-link--woocommerce-waitlist.is-active')) {
    $('.woocommerce-MyAccount-content').find('h2:first').text('Waitlists');
  }
}
