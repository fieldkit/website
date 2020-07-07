import "lazysizes";
import $ from "jquery";
import LoadMore from "./components/LoadMore";
import SiteHeader from "./components/SiteHeader";
import TextInputContainer from "./components/TextInputContainer";
import SearchForm from "./components/SearchForm";

$(".site-header").each((index, element) => new SiteHeader(element));
$(".load-more").each((index, element) => new LoadMore(element));
$(".text-input-container").each(
  (index, element) => new TextInputContainer(element)
);

$(".search-form").each((index, element) => new SearchForm(element));
