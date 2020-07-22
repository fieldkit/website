import $ from "jquery";

class SelectUI {
  constructor(element) {
    this.$element = $(element);
    this.$select = this.$element.find("select");
    console.log(this.$element[0].childNodes);
    // this.$element[0].childNodes.forEach((element) => {
    //   console.log(element.innerText);
    // });
    this.renderDropdown();
    this.addListeners();
    this.$renderedDd = $(".rendered-dropdown");
    this.$renderDdContainer = $(".rendered-dropdown-container");
  }

  addListeners() {
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
      "<div>";
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
        $(".rendered-dropdown-selected").text(element.innerText);
      }
    });

    $(".rendered-dropdown-container").on("click", this.handleSelect.bind(this));
  }

  handleSelect() {
    this.$renderDdContainer.addClass("rendered-dropdown-container--open");
  }
}

export default SelectUI;
