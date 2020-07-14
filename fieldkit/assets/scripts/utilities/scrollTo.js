import $ from "jquery";

const $html = $("html, body");

$("[href*='#']").click((event) => {
  event.preventDefault();
  const selector = event.currentTarget.hash;
  const $scrollToElement = $(selector);
  const top = $scrollToElement.offset().top;
  $html.animate({ scrollTop: top - 50 }, 600);
});
