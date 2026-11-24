/* ============================================================
   SCHOLARLY – Scholarship Application Portal
   Vanilla JavaScript + jQuery validation
   ============================================================ */

(function ($) {
  "use strict";

  // Mobile menu toggle (if added later) - placeholder for extensibility
  function initNavigation() {
    $(".nav-links a").on("click", function (e) {
      // Smooth scrolling is handled by CSS; keep links functional
    });
  }

  // Validate email format
  function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  // Validate 10-digit mobile number
  function isValidMobile(mobile) {
    var mobileRegex = /^\d{10}$/;
    return mobileRegex.test(mobile);
  }

  // Show inline error under a field
  function showError(field, message) {
    field.removeClass("error");
    var container = field.closest(".form-group");
    container.find(".error-text").remove();
    if (message) {
      field.addClass("error");
      container.append('<span class="error-text show">' + message + "</span>");
    }
  }

  // Clear all inline errors
  function clearErrors(form) {
    form.find(".error-text").remove();
    form.find(".error").removeClass("error");
  }

  // Handle form submission
  function handleFormSubmit(form) {
    form.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();

      clearErrors(form);

      var isValid = true;

      // Required text fields
      var requiredFields = [
        { name: "full_name", label: "Full Name" },
        { name: "dob", label: "Date of Birth" },
        { name: "email", label: "Email Address" },
        { name: "mobile", label: "Mobile Number" },
        { name: "city", label: "City" },
        { name: "state", label: "State" },
        { name: "college", label: "College Name" },
        { name: "university", label: "University Name" },
        { name: "course", label: "Course" },
        { name: "year", label: "Current Year of Study" },
        { name: "percentage", label: "Previous Academic Percentage" },
        { name: "cgpa", label: "CGPA" },
        { name: "category", label: "Scholarship Category" },
        { name: "income", label: "Annual Family Income" },
        { name: "why", label: "Why are you applying?" }
      ];

      requiredFields.forEach(function (field) {
        var input = form.find("[name='" + field.name + "']");
        var val = $.trim(input.val());

        if (val === "") {
          showError(input, field.label + " is required.");
          isValid = false;
        }
      });

      var gender = form.find("[name='gender']:checked");
      if (!gender.length) {
        showError(form.find("[name='gender']").first(), "Please select a gender.");
        isValid = false;
      }

      // Email validation
      var emailInput = form.find("[name='email']");
      var emailVal = $.trim(emailInput.val());
      if (emailVal !== "" && !isValidEmail(emailVal)) {
        showError(emailInput, "Please enter a valid email address.");
        isValid = false;
      }

      // Mobile validation (10 digits)
      var mobileInput = form.find("[name='mobile']");
      var mobileVal = $.trim(mobileInput.val());
      if (mobileVal !== "" && !isValidMobile(mobileVal)) {
        showError(mobileInput, "Please enter a valid 10-digit mobile number.");
        isValid = false;
      }

      // Terms checkbox
      var terms = form.find("[name='terms']");
      if (!terms.is(":checked")) {
        showError(terms, "You must accept the Terms and Conditions.");
        isValid = false;
      }

      if (!isValid) {
        // Focus first invalid field
        form.find(".error").first().trigger("focus");
        return false;
      }

      // All valid -> submit
      form[0].submit();
    });
  }

  // Real-time validation on blur/change
  function initLiveValidation(form) {
    form.find("input, select, textarea").on("blur change", function () {
      var field = $(this);
      var name = field.attr("name");
      var val = $.trim(field.val());

      if (name === "email" && val !== "") {
        if (!isValidEmail(val)) {
          showError(field, "Please enter a valid email address.");
        } else {
          showError(field, "");
        }
      }

      if (name === "mobile" && val !== "") {
        if (!isValidMobile(val)) {
          showError(field, "Please enter a valid 10-digit mobile number.");
        } else {
          showError(field, "");
        }
      }

      if (name === "terms") {
        if (!field.is(":checked")) {
          showError(field, "You must accept the Terms and Conditions.");
        } else {
          showError(field, "");
        }
      }
    });
  }

  $(document).ready(function () {
    initNavigation();

    var applyForm = $("form#scholarship-form");
    if (applyForm.length) {
      handleFormSubmit(applyForm);
      initLiveValidation(applyForm);
    }

    // Print button on success page
    $(".btn-print").on("click", function () {
      window.print();
    });
  });
})(jQuery);