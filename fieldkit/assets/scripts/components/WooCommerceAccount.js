import $ from "jquery";

class WooCommerceAccount {
  constructor(element) {
    this.$element = $(element);
    this.$loginForm = this.$element.find(".woocommerce-form-login");
    this.$registerForm = this.$element.find(".woocommerce-form-register");

    this.$loginFormParent = this.$loginForm.parent();
    this.$registerFormParent = this.$registerForm.parent();

    this.$pathName = window.location.pathname.replace(/\//g, "");

    this.$loginFormParent.addClass("woocommerce-form-login--column-container");
    this.$registerFormParent.addClass(
      "woocommerce-form-register--column-container"
    );

    this.addListeners();
  }

  addListeners() {
    this.handleLoginRegister();
  }

  initLogin() {
    this.$loginForm.find("#username").attr("placeholder", "Email");
    this.$loginForm.find("#password").attr("placeholder", "Password");
    this.$loginFormParent.append(
      "<div class='login-link'><a href='/register'>Create an account</a></div>"
    );
  }

  initRegister() {
    this.$registerForm.find("#reg_username").attr("placeholder", "Full Name");
    this.$registerForm.find("#reg_email").attr("placeholder", "Email");
    this.$registerForm.find("#reg_password").attr("placeholder", "Password");
    this.$registerFormParent.append(
      "<div class='register-link'><a href='/login'>Log In to Account</a></div>"
    );
  }

  loginShow() {
    this.$loginFormParent.addClass("woocommerce-form-login--show");
    this.$loginForm
      .parents(".woocommerce")
      .addClass("woocommerce--login-register");
  }

  registerShow() {
    this.$registerFormParent.addClass("woocommerce-form-register--show");
    this.$registerForm
      .parents(".woocommerce")
      .addClass("woocommerce--login-register");
  }

  handleLoginRegister() {
    if (this.$pathName === "login") {
      this.loginShow();
      this.initLogin();
      $("body").addClass("woocommerce-account--login-register-parent");
    } else {
      this.registerShow();
      this.initRegister();
      $("body").addClass("woocommerce-account--login-register-parent");
    }
  }
}

export default WooCommerceAccount;
