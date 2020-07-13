import "lazysizes";
import $ from "jquery";
import ContactForm from "./components/ContactForm";
import LoadMore from "./components/LoadMore";
import SearchForm from "./components/SearchForm";
import SiteHeader from "./components/SiteHeader";
import TextInputContainer from "./components/TextInputContainer";

$(".site-header").each((index, element) => new SiteHeader(element));
$(".load-more").each((index, element) => new LoadMore(element));
$(".text-input-container").each(
  (index, element) => new TextInputContainer(element)
);

$(".search-form").each((index, element) => new SearchForm(element));
$(".section-contact-form").each((index, element) => new ContactForm(element));
