import $ from "jquery";

class FilterDropdown {
  constructor(element) {
    this.$element = $(element);
    this.$select = this.$element.find("select");
    this.$widgetName = $(this.$element[0][1]).attr("name");

    this.renderDropdown();

    this.$renderedDd = this.$element.find(".rendered-dropdown");
    this.$renderDdContainer = this.$element.find(".rendered-dropdown-container");
    this.addListeners();

  }

  addListeners() {
    this.$renderedDd
      .find("li")
      .on("click", this.handleSelectVariant.bind(this));


    $(document).click((event) => {
      const $target = $(event.target);
      if (
        !$target
          .closest(".rendered-dropdown-container")
          .is(this.$renderDdContainer.get(0))
      ) {
        this.$renderDdContainer.removeClass(
          "rendered-dropdown-container--open"
        );
      }
    });
  }

  renderDropdown() {
    const renderUL =
      "<div class='rendered-dropdown-container'>" +
      "<div class='rendered-dropdown-selected'></div>" +
      "<ul class='rendered-dropdown'></ul>" +
      "</div>" +
      "<div class='' id='product-filter-reset'><button class='button-link' id='reset-filter'>Clear Filter</button></div>";

    this.$element.append(renderUL);
    this.$element[0].childNodes[0].childNodes.forEach((element, i) => {
      const elmSelected = element.selected ? "class='selected'" : "";
      let renderLI =
        "<li " +
        elmSelected +
        " data-value=" +
        element.value +
        ">" +
        element.innerText +
        "</li>";
      this.$element.find(".rendered-dropdown").append(renderLI);
      if (element.selected) {
        const spanLabel = element.innerText.substring(0, 4) === "Any " ? "All " + element.innerText.slice(4) : element.innerText;
        this.$element.find(".rendered-dropdown-selected").append(
          "<span>Filter by: </span>" + spanLabel
        );
      }
    });

    $("#reset-filter").on("click", this.handleReset.bind(this));

    $(".rendered-dropdown-container").on("click", this.handleSelect.bind(this));
  }

  handleSelect() {
    this.$renderDdContainer.toggleClass("rendered-dropdown-container--open");
  }

  handleSelectVariant(event) {
    const value = $(event.target)[0].dataset.value;

    this.handleURL(this.$widgetName + "=", value);
  }

  handleReset(e) {
    e.preventDefault();
    const rootURL = window.location.origin;
    const pathUrl = window.location.pathname;
    window.location.href = rootURL + pathUrl + "#sidebar";
  }

  handleURL(x1, x2) {
    const rootURL = window.location.origin;
    const pathUrl = window.location.pathname;
    const x = window.location.search;
    window.location.href = rootURL + pathUrl + "?" + x1 + x2;

    const selectx = x.match(/(?<name>orderby=)(?<value>[a-zA-Z0-9_-]+)/);
    if (selectx) {
      window.location.href =
        rootURL + pathUrl + "?" + selectx[0] + "&" + x1 + x2 + "#sidebar";
    } else {
      window.location.href = rootURL + pathUrl + "?" + x1 + x2 + "#sidebar";
    }
  }
}

export default FilterDropdown;
