import $ from "jquery";

class TextInputContainer {
  constructor(element) {
    this.$element = $(element);
    this.$label = this.$element.find(".text-label");
    this.$input = this.$element.find(".text-input");

    this.addListeners();
  }

  addListeners() {
    this.$input.on("input", this.handleInput.bind(this));
  }

  handleInput() {
    const isValid = this.$input.val().length > 0;
    this.$element.toggleClass("text-input-container--valid", isValid);
  }
}

export default TextInputContainer;
