import "lazysizes";
import $ from "jquery";
import ContactForm from "./components/ContactForm";
import LoadMore from "./components/LoadMore";
import SiteHeader from "./components/SiteHeader";
import TextInputContainer from "./components/TextInputContainer";
import SortDropdown from "./components/SortDropdown";

$(".site-header").each((index, element) => new SiteHeader(element));
$(".load-more").each((index, element) => new LoadMore(element));
$(".text-input-container").each(
  (index, element) => new TextInputContainer(element)
);

$(".section-contact-form").each((index, element) => new ContactForm(element));


$(".woocommerce-ordering--variant").each(
  (index, element) => new SortDropdown(element)
);
