import $ from "jquery";

class SortDropdown {
  constructor(element) {
    this.$element = $(element);
    this.$select = this.$element.find("select");

    this.setSelectedonLoad();
    this.addListeners();
  }

  addListeners() {
    this.$select.on("change", this.handleSelect.bind(this));
  }

  handleSelect() {
    const rootURL = window.location.origin;
    const pathUrl = window.location.pathname;
    const value = this.$select.val();
    if (value !== "all") {
      window.location.href = rootURL + pathUrl + "?product_tag=" + value;
    } else {
      window.location.href = rootURL + pathUrl;
    }
  }

  setSelectedonLoad() {
    const x = window.location.search;
    const selectx = x.match(/(?<name>product_tag=)(?<value>[a-zA-Z]+)/);
    if (selectx) {
      $("select option[value=" + selectx[2] + "]").attr("selected", "selected");
    } else {
      $("select option:first").attr("selected", "selected");
    }
  }
}

export default SortDropdown;
