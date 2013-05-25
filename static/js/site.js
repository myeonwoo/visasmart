if(!Array.indexOf){
  Array.prototype.indexOf = function(obj){
    for(var i=0; i<this.length; i++){
      if(this[i]==obj){
        return i;
      }
    }
    return -1;
  }
}

//
// This is a class for stuff that is used site wide. 
// If you need to override these functions just don't call them
// and include them in the javascript for that page.
//
var site = function() {
  var that = { };
  var url = null;
  
  days_of_week = {
    sunday: 0,
    monday: 1,
    tuesday: 2,
    wednesday: 3,
    thursday: 4,
    friday: 5,
    saturday: 6
  };
  
  days_of_week_txt = {
    0: 'Su',
    1: 'M',
    2: 'Tu',
    3: 'W',
    4: 'Th',
    5: 'F',
    6: 'Sa'
  };

  url = document.URL.split('/');
  that.site_url = url.slice(0, url.indexOf('index.php') + 1).join('/') + '/'
  that.base_url = url.slice(0, url.indexOf('index.php')).join('/') + '/'

  var initialCap =  function (field) {
    return field.substr(0, 1).toUpperCase() + field.substr(1);
  }

  that.initialCap = initialCap;
  
  var isInteger = function (s) {
    var isInteger_re = /^\s*\d+\s*$/;
    return String(s).search (isInteger_re) != -1;
  };
  that.isInteger = isInteger;
  
  var roundNumber = function (num, dec) {
    var result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
    return result;
  }

  that.roundNumber = roundNumber;

  var setupClicks =  function () {
    // Helper tool Tips
    $('.qtip').qtip({
      style: { name: 'light', width: { min: 100, max: 200 } },
      show: 'mouseover',
      hide: { delay: 2000 } 
    });
  }

  that.setupClicks = setupClicks;
  
  // Turn the "Setup Day selectors" into a string
  var daysToString = function () {
    var days = [];
    $('#hidden-forms input').each(function () {
      if($(this).val() != 0) {
        days.push(days_of_week[$(this).attr('name')]);
      }
    });
    return days.join('-');
  }
  
  that.daysToString = daysToString;

  // Turn the "Setup Day selectors" into a string
  var systemsDaysToString = function () {
    var days = [];
    $('#hidden-forms input').each(function () {
      if($(this).val() != 0) {
      days.push($(this).attr('id').split('-')[1]);
      }
    });
    return days.join('-');
  }

  that.systemsDaysToString = systemsDaysToString;


  // converts a string of days of the week - represented
  // as integers separated by dashes into a textual
  // representation of those days
  // sunday is 0, saturday is 6
  var dayStrToTxt = function(daystr) {
    days = daystr.split('-');
    txtstr='';
    for(i=0; i<days.length; i+=1) {
    txtstr += days_of_week_txt[days[i]];
    }
    return txtstr;
  }

  that.dayStrToTxt = dayStrToTxt;

  var genericAjax = function () {
    // This will make an ajax call and use the page loader to make the call.
    $(".loader").live('click', function () {
      var url = $(this).attr('href');
      $('.ui-state-default').addClass('ui-state-disabled');
      $('#loader-content a').click(function () { return false; });
      $('#action-notice').show();
      
      $.get(url, function (html) {
      $('#loader-content').html(html);
      $('#action-notice').hide();
      $('.ui-state-default').each(function () {
        if($(this).hasClass('ui-state-disabled'))
        $(this).removeClass('ui-state-disabled');
      });
      
      if(typeof loaderAfter == 'function')
        loaderAfter(url); 
      });
      return false;
      
    });
  }
  
  that.genericAjax = genericAjax;

  var setupjQueryUi = function () {
  
    // JqueryUi Widget Stuff.
    $('.ui-state-default').live('mouseover', function () {
      $(this).addClass('ui-state-hover');
    });
    
    $('.ui-state-default').live('mouseout', function () { 
      $(this).removeClass('ui-state-hover');
    });
    
    $('.hover-toggle').hover(function () {
      $(this).removeClass('ui-helper-hidden');  
    }, function () {
      $(this).addClass('ui-helper-hidden');
    });
  
  }

  that.setupjQueryUi = setupjQueryUi;

  var toUpperFirst = function(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }

  that.toUpperFirst = toUpperFirst;

  formatDate = function(dateobj) {
    var ds = '';
    var month = dateobj.getMonth()+1;
    var dt = dateobj.getDate();
    if(month < 10)
      ds += '0' + month;
    else
      ds += month;
    ds += '/';
    if(dt < 10)
      ds += '0' + dt;
    else
      ds += dt;
    ds += '/';
    ds += dateobj.getFullYear();
    return ds;
  }
  
  that.formatDate = formatDate;

  formatHM = function(dateobj) {
    var str = '';
    var hours = dateobj.getHours();
    var minutes = dateobj.getMinutes();
    if(hours < 10)
      str += '0' + hours;
    else
      str += hours;
    str += ':';
    if(minutes < 10)
      str += '0' + minutes;
    else
      str += minutes;
    return str;
  }
  that.formatHM = formatHM;

  return that;
}

local_site = site();

$(document).ready(function() {
  //local_site.setupjQueryUi();
  //local_site.genericAjax();
  //local_site.setupClicks();
});

