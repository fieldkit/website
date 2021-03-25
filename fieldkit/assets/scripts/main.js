import "lazysizes";
import $ from "jquery";
import "magnific-popup";
import ContactForm from "./components/ContactForm";
import LoadMore from "./components/LoadMore";
import SiteHeader from "./components/SiteHeader";
import TextInputContainer from "./components/TextInputContainer";
import SortDropdown from "./components/SortDropdown";
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

$(".woocommerce-loop-product__link img").wrap(
  "<div class='wp-post-image--container'></div>"
);

$("form.woocommerce-widget-layered-nav-dropdown").each(
  (index, element) => new FilterDropdown(element)
);


if ($('.woocommerce-MyAccount-navigation-link--my-pre-orders').length > 0) {
  $('.woocommerce-MyAccount-navigation-link--my-pre-orders').find('a').text('Pre-Orders');
  if ($('.woocommerce-MyAccount-navigation-link--my-pre-orders').hasClass('is-active')) {
    $('.woocommerce-MyAccount-content').find('h1:first').text('Pre-Orders')
  }
}


if ($('.woocommerce-MyAccount-navigation-link--woocommerce-waitlist').length > 0) {
  $('.woocommerce-MyAccount-navigation-link--woocommerce-waitlist').find('a').text('Waitlists');
  if ($('.woocommerce-MyAccount-navigation-link--woocommerce-waitlist').hasClass('is-active')) {
    $('.woocommerce-MyAccount-content').find('h2:first').text('Waitlists');
  }
}

if ($('.product-template-default select').length > 0) {
  $('.sku span').hide();

  $('.reset_variations').on('click', () => $('.sku span').hide());
  $('.product-template-default select').on('change', (event) => {
    const $el = $(event.currentTarget);
    const $variationOptions = $el.children('.attached');
    const $selectedOption = $variationOptions.filter((index, item) => {
      return $(item).val() == $el.val()
    });

    if ($variationOptions.index($selectedOption) >= 0) {
      const selectedindex = $variationOptions.index($selectedOption);
      $('.sku span').hide();
      $(`.sku span#sku-child-${selectedindex}`).show();
    } else {
      $('.sku span').hide();
    }
  });
}

$('.mp-lightbox').magnificPopup({
  type: 'image',
  closeOnContentClick: false,
  mainClass: 'mfp-img-mobile',
  fixedContentPos: true,
  image: {
    verticalFit: true,
  },
  callbacks: {
    open: function() {
        $('body').addClass('overflow-hidden');
    },
    close: function() {
        $('body').removeClass('overflow-hidden');
    },
  }
});
