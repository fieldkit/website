import $ from "jquery";

class ContactForm {
  constructor(element) {
    this.$element = $(element);
    this.$button = this.$element.find("input[type='submit']");
    this.addListeners();
  }

  addListeners() {
    $(window).on("load", this.handleStyle.bind(this));
  }

  handleStyle() {
    this.$button.parent().css("text-align", "center");
  }
}

export default ContactForm;
