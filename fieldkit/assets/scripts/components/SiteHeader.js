import $ from "jquery";

const $actionToggleNavigation = $(".action-toggle-navigation");
const $actionToggleSearch = $(".action-toggle-search");
const $body = $("body");
const $document = $(document);

class SiteHeader {
  constructor(element) {
    this.$element = $(element);
    this.$navigation = this.$element.find(".site-navigation");
    this.$navigationToggle = this.$element.find(".site-navigation-toggle");
    this.$parentMenuLink = this.$element.find(".menu-item-has-children > a");

    this.addListeners();
  }

  addListeners() {
    $document.click(this.handleClickDocument.bind(this));
    $document.on("keydown", (event) => this.handleKeyControl(event));
    $actionToggleNavigation.click(() => this.toggleNavigation());
    $actionToggleSearch.click(() => this.toggleSearch());
    this.$parentMenuLink.click(this.handleClickParentMenuLink.bind(this));
  }

  handleClickDocument(event) {
    const $target = $(event.target);
    if (
      !$target.closest(".action-toggle-search").length &&
      !$target.closest(".site-search").length
    ) {
      $body.removeClass("site-search-open");
    }
  }

  handleClickParentMenuLink(event) {
    if (this.$navigationToggle.is(":visible")) {
      event.preventDefault();
      const $target = $(event.currentTarget);
      $target
        .closest(".menu-item-has-children")
        .toggleClass("menu-item-has-children--open");
    }
  }

  handleKeyControl(event) {
    if (event.keyCode === 27) {
      event.preventDefault();
      $body.removeClass("site-search-open");
    }
  }

  toggleNavigation() {
    $body.toggleClass("site-navigation-open");
    $body.removeClass("site-search-open");
  }

  toggleSearch() {
    $body.toggleClass("site-search-open");
    $body.removeClass("site-navigation-open");
    $body.find(".search-form__input").focus();
  }
}

export default SiteHeader;
