import $ from "jquery";

class KlaviyoPopup {
  constructor(element) {
    this.$element = $(element);
    this.$button = this.$element.find("#klaviyo_signup");
    this.$popup = $("#klaviyo_popup");
    // this.$close = this.$popup.find("#popup_close");
    console.log(this.$popup);

    this.addListeners();
  }

  addListeners() {
    this.$button.on("click", this.showPopup.bind(this));
    // this.$close.on("click", this.hidePopup.bind(this));
  }

  showPopup() {
    console.log('asd');

    this.$popup.show();
  }

  hidePopup() {
    this.$popup.fadeOut(200);
  }
}

export default KlaviyoPopup;
