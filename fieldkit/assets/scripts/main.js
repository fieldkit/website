import $ from "jquery";
import TextInputContainer from "./components/TextInputContainer";

$(".text-input-container").each(
  (index, element) => new TextInputContainer(element)
);
