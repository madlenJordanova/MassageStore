$(document).ready(function() {
	
    var pp                      = new Popup();
    var profile                 = new Profile();
    var pro                     = new SelectDecorator('.selD');    
    var comm                    = new LastComments();
    var map                     = new InitMap();
    var logInOut                = new LogInOut();
    var teamProfile             = new TeamProfile();
    var category                = new CategoryProcedure();
    var reservationData         = new ReservationPopup();
    var userReg                 = new UserRegistration();
    var userProfile             = new UserProfile();
    var elInit                  = new ElementsInit();
    
});

/* Inits sliders, timepicker, datepicker and fancybox all over the page -----*/
function ElementsInit() {
    $("#gridSlider").owlCarousel({
        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true
    });

    $("#sliderProcedure").owlCarousel({
        navigation : false, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        autoPlay: true,
        stopOnHover: true
    });

    $('.datepicker').datepicker({
        'weekStart': '1',
        'format': 'yyyy/m/d',
        'daysOfWeekDisabled': '07',
        'startDate': '01',  
        'todayHighlight': true,      
        'autoclose': true
    });

    $('.birthdayDatepicker').datepicker({
        'weekStart': '1',
        'format': 'yyyy/m/d',
        'todayHighlight': true, 
        'endDate': '01',    
        'autoclose': true
    });

    $('.timepicker').timepicker({
        'minTime': '9:00',
        'maxTime': '19:00',
        'timeFormat': 'H:i',
        'step': '60'
    });

    $('.sliderItem .item a').fancybox({
        helpers : {
            title : {
                type : 'inside'
            }
        } 
    });
}

/* Login and Logout ------------------------------------------*/
function LogInOut() {
    this.logInForm      = $('form[name="loginForm"]');
    this.logOut         = $('#logout');
    this.closePopup     = $('.iconClose');
    this.wrongDetails   = $('.wrongUserDetails');
    this.fillCaptcha    = $('.fillCaptcha');

    this.events();
}

LogInOut.prototype.events = function() {
    var _this = this;

    //log out functionality
    $(document).on('click' , this.logOut.selector , function() {
        $.ajax({
            url: 'sql/logout.php',
            type: 'POST',
            success: function(data) {
                sessionStorage.setItem('userID','');
                sessionStorage.setItem('teamID','');
                sessionStorage.setItem('userLevel','0');
                location.href = "index.php";      
            },
            error: function(error) {
                console.log('error');
                console.log(error);
            }
        });
    });

    $(document).on('submit' , this.logInForm.selector , function(e) {
        e.preventDefault();
        var __this = _this;

        if ($("#g-recaptcha-response").val() ) {
            _this.fillCaptcha.removeClass('visible');
            $.ajax({
                type: 'POST',
                url: "sql/verify.php",  
                dataType: 'html',
                async: true,
                data: {
                    captchaResponse: $("#g-recaptcha-response").val()
                },
                success: function (data) {
                    __this.checkLogin();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log("You're a bot");
                }
            });
        }
        else {
            _this.fillCaptcha.addClass('visible');
        }
    });
};

LogInOut.prototype.checkLogin = function() {
    var _this = this;
    var name = $('input[name="userEmail"]').val();
    var pass = $('input[name="userPass"]').val();

    $.ajax({
        url: 'sql/login.php',
        type: 'POST',
        data: 'userEmail='+name+'&userPass='+pass,
        success: function(data) {
            var results = JSON.parse(data); 

            $.each( results, function(key,value) {
                if ( value === 'error' ) {
                    $('.wrongUserDetails').addClass('visible');
                }
                else {
                    if ( value.userLevel === '1') {
                        sessionStorage.setItem('userLevel', value.userLevel);
                        location.href = "admin/index.php";  
                    }
                    else {
                        sessionStorage.setItem('userID', value.id);
                        _this.closePopup.trigger('click');
                        $('.wrongUserDetails').removeClass('visible');
                        location.href = "index.php";  
                    }
                }
            });           
        },
        error: function(error) {
            console.log(error);
        }
    });
};



/* [Popup hide/show specific popup] -----------------------------*/
function Popup() {
    this.overlayDiv      = $('.overlay');
    this.linksToClick    = $('.options li > span');
    this.loginUp         = $('.menu li > span')
    this.activeClass     = 'active';
    this.noScrollBody    = $('body');

    this.events();
}

Popup.prototype.events = function() {
    var _this = this;
    var popup = null;

    $(document).on('click', this.linksToClick.selector , function(e) {
        e.preventDefault();
        popup = $(this).attr('data-open');
        _this.overlayDiv.addClass(_this.activeClass);
        $('.popup[data-popup="'+popup+'"]').addClass(_this.activeClass);

        if (popup !== 'reservation')
            _this.noScrollBody.addClass('noScroll');
    });
    $(document).on('click', this.loginUp.selector , function(e) {
        e.preventDefault();
        popup = $(this).attr('data-open');
        $('input[type="email"]').val('');
        $('input[type="password"]').val('');
        $('.wrongUserDetails').removeClass('visible');
        _this.overlayDiv.addClass(_this.activeClass);
        $('.popup[data-popup="'+popup+'"]').addClass(_this.activeClass);
        // _this.noScrollBody.addClass('noScroll');
    });

    $(document).on('click', '.iconClose', function() {
        _this.overlayDiv.removeClass(_this.activeClass);
        $('.popup[data-popup="'+popup+'"]').removeClass(_this.activeClass);
        _this.noScrollBody.removeClass('noScroll');
    });

    $(document).on('click', '#registerOpen', function() {
        popup = $(this).attr('data-open');
        $('input[type="text"]').val('');
        $('input[type="email"]').val('');
        $('input[type="password"]').val('');        
        $('.popup[data-popup="logInUp"]').removeClass('active');
        _this.overlayDiv.addClass(_this.activeClass);
        $('.popup[data-popup="'+popup+'"]').addClass(_this.activeClass);
        _this.noScrollBody.addClass('noScroll');
    });

    $(document).on('click', '#forgotPass', function() {
        popup = $(this).attr('data-open');
        $('input[type="email"]').val('');
        $('.popup[data-popup="logInUp"]').removeClass('active');
        _this.overlayDiv.addClass(_this.activeClass);
        $('.popup[data-popup="'+popup+'"]').addClass(_this.activeClass);
    });

    $(document).on('submit', 'form[name="restorePassForm"]', function(e) {
        e.preventDefault();
        _this.forgotPassword();        
         $(".sendPassToEmail").addClass('active');
        setTimeout(function() {
            $('.sendPassToEmail').removeClass('active');
            $(".popup[data-popup='forgotPass'] .iconClose").trigger('click');
        }, 5000);
    });

    $(document).on('click', '#editSettings', function() {      
        popup = $(this).attr('data-open');              
          _this.overlayDiv.addClass(_this.activeClass);
        $('.popup[data-popup="'+popup+'"]').addClass(_this.activeClass);
        _this.noScrollBody.addClass('noScroll');
    });
};

Popup.prototype.forgotPassword = function() {
    var email;
    email  = $('input[name=restoreEmail]').val();
    $.ajax({        
        url:'sql/setForgotPass.php',
        type: 'POST',
        data: 'email='+email,
        success: function(data) {
            console.log(data);
        },
        error: function() {
           console.log('error');
       }
   });
};

function InitMap() {
    var mapCanvas = document.getElementById('map-canvas');
    var mapOptions = {
        center: new google.maps.LatLng( 43.220691,27.936199 ),
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions)
}

function Profile() { 

    $(document).on('click', '.profile', function() {   
        $('.profileOptions').addClass('activeP');     
    });

    $('body').on('click', function(e) {
        if ( ! $(e.target).closest('.profileOptions').length ) {
            $('.profileOptions').removeClass('activeP');
        }
    });
}

function LastComments() {
    this.clientComments = $('.clientComments');


    this.loadHomeComments();
}

LastComments.prototype.loadHomeComments = function() {

    if ( this.clientComments.length ) {
        $.ajax({
            url: 'sql/getComments.php',
            type: 'GET',
            success: function(data) {
                var results = JSON.parse(data);                

                $.each( results, function(key,value) {
                    var art = '<article class="comment">' +
                    '<h2>от: <span>'+ value.first_name + ' ' + value.last_name +'</span> дата:<span>'+ value.date_comment +'</span></h2>'+                    
                    '<p>"'+ value.comment + '"</p>'+
                    '<h2>към: <span>' + value.name_t +
                    '</span></h2></article>';

                    $('.commentUser').append(art);                   
                });                
            },
            error: function() {
                console.log('error');
            }
        });
    }
};




/* Team profile ------------------------------------------------*/

function TeamProfile() {
    this.teams = $('.teams');
    this.allComments = $('.comments');
    this.teamPersonView = $('.teamProfile');
    this.teamP

   
    this.loadTeamProfile();
    this.loadTeamPersonal();
    this.events();
}

TeamProfile.prototype.loadTeamProfile = function() {

    if (this.teams.length) {

        $.ajax({

            url: 'sql/getTeam.php',
            type: 'GET',

            success: function (data) {
                var results = JSON.parse(data);

                $.each( results,function(key,value) {
                    var art = '<article class="prof">'+
                    '<figure>'+'<img class= "firstPhoto" src="img/profiles/'+value.photo+'" data-team-id="'+value.id+'" />'+
                    '</figure>'+
                    '<h3>'+value.name_t + '</h3>'+
                    '<h4>' + value.name_position+'</h4>'+                    
                    '</article>';

                    $('.teams').append(art);
                });               
            },
            error: function() {
                console.log('error');
            }
        });
    }
};

TeamProfile.prototype.loadTeamPersonal = function() {
    var _this = this;

    if ( this.teamPersonView.length ) {

        $('.employeer-picture').attr('src', ' ');
        $('.nameEmpl').text('');
        $('.positionEmpl').text('');
        $('.empl-phone').text('');
        $('.empl-mail').text('');
        $('.empl-face').text('');
        var teamID = sessionStorage.getItem('teamID');

        $.ajax({
            url: 'sql/getTeamProfile.php',
            type: 'POST',
            data: 'teamID='+teamID,
            success: function(data) {
                var results = JSON.parse(data);

                $.each( results, function(key,value) {
                    setTimeout(function(){
                        $('.employeer-picture').attr('src', 'img/profiles/' + value.photo);
                        $('.nameEmpl').text(value.name_t);
                        $('.positionEmpl').text(value.name_position);
                        $('.empl-phone').text(value.phone);
                        $('.empl-mail').text(value.e_mail);
                        $('.empl-face').text(value.facebook);
                    }, 50);
                });

                $("html, body").animate({ scrollTop: 0 }, "slow");
            },
            error: function() {
                console.log('error');
            }
        });

        setTimeout(function() {
            _this.loadTeamPersonComments(teamID);
        }, 60);
    }
};

TeamProfile.prototype.events = function() {
    var _this = this; 

    $(document).on('click', '.firstPhoto', function(e) {
        location.href = "TemplateTeamInfo.php";
        var teamID = $(this).attr('data-team-id');
        sessionStorage.setItem('teamID', teamID);
    });

    $(document).on('submit', 'form[name="sendPersonComment"]', function(e){
        e.preventDefault();
        if ( sessionStorage.getItem('userID')) {
            _this.setComment();
        }
        else {
          console.log('error');
        }   
    });

    $(document).on('click', '.close', function(e) {
        location.href = "team.php";
    })
};

TeamProfile.prototype.loadTeamPersonComments = function(teamID) {
    $.ajax({
        url: 'sql/postAllComments.php',
        type: 'POST',
        data: 'teamID=' + teamID,

        success: function(data) {
            var results = JSON.parse(data);

            $.each( results, function(key,value) {

                var art = '<article class="comment">' +
                '<h2>от: <span>'+ value.first_name +' '+ value.last_name + '</span></h2>'+                    
                '<p>"'+ value.comment + '"</p>'+
                '<h2>дата: <span>' + value.date_comment +
                '</span></h2></article>';

                $('.clientComments .comments').append(art);
            });
        },
        error: function() {
            console.log('error');
        }
    });
};

TeamProfile.prototype.setComment = function() {
    var userID, teamID, comment;
    var _this = this;
    userID = sessionStorage.getItem('userID');
    teamID = sessionStorage.getItem('teamID');
    comment  = $('textarea[name="comment"]').val();

        $.ajax({
            url: 'sql/setComment.php',
            type: 'POST',
            data: 'userID='+userID+'&teamID='+teamID+'&comment='+comment,
            success: function(data) {
                console.log(data);

                $('textarea[name="comment"]').val('');
                $('.comments').empty();
                _this.loadTeamPersonComments(teamID);
            },
            error: function() {
                console.log('error');
        }
    });
};




/* Popup for user registration ----------------------------*/

function CategoryProcedure() {
    this.category                           = $('.typeCategory');
    this.proceduresHolder                   = $('.typeProcedure');
    this.singleProcedureInfoHolder          = $('.procedureInfoAll');

    this.loadCategoryProcedure();
    this.loadProceduresFromCategories();
    this.loadSingleProcedure();
    this.events();
}

CategoryProcedure.prototype.loadCategoryProcedure = function() {
    if( this.category.length ) {
        $.ajax({
            url:'sql/getCategoryProcedure.php',
            type: 'GET',
            success: function(data) {

                var results = JSON.parse(data);
                $.each( results, function(key,value) {
                    var art = '<article class="type" data-categoryID='+ value.id +'>'+
                    '<figure >'+ '<img src="img/procedures/' + value.photo +'"/>'+
                    '</figure>' + '<h3>' + value.types +'</h3>'+ '</article>';

                    $('.typeCategory').append(art);
                });
            },
            error: function() {
                console.log('error');
            }
        });
    }
};

CategoryProcedure.prototype.loadProceduresFromCategories = function() {
    if ( this.proceduresHolder.length ) {
        
        $.ajax({
            url:'sql/getProceduresByCategory.php',
            type: 'POST',
            data: 'categoryID='+ sessionStorage.getItem('categoryID'),
            success: function(data) {
                var results = JSON.parse(data);
                $.each( results, function(key,value) {
                    var art = '<article class="type" data-procedureid='+ value.id +'>'+                    
                    '<figure >' + '<img src="img/procedures/' + value.photo +'"/>'+
                    '</figure>' + '<h3>' + value.name_procedure +'</h3>'+ '<div><p class="priceProc">' + value.price +'</p>' + '<p class="timeProc">' + value.time_procedure +'</p></div></article>';

                    $('.typeProcedure').append(art);
                });
            },
            error: function() {
                console.log('error');
            }
        });
    }
};

CategoryProcedure.prototype.loadSingleProcedure = function() {
    if ( this.singleProcedureInfoHolder.length ) {

       $.ajax({
            url:'sql/getSingleProcedureInfo.php',
            type: 'POST',
            data: 'procedureID='+ sessionStorage.getItem('procedureID'),
            success: function(data) {
                var results = JSON.parse(data);
                $.each( results, function(key,value) {
                   $('.procedure-picture').attr('src', 'img/procedures/' + value.photo);
                   $('.nameProc').text(value.name_procedure);
                   $('.timeProc').text(value.time_procedure);
                   $('.priceProc').text(value.price);
                   $('.procedureDescription').text(value.description);
                   $('.procedureInfoAll iframe').attr('src', value.video + '?autoplay=0');
                });
            },
            error: function() {
                console.log('error');
            }
        });
    }
};

CategoryProcedure.prototype.events = function() {

    $(document).on('click', '.typeCategory .type' , function() {
        sessionStorage.setItem('categoryID', $(this).data('categoryid'));
        location.href = 'categoryTemplate.php';
    });

    $(document).on('click', '.typeProcedure .type' , function() {
        sessionStorage.setItem('procedureID', $(this).data('procedureid'));
        location.href = 'TemplateProcedureInfo.php';
    });

    $(document).on('click', '.procedureInfoAll .close' , function() {
        location.href = 'categoryTemplate.php';
    });
};



/* Popup for user reservation ----------------------------*/

function ReservationPopup() {
    this.procedures         = $('#procedures');
    this.rowNameSpecialist  = $('.formRow[data-element="nameSpecialist"]');
    this.selDynamicProc     = $('.selDynamicProcedures'); 

    this.selDynamic         = null;
    this.loadAllProcedures();
    this.loadTeam();
    this.events();
}

ReservationPopup.prototype.loadAllProcedures = function() {
    var _this = this;

    if( this.procedures.length ) {

        $.ajax({        
            url:'sql/getAllProcedures.php',
            type: 'GET',

            success: function(data) {

                var results = JSON.parse(data);  

                $.each( results, function(key,value) {
                    var art =                  
                    '<option data-category='+value.id_category+' value=' + value.id + '>' 
                    + value.name_procedure + '</option>' 

                    $('#procedures').append(art);
                });

                _this.selDynamic  = new SelectDecorator('.selDynamicProcedures');
            },
            error: function() {
                console.log('error');
            }
        });
    }
};

ReservationPopup.prototype.loadTeam = function(sex, procID){
    var _this = this;

    if (sex === undefined || sex === 'none')
        sex = '';

    if (procID === undefined)
        procID = 1;

    this.rowNameSpecialist.find('div').remove();
    this.rowNameSpecialist.append('<select id="massure" class="selDynamicTeam"></select>');

    $.ajax({
        url:'sql/getNameTeam.php',
        type: 'POST',
        data: 'sex='+sex + '&procID=' + procID,

        success: function(data) {
            var results = JSON.parse(data);

            $.each( results, function(key,value) {
                var art =                    
                '<option value=' + value.id_team + '>' 
                + value.name_t + '</option>';

                $('#massure').append(art);
            });

            var     selDynamic  = new SelectDecorator('.selDynamicTeam');
        },

        error: function() {
           console.log('error');
       }
    });
};

ReservationPopup.prototype.scheduleAvailable = function() {
    var _this  = this;
    var time   = $('.ui-timepicker-input').val();
    var date   = $('.datepicker').val();
    var teamID = $('select#massure').val();

    $.ajax({        
        url:'sql/scheduleAvailable.php',
        type: 'POST',
        data: 'teamID='+teamID+'&date='+date+'&time='+time,
        success: function(data) {
            if ( data === 'empty') {
                _this.reservation();

                $(".reservComplite").addClass('active');
                setTimeout(function() {
                    $('.reservComplite').removeClass('active');
                    $(".popup[data-popup='reservation'] .iconClose").trigger('click');
                }, 5000);

                $('.employeeAvailable').removeClass('active');
            }
            else {
                $('.employeeAvailable').addClass('active');
            }
        },
        error: function() {
           console.log('error');
        }
    });
};

ReservationPopup.prototype.reservation = function(){
    var choiseProcedure, specialist, userid, datepicker, timepicker;
    choiseProcedure = this.procedures.val();
    specialist = $('#massure').val();
    datepicker = $('#reservDate').val();
    timepicker = $('#reservTime').val();
    userid = sessionStorage.getItem('userID');

    $.ajax({        
        url:'sql/reservation.php',
        type: 'POST',
        data: 'choiseProcedure='+choiseProcedure+'&specialist='+specialist+'&userID='+userid+'&date='+datepicker+'&time='+timepicker,
        success: function(data) {
            console.log(data);  
        },
        error: function() {
           console.log('error');
       }
   });
};

ReservationPopup.prototype.events = function() {
    var _this = this;

    $(document).on('change', '#procedures', function() {
        var checkProcSex = $('input[name="sex"]:checked').val();
        _this.loadTeam( checkProcSex, $(this).val() );
    });

    $(document).on('change', 'input[name="sex"]', function() {      
        var procID = $('#procedures option:selected').val();
        _this.loadTeam( $(this).val(), procID);
    });

    $(document).on('change', 'input[name="datepicker"]', function(){
        var date = $('.datepicker').val();
    });

    $(document).on('click', '.popup[data-popup="reservation"] .iconClose', function() {
        _this.selDynamicProc.val(''); 
        _this.selDynamic.reload();
        _this.loadTeam();
        $('input[name="sex"][value="none"]').prop('checked', 'checked');
        $('.datepicker').val('');
        $('.timepicker').val('');
    });

    $(document).on('submit', '#formReservation', function(e){
        e.preventDefault();
       
        if ( sessionStorage.getItem('userID')) {
            _this.scheduleAvailable();
        }
        else {
            $('.notLogged').addClass('active');

            setTimeout(function() {
                $('.notLogged').removeClass('active');
            }, 5000);
        }   
    });

    $(document).on('click', '#singleProcReserv', function(){
        _this.loadTeam('none', sessionStorage.getItem('procedureID'));
        _this.selDynamicProc.val(sessionStorage.getItem('procedureID')); 
        _this.selDynamic.reload();
        $("span[data-open='reservation']").trigger('click');
    });
};



/* Popup for user registration ----------------------------*/
function UserRegistration() {
    this.registerForm    = $('form[name="regForm"]');
    this.regSendBtn      = $('#registerSend');
    this.passNotMatch    = $('.passNotMatch');
    this.passNotComplex  = $('.passNotComplex');
    this.regEmailInput   = $('input[name="regUserEmail"]');
    this.regEmailError   = $('.formRow h2[data-error="email"]');
    this.events();
}

UserRegistration.prototype.events = function() {
    var _this = this;

    $(document).on('submit', 'form[name="regForm"]', function(e) {
        e.preventDefault();
        _this.register();
        $(".regComplite").addClass('active');
        setTimeout(function() {
            $('.regComplite').removeClass('active');
            $(".popup[data-popup='register'] .iconClose").trigger('click');
        }, 5000);
    });

    $(document).on('blur', this.regEmailInput.selector , function() {
        _this.checkForAvailableEmail($(this).val());
    });

    $(document).on('blur', 'input[name="userPassSecond"]', function() {
        _this.checkEqualPasswords($(this).val());
    });

    $(document).on('keyup', '.regPass', function() {
        var currVal = $(this).val();
        _this.passwordLength(currVal);
    })
};

UserRegistration.prototype.register = function() {
    var fname, lname, email, pass, birthdate;
    fname       = $('.firstName').val();
    lname       = $('.lastName').val();
    email       = $('#userEmail').val();
    pass        = $('.regPass').val();
    birthday   = $('#birthday').val();

    $.ajax({        
        url:'sql/register.php',
        type: 'POST',
        data: 'fname='+fname+'&lname='+lname+'&email='+email+'&pass='+pass+'&birthday='+birthday,
        success: function(data) {
            console.log(data);
        },
        error: function() {
           console.log('error');
       }
   });
};

UserRegistration.prototype.checkForAvailableEmail = function(email) {
    var _this = this;

    $.ajax({        
        url:'sql/checkForAvailableEmail.php',
        type: 'POST',
        data: 'email='+email,
        success: function(data) {

            if( data === 'taken') {

                _this.regSendBtn.attr('disabled', 'disabled');
                _this.regEmailError.text('Имейл - Този имейл вече съществува').css('color','red');
            }
            else {
                _this.regSendBtn.removeAttr('disabled');
                _this.regEmailError.text('Имейл').removeAttr('style');
            }
        },
        error: function() {
           console.log('error');
       }
   });
};

UserRegistration.prototype.checkEqualPasswords = function(secondPassVal) {    
    var passwordVal =  $('input[name="userPassReg"]').val();

    if ( passwordVal !== secondPassVal ) {
        this.regSendBtn.attr('disabled', 'disabled');
        this.passNotMatch.addClass('active');
    }
    else {
        this.regSendBtn.removeAttr('disabled');
        this.passNotMatch.removeClass('active');
    }
};

UserRegistration.prototype.passwordLength = function(val) {
    // at least one number, one lowercase and one uppercase letter
    // at least six characters
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

    if ( re.test(val) ) {
       this.regSendBtn.removeAttr('disabled');
       this.passNotComplex.removeClass('active');
    }
    else {
       this.regSendBtn.attr('disabled', 'disabled');
       this.passNotComplex.addClass('active');
    }
};



/* User profile -----------------------------------------*/

function UserProfile() {   
    this.allComments            = $('.allMyComments');
    this.userProfileInfo        = $('.profileUser');
    this.userReservation        = $('.AllMyReservations');
    this.editProfileBtn         = $('#editProfile');
    this.passNotComp            = $('form[name="editForm"] .passNotComplex');
    this.AllNotifications       = $('.notifications');
    this.userNameHolder         = $('.welcome span');

    this.events();
    this.loadUserPersonComments();
    this.loadUserInfo();
    this.loadAllMyReservation();
    this.notifications();
    this.profileImageUpload();
    this.showUserName();
}

UserProfile.prototype.profileImageUpload = function() {
    $(document).on('submit', 'form[name="profileImageUpload"]', function(e) {
        e.preventDefault();

        var image = $('input[name="image"]');
        var file  = image[0];

        if ( file.files && file.files[0] )  {
            file = file.files[0];

            var fsize = file.size;
            var fname = file.name;
            var ftype = file.type;

            switch(ftype) {
                case 'image/png':
                case 'image/jpg':
                case 'image/gif':
                case 'image/jpeg':
                break;
                default:
                alert('unsupported file format');
                return false;
            }

            if ( fsize > 1048576) {
                alert('File size is too big (>1mb)');
                return false;
            }

            var reader = new FileReader();
            var image  = new Image();

            reader.readAsDataURL(file);

            reader.onload = function(_file) {
                image.src = _file.target.result;
                image.onload = function() {

                    var w = this.width,
                    h = this.height,
                    t = file.type,
                    n = file.name

                    console.log(fname);

                    var formdata = false;

                    if ( window.FormData) {
                        formdata = new FormData( $('form[name="profileImageUpload"]')[0]);
                    }

                    $.ajax({
                        url: 'sql/uploadImg.php',
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST',
                        data: formdata ? formdata: $('form[name="profileImageUpload"]').serialize(),
                        success: function(response) {
                            var userID = sessionStorage.getItem('userID');

                            $.ajax({
                                url: 'sql/insertUserImage.php',
                                type: 'POST',
                                data: 'imageName='+fname+'&userID='+userID,
                                success: function(response) {
                                    $('.user-picture img').attr('src', 'img/user_profiles/'+fname);
                                }
                            });
                        }
                    });
                }
            }
        }
    });
};

UserProfile.prototype.events = function() {
    var _this = this;

    $(document).on('keyup', 'input[name="edit-userPassNew"]', function() {
        var currVal = $(this).val();
        _this.passwordLength(currVal);
    });

    $(document).on('submit', 'form[name="editForm"]', function(e) {
        e.preventDefault();
        _this.editFormSettings();        
        $(".editComplete").addClass('active');
        var __this = _this;

        setTimeout(function() {
            $('.editComplete').removeClass('active');
            $(".popup[data-popup='editUser'] .iconClose").trigger('click');
            __this.loadUserInfo();

        }, 2000);
    });
};

UserProfile.prototype.passwordLength = function(val) {
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
        console.log(val);


    if ( re.test(val) ) {
        this.editProfileBtn.removeAttr('disabled');
        this.passNotComp.removeClass('active');
        console.log('match');

    }
    else {
        this.editProfileBtn.attr('disabled', 'disabled');
        this.passNotComp.addClass('active');
        console.log(' not match match');
    }
};

UserProfile.prototype.editFormSettings = function() {
    var fname = $('input[name="edit-fName"]').val();
    var lname = $('input[name="edit-lName"]').val();
    var pass = $('input[name="edit-userPassNew"]').val();
    var phone = $('input[name="edit-telNum"]').val();
    var facebook = $('input[name="edit-facebook"]').val();
    var birthday = $('input[name="edit-datepicker"]').val();
    var userID = sessionStorage.getItem('userID');
    // console.log(facebook);
    var _this = this;
    $.ajax({        
        url:'sql/editSettings.php',
        type: 'POST',
        data: 'userID='+userID+ '&pass='+pass+'&fname='+fname+'&lname='+lname+'&phone='+phone+'&facebook='+facebook+'&birthday='+birthday, 
        success: function(data) {
            console.log('' + data);
            _this.showUserName();
        },
        error: function() {
           console.log('error');
       }
    });
};

UserProfile.prototype.showUserName = function() {
    var _this = this;

    if ( this.userNameHolder.length ) {

        $.ajax({
            url: 'sql/showUserName.php',
            type: 'GET',
            success: function(data) {
               _this.userNameHolder.text(data);
            },
            error: function() {
                console.log('error');
            }
        });
    }
};

UserProfile.prototype.loadUserInfo = function() {
    var _this = this;

    if ( _this.userProfileInfo.length ) {
        var userID = sessionStorage.getItem('userID');

        $.ajax({
            url: 'sql/getUser.php',
            type: 'POST',
            data: 'userID='+userID,
            success: function(data) {
                var results = JSON.parse(data);
                $.each( results, function(key,value) {
                    $('.user-picture img').attr('src', 'img/user_profiles/' + value.photo);
                    $('.user-name').text(value.first_name, value.last_name);
                    $('.user-gmail').text(value.email);
                    $('.user-birthday').text(value.birthday);

                    $('input[name="edit-fName"]').val(value.first_name);
                    $('input[name="edit-lName"]').val(value.last_name);
                    $('input[name="edit-datepicker"]').val(value.birthday);

                    if ( value.phone) {
                        $('.user-phone').text(value.phone);
                        $('input[name="edit-telNum"]').val(value.phone);  
                    }
                    if (value.facebook) {
                        $('.user-face').text(value.facebook);
                        $('input[name="edit-facebook"]').val(value.facebook);  
                    }
                });
            },
            error: function() {
                console.log('error');
            }
        });
    }
};

UserProfile.prototype.loadUserPersonComments = function() {
    var _this = this;

    if ( _this.allComments.length) {
        var userID = sessionStorage.getItem('userID');

        $.ajax({
            url: 'sql/postAllMyComments.php',
            type: 'POST',
            data: 'userID=' + userID,
            success: function(data) {
                var results = JSON.parse(data);
                $.each( results, function(key,value) {
                    var art = '<article class="myComment">' +
                    '<h2>към: <span>'+ value.name_t +'</span></h2>'+                    
                    '<p>"'+ value.comment + '"</p>'+
                    '<h2>дата: <span>' + value.date_comment +
                    '</span></h2></article>';
                   _this.allComments.append(art);
                });
            },
            error: function() {
                console.log('error');
            }
        });
    }
};

UserProfile.prototype.loadAllMyReservation = function() {
    var _this = this;
    if( $(this.userReservation).length) {
    var userID = sessionStorage.getItem('userID');

        $.ajax({
            url: 'sql/getAllReservationsFromUser.php',
            type: 'POST',
            data: 'userID='+userID,
            success: function(data) {
                var results = JSON.parse(data);
                $.each( results, function(key,value) {

                     var art = '<article class="reservationOnce">' +
                    '<div class= "pictureRes">'+
                        '<figure>'+'<img class="res-picture" src="img/procedures/'+ value.photo +'"/>'+
                        '</figure>'+
                        '</div>'+
                        '<div class="resInfo">'+
                            '<h3 class="res-name">'+ value.name_procedure +'</h3>' +                   
                            '<p class="res-date">'+ value.date + '</p>'+
                            '<p class="res-time">' + value.time + '</p>'
                        '</div>'+
                    '</article>';
                   _this.userReservation.append(art);
                });
            },
            error: function() {
                console.log('error');
            }
        });
    }
};

UserProfile.prototype.notifications = function() {
    var _this = this;

    if ( _this.AllNotifications.length ) {
        var userID = sessionStorage.getItem('userID');

        $.ajax({
            url: 'sql/getPromotions.php',
            type: 'GET',
            success: function(data) {
                 var results = JSON.parse(data);
                $.each( results, function(key,value) {

                     var art = '<article class="notificationOnce">' +
                            '<h2 class="theme">'+ value.theme+'</h2>'+
                            '<div class="item">'+
                            '<span class="description">'+ value.description+ '</span>'+
                            '<span class="date-start">Валидно от: '+value.date_start+'</span>'+
                            '<span class="date-end">Валидно до: '+ value.date_end+'</span>'+
                        '</div>'+
                    '</article>';
                   _this.AllNotifications.append(art);
                });
            },
            error: function() {
                console.log('error');
            }
        });
    }
};