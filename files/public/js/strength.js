;
(function($, window, document, undefined) {
  var pluginName = "strength",
      defaults = {
        strengthClass: 'strength',
        strengthMeterClass: 'strength_meter',
        strengthButtonClass: 'button_strength'
      };
  function Plugin(element, options) {
    this.element = element;
    this.$elem = $(this.element);
    this.options = $.extend({}, defaults, options);
    this._defaults = defaults;
    this._name = pluginName;
    this.init();
  }
  Plugin.prototype = {
    init: function() {
      var characters = 0;
      var capitalletters = 0;
      var loweletters = 0;
      var number = 0;
      var special = 0;
      var upperCase = new RegExp('[A-Z]');
      var lowerCase = new RegExp('[a-z]');
      var numbers = new RegExp('[0-9]');
      var specialchars = new RegExp('([!,%,&,@,#,$,^,*,?,_,~])');

      function GetPercentage(a, b) {
        return ((b / a) * 100);
      }

      function check_strength(thisval, thisid) {
        if (thisval.length > 8) {
          characters = 1;
        } else {
          characters = -1;
        };
        if (thisval.match(upperCase)) {
          capitalletters = 1
        } else {
          capitalletters = 0;
        };
        if (thisval.match(lowerCase)) {
          loweletters = 1
        } else {
          loweletters = 0;
        };
        if (thisval.match(numbers)) {
          number = 1
        } else {
          number = 0;
        };
        var total = characters + capitalletters + loweletters + number + special;
        var totalpercent = GetPercentage(7, total).toFixed(0);
        if (!thisval.length) {
          total = -1;
        }
        get_total(total, thisid);
      }

      function get_total(total, thisid) {
        var thismeter = $('div[data-meter="' + thisid + '"]');
        if (total <= 1) {
          thismeter.removeClass();
          thismeter.addClass('veryweak').html( strength.veryweak );
        } else if (total == 2) {
          thismeter.removeClass();
          thismeter.addClass('weak').html( strength.weak );
        } else if (total == 3) {
          thismeter.removeClass();
          thismeter.addClass('medium').html( strength.medium );
        } else {
          thismeter.removeClass();
          thismeter.addClass('strong').html( strength.strong );
        }
        if (total == -1) {
          thismeter.removeClass().html( strength.empty );
        }
      }
      var isShown = false;
      thisid = this.$elem.attr('id');
      this.$elem.addClass(this.options.strengthClass).attr('data-password', thisid).after('<div class="' + this.options.strengthMeterClass + '"><div class="d-inline" data-meter="' + thisid + '"></div></div>');
      this.$elem.bind('keyup keydown', function(event) {
        thisval = $('#' + thisid).val();
        $('input[type="text"][data-password="' + thisid + '"]').val(thisval);
        check_strength(thisval, thisid);
      });
      $('input[type="text"][data-password="' + thisid + '"]').bind('keyup keydown', function(event) {
        thisval = $('input[type="text"][data-password="' + thisid + '"]').val();
        console.log(thisval);
        $('input[type="password"][data-password="' + thisid + '"]').val(thisval);
        check_strength(thisval, thisid);
      });
      $(document.body).on('click', '.' + this.options.strengthButtonClass, function(e) {
        e.preventDefault();
        thisclass = 'hide_' + $(this).attr('class');
        if (isShown) {
          $('input[type="text"][data-password="' + thisid + '"]').hide();
          $('input[type="password"][data-password="' + thisid + '"]').show().focus();
          isShown = false;
        } else {
          $('input[type="text"][data-password="' + thisid + '"]').show().focus();
          $('input[type="password"][data-password="' + thisid + '"]').hide();
          isShown = true;
        }
      });
    },
    yourOtherFunction: function(el, options) {
      // some logic
    }
  };
  // A really lightweight plugin wrapper around the constructor,
  // preventing against multiple instantiations
  $.fn[pluginName] = function(options) {
    return this.each(function() {
      if (!$.data(this, "plugin_" + pluginName)) {
        $.data(this, "plugin_" + pluginName, new Plugin(this, options));
      }
    });
  };
})(jQuery, window, document);