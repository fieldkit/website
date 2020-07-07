import $ from "jquery";

class LoadMore {
  constructor(element) {
    this.$element = $(element);
    this.$button = this.$element.find(".action-load-more");
    this.$items = this.$element.find(".load-more__item");
    this.interval = this.$element.data("load-more-interval");
    this.interval = this.interval
      ? this.interval
      : this.$items.filter(":visible").length;

    this.addListeners();
    this.checkCount();
  }

  addListeners() {
    $(window).resize(this.checkCount.bind(this));
    this.$button.on("click", this.handleClick.bind(this));
  }

  handleClick() {
    const visibleCount = this.$items.filter(":visible").length;
    this.$items.slice(0, visibleCount + this.interval).fadeIn();
    this.checkCount();
  }

  checkCount() {
    const visibleCount = this.$items.filter(":visible").length;
    if (visibleCount === this.$items.length) {
      this.$button.hide();
    } else {
      this.$button.show();
    }
  }
}

export default LoadMore;
