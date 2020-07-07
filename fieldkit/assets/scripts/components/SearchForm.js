import $ from "jquery";

class SearchForm {
  constructor(element) {
    this.$element = $(element);
    this.$input = this.$element.find("input");
    this.$container = this.$element.closest(".search-form-container");
    this.$results = this.$container.find(".search-form-container__results");
    this.$submit = this.$container.find(".search-form-container__submit");
    this.ajaxUrl = this.$element.data("ajaxUrl");
    this.timeoutId = null;

    this.addListeners();
  }

  addListeners() {
    this.$input.on("input", this.handleInput.bind(this));
    this.$submit.on("click", () => this.$element.submit());

    $(document).click(event => {
      const $target = $(event.target);
      if (!$target.closest(".site-header__search-form").length) {
        this.$container.removeClass("site-header__search-form--show-results");
        this.$input.val("");
      }
    });
  }

  handleInput() {
    clearTimeout(this.timeoutId);
    const s = this.$input.val();
    if (s) {
      this.timeoutId = setTimeout(() => this.search(s), 400);
    } else {
      this.$container.removeClass("site-header__search-form--show-results");
    }
  }

  handleSuccess(response) {
    if (response) {
      this.$results.html(response);
      this.$container.addClass("site-header__search-form--show-results");
    } else {
      this.$container.removeClass("site-header__search-form--show-results");
    }
  }

  search(s) {
    $.ajax({
      data: { action: "load_search_results", s },
      success: this.handleSuccess.bind(this),
      type: "post",
      url: this.ajaxUrl
    });
  }
}

export default SearchForm;
