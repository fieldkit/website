import "lazysizes";
import "magnific-popup";

import $ from "jquery";
import ContactForm from "./components/ContactForm";
import FilterDropdown from "./components/FilterDropdown";
import LoadMore from "./components/LoadMore";
import ScrollToTop from "./components/ScrollToTop";
import SiteHeader from "./components/SiteHeader";
import SortDropdown from "./components/SortDropdown";
import TextInputContainer from "./components/TextInputContainer";

$(".site-header").each((index, element) => new SiteHeader(element));
$(".load-more").each((index, element) => new LoadMore(element));
$(".text-input-container").each(
  (index, element) => new TextInputContainer(element)
);
$(".scroll-to-top").each((index, element) => new ScrollToTop(element));

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


if ($(".woocommerce-MyAccount-navigation-link--my-pre-orders").length > 0) {
  $(".woocommerce-MyAccount-navigation-link--my-pre-orders").find("a").text("Pre-Orders");
  if ($(".woocommerce-MyAccount-navigation-link--my-pre-orders").hasClass("is-active")) {
    $(".woocommerce-MyAccount-content").find("h1:first").text("Pre-Orders");
  }
}


if ($(".woocommerce-MyAccount-navigation-link--woocommerce-waitlist").length > 0) {
  $(".woocommerce-MyAccount-navigation-link--woocommerce-waitlist").find("a").text("Waitlists");
  if ($(".woocommerce-MyAccount-navigation-link--woocommerce-waitlist").hasClass("is-active")) {
    $(".woocommerce-MyAccount-content").find("h2:first").text("Waitlists");
  }
}
if ($(".product-template-default select").length > 0) {
  $(".sku span").hide();
  $(".variations_form").on("change", ".variations select", function () {
    $(".sku span").hide();
    let selectedAttributes = {};
    // Get selected variation attributes
    $(".variations_form select").each(function () {
      let attributeName = $(this).attr("name");
      let selectedValue = $(this).val();
      selectedAttributes[attributeName] = selectedValue;
    });

    // Loop through available variations to find the matching one
    let selectedVariation = null;
    $.each(
      $(".variations_form").data("product_variations"),
      function (index, variation) {
        let isMatch = true;
        // Check if the variation matches the selected options
        $.each(selectedAttributes, function (attributeName, selectedValue) {
          if (variation.attributes[attributeName] !== selectedValue) {
            isMatch = false;
            return false; // Break the loop if mismatch is found
          }
        });

        if (isMatch) {
          selectedVariation = variation; // If we find a match, save the variation
          return false; // Stop looping once the variation is found
        }
      }
    );
    // If a matching variation is found, display its SKU
    if (selectedVariation) {
      let sku = selectedVariation.sku;
      $(`.sku span[data-value='${sku}']`).show();
    }
  });
}

$(".mp-lightbox").on("click", () => {
  $("body").magnificPopup({
    callbacks: {
      close: function () {
        $("body").removeClass("overflow-hidden");
      },
      open: function () {
        $("body").addClass("overflow-hidden");
      },
    },
    closeOnContentClick: false,
    delegate: "a.mp-lightbox",
    fixedContentPos: true,
    image: {
      verticalFit: true,
    },
    mainClass: "mfp-img-mobile",
    preloader: false,
    type: "image",
  });
});

if ($(".rendered-dropdown").find("li").first().hasClass("selected")) {
  $("#product-filter-reset").hide();
}
