function loadDemo() {
    var navigation = $($.find('.navigation'));

    var me = this;
    var lastclicked;
    $(".navigationItemContentParent").click(function (event) {
        var tag = $(event.target).parent('li');
        if (event.target.nodeName.toLowerCase() == 'li') {
            tag = $(event.target);
        }
        if (!tag[0])
            return false;

        var id = tag[0].id;
        if (id != null) {
            var state = tag.attr('data-state');
            if (state == 'collapsed') {
                $("." + id).show();
                tag.attr('data-state', 'expanded');
                tag.find('img')[0].src = "../../images/bullet-down.png";
                tag.addClass('navigationItemContentParentExpanded');
            }
            else {
                $("." + id).hide();
                tag.attr('data-state', 'collapsed');
                tag.find('img')[0].src = "../../images/bullet.png";
                tag.removeClass('navigationItemContentParentExpanded');
            }
            return false;
        }
    });

    navigation.find('.navigationContent').click(function (event) {
        var target = event.target;
        if (lastclicked == target)
            return false;

        lastclicked = target;

        var elementClicked = $(this);
        startDemo(target);

        event.preventDefault();
        if (getBrowser().browser != 'chrome') {
            event.stopPropagation();
            return false;
        }
    });
};

function initthemes(initialurl) {
    if ($('#themeComboBox').length == 0) return;
    if (!$('#themeComboBox').jqxDropDownList) return;

    var loadedThemes = [0, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1];
    var themes = [
        { label: 'Arctic', group: 'Themes', value: 'arctic' },
        { label: 'Web', group: 'Themes', value: 'web' },
        { label: 'Bootstrap', group: 'Themes', value: 'bootstrap' },
        { label: 'Metro', group: 'Themes', value: 'metro' },
        { label: 'Metro Dark', group: 'Themes', value: 'metrodark' },
        { label: 'Office', group: 'Themes', value: 'office' },
        { label: 'Orange', group: 'Themes', value: 'orange' },
        { label: 'Fresh', group: 'Themes', value: 'fresh' },
        { label: 'Energy Blue', group: 'Themes', value: 'energyblue' },
        { label: 'Dark Blue', group: 'Themes', value: 'darkblue' },
        { label: 'Black', group: 'Themes', value: 'black' },
        { label: 'Shiny Black', group: 'Themes', value: 'shinyblack' },
        { label: 'Classic', group: 'Themes', value: 'classic' },
        { label: 'Summer', group: 'Themes', value: 'summer' },
        { label: 'High Contrast', group: 'Themes', value: 'highcontrast' },
        { label: 'Lightness', group: 'UI Compatible', value: 'ui-lightness' },
        { label: 'Darkness', group: 'UI Compatible', value: 'ui-darkness' },
        { label: 'Smoothness', group: 'UI Compatible', value: 'ui-smoothness' },
        { label: 'Start', group: 'UI Compatible', value: 'ui-start' },
        { label: 'Redmond', group: 'UI Compatible', value: 'ui-redmond' },
        { label: 'Sunny', group: 'UI Compatible', value: 'ui-sunny' },
        { label: 'Overcast', group: 'UI Compatible', value: 'ui-overcast' },
        { label: 'Le Frog', group: 'UI Compatible', value: 'ui-le-frog' }
    ];
    var me = this;
    this.$head = $('head');
    $('#themeComboBox').jqxDropDownList({ source: themes, theme: 'arctic', selectedIndex: 0, dropDownHeight: 200, width: '140px', height: '20px' });

    var hasParam = window.location.toString().indexOf('?');
    if (hasParam != -1) {
        var themestart = window.location.toString().indexOf('(');
        var themeend = window.location.toString().indexOf(')');
        var theme = window.location.toString().substring(themestart + 1, themeend);
        $.data(document.body, 'theme', theme);
        selectedTheme = theme;
        var themeIndex = 0;
        $.each(themes, function (index) {
            if (this.value == theme) {
                themeIndex = index;
                return false;
            }
        });
        $('#themeComboBox').jqxDropDownList({ selectedIndex: themeIndex });
        loadedThemes[0] = -1;
        loadedThemes[themeIndex] = 0;
    }
    else {
        $.data(document.body, 'theme', 'arctic');
    }

    $('#themeComboBox').on('select', function (event) {
        setTimeout(function () {
            var selectedIndex = event.args.index;
            var selectedTheme = '';
            var url = initialurl;

            var loaded = loadedThemes[selectedIndex] != -1;
            loadedThemes[selectedIndex] = selectedIndex;

            var themes = [
              { label: 'Arctic', group: 'Themes', value: 'arctic' },
              { label: 'Web', group: 'Themes', value: 'web' },
              { label: 'Bootstrap', group: 'Themes', value: 'bootstrap' },
              { label: 'Metro', group: 'Themes', value: 'metro' },
              { label: 'Metro Dark', group: 'Themes', value: 'metrodark' },
              { label: 'Office', group: 'Themes', value: 'office' },
              { label: 'Orange', group: 'Themes', value: 'orange' },
              { label: 'Fresh', group: 'Themes', value: 'fresh' },
              { label: 'Energy Blue', group: 'Themes', value: 'energyblue' },
              { label: 'Dark Blue', group: 'Themes', value: 'darkblue' },
              { label: 'Black', group: 'Themes', value: 'black' },
              { label: 'Shiny Black', group: 'Themes', value: 'shinyblack' },
              { label: 'Classic', group: 'Themes', value: 'classic' },
              { label: 'Summer', group: 'Themes', value: 'summer' },
              { label: 'High Contrast', group: 'Themes', value: 'highcontrast' },
              { label: 'Lightness', group: 'UI Compatible', value: 'ui-lightness' },
              { label: 'Darkness', group: 'UI Compatible', value: 'ui-darkness' },
              { label: 'Smoothness', group: 'UI Compatible', value: 'ui-smoothness' },
              { label: 'Start', group: 'UI Compatible', value: 'ui-start' },
              { label: 'Redmond', group: 'UI Compatible', value: 'ui-redmond' },
              { label: 'Sunny', group: 'UI Compatible', value: 'ui-sunny' },
              { label: 'Overcast', group: 'UI Compatible', value: 'ui-overcast' },
              { label: 'Le Frog', group: 'UI Compatible', value: 'ui-le-frog' }
            ];
            selectedTheme = themes[selectedIndex].value;
            url += selectedTheme + '.css';

            if (!loaded) {
                if (document.createStyleSheet != undefined) {
                    document.createStyleSheet(url);
                }
                else me.$head.append('<link rel="stylesheet" href="' + url + '" media="screen" />');
            }
            $.data(document.body, 'theme', selectedTheme);
            var startedExample = $.data(document.body, 'example');
            if (startedExample != null) {
                startDemo(startedExample);
            }
        }, 5);
    });
};
function initmenu() {
    if ($('#navigationmenu').length === 0)
        return;

    var content = $('#demos')[0];
    var navigation = $($.find('.navigation'));
    var self = this;

    if (!$.jqx.browser.msie) {
        $('#navigationmenu').find('li').css('opacity', 0.95);
        $('#navigationmenu').find('ul').css('opacity', 0.95);
    }
    $('#navigationmenu').jqxMenu({ autoSizeMainItems: true, theme: 'demo', autoCloseOnClick: true });
    $('#navigationmenu').css('visibility', 'visible');
    $(window).resize(function () {
        if (window.screen.width <= 1024) {
            $('#navigationmenu').jqxMenu('minimize');
        }
        else {
            $('#navigationmenu').jqxMenu('restore');
        }
    });
    if (window.screen.width <= 1024) {
        $('#navigationmenu').jqxMenu('minimize');
    }
    else {
        $('#navigationmenu').jqxMenu('restore');
    }
    if ($.jqx.response) {
        var response = new $.jqx.response();
        if (response.device.type != "Desktop") {
            var navigation = $(".navigation").detach();
            var content = $(".demoContainer");
            var tr = $('<tr id="widgetsNavigationTree"></tr>');
            $(".jqxDemoContainer").prepend(tr);
            tr.append(navigation);
            navigation.addClass('navigation-medium');
            content.addClass('demoContainer-medium');
            if (response.device.type == "Phone") {
                $("#navigationmenu").css('position', 'absolute');
                $("#navigationmenu").css('top', '25px');
                $("#navigationmenu").css('right', '0px');
                $("#navigationmenu").css('left', '-20px');
                $(window).on('orientationchange', function () {
                    $("#navigationmenu").css('position', 'absolute');
                    $("#navigationmenu").css('right', '0px');
                    $("#navigationmenu").css('left', '-20px');
                });
            }
        }
    }
};
function prepareExamplePath(url) {
    var path = '<div id="pathElement">';
    var str = '';
    var examplePath = url.toString();

    path += '<span style="font-family: Verdana,Arial,sans-serif; font-size: 12px; margin-left: 2px; float: left;">' + examplePath + '</span>';
    path += '</div>';

    $("#examplePath").html(path);

    $("#examplePath").css('float', 'left');
    $("#examplePath").css('margin-left', 0);
    $("#themeSelector").css('display', 'block');
    $("#themeSelector").css('float', 'right');
    if ($(".content").css('display') == 'none') {
        $('#themeSelector').css('float', 'none');
        $('#themeSelector').css('margin-left', '20px');
        $('#themeSelector').css('margin-top', '10px');
    }
};
var snowFlakes = []; var clientBottom = 0; var clientRight = 0; function rand(a) { return Math.floor(a * Math.random()) } function createSnow() { var a = 6; var b = 32; var e = 10; var d = new Array("Times", "Arial", "Times", "Verdana"); var f = 0.5; clientBottom = 350; clientRight = document.body.clientWidth || window.innerWidth - b; for (var c = 0; c < e; c++) { snowFlakes[c] = document.createElement("span"); snowFlakes[c].innerText = "*"; document.body.appendChild(snowFlakes[c]); snowFlakes[c].id = "snowFlake" + c; snowFlakes[c].curr = 0; snowFlakes[c].bounce = Math.random() * 10; snowFlakes[c].move = 0.03 + Math.random() / 10; snowFlakes[c].style.fontFamily = d[rand(d.length)]; snowFlakes[c].size = rand(b - a) + a; snowFlakes[c].style.fontSize = snowFlakes[c].size + "px"; snowFlakes[c].style.color = "#FEFEFE"; snowFlakes[c].style.zIndex = 10000; snowFlakes[c].drop = f * snowFlakes[c].size / 5; snowFlakes[c].x = rand(clientRight); snowFlakes[c].y = rand(clientBottom); snowFlakes[c].style.position = "absolute"; snowFlakes[c].style.left = snowFlakes[c].x + "px"; snowFlakes[c].style.top = snowFlakes[c].y + "px" } letItSnow() } function letItSnow() { for (var a = 0; a < snowFlakes.length; a++) { snowFlakes[a].curr += snowFlakes[a].move; snowFlakes[a].y += snowFlakes[a].drop; snowFlakes[a].style.left = snowFlakes[a].x + snowFlakes[a].bounce * Math.sin(snowFlakes[a].curr) + "px"; snowFlakes[a].style.top = snowFlakes[a].y + "px"; if (snowFlakes[a].y + snowFlakes[a].size >= clientBottom || parseInt(snowFlakes[a].style.left) + snowFlakes[a].size > clientRight) { snowFlakes[a].x = rand(clientRight); snowFlakes[a].y = 0 } } setTimeout("letItSnow()", 100) };

function initDemo(ismobile, isIndex) {
    if ($.jqx.response) {
        var response = new $.jqx.response();
        if (response.device.type != "Desktop") {
            document.body.style.visibility = "hidden";
        }
    }

    if (ismobile) {
        this.mobile = true;
        var path = "../../";
        if (isIndex === true) {
            var path = "../";
        }

        $.ajax({
            async: false,
            url: path + "samplespath.htm",
            success: function (data) {
                $("#samplesPath").append(data);
                $("#samplesPath").css('visibility', 'hidden');
            }
        });

        $.ajax({
            async: false,
            url: path + "bottom.htm",
            success: function (data) {
                $("#pageBottom").append(data);
            }
        });
        $.ajax({
            async: false,
            cache: false,
            url: path + "top.htm",
            success: function (data) {
                $("#pageTop").append(data);
            }
        });

        $.ajax({
            async: false,
            url: path + "mobilenavigator.htm",
            cache: false,
            success: function (data) {
                $("#widgetsNavigation").append(data);
            }
        });
        var that = this;
        that.currentPage = 0;
        that.page = "android";
        var hasParam = window.location.toString().indexOf('?');
        if (hasParam != -1) {
            var start = window.location.toString().indexOf('(');
            var end = window.location.toString().indexOf(')');
            that.currentPage = window.location.toString().substring(start + 1, end);
            switch (that.currentPage) {
                case "android":
                    that.currentPage = 0;
                    that.page = "android";
                    break;
                case "mobile":
                    that.page = "mobile";
                    that.currentPage = 1;
                    break;
                case "win8":
                    that.currentPage = 2;
                    that.page = "win8";
                    break;
                case "blackberry":
                    that.currentPage = 3;
                    that.page = "blackberry";
                    break;
            }
        }

        if ($("#OSChooser").length > 0) {
            $("#OSChooser").jqxScrollView({ theme: 'metrodark', currentPage: that.currentPage, buttonsOffset: [0, 15], width: 125, height: 180 });

            $("#OSChooser").on('pageChanged', function () {
                var page = $("#OSChooser").jqxScrollView('currentPage');
                var param = "android";
                switch (page) {
                    case 1:
                        param = "mobile";
                        break;
                    case 2:
                        param = "win8";
                        break;
                    case 3:
                        param = "blackberry";
                        break;
                }
                that.page = param;
                var startedExample = $.data(document.body, 'example');
                if (startedExample != null) {
                    startDemo(startedExample);
                }
            });
        }
        $('.topExpander').hide();
        var lastclicked = null;
        $(".topNavigation-item a").click(function (event) {
            event.target.href = event.target.href + '?(' + that.page + ')';
        });

        initmenu();
        document.body.style.visibility = "visible";
    }
    else {
        var isIndex = window.location.href.indexOf('jqx') == -1 && window.location.href.indexOf('php') == -1 && window.location.href.indexOf('jquerymobile') == -1 && window.location.href.indexOf('mvc') == -1 && window.location.href.indexOf('jsp') == -1 && window.location.href.indexOf('requirejs') == -1 && window.location.href.indexOf('twitter') == -1;
        if (!isIndex) {
            $.ajax({
                async: false,
                url: "../../samplespath.htm",
                success: function (data) {
                    $("#samplesPath").append(data);
                }
            });
        }

        var loc = window.location.pathname;
        var dir = loc.substring(0, loc.lastIndexOf('/')) + "/";
        var bottom = isIndex ? dir + "bottom.htm" : "../../bottom.htm";
        var top = isIndex ? dir + "top.htm" : "../../top.htm";

        if (!isIndex) {
            $.ajax({
                async: false,
                url: top,
                success: function (data) {
                    $("#pageTop").append(data);
                }
            });
            $.ajax({
                async: false,
                url: bottom,
                success: function (data) {
                    $("#pageBottom").append(data);
                }
            });
        }
        //      var image = $('<img alt="expandArrow" class="showMoreExpanderArrow" src="../../images/arrowup.gif" />');
        //      var span = $('<span style="cursor: pointer; position: relative; top: -3px; font-size: 13px;">less widgets</span>');

        //      $('.topExpander').append(image);
        //      $('.topExpander').append(span);

        var initialurl = "http://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/styles/jqx.";
        initthemes(initialurl);

        var navigatorURL = "../../navigator.htm";
        var loadNavigator = true;
        if ($.jqx.response) {
            var response = new $.jqx.response();
            if (response.device.type != "Desktop") {
                var navigatorURL = "../../navigator_four_columns.htm";
                if (response.device.type == "Phone") {
                    var navigatorURL = "../../navigator_two_columns.htm";
                }
                if (isIndex) {
                    var navigatorURL = dir + "navigator.htm";
                    var navigatorURL = dir + "index_navigator_four_columns.htm";
                    if (response.device.type == "Phone") {
                        var navigatorURL = dir + "index_navigator_two_columns.htm";
                    }
                }
            }
            else if (isIndex && response.device.type == "Desktop") {
                loadNavigator = false;
            }
        }
        if (loadNavigator) {
            $.ajax({
                async: false,
                url: navigatorURL,
                success: function (data) {
                    if (!isIndex) {
                        $("#widgetsNavigation").append(data);
                    }
                    else {
                        if (navigatorURL != "../../navigator.htm") {
                            $(".navigationContainer").children().remove();
                            $(".navigationContainer").append(data);
                            $(".welcome").css('max-width', '100%');
                            $(document.body).css('overflow-x', 'hidden');
                        }
                    }

                    if (navigatorURL != "../../navigator.htm") {
                        $(".content").hide();
                        $(".topNavigation").addClass('topNavigation-medium');
                        $(document.body).css('overflow-x', 'hidden');
                        $(document.body).css('min-width', '0px');
                        $(".navigationContainer").css('min-width', '0px');
                        $(".jqxDemoContainer").css('width', '100%');
                        $("#pageTop table").css('width', '100%');
                        $("#pageBottom table").css('width', '100%');
                        $(".content").css('margin', '0px');
                        $(".content").css('padding', '0px');
                        $("#tabs ul:first").css('margin-left', '0px');

                        $(".topNavigation").addClass('topNavigation-mobile');
                        $(".navigation").addClass('navigation-mobile');
                        $(".navigationBar").addClass('navigationBar-mobile');
                        $(".welcome").addClass('welcome-mobile');
                    }

                    $(".topNavigation-item a").click(function (event) {
                        var theme = $.data(document.body, "theme");
                        if (theme && theme != '') {
                            event.target.href = event.target.href + '?(' + theme + ')';
                        }
                    });
                }
            });
        }
        initmenu();
        document.body.style.visibility = "visible";
    }

    var content = $('#demos')[0];
    var navigation = $($.find('.navigation'));
    var self = this;

    var imageOffset = 0;

    var updateheight = function () {
        return;
        setTimeout(function () {
            var navigationheight = parseInt($(".navigationBottom").offset().top);
            $('.demoContainer').height(navigationheight);
            var height = $('#demoContainer').height();
            var width = 910;
            height -= parseInt(40);
            if ($('#tabs-1').css('visibility') != 'hidden') {
                $('#tabs-1').css({ height: height + 'px', width: width + 'px' });
                $('#tabs-2').css({ height: height + 'px', width: width + 'px' });
                $('#tabs-3').css({ height: height + 'px', width: width + 'px' });
            }
        }, 250);
    }

    var reloadDemo = function () {
        if ($("#demoLink").length > 0) {
            if ($.jqx.response) {
                var response = new $.jqx.response();
                if (response.device.type == "Desktop") {
                    startDemo($("#demoLink")[0]);
                }
            }
            else {
                startDemo($("#demoLink")[0]);
            }
        }

        navigation.find('.navigationItem').click(function (event) {
            return false;
        });

        navigation.find('.navigationHeader').click(function (event) {
            var $target = $(event.target);
            var $targetParent = $target.parent();
            if ($targetParent[0].className.length == 0) {
                var $targetParentParent = $($target.parent()).parent();
                var oldChildren = $.data(content, 'expandedElement');
                var oldTarget = $.data(content, 'expandedTarget');

                if (oldTarget != null && oldTarget != event.target) {
                    var $oldTarget = $(oldTarget);
                    var $oldtargetParentParent = $($oldTarget.parent()).parent();
                    if (oldChildren.css('display') == 'block') {
                        oldChildren.css('display', 'none');
                        $oldtargetParentParent.removeClass('navigationItem-expanded');
                        $oldtargetParentParent.find('.navigationContent').css('display', 'none');
                    }
                }

                var children = $targetParentParent.find('.navigationItemContent');
                $.data(content, 'expandedElement', children);
                $.data(content, 'expandedTarget', event.target);

                if (children.css('display') == 'none') {
                    children.css({ opacity: 0, display: 'block', visibility: 'visible' }).animate({ opacity: 1.0 }, 250, function () {
                    });
                    if ($targetParentParent[0].className == 'navigationItem') {
                        $targetParentParent.addClass('navigationItem-expanded');
                        $targetParentParent.find('.navigationContent').css('display', 'block');
                        updateheight();
                    }
                }
                else children.css({ opacity: 1, visibility: 'visible' }).animate({ opacity: 0.0 }, 250, function () {
                    children.css('display', 'none');
                    $targetParentParent.removeClass('navigationItem-expanded');
                    $targetParentParent.find('.navigationContent').css('display', 'none');
                    updateheight();
                });

            }
            return false;
        });

        loadDemo();
        updateheight();
    }

    reloadDemo();
    if ($.jqx.browser.mozilla) {
        //    $('.navigationBarActive-overlay').hide();
    }
};
function closewindows() {
    var windows = $.data(document.body, 'jqxwindows-list');
    if (windows && windows.length > 0) {
        var count = windows.length;
        while (count) {
            count -= 1;
            windows[count].remove();
        }
    }
    var window = $.data(document.body, 'jqxwindow-modal');
    if (window != null && window.length && window.length > 0) {
        window.jqxWindow('closeWindow', 'close');
    }

    $.data(document.body, 'jqxwindow-modal', []);
    $.data(document.body, 'jqxwindows-list', []);
};

function getBrowser() {
    return $.jqx.browser;
};

function startDemo(target) {
    if (target == null || target.href == null) {
        if (target && target.href == null) {
            var child = $(target).children('a');
            if (child.length > 0) {
                target = child[0];
            }
        }
        else {
            return;
        }
    }
    var scrollTop = $(window).scrollTop();
    var hasHref = target.href;
    if (!hasHref) {
        return;
    }
    if (getBrowser().browser == 'chrome') {
        $(".jqx-validator-hint").remove();
        $("#jqxMenu").remove();
        $("#Menu").remove();
        $("#gridmenujqxgrid").remove();
    }

    closewindows();
    $('#tabs').css('visibility', 'visible');
    $('#tabs').css('display', 'block');

    if (!this.jqxtabsinitialized) {
        $('#tabs').show();
        $('#tabs').css('height', '100%');
        $('#tabs').jqxTabs({ theme: 'jqxtabs', keyboardNavigation: false, selectionTracker: false });
        this.jqxtabsinitialized = true;
        $('#tabs ').on('tabclick', function (event) {
            var tab = event.args.item;
            if (tab == 0) {
                $('.demoLink').show();
                $('#resources').show();
            }
            else {
                $(".demoLink").hide();
                $('#resources').hide();
            }
        });
    }

    $('#tabs').jqxTabs('select', 0);
    $("#divWelcome").css('display', 'none');
    $("#divWelcome").empty();
    $.data(document.body, 'example', target);

    var url = target.href;
    var startindex = url.toString().indexOf('demos');
    var demourl = url.toString().substring(startindex);
    window.location.hash = demourl;
    prepareExamplePath(demourl);

    if ($("iframe").length > 0) {
        var iframe = $("iframe");
        iframe.unload();
        iframe.remove();
        iframe.attr('src', null)
    }

    $("#innerdemoContainer").empty();

    height = $('#demoContainer').height();
    height = Math.max(height, $(".navigation").height());
    var width = 910;
    height -= parseInt(40);

    $('#tabs-1').css({ height: height + 'px', width: width + 'px' });
    $('#tabs-2').css({ height: height + 'px', width: width + 'px' });
    $('#tabs-3').css({ height: height + 'px', width: width + 'px' });

    var demoHeight = parseInt(height);
    var demoWidth = parseInt($("#demoContainer").width()) / 2;
    var loader = $("<table style='font-family: verdana; font-size: 12px; color: #767676; border-color: transparnet; border: none; border-collapse: collapse;'><tr><td align='center'><img src='../../images/loadingimage.gif' /></td></tr><tr><td align='center' style='padding: 10px; padding-left: 20px;'>Loading Example...</td></tr></table>");
 //   loader.css('margin-top', (demoHeight / 2 - 18) + 'px');
       loader.css('margin-left', (demoWidth - 110) + 'px');
       loader.css('margin-top', '150px');

    $("#innerdemoContainer").html(loader);

    var theme = $.data(document.body, 'theme');
    $("#innerdemoContainer").removeAttr('theme');
    var that = this;
    if (theme == undefined) theme = '';
    if (!that.mobile) {
        if (url.toString().indexOf('mvcexamples') >= 0) {
            url += "/" + theme;
        }
        else {
            url += '?' + theme.toString();
        }
    }
    else {
        url += '?(' + that.page.toString() + ")";
    }

    var isnonpopupdemo = url.indexOf('window') == -1;
    if (url.indexOf('jqxwindow') != -1) {
        $.jqx.theme = theme;
    }

    if (this.isTouchDevice && url.indexOf('chart') == -1) isnonpopupdemo = false;
    if (that.mobile) {
        isnonpopupdemo = true;
    }
    else {
        $('#tabs-1').css('margin-left', '20px');
    }

    if ($.jqx.response) {
        var response = new $.jqx.response();
        if (response.device.type != "Desktop") {
            isnonpopupdemo = true;
        }
    }

    var _url = url;

    if (url.toString().indexOf('mvcexamples') >= 0) {
        $('#tabs-4').hide();
        $('#tab4').hide();
        $('#tabs-5').hide();
        $('#tab5').hide();
        var anchor = $("<div id='demourl' style='color: #444; z-index:9999; position: absolute; font-size: 12px; font-family: Verdana,Arial,sans-serif; text-align: left; top: 25%; left: 750px; margin-left: 25px; white-space: nowrap; margin-right: 10px;'><a class='demoLink'  target='_blank' href='" + _url + "'>View in new window</a></div>");
        $('#tabs #demourl').remove();
        $('#tabs #resources').remove();
        $('#tabs .jqx-tabs-header').append(anchor);
        var w = url.split('/')[4].toLowerCase();
        $.get('Widgets/' + w + '/controller.txt', function (data) {
            var result = formatCode(data);
            result = colourKeywords("public|int|float|double|private|new|void|synchronized|if|from|select|in|base|override|return|new|string|for|byte|break|else|protected|using|var|namespace|HttpStatusCode ", result);
            $('#tabs-2').html(result);
        });
        $.get('Widgets/' + w + '/view.txt', function (data) {
            var result = formatCode(data);
            $('#tabs-3').html(result);
        });
        $("#examplePath").hide();
        switch (w) {
            case "treewithcheckboxes":
                $('#tabs').jqxTabs('setTitleAt', 3, 'View(Tree)');
                $('#tab4 .jqx-tabs-titleContentWrapper').css('margin-top', '0px');
                $('#tab4').show();
                $.get('Widgets/' + w + '/viewtree.txt', function (data) {
                    var result = formatCode(data);
                    $('#tabs-4').html(result);
                });
                break;
            case "dropdownlist":
                $('#tabs').jqxTabs('setTitleAt', 3, 'View(Store)');
                $('#tab4 .jqx-tabs-titleContentWrapper').css('margin-top', '0px');
                $('#tab4').show();
                $.get('Widgets/' + w + '/store.txt', function (data) {
                    var result = formatCode(data);
                    $('#tabs-4').html(result);
                });
                break;
            case "loginform":
                $('#tabs').jqxTabs('setTitleAt', 3, 'View(Login Failed)');
                $('#tab4 .jqx-tabs-titleContentWrapper').css('margin-top', '0px');
                $('#tab4').show();
                $('#tabs').jqxTabs('setTitleAt', 4, 'View(Login)');
                $('#tab5 .jqx-tabs-titleContentWrapper').css('margin-top', '0px');
                $('#tab5').show();
                $.get('Widgets/' + w + '/viewloginfailed.txt', function (data) {
                    var result = formatCode(data);
                    $('#tabs-4').html(result);
                });
                $.get('Widgets/' + w + '/viewlogin.txt', function (data) {
                    var result = formatCode(data);
                    $('#tabs-5').html(result);
                });
                break;
            case "registrationform":
                $('#tabs').jqxTabs('setTitleAt', 3, 'View(Register Failed)');
                $('#tab4 .jqx-tabs-titleContentWrapper').css('margin-top', '0px');
                $('#tab4').show();
                $('#tabs').jqxTabs('setTitleAt', 4, 'View(Register)');
                $('#tab5 .jqx-tabs-titleContentWrapper').css('margin-top', '0px');
                $('#tab5').show();
                $.get('Widgets/' + w + '/viewregisterfailed.txt', function (data) {
                    var result = formatCode(data);
                    $('#tabs-4').html(result);
                });
                $.get('Widgets/' + w + '/viewregister.txt', function (data) {
                    var result = formatCode(data);
                    $('#tabs-5').html(result);
                });
                break;
            case "combobox":
            case "listbox":
                $('#tabs').jqxTabs('setTitleAt', 3, 'View(Details)');
                $('#tab4 .jqx-tabs-titleContentWrapper').css('margin-top', '0px');
                $('#tab4').show();
                $.get('Widgets/' + w + '/details.txt', function (data) {
                    var result = formatCode(data);
                    $('#tabs-4').html(result);
                });
                break;
        }

    }
    else if (url.toString().indexOf('jsp') >= 0) {
        $('#tabs-4').hide();
        $('#tab4').hide();
        $('#tabs-5').hide();
        $('#tab5').hide();
        var anchor = $("<div id='demourl' style='color: #444; z-index:9999; position: absolute; font-size: 12px; font-family: Verdana,Arial,sans-serif; text-align: left; top: 25%; left: 750px; margin-left: 25px; white-space: nowrap; margin-right: 10px;'><a class='demoLink'  target='_blank' href='" + _url + "'>View in new window</a></div>");
        $('#tabs #demourl').remove();
        $('#tabs #resources').remove();
        $('#tabs .jqx-tabs-header').append(anchor);
        var w = url.split('/')[4].toLowerCase();
        //$.get('Widgets/' + w + '/controller.txt', function (data) {
        //    var result = formatCode(data);
        //    result = colourKeywords("public|int|float|double|private|new|void|synchronized|if|from|select|in|base|override|return|new|string|for|byte|break|else|protected|using|var|namespace|HttpStatusCode ", result);
        //    $('#tabs-2').html(result);
        //});

        $("#examplePath").hide();
        $('#tabs').jqxTabs('setTitleAt', 3, 'JSP');
        $('#tab4 .jqx-tabs-titleContentWrapper').css('margin-top', '0px');
        $('#tab4').show();
        if (w.indexOf('grid-sorting') >= 0) {
            $.get('jsp/populate-grid.txt', function (data) {
                var result = formatCode(data);
                $('#tabs-4').html(result);
            });
        }
        else if (w.indexOf('datatable-sorting') >= 0) {
            $.get('jsp/populate-datatable.txt', function (data) {
                var result = formatCode(data);
                $('#tabs-4').html(result);
            });
        }
        else if (w.indexOf('tree') >= 0) {
            $.get('jsp/select-tree-data.txt', function (data) {
                var result = formatCode(data);
                $('#tabs-4').html(result);
            });
        }
        else if (w.indexOf('chart') >= 0) {
            $.get('jsp/select-chart-data.txt', function (data) {
                var result = formatCode(data);
                $('#tabs-4').html(result);
            });
        }
        else if (w.indexOf('listbox') >= 0 || w.indexOf('dropdownlist') >= 0 || w.indexOf('datatable') >= 0 || w.indexOf('combobox') >= 0 || w.indexOf('grid') >= 0) {
            $.get('jsp/select-data-simple.txt', function (data) {
                var result = formatCode(data);
                $('#tabs-4').html(result);
            });
        }
        $.get(w,
                        function (data) {
                            var originalData = data;
                            var descriptionLength = "<title id='Description'>".toString().length;
                            var startIndex = data.indexOf('<title') + descriptionLength;
                            var endIndex = data.indexOf('</title>');
                            var description = data.substring(startIndex, endIndex);
                            if (!that.mobile) {
                                $('#divDescription').html('<div style="width: 800px; margin: 10px;">' + description + '</div>');
                            }
                            var anchor = $("<div id='demourl' style='color: #444; position: absolute; font-size: 12px; font-family: Verdana,Arial,sans-serif; z-index: 999; text-align: left; top: 25%; left: 750px; margin-left: 25px; white-space: nowrap; margin-right: 10px;'><a class='demoLink'  target='_blank' href='" + _url + "'>View in new window</a></div>");
                            if (that.mobile) {
                                var linkText = "View in full screen";
                                var anchor = $("<div id='demourl' style='color: #444; position: absolute; font-size: 12px; font-family: Verdana,Arial,sans-serif; top: 25%; left: 750px; margin-right: 10px;'><a class='demoLink' target='_blank' href='" + _url + "&=fullscreen'>" + linkText + "</a></div>");
                            }
                            $('#tabs #demourl').remove();
                            $('#tabs #resources').remove();
                            $('#tabs .jqx-tabs-header').append(anchor);

                            var result = formatCode(originalData);
                            $('#tabs-2').html(result);
                        }, "html"
                )
    }
    else {
        $.get(url,
                        function (data) {
                            var originalData = data;
                            var descriptionLength = "<title id='Description'>".toString().length;
                            var startIndex = data.indexOf('<title') + descriptionLength;
                            var endIndex = data.indexOf('</title>');
                            var description = data.substring(startIndex, endIndex);
                            if (!that.mobile) {
                                $('#divDescription').html('<div style="width: 800px; margin: 10px;">' + description + '</div>');
                            }
                            var anchor = $("<div id='demourl' style='color: #444; position: absolute; font-size: 12px; font-family: Verdana,Arial,sans-serif; z-index: 999; text-align: left; top: 25%; left: 750px; margin-left: 25px; white-space: nowrap; margin-right: 10px;'><a class='demoLink'  target='_blank' href='" + _url + "'>View in new window</a></div>");
                            if (that.mobile) {
                                var linkText = "View in full screen";
                                var anchor = $("<div id='demourl' style='color: #444; position: absolute; font-size: 12px; font-family: Verdana,Arial,sans-serif; top: 25%; left: 750px; margin-right: 10px;'><a class='demoLink' target='_blank' href='" + _url + "&=fullscreen'>" + linkText + "</a></div>");
                            }
                            $('#tabs #demourl').remove();
                            $('#tabs #resources').remove();
                            $('#tabs .jqx-tabs-header').append(anchor);

                            //    var resources = $("<div id='resources' style='color: #444; line-height: 23px; top: 90px; text-align: left; left: 760px; margin-right: 10px; position: absolute; font-size: 13px; font-family: Verdana,Arial,sans-serif;'><div><strong>Resources</strong></div><div><div><a class='demoLink'  target='_blank' href='http://www.jqwidgets.com/download/'>Download</a></div><a class='demoLink'  target='_blank' href='http://www.jqwidgets.com/jquery-widgets-documentation'>Documentation</a></div><div><a class='demoLink'  target='_blank' href='http://www.jqwidgets.com/community/'>Forum</a></div><div><a class='demoLink'  target='_blank' href='http://www.jqwidgets.com/jquery-widgets-documentation/documentation/releasehistory/releasehistory.htm'>Release History</a></div><div><a class='demoLink'  target='_blank' href='http://www.jqwidgets.com/jquery-widgets-documentation/documentation/roadmap/roadmap.htm'>Roadmap</a></div><div><a class='demoLink'  target='_blank' href='http://www.jqwidgets.com/license'>License</a></div>");
                            //    $('#tabs .jqx-tabs-header').append(resources);
                            //    $("#downloadButton").addClass('downloadButton');

                            if (!isnonpopupdemo) {
                                data = data.replace(/<script.*>.*<\/script>/ig, ""); // Remove script tags
                                data = data.replace(/<\/?link.*>/ig, ""); //Remove link tags
                                data = data.replace(/<\/?html.*>/ig, ""); //Remove html tag
                                data = data.replace(/<\/?body.*>/ig, ""); //Remove body tag
                                data = data.replace(/<\/?head.*>/ig, ""); //Remove head tag
                                data = data.replace(/<\/?!doctype.*>/ig, ""); //Remove doctype
                                data = data.replace(/<title.*>.*<\/title>/ig, ""); // Remove title tags
                                data = data.replace(/..\/..\/jqwidgets\/globalization\//g, "jqwidgets/globalization/"); // fix localization path
                                $("#innerdemoContainer").removeClass();

                                var url = "../../jqwidgets/styles/jqx." + theme + '.css';
                                if (document.createStyleSheet != undefined) {
                                    document.createStyleSheet(url);
                                }
                                else $(document).find('head').append('<link rel="stylesheet" href="' + url + '" media="screen" />');

                                $("#innerdemoContainer").attr('theme', theme.toString());
                                $("#innerdemoContainer").html('');
                                $("#innerdemoContainer").html('<div id="jqxInnerdemoContainer" style="position: relative; top: 10px; left: 10px; width: 900px; height: 90%;">' + data + '</div>');
                                var jqxInnerdemoContainer = $("#innerdemoContainer").find('#jqxInnerdemoContainer');
                                var jqxWidget = $("#innerdemoContainer").find('#jqxWidget');
                                jqxInnerdemoContainer.css('visibility', 'visible');
                            }

                            //populate tabs.

                            var result = formatCode(originalData);
                            $('#tabs-2').html(result);
                            var demourl = _url.toString().substring(_url.toString().indexOf('demos'));
                            var widgetNameStartIndex = demourl.indexOf('/');
                            var widgetNameEndIndex = demourl.toString().substring(widgetNameStartIndex + 1).indexOf('/');
                            var widgetName = demourl.substring(widgetNameStartIndex + 1, 1 + widgetNameStartIndex + widgetNameEndIndex);
                            if (widgetName == 'jqxbutton' && (_url.indexOf('checkbox') != -1)) {
                                widgetName = 'jqxcheckbox';
                            }
                            if (widgetName == 'jqxbutton' && (_url.indexOf('radiobutton') != -1)) {
                                widgetName = 'jqxradiobutton';
                            }
                            if (widgetName == 'jqxbutton' && (_url.indexOf('dropdownbutton') != -1)) {
                                widgetName = 'jqxdropdownbutton';
                            }
                            if (widgetName == 'jqxpanel' && _url.indexOf('dockpanel') != -1) {
                                widgetName = 'jqxdockpanel';
                            }
                            if (widgetName == 'jqxbutton' && (_url.indexOf('switch') != -1)) {
                                widgetName = 'jqxswitchbutton';
                            }
                            if (widgetName == 'jqxbutton' && (_url.indexOf('group') != -1)) {
                                widgetName = 'jqxbuttongroup';
                            }
                            if (widgetName == 'jqxgauge' && (_url.indexOf('linear') != -1)) {
                                widgetName = 'jqxlineargauge';
                            }

                            try {
                                if (widgetName != "php" && widgetName != "twitter" && widgetName != "jqxangular" && widgetName != "jquerymobile" && widgetName != "aspnetmvc" && widgetName != "requirejs") {
                                    var apiURL = 'http://www.jqwidgets.com/jquery-widgets-demo/documentation/' + widgetName + '/' + widgetName + '-api.htm';
                                    var frame = '<iframe frameborder="0" src="' + apiURL + '" id="widgetAPI" style="height: ' + parseInt(demoHeight) + 'px; border-collapse: collapse; width: 900px;"></iframe>';
                                    $('#tabs-3').html(frame);
                                    $('#tabs-3').css('overflow', 'hidden');
                                }
                            }
                            catch (error) {
                            }
                        }, "html"
                )
    }
    if (isnonpopupdemo) {
        if ($.jqx.browser.msie && $.jqx.browser.version < 9) {
            try {
                var iframe = $('<iframe frameborder="0" src="' + url + '" id="jqxInnerdemoContainer" style="border-collapse: collapse; margin-top: 10px; width: 900px;"></iframe>');
                if (getBrowser().browser == 'chrome') {
                    iframe = $('<iframe frameborder="0" src="' + url + '" id="jqxInnerdemoContainer" style="border-collapse: collapse; margin: 0px !important; padding: 0px !important; width: 900px;"></iframe>');
                }

                $("#innerdemoContainer").html('');
                $("#innerdemoContainer").append(iframe);
            }
            catch (error) {
            }
        }
        else {
            var iframe = $('<iframe frameborder="0" src="' + url + '" id="jqxInnerdemoContainer" style="border-collapse: collapse; margin-top: 10px; width: 900px;"></iframe>');
            if (getBrowser().browser == 'chrome') {
                iframe = $('<iframe frameborder="0" src="' + url + '" id="jqxInnerdemoContainer" style="border-collapse: collapse; margin: 0px !important; padding: 0px !important; width: 900px;"></iframe>');
            }
            if (getBrowser().browser == 'mozilla') {
                //    iframe = $('<iframe frameborder="0" src="' + url + '" id="jqxInnerdemoContainer" style="border-collapse: collapse; margin: 0px !important; margin-top: 80px !important; padding: 0px !important; width: 900px;"></iframe>');
            }
            if (url.toString().indexOf('mvcexamples') >= 0) {
                $("#innerdemoContainer").append(iframe);
                iframe.on('load', function () {
                    loader.remove();
                });
            }
            else {
                $("#innerdemoContainer").html('');
                $("#innerdemoContainer").append(iframe);
            }
        }
        if ($(".content").css('display') == 'none') {
            window.open(_url, '_self');
        }
        //     $("#tabs-1").width(730);
        //     $("#tabs-1").css('border-right', '1px solid #e4e4e4');
        //     var parentTable = $("#innerdemoContainer").parents('table:first');
        //     parentTable.css('margin-left', 'auto');
        //     parentTable.css('margin-right', 'auto');
        //     parentTable.css('margin-top', '25px');


        adjust();
        iframe.height(1040);
    }
    return false;
};
function saveImageAs(imgOrURL) {
    if (typeof imgOrURL == 'object')
        imgOrURL = imgOrURL.src;
    window.win = open(imgOrURL);
    setTimeout('win.document.execCommand("SaveAs")', 500);
};
function adjust() {
    this.adjustFramePosition();
};

function adjustFramePosition() {
    var iframe = $('#jqxInnerdemoContainer');
    if (!iframe || iframe.length == 0)
        return;

    var offset = iframe.offset();
    var diff = parseFloat(offset.left) - parseInt(offset.left);
    if (diff != 0) {
        iframe[0].style.marginLeft = (1.0 - diff) + 'px';
    }

    var diffTop = parseFloat(offset.top) - parseInt(offset.top);
    if (diffTop != 0) {
        iframe[0].style.marginTop = (1.5 - diffTop) + 'px';
    }

};