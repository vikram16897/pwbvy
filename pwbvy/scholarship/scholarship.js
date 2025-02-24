$(document).ready(function () {
    function getcookies(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) return match[2];
    }
    $('#loading').hide();
    $('.verfiy').hide();
    $('#otpform').hide();
    $('#registerform').show();
    $('#loadingpop').hide();
    $('#thanks').hide();
    $('#uploadalert').hide();
    $('#uploadalert1').hide();
    $("#getotp").click(function () {
        $('#loading').show();
        let mobile = $("#mobile").val();
        $.ajax({
            url: "ajax.php",
            type: 'POST',
            dataType: 'json',
            data: { 'phone': mobile },
            success: function (data) {
                $('#loading').hide();
                if (data == 0) {
                    alert("This number has been already registred . Please try with another number .")
                } else {
                    $('.verfiy').show();
                }
            }
        })
    })

    $("#verify").click(function () {
        $('#loading').show();
        let otp = $("#otp").val();
        $.ajax({
            url: "ajax.php",
            type: 'POST',
            dataType: 'json',
            data: { 'otp': otp },
            success: function (data) {
                $('#loading').hide();
                if (data == 1) {
                    $('#otpform').hide();
                    $('#registerform').show();
                    console.log(getcookies('mobile'));
                    let mobile = getcookies('mobile');
                    $("#mobile").val(mobile);
                } else {
                    alert("Otp is incorrect . Please try again .");
                }
            }
        })
    })

    $("#submit").click(function () {

        // e.preventDefault(); // Prevent form submission

        // Get form values
        const name = $("input[name='name']").val().trim();
        const fname = $("input[name='fname']").val().trim();
        const mname = $("input[name='mname']").val().trim();
        const dob = $("input[name='dob']").val();
        const email = $("input[name='email']").val().trim();
        const mobile = $("input[name='mobile1']").val().trim();
        const aadhar = $("input[name='aadhar']").val().trim();
        const category = $("select[name='category']").val();
        const classVal = $("select[name='class']").val();
        const bank = $("input[name='bank']").val().trim();
        const accountholder = $("input[name='accountholder']").val().trim();
        const accountno = $("input[name='accountno']").val().trim();
        const ifsc = $("input[name='ifsc']").val().trim();

        // Validate each field
        if (!name) {
            alert("Please enter the student's name.");
            return;
        }
        if (!fname) {
            alert("Please enter the father's name.");
            return;
        }
        if (!mname) {
            alert("Please enter the mother's name.");
            return;
        }
        if (!dob) {
            alert("Please enter the date of birth.");
            return;
        }
        if (!email || !validateEmail(email)) {
            alert("Please enter a valid email address.");
            return;
        }
        if (!mobile || !/^\d{10}$/.test(mobile)) {
            alert("Please enter a valid 10-digit mobile number.");
            return;
        }
        if (!aadhar || !/^\d{12}$/.test(aadhar)) {
            alert("Please enter a valid 12-digit Aadhar number.");
            return;
        }
        if (!category) {
            alert("Please select a category.");
            return;
        }
        if (!classVal) {
            alert("Please select a class.");
            return;
        }
        if (!bank) {
            alert("Please enter the bank name.");
            return;
        }
        if (!accountholder) {
            alert("Please enter the account holder's name.");
            return;
        }
        if (!accountno || !/^\d+$/.test(accountno)) {
            alert("Please enter a valid account number.");
            return;
        }
        if (!ifsc) {
            alert("Please enter a valid IFSC code.");
            return;
        }

        // Email validation function
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
        $('#loading').show();
        let formData = $("#form").serialize();
        $.ajax({
            url: "ajax.php",
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function (data) {
                $('#loading').hide();
                if (data.status == 1) {
                    $("input[name='registration_id']").val(data.registration_id);
                    $("#regsuccess").html("Thanks for registration with us " + data.name + ". Your registration id is " + data.registration_id + " .")
                    $('#registerform').hide();
                    $('#thanks').show();
                } else {
                    alert("In correct details . Please try again .");
                }
            }
        })
    })

    $(document).ready(function (e) {
        $("#uploadform").on('submit', (function (e) {
            $('#loading').show();
            e.preventDefault();
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#loading').hide();
                    $('#uploadalert').show();
                },
                error: function () { }
            });
        }));
    });

    $("#uploadformpop").on('submit', (function (e) {
        $('#loadingpop').show();
        e.preventDefault();
        console.log(new FormData(this));
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#loadingpop').hide();
                $('#uploadalert1').show();
            },
            error: function () { }
        });
    }));
})