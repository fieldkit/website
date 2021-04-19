import $ from "jquery";

const FADE_DURATION = 200;
const IDLE_DURATION = 10000;
const SCROLL_DURATION = 1000;
const $root = $("html, body");
const $window = $(window);

class ScrollToTop {
  constructor(element) {
    this.$element = $(element);
    this.timeoutId = null;
    this.lastScrollTop = $window.scrollTop();
    this.addListeners();
  }

  addListeners() {
    $window.scroll(this.handleScroll.bind(this));
    this.$element.click(this.handleClick.bind(this));
  }

  checkScroll() {
    const scrollTop = $window.scrollTop();
    // const isScrollingDown = scrollTop > this.lastScrollTop;

    if (scrollTop <= 200) {
      this.$element.fadeOut(FADE_DURATION);
    } else {
      this.$element.fadeIn(FADE_DURATION);
    }

    this.lastScrollTop = scrollTop;
  }

  handleClick() {
    const scrollTop = 0;
    $root.animate({ scrollTop }, SCROLL_DURATION);
  }

  handleScroll() {
    this.checkScroll();
    clearTimeout(this.timeoutId);
    this.timeoutId = setTimeout(() => {
      if (this.lastScrollTop > 0) this.$element.fadeIn(FADE_DURATION);
    }, IDLE_DURATION);
  }
}

export default ScrollToTop;
