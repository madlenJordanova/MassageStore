$(document).ready(function() {
	
    var del             = new DeleteFunctionality();
    var adminPopup      = new AdminPopups();
    var selD            = new SelectDecorator('.selD');
    var elInit          = new ElementsInit();
    var logout          = new AdminLogout();
});

function ElementsInit() {
    $('.datepicker').datepicker({
        'weekStart': '1',
        'format': 'yyyy/m/d',
        'daysOfWeekDisabled': '07',
        'startDate': '01',  
        'todayHighlight': true,      
        'autoclose': true
    });
}


function AdminLogout() {
    this.logoutBtn   = $('.logout');
    this.events();
};

AdminLogout.prototype.events = function() {
    var _this = this;

    $(document).on('click', this.logoutBtn.selector, function() {
        _this.destroySession();
    });
};

AdminLogout.prototype.destroySession = function() {

    $.ajax({
        url: '../sql/logout.php',
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
};      

/* Delete admin functionality --------*/
function DeleteFunctionality() {

    this.events();
};

DeleteFunctionality.prototype.events = function() {
    var _this = this;

    $(document).on('click', '.reservations .delete', function(e) {
        e.preventDefault();
        var item = $(this).attr('data-reserv-id');
        _this.deleteReservation(item);
    });

    $(document).on('click', '.users .delete', function(e) {
        e.preventDefault();
        var item = $(this).attr('data-user-id');
        _this.deleteUser(item);
    });

    $(document).on('click', '.teams .delete', function(e) {
        e.preventDefault();
        var item = $(this).attr('data-team-id');
        _this.deleteTeam(item);
    });

    $(document).on('click', '.comments .delete', function(e) {
        e.preventDefault();
        var item = $(this).attr('data-comment-id');
        _this.deleteComment(item);
    });

    $(document).on('click', '.procedures .delete', function(e) {
        e.preventDefault();
        var item = $(this).attr('data-procedure-id');
        _this.deleteProcedure(item);
    }); 

    $(document).on('click', '.promotions .delete', function(e) {
        e.preventDefault();
        var item = $(this).attr('data-promotion-id');
        _this.deletePromotion(item);
    });
};

DeleteFunctionality.prototype.deleteReservation = function(item) {
    if (confirm('Сигурни ли сте, че искате да изтриете това?')) {
        $.ajax({
            url: 'sql/deleteReserv.php',
            type: 'POST',
            data:'reservID='+item,
            success: function(result) {
                location.reload();
            }
        });
    }
};

DeleteFunctionality.prototype.deleteUser = function(item) {
    if (confirm('Сигурни ли сте, че искате да изтриете това?')) {    
        $.ajax({
            url: 'sql/deleteUser.php',
            type: 'POST',
            data:'userID='+item,
            success: function(result) {
                location.reload();
            }
        });
    }
};

DeleteFunctionality.prototype.deleteTeam = function(item) {
    if (confirm('Сигурни ли сте, че искате да изтриете това?')) {
        $.ajax({
            url: 'sql/deleteTeam.php',
            type: 'POST',
            data:'teamID='+item,
            success: function(result) {
                location.reload();
            }
        });
    }
};

DeleteFunctionality.prototype.deleteComment = function(item) {
    if (confirm('Сигурни ли сте, че искате да изтриете това?')) {
        $.ajax({
            url: 'sql/deleteComment.php',
            type: 'POST',
            data:'commentID='+item,
            success: function(result) {
                location.reload();
            }
        });
    }
};

DeleteFunctionality.prototype.deleteProcedure = function(item) {
    if (confirm('Сигурни ли сте, че искате да изтриете това?')) {
        $.ajax({
            url: 'sql/deleteProcedure.php',
            type: 'POST',
            data:'procedureID='+item,
            success: function(result) {
                location.reload();
            }
        });
    }
};

DeleteFunctionality.prototype.deletePromotion = function(item) {
    if (confirm('Сигурни ли сте, че искате да изтриете това?')) {
        $.ajax({
            url: 'sql/deletePromotion.php',
            type: 'POST',
            data:'promotionID='+item,
            success: function(result) {
                location.reload();
            }
        });
    }
};


/* Admin popups functionality here -----------------------*/
function AdminPopups() {
    this.overlayDiv      = $('.overlay');
    this.activeClass     = 'active';
    this.noScrollBody    = $('body');
    this.linksToClick    = $('.popupOpen');
    this.editBtn         = $('.item .edit');
    this.selDynDec       = new SelectDecorator('.selDynamicDecorator');

    this.events();
};

AdminPopups.prototype.events = function() {
    var _this = this;
    var popup = null;

    $(document).on('click', '.iconClose', function() {
        _this.overlayDiv.removeClass(_this.activeClass);
        $('.popup[data-popup="'+popup+'"]').removeClass(_this.activeClass);
        _this.noScrollBody.removeClass('noScroll');
    });

    $(document).on('click', this.linksToClick.selector , function(e) {
        e.preventDefault();
        popup = $(this).attr('data-open');
        _this.overlayDiv.addClass(_this.activeClass);
        $('.popup[data-popup="'+popup+'"]').addClass(_this.activeClass);
        $('input[type="text"]').val('');
        $('input[type="email"]').val('');
        _this.noScrollBody.addClass('noScroll');
    });

    $(document).on('submit', 'form[name="insertTeamPerson"]', function(e) {
        e.preventDefault();
        var image = $('input[name="teamPicture"]');
        var form = $('form[name="insertTeamPerson"]');
        _this.insertTeamPerson(image, form);
    });

    $(document).on('submit', 'form[name="frmAddProcedure"]', function(e) {
        e.preventDefault();
        _this.addProcedure();
    });

    $(document).on('submit', 'form[name="frmAddPromotion"]', function(e) {
        e.preventDefault();
        _this.addPromotion();
    });

    $(document).on('blur', 'input[name="timeEstimate"]', function() {
        if ( ! /^[0-9]*\:?[0-9]*$/.test($(this).val()) ) {
            $('.numbersOnly').addClass('visible');
            $('#addProc').attr('disabled','disabled');
        }
        else {
            $('.numbersOnly').removeClass('visible');
            $('#addProc').removeAttr('disabled');
        }
    });

    $(document).on('click', this.editBtn.selector, function() {
       var teamID = $(this).attr('data-team-id');

        popup = $(this).attr('data-open');
        _this.overlayDiv.addClass(_this.activeClass);
        $('.popup[data-popup="'+popup+'"]').addClass(_this.activeClass);
        _this.noScrollBody.addClass('noScroll');
        _this.loadTeamPersonalData(teamID);
    });

    $(document).on('submit', 'form[name="editTeamPerson"]', function(e) {
        e.preventDefault();

        _this.updateTeamData();
    }); 

     $(document).on('click', this.editBtn.selector, function() {
       var procID = $(this).attr('data-procedure-id');

        popup = $(this).attr('data-open');
        _this.overlayDiv.addClass(_this.activeClass);
        $('.popup[data-popup="'+popup+'"]').addClass(_this.activeClass);
        _this.noScrollBody.addClass('noScroll');
        _this.loadProcedureData(procID);
    });

    $(document).on('submit', 'form[name="editProcedure"]', function(e) {
        e.preventDefault();

        _this.updateProcedure();
    }); 
};

AdminPopups.prototype.updateTeamData = function() {
    var image = $('input[name="editTeamPicture"]');
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
                var formdata = false;

                if ( window.FormData) {
                    formdata = new FormData( $('form[name="editTeamPerson"]')[0]);
                }

                $.ajax({
                    url: 'sql/updateTeamImg.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    data: formdata ? formdata: $('form[name="editTeamPerson"]').serialize(),
                    success: function(response) {
                        var nameTeam = $('input[name="editTeamName"]').val();
                        var position = $('select[name="editTeamPersonPosition"]').val();
                        var email = $('input[name="editTeamEmail"]').val();
                        var facebook = $('input[name="editFacebook"]').val();
                        var phone = $('input[name="editTeamPhone"]').val();                         
                        var sex = $('input[name="editSex"]:checked').val();
                        var teamID = $('#editTeam').attr('data-team-id');
                        $.ajax({
                            url: 'sql/updateTeamData.php',
                            type: 'POST',
                            data: 'nameTeam='+nameTeam+'&position='+position+'&phone='+phone+'&email='+email+'&facebook='+facebook+'&picture='+fname+'&sex='+sex+'&teamID='+teamID,
                            success: function(response) {
                                if ( response !== '')
                                    alert(response);
                                $('.iconClose').trigger('click');
                                location.reload();
                            }
                        });
                    }
                });
            }
        }
    }

};

AdminPopups.prototype.loadTeamPersonalData = function(teamID) {
    var _this = this;

    $.ajax({
        url: 'sql/getTeamPersonalData.php',
        type: 'POST',
        data: 'teamID='+teamID,
        success: function(data) {
            var results = JSON.parse(data);

            $.each( results, function(key,value) {
                console.log(value);

                $('input[name="editTeamName"]').val(value.name_t);
                $('input[name="editTeamEmail"]').val(value.e_mail);
                $('input[name="editFacebook"]').val(value.facebook);
                $('input[name="editTeamPhone"]').val(value.phone);
                $('input[name="editSex"][value='+ value.sex+']').prop('checked', true);
                $('select[name="editTeamPersonPosition"]').val(value.id_position);

                _this.selDynDec.reload();
            });

            $('#editTeam').attr('data-team-id', teamID);
        },
        error: function() {
            console.log('error');
        }
    });
};

AdminPopups.prototype.insertTeamPerson = function() {
    var image = $('input[name="teamPicture"]');
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
                var formdata = false;

                if ( window.FormData) {
                    formdata = new FormData( $('form[name="insertTeamPerson"]')[0]);
                }

                $.ajax({
                    url: 'sql/uploadTeamImg.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    data: formdata ? formdata: $('form[name="insertTeamPerson"]').serialize(),
                    success: function(response) {
                        var nameTeam = $('input[name="teamName"]').val();
                        var position = $('select[name="teamPersonPosition"]').val();
                        var email = $('input[name="teamEmail"]').val();
                        var facebook = $('input[name="facebook"]').val();
                        var phone = $('input[name="teamPhone"]').val();
                        var sex = $('input[name="sex"]:checked').val();
                        $.ajax({
                            url: 'sql/insertTeamPerson.php',
                            type: 'POST',
                            data: 'nameTeam='+nameTeam+'&position='+position+'&phone='+phone+'&email='+email+'&facebook='+facebook+'&picture='+fname+'&sex='+sex,
                            success: function(response) {
                                if ( response !== '')
                                    alert(response);
                                $('.iconClose').trigger('click');
                                location.reload();
                            }
                        });
                    }
                });
            }
        }
    }
};

AdminPopups.prototype.addPromotion = function() {
    var dateStart = $('#startDateProm').val();
    var theme = $('input[name="theme"]').val();
    var descriptionPromotion = $('textarea[name="description"]').val();
    var dateEnd = $('#endDateProm').val();  

    $.ajax({
        url: 'sql/addPromotion.php',
        type: 'POST',
        data: 'dateStart='+dateStart+'&theme='+theme+'&descriptionPromotion='+descriptionPromotion+'&dateEnd='+dateEnd,
        success: function(response) {
            if ( response !== '')
                alert(response);
            $('.iconClose').trigger('click');
             location.reload();
        }
    });
};

AdminPopups.prototype.loadProcedureData = function(procID) {
    var _this = this;

    $.ajax({
        url: 'sql/getProcedure.php',
        type: 'POST',
        data: 'procID='+procID,
        success: function(data) {
            var results = JSON.parse(data);

            $.each( results, function(key,value) {
                console.log(value);

                $('select[name="editCategory"]').val(value.id_category);
                $('input[name="editProcedure"]').val(value.name_procedure);
                $('input[name="editDescriptionProc"]').val(value.description);
                $('input[name="editTimeEstimate"]').val(value.time_procedure);
                $('input[name="editPrice"]').val(value.price);
                $('input[name="editVideo"]').val(value.video);

                _this.selDynDec.reload();
            });

            $('#editProcedure').attr('data-procedure-id', procID);
        },
        error: function() {
            console.log('error');
        }
    });
};

AdminPopups.prototype.updateProcedure = function() {
    var image = $('input[name="editProcPicture"]');
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
                var formdata = false;

                if ( window.FormData) {
                    formdata = new FormData( $('form[name="editProcedure"]')[0]);
                }

                $.ajax({
                    url: 'sql/updateProcedureImg.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    data: formdata ? formdata: $('form[name="editProcedure"]').serialize(),
                    success: function(response) {
                        var idCategory      = $('select[name="editCategory"]').val();
                        var procedure       = $('input[name="editProcedure"]').val();
                        var descriptionProc = $('input[name="editDescriptionProc"]').val();
                        var procTime        = $('input[name="editTimeEstimate"]').val();
                        var price           = $('input[name="editPrice"]').val();   
                        var video           = $('input[name="editVideo"]').val(); 
                        var procID          = $('#editProcedure').attr('data-procedure-id');



                        $.ajax({
                            url: 'sql/updateProcedure.php',
                            type: 'POST',
                            data: 'procID='+procID+'&idCategory='+idCategory+'&procedure='+procedure+'&descriptionProc='+descriptionProc+'&procTime='+procTime+'&price='+price+'&picture='+fname+'&video='+video,
                            success: function(response) {
                                console.log(response);

                                if ( response !== '')
                                    alert(response);
                                $('.iconClose').trigger('click');
                                 location.reload();
                            }
                        });
                    }
                });
            }
        }
    }
};

AdminPopups.prototype.addProcedure = function() {
    var image = $('input[name="procPicture"]');
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
                var formdata = false;

                if ( window.FormData) {
                    formdata = new FormData( $('form[name="frmAddProcedure"]')[0]);
                }

                $.ajax({
                    url: 'sql/uploadProcedureImg.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    data: formdata ? formdata: $('form[name="frmAddProcedure"]').serialize(),
                    success: function(response) {
                      

                        var idCategory = $('select[name="category"]').val();
                        var procedure = $('input[name="procedure"]').val();
                        var descriptionProc = $('input[name="descriptionProc"]').val();
                        var procTime = $('input[name="timeEstimate"]').val();
                        var price = $('input[name="price"]').val();       
                        var video = $('input[name="video"]').val(); 

                        $.ajax({
                            url: 'sql/addProcedure.php',
                            type: 'POST',
                            data: 'idCategory='+idCategory+'&procedure='+procedure+'&descriptionProc='+descriptionProc+'&procTime='+procTime+'&price='+price+'&picture='+fname+'&video='+video,
                            success: function(response) {
                                if ( response !== '')
                                    alert(response);

                                $('.iconClose').trigger('click');
                                 location.reload();
                            }
                        });
                    }
                });
            }
        }
    }
};