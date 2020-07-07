import "lazysizes";
import $ from "jquery";
import LoadMore from "./components/LoadMore";
import SiteHeader from "./components/SiteHeader";
import TextInputContainer from "./components/TextInputContainer";

$(".site-header").each((index, element) => new SiteHeader(element));
$(".load-more:not(.load-more-events-news)").each(
  (index, element) => new LoadMore(element)
);
$(".text-input-container").each(
  (index, element) => new TextInputContainer(element)
);
